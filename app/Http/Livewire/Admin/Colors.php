<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;

class Colors extends Component
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

    public $color_id;
    public $name;

    protected function rules(){
        return[
            'name' => 'required'
        ];
    }

    protected $validationAttributes = [
        'name' => 'Nombre',
    ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatedPagination(){
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
        $this->reset('color_id', 'name');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalCreate(){

        $this->resetAll();

        $this->edit = false;
        $this->create = true;
        $this->modal = true;
    }

    public function openModalEdit($color){

        $this->resetAll();

        $this->create = false;

        $this->color_id = $color['id'];
        $this->name = $color['name'];

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($color){

        $this->modalDelete = true;
        $this->color_id = $color['id'];
    }

    public function closeModal(){
        $this->resetall();
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function create(){

        $this->validate();

        try {

            Color::create([
                'name' => $this->name,
                'created_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El color ha sido creado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function update(){

        $this->validate();

            $color = Color::findorFail($this->color_id);

            $color->update([
                'name' => $this->name,
                'updated_by' => auth()->user()->id,
            ]);

        try {

            $this->dispatchBrowserEvent('showMessage',['success', "El color ha sido actualizado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

    }

    public function delete(){

        try {

            $color = Color::findorFail($this->color_id);

            $color->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El color ha sido eliminado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function render()
    {

        $colors = Color::with('createdBy', 'updatedBy')
                            ->where('name', 'LIKE', '%' . $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->pagination);

        return view('livewire.admin.colors', compact('colors'))->layout('layouts.admin');
    }
}
