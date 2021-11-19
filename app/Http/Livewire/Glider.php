<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Glider extends Component
{
    public $designs;
    public $category;
    public $uuid;

    public function loadDesigns(){

        if($this->category)
            $this->designs = $this->category->designs->take(15)->get();

        $this->uuid = Str::uuid()->toString();

        $this->emit('glider', $this->uuid);

    }

    public function render()
    {

        return view('livewire.glider');
    }
}
