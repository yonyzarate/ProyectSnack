<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use exception;
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
            $tcsql = trim($request->get('buscarTexto'));
            $ocategoria = DB::table('categoria')->where('Nombre','LIKE','%'.$tcsql.'%')->orderBy('IdCategoria','desc')->paginate(3);
            return view('categoria.listar',["categoria"=>$ocategoria,"buscarTexto"=>$tcsql]);
            // return $categoria;
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
        $ocategoria = new Categoria;
        $ocategoria->Nombre= $request->nombre;
        $ocategoria->Descripcion= $request->descripcion;
        $ocategoria->Condicion= '1';
        $ocategoria->save();
        
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
        $ocategoria = Categoria::findOrFail($request->id_categoria);
        echo $ocategoria->Nombre= $request->nombre;
        echo $ocategoria->Descripcion= $request->descripcion;
        echo $ocategoria->Condicion= '1';
        $ocategoria->save();
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
        $ocategoria = Categoria::findOrFail($request->id_categoria);

        if($ocategoria->Condicion=='1'){
            
            $ocategoria->Condicion='0';
            $ocategoria->save();
            return redirect::to('categoria');
        }else{
            $ocategoria->Condicion='1';
            $ocategoria->save();
            return redirect::to('categoria');
        }

    }
}
