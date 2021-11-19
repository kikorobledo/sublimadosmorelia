<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke()
    {

        $categoriesProduct = cache()->get('categoriesProduct');

        $categoriesDesign = cache()->get('categoriesDesign');

        $latestDesigns = cache()->get('latestDesigns');

        $latestDesignsTextil = cache()->get('latestDesignsTextil');

        $latestDesignsAluminium = cache()->get('latestDesignsAluminium');

        $latestDesignsIron = cache()->get('latestDesignsIron');

        $metalDesigns = array_merge($latestDesignsIron, $latestDesignsAluminium);

        return view('welcome', compact('categoriesProduct', 'categoriesDesign', 'latestDesigns', 'latestDesignsTextil', 'metalDesigns'));
    }
}
