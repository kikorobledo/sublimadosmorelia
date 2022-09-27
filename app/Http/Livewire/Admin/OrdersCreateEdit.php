<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Design;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderDetail;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class OrdersCreateEdit extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $modal = false;
    public $modalDelete = false;
    public $create = false;
    public $edit = false;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public $order;
    public $order_id;
    public $client_id;
    public $anticipo;
    public $status;
    public $image_anticipo;
    public $image_design;
    public $description;
    public $content = [];
    public $producto;
    public $recibido;
    public $cambio;

    public $aux;

    protected $listeners = ['addProduct', 'render'];

    protected $validationAttributes = [
        'client_id' => 'Cliente',
        'status' => 'Status'
    ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatedRecibido(){
        $this->validate([
            'recibido' => 'numeric|gte:' . ((float)$this->order->total - (float)$this->anticipo),
        ]);

        $this->cambio = (float)$this->recibido  - ((float)$this->order->total - (float)$this->anticipo);
    }

    public function addProduct($object){

        $this->validate([
            'client_id' => 'required',
            'status' => 'required',
        ]);

        $this->producto = json_decode($object['product']);

        if(!$this->order){

            $number = Order::orderBy('number', 'desc')->value('number');

            $this->order = Order::create([
                'number' => $number ? $number + 1 : 1,
                'client_id' => $this->client_id,
                'status' => $this->status,
                'anticipo' => $this->anticipo ? $this->anticipo : null,
                'created_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('trix-initialize');

        }

        $aux = OrderDetail::where('order_id', $this->order->id)
                            ->where('product_id', $this->producto->id)
                            ->where('design_id', (int)$object['design_id'])
                            ->when(isset($object['size']), function($q) use($object){
                                return $q->where('size', $object['size']);
                            })
                            ->when(isset($object['color']), function($q) use($object){
                                return $q->where('color', $object['color']);
                            })
                            ->first();

        if($aux){

            $cuponPrice = 0;

            foreach($this->order->cupons as $cupon){

                if($cupon->product_id == $aux->product_id){

                    $cuponPrice = $this->getPrice($object) - $cupon->price;

                }

            }

            $totalOrder = $this->order->total - $aux->total;

            $aux->price = $cuponPrice != 0 ? $cuponPrice : $this->getPrice($object);
            $aux->quantity = $aux->quantity + (float)$object['quantity'];
            $aux->total = $aux->quantity * $aux->price;
            $aux->save();



            $this->order->update(['total' => $totalOrder + $aux->total]);

        }else{

            $cuponPrice = 0;

            foreach($this->order->cupons as $cupon){

                if($cupon->product_id == $this->producto->id){

                    $cuponPrice = $this->getPrice($object) - $cupon->price;

                }

            }


            $orderDetail = OrderDetail::Create([
                'product_id' => $this->producto->id,
                'price' => $cuponPrice != 0 ? $cuponPrice : $this->getPrice($object),
                'design_id' => (int)$object['design_id'],
                'quantity' => (float)$object['quantity'],
                'order_id' => $this->order->id,
                'size' => $object['size'],
                'color' => $object['color'],
                'total' => (float)$object['quantity'] * ( $cuponPrice != 0 ? $cuponPrice : $this->getPrice($object) )
            ]);

            $this->order->update(['total' => $this->order->total + $orderDetail->total]);

        }

        $this->producto = null;

        $this->order->refresh();

        $this->order->load('orderDetails.design', 'orderDetails.product');

        $this->emit('updateProductsQty');
    }

    public function getPrice($object){
        if(isset($object['size'])){
            foreach($this->producto->sizes as $size){
                if($size->name === $object['size']){
                    $price = $size->pivot->price;
                    return $price;
                }
            }
        }else{
            $price = $this->producto->price;
            return $price;
        }
    }

    public function deleOrderDetail($id){

        try {

            $orderDetail = OrderDetail::Find($id);

            $orderDetail->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El producto ha sido eliminado con exito."]);

            $this->order->update(['total' => $this->order->total - $orderDetail->total]);

            $this->order->refresh();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

        }

        $this->emit('updateProductsQty');
    }

    public function update(){

        try {

            foreach ($this->order->orderdetails as  $orderDetail) {

                $orderDetail->load('product', 'design');

                $this->content[] = array(
                    'product' => $orderDetail->product->name,
                    'design' => $orderDetail->design->name,
                    'color' => $orderDetail->color,
                    'size' => $orderDetail->size,
                    'price' => $orderDetail->total / $orderDetail->quantity,
                    'quantity' => $orderDetail->quantity,
                    'total' => $orderDetail->total
                );

            }

            if($this->image_anticipo){

                Storage::disk('orders')->delete($this->order->anticipo_image);

                $anticipo_image = $this->image_anticipo->store('/', 'orders');
            }
            else
                $anticipo_image = null;

            if($this->image_design){

                Storage::disk('orders')->delete($this->order->design_image);

                $design_image = $this->image_design->store('/', 'orders');
            }
            else
                $design_image = null;

            $this->order->update([
                'client_id' => $this->client_id,
                'status' => $this->status,
                'anticipo' => $this->anticipo,
                'content' => json_encode($this->content, JSON_FORCE_OBJECT),
                'anticipo_image' => $anticipo_image ? $anticipo_image : $this->order->anticipo_image,
                'design_image' => $design_image ? $design_image : $this->order->design_image,
                'description' => $this->description,
                'updated_by' => auth()->user()->id
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El pedido ha sido procesado con exito."]);

            redirect()->route('admin.orders.index');

        } catch (\Throwable $th) {
            dd($th);
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo."]);
        }
    }

    public function pay(){

        $this->status = "entregada";

        $this->update();
    }

    public function mount(){

        if($this->order){
            $this->client_id = $this->order->client_id;
            $this->status = $this->order->status;
            $this->anticipo = $this->order->anticipo;
            $this->total = $this->order->total;
            $this->description = $this->order->description;

        }
    }

    public function render()
    {

        if($this->order)
            $this->order->load('orderDetails.design', 'orderDetails.product');

        $clients = User::where('role', 'usuario')->get();

        $products = Product::with('sizes', 'colors')->orderBy('name')->get();

        $designs = Design::where('name', 'LIKE', '%' . $this->search . '%')
                            ->simplePaginate(10);

        return view('livewire.admin.orders-create-edit', compact('clients', 'designs', 'products'));
    }
}
