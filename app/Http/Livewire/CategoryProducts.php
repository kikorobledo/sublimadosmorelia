<?php

namespace App\Http\Livewire;

use App\Models\Design;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CategoryDesign;
use Illuminate\Database\Eloquent\Builder;

class CategoryProducts extends Component
{

    use WithPagination;

    public $categoryProduct;
    public $product;
    public $subcategoryDesign;
    public $listSubCategoryDesigns = [];

    protected $queryString = ['product', 'subcategoryDesign'];

    public function clean(){
        $this->reset(['product', 'subcategoryDesign']);
    }

    public function updatedProduct(){
        $this->resetPage();
    }

    public function updatedSubcategoryDesign(){
        $this->resetPage();
    }

    public function mount(){

        foreach($this->categoryProduct->products as $product){
            foreach($product->designs as $design){
                if(!in_array($design->subCategoryDesign->name, $this->listSubCategoryDesigns))
                    $this->listSubCategoryDesigns[] = $design->subCategoryDesign->name;
            }
        }
    }

    public function render()
    {



        $designsQuery = Design::query()->whereHas('product.categoryProduct', function (Builder $b){
            $b->where('id', $this->categoryProduct->id);
        });

        if($this->product){

            $designsQuery = $designsQuery->whereHas('product', function (Builder $b){
                $b->where('name', $this->product);
            });

        }

        if($this->subcategoryDesign){

            $designsQuery = $designsQuery->whereHas('subCategoryDesign', function (Builder $b){
                $b->where('name', $this->subcategoryDesign);
            });

        }

        $designs = $designsQuery->paginate(20);

        return view('livewire.category-products', compact('designs'));
    }
}
