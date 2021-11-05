<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CategoryProduct;

class Navigation extends Component
{
    public function render()
    {

        $categories = cache()->get('categoriesProduct');

        return view('livewire.navigation', compact('categories'));
    }
}
