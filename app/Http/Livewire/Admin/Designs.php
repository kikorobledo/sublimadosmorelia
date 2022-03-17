<?php

namespace App\Http\Livewire\Admin;

use App\Models\Design;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\SubCategoryDesign;
use Livewire\WithFileUploads;

class Designs extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $modal = false;
    public $modalDelete = false;
    public $create = false;
    public $edit = false;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public $design_id;
    public $name;
    public $sub_category_id;
    public $image;
    public $product_id;

    protected function rules(){
        return[
            'name' => 'required',
            'sub_category_id' => 'required'
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
        $this->reset('design_id', 'name', 'sub_category_id', 'image', 'product_id');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModalCreate(){

        $this->resetAll();

        $this->edit = false;
        $this->create = true;
        $this->modal = true;
    }

    public function openModalEdit($design){

        $this->resetAll();

        $this->create = false;

        $this->design_id = $design['id'];
        $this->name = $design['name'];
        $this->sub_category_id = $design['sub_category_design_id'];
        $this->image = $design['image'];
        $this->product_id = $design['product_id'];

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($design){

        $this->modalDelete = true;
        $this->design_id = $design['id'];
    }

    public function closeModal(){
        $this->resetall();
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function create(){

        $this->validate();

        try {

            if($this->image)
                $design_image = $this->image->store('/', 'designs');
            else
                $design_image = null;

            Design::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'sub_category_design_id' => $this->sub_category_id,
                'product_id' => $this->product_id,
                'image' => $design_image,
                'category_design_id' => $this->sub_category_id,
                'created_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El diseño ha sido creado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function update(){

        $this->validate();

            $design = Design::findorFail($this->design_id);

            if($this->image)
                $design_image = $this->image->store('/', 'designs');
            else
                $design_image = null;

            $design->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'sub_category_design_id' => $this->sub_category_id,
                'product_id' => $this->product_id,
                'image' => $design_image ? $design_image : $design->image,
                'category_design_id' => $this->sub_category_id,
                'created_by' => auth()->user()->id,
            ]);

        try {

            $this->dispatchBrowserEvent('showMessage',['success', "El diseño ha sido actualizado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

    }

    public function delete(){

        try {

            $design = Design::findorFail($this->design_id);

            $design->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El diseño ha sido eliminado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function render()
    {

        $subCategories = SubCategoryDesign::all();

        $products = Product::all();

        $designs = Design::with('createdBy', 'updatedBy', 'subCategoryDesign', 'product')
                            ->where('name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere(function($q){
                                return $q->whereHas('subCategoryDesign', function($q){
                                    return $q->where('name', 'LIKE', '%' . $this->search . '%');
                                });
                            })
                            ->orWhere(function($q){
                                return $q->whereHas('product', function($q){
                                    return $q->where('name', 'LIKE', '%' . $this->search . '%');
                                });
                            })
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(10);


        return view('livewire.admin.designs', compact('subCategories', 'products', 'designs'))->layout('layouts.admin');
    }
}
