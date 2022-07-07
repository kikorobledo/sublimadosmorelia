<?php

namespace App\Http\Livewire\Admin;

use App\Models\Design;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\CategoryProduct;
use App\Models\SubCategoryDesign;
use Illuminate\Support\Facades\Storage;

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
    public $pagination=10;

    public $design_id;
    public $name;
    public $slug;
    public $sub_category_id;
    public $image;
    public $product_id;

    protected function rules(){
        return[
            'name' => 'required',
            'product_id' => 'required',
            'slug' => 'unique:designs,slug,' . $this->design_id,
            'sub_category_id' => 'required'
        ];
    }

    protected $validationAttributes = [
        'slug' => 'Nombre',
        'name' => 'Nombre',
        'sub_category_id' => 'Subcategoría',
        'product_id' => 'Producto'
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
        $this->reset('design_id', 'name', 'sub_category_id', 'image', 'product_id');
        $this->resetErrorBag();
        $this->resetValidation();

        $this->dispatchBrowserEvent('removeFiles');
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

        $this->slug = Str::slug($this->name);

        $this->validate();

        try {

            if($this->image){
                $design_image = $this->image->store('/', 'designs');
            }
            else
                $design_image = null;

            Design::create([
                'name' => $this->name,
                'slug' => $this->slug,
                'sub_category_design_id' => $this->sub_category_id,
                'product_id' => $this->product_id,
                'image' => $design_image,
                'category_design_id' => $this->sub_category_id,
                'created_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El diseño ha sido creado con exito."]);

            $this->closeModal();

            $this->updateCache();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function update(){

        $this->slug = Str::slug($this->name);

        $this->validate();

        try {

            $design = Design::findorFail($this->design_id);

            if($this->image){

                Storage::disk('designs')->delete($design->image);

                $design_image = $this->image->store('/', 'designs');
            }

            else
                $design_image = null;

            $design->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'sub_category_design_id' => $this->sub_category_id,
                'product_id' => $this->product_id,
                'image' => $design_image ? $design_image : $design->image,
                'category_design_id' => $this->sub_category_id,
                'created_by' => auth()->user()->id,
            ]);

            $this->dispatchBrowserEvent('showMessage',['success', "El diseño ha sido actualizado con exito."]);

            $this->closeModal();

            $this->updateCache();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

    }

    public function delete(){

        try {

            $design = Design::findorFail($this->design_id);

            Storage::disk('designs')->delete($design->image);

            $design->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El diseño ha sido eliminado con exito."]);

            $this->closeModal();

            $this->updateCache();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function updateCache(){

        cache()->put('latestDesigns', Design::with('product')->orderBy('created_at', 'desc')->take(20)->get());
        cache()->put('latestDesignsTextil', CategoryProduct::where('name', 'Textiles')->first()->designs()->with('product')->orderBy('created_at')->take(20)->get());
        cache()->put('latestDesignsAluminium', CategoryProduct::where('name', 'Aluminios')->first()->designs()->with('product')->orderBy('created_at')->take(10)->get());
        cache()->put('latestDesignsIron', CategoryProduct::where('name', 'Aceros')->first()->designs()->with('product')->orderBy('created_at')->take(10)->get());

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
                            ->paginate($this->pagination);


        return view('livewire.admin.designs', compact('subCategories', 'products', 'designs'))->layout('layouts.admin');
    }
}
