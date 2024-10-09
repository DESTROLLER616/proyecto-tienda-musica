<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;

class GenerateController extends Controller
{
    public function imprimir(){
        $welcome = 'Welcome to the pdf';

        $pdf = \PDF::loadView('ejemplo', compact('welcome'));
        return $pdf->download('ejemplo.pdf');
   }

}
