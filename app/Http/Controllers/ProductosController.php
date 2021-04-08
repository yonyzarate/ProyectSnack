<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            // buscador de texto nombre de producto o codigo
            $tcsql = trim($request->get('buscarTexto'));
            //listar la lista de productos 
            $oproducto = DB::table('productos as pro')
            ->join('categoria as cat','pro.IdCategoria','=','cat.IdCategoria')
            ->select('pro.Producto_Id','pro.Pro_Codigo','pro.IdCategoria','pro.Pro_Nombre','pro.Pro_PrecioVenta','pro.Pro_Stock','pro.Pro_Condicion','cat.Nombre as Categoria')
            ->where('pro.Pro_Nombre','LIKE','%'.$tcsql.'%')
            ->orwhere('pro.Pro_Codigo','LIKE','%'.$tcsql.'%')
            ->orderBy('pro.Producto_Id','desc')
            ->paginate(3);

            // listar las categorias en una ventana model 
            $ocategoria = DB::table('categoria')
            ->select('IdCategoria','Nombre','Descripcion')
            ->where('Condicion','=','1')->get();

            return view('Producto.listarproducto',["categorias"=>$ocategoria,"productos"=>$oproducto,"buscarTexto"=>$tcsql]);
            // return $oproducto;
            throw new exception("error",1);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oproducto = new Productos;
        $oproducto->Pro_Codigo= $request->codigo;
        $oproducto->Pro_Nombre= $request->nombre;
        $oproducto->Pro_PrecioVenta= $request->precioventa;
        $oproducto->Pro_Stock= $request->stock;
        $oproducto->Pro_Condicion= '1';
        $oproducto->IdCategoria= $request->categoria;
        $oproducto->save();
        
        return redirect::to('producto');
    }

    
    /**
     * Actualizar producto .
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // echo ("hola mundo");
         $oproducto = Productos::findOrFail($request->id_producto);
         $oproducto->Pro_Codigo= $request->codigo;
         $oproducto->Pro_Nombre= $request->nombre;
         $oproducto->Pro_PrecioVenta= $request->precioventa;
         $oproducto->Pro_Stock= $request->stock;
         $oproducto->Pro_Condicion= '1';
         $oproducto->IdCategoria= $request->categoria;
        $oproducto->save();
        return redirect::to('producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        //
    }
}
