<?php

namespace App\Http\Livewire\Admin;

use App\Models\Size;
use Livewire\Component;
use Livewire\WithPagination;

class Sizes extends Component
{

    use WithPagination;

    public $modal = false;
    public $modalDelete = false;
    public $create = false;
    public $edit = false;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public $size_id;
    public $name;

    protected function rules(){
        return[
            'name' => 'required'
        ];
    }

    public function updatingSearch(){
        $this->resetPage();
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
        $this->reset('size_id', 'name');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalCreate(){

        $this->resetAll();

        $this->edit = false;
        $this->create = true;
        $this->modal = true;
    }

    public function openModalEdit($size){

        $this->resetAll();

        $this->create = false;

        $this->size_id = $size['id'];
        $this->name = $size['name'];

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($size){

        $this->modalDelete = true;
        $this->size_id = $size['id'];
    }

    public function closeModal(){
        $this->resetall();
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function create(){

        $this->validate();

        try {

            Size::create([
                'name' => $this->name,
                'created_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El tamaño ha sido creado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function update(){

        $this->validate();

            $size = Size::findorFail($this->size_id);

            $size->update([
                'name' => $this->name,
                'updated_by' => auth()->user()->id,
            ]);

        try {

            $this->dispatchBrowserEvent('showMessage',['success', "El tamaño ha sido actualizado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

    }

    public function delete(){

        try {

            $size = Size::findorFail($this->size_id);

            $size->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El tamaño ha sido eliminado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function render()
    {

        $sizes = Size::with('createdBy', 'updatedBy')
                            ->where('name', 'LIKE', '%' . $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(10);

        return view('livewire.admin.sizes', compact('sizes'))->layout('layouts.admin');
    }
}
