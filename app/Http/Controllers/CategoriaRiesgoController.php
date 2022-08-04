<?php

namespace App\Http\Controllers;
use App\Models\CategoriaRiesgo;
use Illuminate\Http\Request;

class CategoriaRiesgoController extends Controller
{
    
    public function index()
    {
        $categoriariesgos = CategoriaRiesgo::all();
        
        return view('mantenimientos.vwMantCategRiesgo',
        [ 
            'categoriariesgos'=> $categoriariesgos,
        ]);
    }

    public function create()
    {
        //return view('mantenimientos.vwMantCategRiesgo');
    }

    public function store(Request $request)
    {
        $CategoriaRiesgo = new CategoriaRiesgo();      
        $CategoriaRiesgo-> id = $request-> get('id');
        $CategoriaRiesgo-> NOM_CATEGORIA = $request-> get('NOM_CATEGORIA');
        $CategoriaRiesgo-> IND_ESTADO = $request-> get('IND_ESTADO');
        $CategoriaRiesgo-> USR_CREACION = $request-> get('USR_CREACION');
        $CategoriaRiesgo-> USR_MODIFICA = $request-> get('USR_MODIFICA');
        $CategoriaRiesgo-> DES_OBSERVACION = $request-> get('DES_OBSERVACION');
        $CategoriaRiesgo-> save();
        return redirect('/MantCategoria');
    }

    public function show($id)
    {
        //return $id;
        $categoriariesgos = CategoriaRiesgo::all();
        $CategoriaRiesgo= CategoriaRiesgo::findOrFail($id);
        

       return view('mantenimientos.vwMantCategRiesgoMod',[
        'categoriariesgos'=> $categoriariesgos,
        'CategoriaRiesgo'=> $CategoriaRiesgo,
       ]);

    }
    public function update(Request $request, $id)
    {
        $CategoriaRiesgo = CategoriaRiesgo::findOrFail($id);
       // $usuario-> ID_USUARIO = $request-> get;
       $CategoriaRiesgo-> NOM_CATEGORIA = $request->NOM_CATEGORIA;
       $CategoriaRiesgo-> IND_ESTADO = $request->IND_ESTADO ;
       $CategoriaRiesgo-> DES_OBSERVACION= $request->DES_OBSERVACION;
       $CategoriaRiesgo-> USR_MODIFICA= $request->USR_MODIFICA;
       $CategoriaRiesgo-> updte_at;
       $CategoriaRiesgo-> save();
        
        return REDIRECT ('/MantCategoria');
    }

}
