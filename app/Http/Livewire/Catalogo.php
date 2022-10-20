<?php

namespace App\Http\Livewire;

use App\Models\Design;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CategoryDesign;
use Illuminate\Database\Eloquent\Builder;

class Catalogo extends Component
{

    use WithPagination;

    public $subcategoryDesignName;

    protected $queryString = ['subcategoryDesignName'];

    public function clean(){
        $this->reset('subcategoryDesignName');
        $this->resetPage();
    }

    public function updatedSubcategoryDesignName(){

        $this->resetPage();
    }

    public function render()
    {
        $categoryDesigns = CategoryDesign::with('subcategories')->get();

        if($this->subcategoryDesignName){

            $designs = Design::with('product')->whereHas('subCategoryDesign', function (Builder $b){
                                    $b->where('name', $this->subcategoryDesignName);
                                })
                                ->orderBy('id', 'desc')
                                ->paginate(20);
        }else{
            $designs = Design::with('product')->orderBy('created_at', 'DESC')->orderBy('id', 'desc')->paginate(20);
        }

        return view('livewire.catalogo', compact('categoryDesigns','designs'));
    }
}
