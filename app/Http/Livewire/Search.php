<?php

namespace App\Http\Livewire;

use App\Models\Design;
use Livewire\Component;

class Search extends Component
{
    public $show = false;
    public $search;

    protected $listeners = ['open'];

    public function open(){

        $this->show = true;

    }

    public function render()
    {

        if($this->search)
            $designs = Design::with('subCategoryDesign')
                                ->where('name', 'LIKE', '%' . $this->search . '%')
                                ->orWhere(function($q){
                                    $q->whereHas('subCategoryDesign', function($q){
                                        $q->where('name', 'LIKE', '%' . $this->search . '%');
                                    });
                                })
                                ->orWhere(function($q){
                                    $q->whereHas('product', function($q){
                                        $q->where('name', 'LIKE', '%' . $this->search . '%');
                                    });
                                })
                                ->get();
        else
            $designs = [];

        return view('livewire.search', compact('designs'));
    }
}
