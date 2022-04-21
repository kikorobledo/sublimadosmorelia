<?php

namespace App\Http\Controllers;

use App\Models\Banner;

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

        $encabezadoDesktop = cache()->get('encabezadoDesktop')->shuffle()->take(3);

        $encabezadoMobile = cache()->get('encabezadoMobile')->shuffle()->take(3);

        $banner1Desktop = cache()->get('banner1Desktop')->shuffle()->take(1);

        $banner1Mobile = cache()->get('banner1Mobile')->shuffle()->take(1);

        $banner2Desktop = cache()->get('banner2Desktop')->shuffle()->take(1);

        $banner2Mobile = cache()->get('banner2Mobile')->shuffle()->take(1);

        $videos = cache()->get('videos')->shuffle();

        return view('welcome', compact(
                        'categoriesProduct',
                        'categoriesDesign',
                        'latestDesigns',
                        'latestDesignsTextil',
                        'metalDesigns',
                        'encabezadoDesktop',
                        'encabezadoMobile',
                        'banner1Desktop',
                        'banner1Mobile',
                        'banner2Desktop',
                        'banner2Mobile',
                        'videos'
                    ));
    }
}
