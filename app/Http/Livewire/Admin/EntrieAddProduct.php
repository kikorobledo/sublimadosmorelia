<?php

namespace App\Http\Livewire\Admin;

use App\Models\Entrie;
use Livewire\Component;

class EntrieAddProduct extends Component
{

    public $product;
    public $entrie_id;
    public $entire_price;
    public $quantity;
    public $price;

    protected $listeners = ['entrie_id'];

    protected function rules(){
        return[
            'price' => 'required',
            'quantity' => 'required'
        ];
    }

    protected $validationAttributes = [
        'quantity' => 'Cantidad',
        'price' => 'Precio'
    ];

    public function entrie_id($id){
        $this->entrie_id = $id;
    }

    public function create(){

        $entrie = Entrie::findorFail($this->entrie_id);

        $this->validate();

        try {

            $entrie->products()->attach($this->product->id,[
                'quantity' => $this->quantity,
                'price' => $this->price
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "Se asocio el producto con la entrada ". $entrie->number ." con exito"]);

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);
        }

        $this->reset(['price', 'quantity']);

    }

    public function render()
    {

        return view('livewire.admin.entrie-add-product');
    }
}
