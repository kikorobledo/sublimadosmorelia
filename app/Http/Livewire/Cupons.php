<?php

namespace App\Http\Livewire;

use App\Models\Cupon;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Cupons extends Component
{

    public $order;
    public $code;
    public $cupon;
    public $message;
    public $cuponList = [];
    public $orderDetailsCount = [];

    protected $listeners = ['updateProductsQty'];

    public function applyCupon(){

        $this->cupon = Cupon::where('code', $this->code)->first();

        if($this->order){

            if($this->cupon){

                foreach($this->order->cupons as $cupon){

                    if($cupon->id == $this->cupon->id){

                        $this->message = "Ya cuentas con este cupón.";

                        return;
                    }

                }

                if($this->cupon->status == 'activa' && $this->cupon->available > 0){

                    if(!in_array((string)$this->cupon->id, $this->cuponList, true))
                        array_push($this->cuponList, (string)$this->cupon->id);

                    if($this->cupon->percentage){

                        $this->order->total = ($this->order->total * $this->cupon->percentage) / 100;

                        $this->order->save();

                        $this->order->cupons()->sync($this->cuponList);

                        $this->cupon->update(['available' => $this->cupon->available - 1]);

                    }else{

                        $flag = false;

                        foreach($this->order->orderDetails as $orderDetail){

                            if($orderDetail->product_id == $this->cupon->product_id){

                                if($this->orderDetailsCount[$orderDetail->product_id]["QTY"] < 10){

                                    $this->cleanCuponList();

                                    $this->message = "Cupón para " . $this->cupon->product->name . " mínimo " . $this->cupon->min_quantity . " piezas.";

                                    return;
                                }

                                $orderDetail->price = $orderDetail->price - $this->cupon->price;

                                $orderDetail->total = $orderDetail->price * $orderDetail->quantity;

                                $orderDetail->save();

                                $this->order->cupons()->sync($this->cuponList);

                                $this->cupon->update(['available' => $this->cupon->available - 1]);

                                $flag = true;

                            }

                        }

                        if(!$flag){

                            $this->message = "Cupón para " . $this->cupon->product->name . " mínimo " . $this->cupon->min_quantity . " piezas.";

                            $this->cleanCuponList();

                        }

                        $this->calculateOrderTotal();

                    }

                }else{

                    $this->message = "El cupón se encuentra inactivo.";

                }

            }else{

                $this->message = "El cupón no existe.";

            }

            $this->order->refresh();

            $this->emit('render');

        }else{

            if($this->cupon){

                foreach(Cart::content() as  $item){

                    if(isset($item->options['cupon']) && $item->options->cupon === $this->cupon->code){

                        $this->message = "Ya cuentas con este cupón.";

                        return;
                    }

                }

                if($this->cupon->status == 'activa' && $this->cupon->available > 0){

                    $flag = false;

                    foreach(Cart::content() as  $item){

                        if($item->options->product == $this->cupon->product_id){

                            if($item->qty < 10){

                                $this->message = "Cupón para " . $this->cupon->product->name . " mínimo " . $this->cupon->min_quantity . " piezas.";

                                return;
                            }

                            $item->price = $item->price - $this->cupon->price;

                            $array = $item->options->merge(['cupon' => $this->cupon->code]);

                            Cart::update($item->rowId, ['options' => $array]);

                            $this->cupon->update(['available' => $this->cupon->available - 1]);

                            $flag = true;

                        }

                    }

                    if(!$flag){

                        $this->message = "Cupón para " . $this->cupon->product->name . " mínimo " . $this->cupon->min_quantity . " piezas.";

                        $this->cleanCuponList();

                    }

                }else{

                    $this->message = "El cupón se encuentra inactivo.";

                }

            }else{

                $this->message = "El cupón no existe.";

            }

        }

        $this->reset('code');

        $this->emit('render');

    }

    public function cleanCuponList(){

        foreach ($this->cuponList as $key => $value){
            if ($value == (string)$this->cupon->id) {
                unset($this->cuponList[$key]);
            }
        }

    }

    public function removeCupon($id){

        $this->cupon = Cupon::where('id', $id)->get()->first();

        if($this->cupon){

            if($this->cupon->percentage){

                $this->calculateOrderTotal();

            }else{

                foreach($this->order->orderDetails as $orderDetail){

                    if($orderDetail->product_id == $this->cupon->product_id){

                        $orderDetail->price = $orderDetail->price + $this->cupon->price;

                        $orderDetail->total = $orderDetail->price * $orderDetail->quantity;

                        $orderDetail->save();

                    }

                }

                $this->calculateOrderTotal();

                $this->order->cupons()->detach($id);

                $this->cupon->update(['available' => $this->cupon->available + 1]);

                $this->cleanCuponList();

            }

        }

        $this->order->refresh();

        $this->emit('render');

    }

    public function calculateOrderTotal(){

        $total = 0;

        foreach($this->order->orderDetails as $orderDetail){

            $total = $total + $orderDetail->total;

        }

        $this->order->total = $total;
        $this->order->save();

    }

    public function updateProductsQty(){

        $this->order->refresh();

        $count=array();

        foreach($this->order->orderDetails as $orderD){

            $array = array("product_id" => $orderD->product_id, "QTY" => (int)$orderD->quantity);

            array_push($count, $array);

        }

        $result=array();

        foreach ($count as $value)
        {
            if(isset($result[$value["product_id"]]))
            {
                $result[$value["product_id"]]["QTY"]+=$value["QTY"];
            }
            else
            {
                $result[$value["product_id"]]=$value;
            }
        }

        $this->orderDetailsCount = $result;

        foreach($this->orderDetailsCount as $count){

            foreach($this->order->cupons as $cupon){

                if($cupon->product_id == $count["product_id"] && $count["QTY"] < 10){

                    $this->removeCupon($cupon->id);

                    $this->emit('render');
                }

            }
        }

    }

    public function mount(){

        if($this->order){

            foreach($this->order->cupons as $cupon){

                array_push($this->cuponList, (string)$cupon->id);

            }

            $this->updateProductsQty();
        }
    }

    public function render()
    {
        return view('livewire.cupons');
    }
}
