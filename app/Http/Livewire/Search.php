<?php

namespace App\Http\Livewire;

use App\Models\Product;
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
            $products = Product::with('subCategoryProduct')
                                ->where('name', 'LIKE', '%' . $this->search . '%')
                                ->where('status', 2)
                                ->get();
        else
            $products = [];

        return view('livewire.search', compact('products'));
    }
}
