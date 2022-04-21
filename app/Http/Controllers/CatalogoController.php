<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function __invoke()
    {

        $catalogoDesktop = cache()->get('catalogoDesktop')->shuffle()->take(1);

        $catalogoMobile = cache()->get('catalogoMobile')->shuffle()->take(1);

        return view('catalogo', compact('catalogoDesktop', 'catalogoMobile'));
    }
}
