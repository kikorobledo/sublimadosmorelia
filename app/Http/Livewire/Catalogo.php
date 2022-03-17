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
        $categoryDesigns = CategoryDesign::all();

        if($this->subcategoryDesignName){

            $designs = Design::whereHas('subCategoryDesign', function (Builder $b){
                                    $b->where('name', $this->subcategoryDesignName);
                                })->paginate(20);
        }else{
            $designs = Design::orderBy('created_by', 'desc')->paginate(20);
        }


        return view('livewire.catalogo', compact('categoryDesigns','designs'));
    }
}
