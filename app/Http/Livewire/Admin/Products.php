<?php

namespace App\Http\Livewire\Admin;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Storage;

class Products extends Component
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

    public $product_id;
    public $name;
    public $description;
    public $image;
    public $price;
    public $status;
    public $category_id;
    public $purchase_price;
    public $sizesList = [];
    public $sizesPrice = [];
    public $colorsList = [];

    protected function rules(){
        return[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'purchase_price' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ];
    }

    protected $validationAttributes = [
        'slug' => 'Nombre',
        'category_id' => 'Categoría',
        'purchase_price' => 'Precio de compra',
        'price' => 'Precio de venta',
        'status' => 'Estado',
        'description' => 'Descripción',
        'name' => 'Nombre'
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
        $this->reset('product_id', 'category_id','name','image', 'description', 'price', 'status','purchase_price', 'colorsList', 'sizesList','sizesPrice');
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

    public function openModalEdit($product){

        $this->resetAll();

        $this->create = false;

        $this->product_id = $product['id'];
        $this->name = $product['name'];
        $this->description = $product['description'];
        $this->status = $product['status'];
        $this->category_id = $product['category_product_id'];
        $this->purchase_price = $product['purchase_price'];
        $this->price = $product['price'];

        foreach($product['colors'] as $color){
            array_push($this->colorsList, (string)$color['id']);
        }

        foreach($product['sizes'] as $size){
            array_push($this->sizesList, (string)$size['id']);
        }

        /* dd($product['sizes']); */

        if(isset($product['sizes'][0]['pivot']) )
            foreach($product['sizes'] as $key => $size){
               $this->sizesPrice[(string)$size['id']] = $product['sizes'][$key]['pivot']['price'];
            }

        $this->edit = true;
        $this->modal = true;
    }

    public function openModalDelete($product){

        $this->modalDelete = true;
        $this->product_id = $product['id'];
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
                $design_image = $this->image->store('/', 'products');
            else
                $design_image = null;

            $product = Product::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'description' => $this->description,
                'status' => $this->status,
                'price' =>  $this->price,
                'image' => $design_image,
                'purchase_price' =>  $this->purchase_price,
                'category_product_id' => $this->category_id,
                'created_by' => auth()->user()->id,
            ]);

            $product->colors()->attach($this->colorsList);

            if(count($this->sizesList)){
                foreach ($this->sizesList as $value) {
                    if(isset($this->sizesPrice[$value]))
                        $product->sizes()->attach($value, ['price' => $this->sizesPrice[$value]]);
                    else
                        $product->sizes()->attach($value, ['price' => $product->price]);
                }
            }

            $this->dispatchBrowserEvent('showMessage',['success', "El producto ha sido creado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function update(){

        $this->validate();

        try {

            $product = Product::findorFail($this->product_id);

            if($this->image){

                Storage::disk('products')->delete($product->image);

                $design_image = $this->image->store('/', 'products');

            }
            else
                $design_image = null;

            $product->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'description' => $this->description,
                'status' => $this->status,
                'price' =>  $this->price,
                'image' => $design_image ? $design_image : $product->image,
                'purchase_price' =>  $this->purchase_price,
                'category_product_id' => $this->category_id,
                'updated_by' => auth()->user()->id,
            ]);

            $product->colors()->sync($this->colorsList);

            $sizes = [];

            foreach ($this->sizesList as $value) {
                if(isset($this->sizesPrice[$value]) && $this->sizesPrice[$value] != 0)
                    $sizes[$value] = ['price' => $this->sizesPrice[$value]];
                else
                    $sizes[$value] = ['price' => $product->price];
            }

            $product->sizes()->sync($sizes);

            $this->dispatchBrowserEvent('showMessage',['success', "El producto ha sido actualizado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }

    }

    public function delete(){

        try {

            $product = Product::findorFail($this->product_id);

            Storage::disk('products')->delete($product->image);

            $product->delete();

            $this->dispatchBrowserEvent('showMessage',['success', "El producto ha sido eliminado con exito."]);

            $this->closeModal();

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showMessage',['error', "Lo sentimos hubo un error inténtalo de nuevo"]);

            $this->closeModal();
        }
    }

    public function render()
    {

        $products = Product::with('createdBy', 'updatedBy', 'colors', 'sizes', 'categoryProduct')
                                ->where('name', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('description', 'LIKE', '%' . $this->search . '%')
                                ->orderBy($this->sort, $this->direction)
                                ->paginate($this->pagination);

        $categories = CategoryProduct::all();

        $colors = Color::all();

        $sizes = Size::all();

        return view('livewire.admin.products', compact('products', 'categories', 'sizes', 'colors'))->layout('layouts.admin');
    }
}
