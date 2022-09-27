<?php

namespace App\Http\Livewire;

use App\Models\Design;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class CategoryProducts extends Component
{

    use WithPagination;

    public $categoryProduct;
    public $product;
    public $subcategoryDesignName;
    public $listSubCategoryDesigns = [];

    protected $queryString = ['product', 'subcategoryDesignName'];

    public function clean(){
        $this->reset(['product', 'subcategoryDesignName']);
    }

    public function updatedProduct(){
        $this->resetPage();
    }

    public function updatedSubcategoryDesignName(){
        $this->resetPage();
    }

    public function mount(){

        foreach($this->categoryProduct->products as $product){
            $product->load('designs');
            foreach($product->designs as $design){
                $design->load('subCategoryDesign');
                if(!in_array($design->subCategoryDesign->name, $this->listSubCategoryDesigns))
                    $this->listSubCategoryDesigns[] = $design->subCategoryDesign->name;
            }
        }
    }

    public function render()
    {

        $designsQuery = Design::query()->with('product')->whereHas('product.categoryProduct', function (Builder $b){
            $b->where('id', $this->categoryProduct->id);
        });

        if($this->product){

            $designsQuery = $designsQuery->whereHas('product', function (Builder $b){
                $b->where('name', $this->product);
            });

        }

        if($this->subcategoryDesignName){

            $designsQuery = $designsQuery->whereHas('subCategoryDesign', function (Builder $b){
                $b->where('name', $this->subcategoryDesignName);
            });

        }

        $designs = $designsQuery->orderBy('created_at', 'desc')->paginate(20);

        return view('livewire.category-products', compact('designs'));
    }
}
