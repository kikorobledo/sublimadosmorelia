<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class CategoryController extends Controller
{
    public function show(Request $request){

        $categoryProduct = CategoryProduct::where('slug', $request->slug)->first();

        return view('categoriesproduct.show', compact('categoryProduct'));
    }
}
