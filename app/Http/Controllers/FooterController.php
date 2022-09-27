<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function preguntas_frecuentes(){
        return view('preguntas_frecuentes');
    }

    public function aviso_de_privacidad(){
        return view('aviso_de_privacidad');
    }

    public function terminos_y_condiciones(){
        return view('terminos_y_condiciones');
    }
}
