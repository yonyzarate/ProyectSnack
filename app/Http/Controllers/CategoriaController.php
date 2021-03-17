<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use istudy\Http\Requests;
use app\Models\Categoria;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class CategoriaController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $sql = trim($request->get('buscarTexto'));
            $categoria = DB::table('categoria')->where('Nombre','LIKE','%'.$sql.'%')->orderBy('IdCategoria','desc')->paginate(3);
            return view('categoria.listar',["categoria"=>$categoria,"buscarTexto"=>$sql]);
            // return $categoria;
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
        $categoria = new Categoria();
        $categoria->Nombre= $request->nombre;
        $categoria->Descripcion= $request->descripcion;
        $categoria->Condicion= '1';
        $categoria->save();
        
        return redirect::to('categoria');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $categoria = Categoria::findOrFail($request->id_categoria);
        $categoria->Nombre= $request->nombre;
        $categoria->Descripcion= $request->descripcion;
        $categoria->Condicion= '1';
        $categoria->save();
        return redirect::to('categoria');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $categoria = Categoria::findOrFail($request->id_categoria);

        if($categoria->Condicion=='1'){
            
            $categoria->Condicion='0';
            $categoria->save();
            return redirect::to('Categoria');
        }else{
            $categoria->Condicion='1';
            $categoria->save();
            return redirect::to('Categoria');
        }

    }
}
