<?php

namespace App\Http\Livewire\Admin;

use App\Models\Entrie;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Entries extends Component
{

    use WithPagination;

    public $modal = false;
    public $modalDelete = false;
    public $create = false;
    public $edit = false;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination=10;
    public $step = 1;

    public $entrie_id;
    public $searchProducts;
    public $productsEntrie;
    public $price;
    public $quantity;

    protected function rules(){
        return[
            'price' => 'required',
            'quantity' => 'required'
        ];
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatedSearchProducts(){
        $this->emit('entrie_id', $this->entrie_id);
    }

    public function order($sort){

        if($this->sort == $sort){
            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            }
        }else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function resetAll(){
        $this->reset('price','productsEntrie','entrie_id','searchProducts','quantity','step');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalCreate(){

        $this->resetAll();

        $this->edit = false;
        $this->create = true;
        $this->modal = true;
    }

    public function openModalEdit($entrie){

        $this->resetAll();

        $this->create = false;

        $this->entrie_id = $entrie['id'];
        $this->price = $entrie['price'];
        $this->quantity = $entrie['quantity'];
        $this->productsEntrie = $entrie['products'];

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($entrie){

        $this->modalDelete = true;
        $this->entrie_id = $entrie['id'];
    }

    public function closeModal(){
        $this->resetall();
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function changeStep($i){

        if($i == 1){

            $this->validate();

            $this->create();

            $this->step = 2;

        }else{

            $this->validate();

            $this->update();

            $this->step = 2;

        }

    }

    public function deleteProduct($id){

        $entrie = Entrie::findorFail($this->entrie_id);

        $entrie->products()->detach($id);

        $this->productsEntrie = json_decode(json_encode ( $entrie->products ) , true);

    }

    public function create(){

        $this->validate();

        try {

            $number = Entrie::orderBy('number', 'desc')->value('number');

            $entrie = Entrie::create([
                'number' => $number ? $number + 1 : 1,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'created_by' => auth()->user()->id,
            ]);

            $this->entrie_id = $entrie->id;

            $this->emit('entrie_id', $entrie->id);

            $this->dispatchBrowserEvent('showMessage',['success', "La entrada ha sido creada con exito, acontinuación seleccione los productos."]);

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);
        }
    }

    public function update(){

        $this->validate();

        try {

            $entrie = Entrie::findorFail($this->entrie_id);

            $entrie->update([
                'price' => $this->price,
                'quantity' => $this->quantity,
                'updated_by' => auth()->user()->id,
            ]);

            $this->emit('entrie_id', $entrie->id);

            $this->dispatchBrowserEvent('showMessage',['success', "La entrada ha sido actualizada con exito, acontinuación seleccione los productos."]);

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);
        }

    }

    public function delete(){

        try {

            $entrie = Entrie::findorFail($this->entrie_id);

            $entrie->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "La entrada ha sido eliminada con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function render()
    {

        $entries = Entrie::with('products')->where('price', 'LIKE', '%' . $this->search . '%')
                                            ->orderBy($this->sort, $this->direction)
                                            ->paginate($this->pagination);

        $products = Product::where('name', 'LIKE', '%' . $this->searchProducts . '%')->simplePaginate(5);

        return view('livewire.admin.entries', compact('entries', 'products'))->layout('layouts.admin');
    }
}
