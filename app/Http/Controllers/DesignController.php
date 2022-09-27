<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;

class DesignController extends Controller
{
    public function show(Request $request){

        $design = Design::with('tags')->where('slug', $request->slug)->first();

        $glider = Design::with('product')->where('sub_category_design_id', $design->sub_category_design_id)->take(20)->get();

        return view('designs.show', compact('design','glider'));
    }
}
