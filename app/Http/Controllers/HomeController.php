<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryDesign;
use App\Models\CategoryProduct;

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

        $metalDesigns = $latestDesignsIron->merge($latestDesignsAluminium);

        /* dd($latestDesignsTextil); */

        return view('welcome', compact('categoriesProduct', 'categoriesDesign', 'latestDesigns', 'latestDesignsTextil', 'metalDesigns'));
    }
}
