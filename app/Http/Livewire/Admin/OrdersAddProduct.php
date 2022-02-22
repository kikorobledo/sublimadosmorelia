<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use stdClass;

class OrdersAddProduct extends Component
{

    public $design;
    public $products;
    public $product;
    public $quantity;
    public $color;
    public $size;

    public function resetAll(){
        $this->reset([
            'product',
            'quantity',
            'color',
            'size'
        ]);
    }

    public function addProduct(){

        if($this->product->color){
            $this->validate([
                'product' => 'required',
                'quantity' => 'required',
                'color' => 'required'
            ]);
        }elseif($this->product->size){
            $this->validate([
                'product' => 'required',
                'quantity' => 'required',
                'size' => 'required'
            ]);
        }else{
            $this->validate([
                'product' => 'required',
                'quantity' => 'required'
            ]);
        }

        $object = new stdClass();

        $object->product = $this->product;
        $object->quantity = $this->quantity;
        $object->design_id = $this->design->id;

        $this->emit('addProduct', $object);

        $this->resetAll();
    }

    public function render()
    {
        return view('livewire.admin.orders-add-product');
    }
}
