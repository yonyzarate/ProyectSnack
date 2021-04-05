<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route :: resource ('categoria','App\Http\Controllers\CategoriaController');
Route :: resource ('producto','App\Http\Controllers\ProductosController');
Route :: get('/pdf','App\Http\Controllers\PDF_Controller@PDF')->name('descargarPDF');
Route :: get('/pdfcategoria','App\Http\Controllers\PDF_Controller@pdfcategoria')->name('descargarPDFcategoria');
