<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class CategoryController extends Controller
{
    public function show(Request $request){

        $categoryProduct = CategoryProduct::where('slug', $request->slug)->first();

        $categoryDesktop = cache()->get('categoryDesktop')->shuffle()->take(1);

        $catalogoMobile = cache()->get('catalogoMobile')->shuffle()->take(1);

        return view('categoriesproduct.show', compact('categoryProduct', 'categoryDesktop', 'catalogoMobile'));
    }
}
