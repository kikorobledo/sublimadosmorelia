<?php

namespace App\Http\Controllers;

use App\Models\Design;

class DesignController extends Controller
{
    public function show(Design $design){

        return view('designs.show', compact('design'));
    }
}
