<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Categoria;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade as  PDF;

class PDF_Controller extends Controller
{
    //
    public function PDF(){
        $pdf = PDF::loadView('pdfprueba');
        return $pdf->stream('pruebapdf.pdf');
    }

    public function pdfcategoria(){
        $categoria = Categoria::all();
        $pdf = PDF::loadView('categoria',compact('categoria'));
        return $pdf->stream('categoriapdf.pdf');
    }
    
}

