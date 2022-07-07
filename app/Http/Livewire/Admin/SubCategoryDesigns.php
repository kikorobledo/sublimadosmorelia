<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\CategoryDesign;
use App\Models\SubCategoryDesign;

class SubCategoryDesigns extends Component
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

    public $subCategory_id;
    public $name;
    public $category_id;

    protected function rules(){
        return[
            'name' => 'required',
            'category_id' => 'required'
        ];
    }

    protected $validationAttributes = [
        'name' => 'Nombre',
        'category_id' => 'Categpría'
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
        $this->reset('subCategory_id', 'name', 'category_id');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalCreate(){

        $this->resetAll();

        $this->edit = false;
        $this->create = true;
        $this->modal = true;
    }

    public function openModalEdit($subCategory){

        $this->resetAll();

        $this->create = false;

        $this->subCategory_id = $subCategory['id'];
        $this->name = $subCategory['name'];
        $this->category_id = $subCategory['category_design_id'];

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($subCategory){

        $this->modalDelete = true;
        $this->subCategory_id = $subCategory['id'];
    }

    public function closeModal(){
        $this->resetall();
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function create(){

        $this->validate();

        try {

            SubCategoryDesign::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'category_design_id' => $this->category_id,
                'created_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "La subcategoría ha sido creada con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function update(){

        $this->validate();

            $subCategory = SubCategoryDesign::findorFail($this->subCategory_id);

            $subCategory->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'category_design_id' => $this->category_id,
                'updated_by' => auth()->user()->id,
            ]);

        try {

            $this->dispatchBrowserEvent('showMessage',['success', "La subcategoría ha sido actualizada con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

    }

    public function delete(){

        try {

            $subCategory = SubCategoryDesign::findorFail($this->subCategory_id);

            $subCategory->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "La subcategoría ha sido eliminada con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function render()
    {

        $categories = CategoryDesign::All();

        $subCategories = SubCategoryDesign::with('createdBy', 'updatedBy', 'category')
                                            ->where('name', 'LIKE', '%' . $this->search . '%')
                                            ->orWhere(function($q){
                                                return $q->whereHas('category', function($q){
                                                    return $q->where('name', 'LIKE', '%' . $this->search . '%');
                                                });
                                            })
                                            ->orderBy($this->sort, $this->direction)
                                            ->paginate($this->pagination);

        return view('livewire.admin.sub-category-designs', compact('subCategories', 'categories'))->layout('layouts.admin');
    }
}
