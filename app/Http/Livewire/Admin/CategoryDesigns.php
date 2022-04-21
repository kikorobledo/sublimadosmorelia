<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\CategoryDesign;

class CategoryDesigns extends Component
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

    public $category_id;
    public $name;
    public $image;

    protected function rules(){
        return[
            'name' => 'required',
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
        $this->reset('category_id','name','image');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalCreate(){

        $this->resetAll();

        $this->edit = false;
        $this->create = true;
        $this->modal = true;
    }

    public function openModalEdit($category){

        $this->resetAll();

        $this->create = false;

        $this->category_id = $category['id'];
        $this->name = $category['name'];
        $this->slug = $category['slug'];

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($category){

        $this->modalDelete = true;
        $this->category_id = $category['id'];
    }

    public function closeModal(){
        $this->resetall();
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function create(){

        $this->validate();

        try {

            CategoryDesign::create([
                'name' => $this->name,
                'slug' =>  Str::slug($this->name),
                'created_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "La categoría ha sido creada con exito."]);

            $this->closeModal();

            $this->updateCache();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function update(){

        $this->validate();

        try {

            $category = CategoryDesign::findorFail($this->category_id);

            $category->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'updated_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "La categoría ha sido actualizada con exito."]);

            $this->closeModal();

            $this->updateCache();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

    }

    public function delete(){

        try {

            $category = CategoryDesign::findorFail($this->category_id);

            $category->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "La categoría ha sido eliminada con exito."]);

            $this->closeModal();

            $this->updateCache();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function updateCache(){

        cache()->put('categoriesDesign', CategoryDesign::with('subcategories')->get());

    }

    public function render()
    {

        $categories = CategoryDesign::with('createdBy', 'updatedBy')
                                        ->where('name', 'LIKE', '%' . $this->search . '%')
                                        ->orderBy($this->sort, $this->direction)
                                        ->paginate($this->pagination);

        return view('livewire.admin.category-designs', compact('categories'))->layout('layouts.admin');
    }
}
