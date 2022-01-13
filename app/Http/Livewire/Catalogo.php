<?php

namespace App\Http\Livewire;

use App\Models\Design;
use Livewire\Component;
use App\Models\CategoryDesign;
use Illuminate\Database\Eloquent\Builder;

class Catalogo extends Component
{

    public $subcategoryDesign;

    protected $queryString = ['subcategoryDesign'];

    public function clean(){
        $this->reset(['subcategoryDesign']);
    }

    public function updatedProduct(){
        $this->resetPage();
    }

    public function render()
    {
        $categoryDesigns = CategoryDesign::all();

        if($this->subcategoryDesign){

            $designs = Design::whereHas('subCategoryDesign', function (Builder $b){
                                    $b->where('name', $this->subcategoryDesign);
                                })->paginate(20);
        }else{
            $designs = Design::paginate(20);
        }


        return view('livewire.catalogo', compact('categoryDesigns','designs'));
    }
}
