<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class AddToCart extends Component
{

    public $design;
    public $color;
    public $size;
    public $price;
    public $total;
    public $quantity = 1;

    protected $validationAttributes = [
        'color' => 'Color',
        'size' => 'Tamaño',
    ];

    public function updatedQuantity(){
        if($this->quantity <= 0)
            $this->quantity = 1;
        $this->total = $this->price * $this->quantity;
    }

    public function updatedSize(){

        $size = json_decode($this->size);

        $this->price = $size->pivot->price;

        if($this->quantity != 1)
            $this->total = $this->price * $this->quantity;
        else
            $this->total = $this->price;
    }

    public function changeQuantity($i){

        if($i == 2){
            $this->quantity ++;
            $this->total = $this->price * $this->quantity;
        }else{
            if($this->quantity != 1){
                $this->quantity --;
                $this->total = $this->price * $this->quantity;
            }
        }
    }

    public function mount(){
        $this->price = $this->design->product->price;
        $this->total = $this->price;
    }

    public function validation(){
        if($this->design->product->colors->count() && $this->design->product->sizes->count())
            $this->validate([
                'color' => 'required',
                'size' => 'required'
            ]);
        elseif($this->design->product->colors->count())
            $this->validate([
                'color' => 'required',
            ]);

        elseif($this->design->product->sizes->count())
            $this->validate([
                'size' => 'required'
            ]);
    }

    public function addCartItem(){

        $original_price = $this->price;

        foreach(Cart::content() as $item){

            if($item->options['product'] == $this->design->product->id && isset($item->options['cupon'])){

                $this->price = $item->price;

            }

        }

        if($this->design->product->colors->count() && $this->design->product->sizes->count()){
            $size = json_decode($this->size);

            Cart::add([
                'id' => $this->design->id,
                'name' => $this->design->name,
                'qty' => $this->quantity,
                'price' => $this->price,
                'weight' => 1,
                'options' => [
                    'size' => $size->name,
                    'color' => $this->color,
                    'image' => $this->design->imageUrl(),
                    'product' => $this->design->product->id,
                    'product_name' => $this->design->product->name,
                    'original_price' => $original_price,
                    ]
            ]);
        }
        elseif($this->design->product->colors->count())
            Cart::add([
                'id' => $this->design->id,
                'name' => $this->design->name,
                'qty' => $this->quantity,
                'price' => $this->price,
                'weight' => 1,
                'options' => [
                    'color' => $this->color,
                    'image' => $this->design->imageUrl(),
                    'product' => $this->design->product->id,
                    'product_name' => $this->design->product->name,
                    'original_price' => $original_price,
                    ]
            ]);

        elseif($this->design->product->sizes->count()){
            $size = json_decode($this->size);

            Cart::add([
                'id' => $this->design->id,
                'name' => $this->design->name,
                'qty' => $this->quantity,
                'price' => $this->price,
                'weight' => 1,
                'options' => [
                    'size' => $size->name,
                    'image' => $this->design->imageUrl(),
                    'product' => $this->design->product->id,
                    'product_name' => $this->design->product->name,
                    'original_price' => $original_price,
                    ]
            ]);
        }else{

            Cart::add([
                'id' => $this->design->id,
                'name' => $this->design->name,
                'qty' => $this->quantity,
                'price' => $this->price,
                'weight' => 1,
                'options' => [
                    'image' => $this->design->imageUrl(),
                    'product' => $this->design->product->id,
                    'product_name' => $this->design->product->name,
                    'original_price' => $original_price,
                    ]
            ]);

        }

        $this->dispatchBrowserEvent('showMessage',['success', "Se agrego al carrito con exito."]);

    }

    public function addCart(){

        $this->validation();

        $this->addCartItem();

        $this->emitTo('dropdown-cart', 'render');

    }


    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
