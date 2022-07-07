<?php

namespace App\Http\Livewire\Admin;

use stdClass;
use Livewire\Component;

class OrdersAddProduct extends Component
{

    public $design;
    public $products;
    public $aux;
    public $product;
    public $quantity;
    public $color;
    public $size;

    protected $validationAttributes = [
        'quantity' => 'Cantidad',
        'aux' => 'Producto'
    ];

    public function updatedAux(){
        $this->product = json_decode($this->aux, true);
    }

    public function resetAll(){
        $this->reset([
            'product',
            'quantity',
            'color',
            'size',
            'aux'
        ]);
    }

    public function addProduct(){

        if(isset($this->product['colors']) && count($this->product['colors']) > 0 && isset($this->product['sizes']) && count($this->product['sizes']) > 0){
            $this->validate([
                'aux' => 'required',
                'quantity' => 'required',
                'color' => 'required',
                'quantity' => 'required',
                'size' => 'required'
            ]);
        }elseif(isset($this->product['sizes']) && count($this->product['sizes']) > 0){
            $this->validate([
                'aux' => 'required',
                'quantity' => 'required',
                'size' => 'required'
            ]);
        }elseif(isset($this->product['colors']) && count($this->product['colors']) > 0){
            $this->validate([
                'aux' => 'required',
                'quantity' => 'required',
                'color' => 'required'
            ]);
        }else{
            $this->validate([
                'aux' => 'required',
                'quantity' => 'required',
            ]);
        }

        $object = new stdClass();

        $object->product = json_encode($this->product);
        $object->color = $this->color;
        $object->size = $this->size;
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
