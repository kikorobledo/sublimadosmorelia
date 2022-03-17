<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderManagement extends Component
{

    public $quantity;
    public $description;

    public function changeQuantity($i, $id){

        $item = Cart::get($id);

        if($i == 2){

            Cart::update($id, ($item->qty + 1));

        }else{

            if($this->quantity != 1){

                Cart::update($id, ($item->qty - 1));

            }
        }

        $this->emitTo('dropdown-cart', 'render');

        $this->render();

    }

    public function deleteItem($id){

        Cart::remove($id);

        $this->emitTo('dropdown-cart', 'render');

    }

    public function destroyCart(){

        Cart::destroy();

        $this->emitTo('dropdown-cart', 'render');

    }

    public function createOrder(){

        $number = Order::orderBy('number', 'desc')->value('number');

        $order = Order::Create([
            'number' => $number ? $number + 1 : 1,
            'client_id' => auth()->user()->id,
            'status' => 'nueva',
            'total' => Cart::subtotal(2,'.',''),
            'description' => $this->description,
            'created_by' => auth()->user()->id
        ]);

        foreach (Cart::content() as  $item) {

            OrderDetail::Create([
                'product_id' => $item->options->product,
                'design_id' => $item->id,
                'color' => $item->options->color ? $item->options->color : null,
                'size' => $item->options->size ? $item->options->size : null,
                'quantity' => $item->qty,
                'total' => ((float)$item->price * (float)$item->qty),
                'order_id' => $order->id,
                'created_by' => auth()->user()->id
            ]);

        }

        $this->destroyCart();

        return redirect()->route('user_orders');

    }

    public function render()
    {


        return view('livewire.order-management');
    }
}
