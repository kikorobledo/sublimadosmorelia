<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\CategoryProduct;

class Products extends Component
{

    use WithPagination;

    public $modal = false;
    public $modalDelete = false;
    public $create = false;
    public $edit = false;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public $product_id;
    public $name;
    public $description;
    public $image;
    public $price;
    public $status;
    public $category_id;
    public $purchase_price;

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
        $this->reset('product_id', 'category_id','name','image', 'description', 'price', 'status','purchase_price');
        $this->resetErrorBag();
        $this->resetValidation();
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

            Product::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'description' => $this->description,
                'status' => $this->status,
                'price' =>  $this->price,
                'purchase_price' =>  $this->purchase_price,
                'category_product_id' => $this->category_id,
                'created_by' => auth()->user()->id,
            ]);

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

            $product->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'description' => $this->description,
                'status' => $this->status,
                'price' =>  $this->price,
                'purchase_price' =>  $this->purchase_price,
                'category_product_id' => $this->category_id,
                'updated_by' => auth()->user()->id,
            ]);

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

        $products = Product::with('createdBy', 'updatedBy')
                                ->where('name', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('description', 'LIKE', '%' . $this->search . '%')
                                ->paginate(10);

        $categories = CategoryProduct::all();

        return view('livewire.admin.products', compact('products', 'categories'))->layout('layouts.admin');
    }
}
