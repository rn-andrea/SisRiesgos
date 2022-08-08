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
        $CategoriaRiesgo-> nom_categoria = $request-> get('NOM_CATEGORIA');
        $CategoriaRiesgo-> ind_estado = $request-> get('IND_ESTADO');
        $CategoriaRiesgo-> usr_creacion = $request-> get('USR_CREACION');
        $CategoriaRiesgo-> usr_modifica = $request-> get('USR_MODIFICA');
        $CategoriaRiesgo-> des_observacion = $request-> get('DES_OBSERVACION');
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
       $CategoriaRiesgo-> nom_categoria = $request->NOM_CATEGORIA;
       $CategoriaRiesgo-> ind_estado = $request->IND_ESTADO ;
       $CategoriaRiesgo-> des_observacion = $request->DES_OBSERVACION;
       $CategoriaRiesgo-> usr_modifica = $request->USR_MODIFICA;
       $CategoriaRiesgo-> updte_at;
       $CategoriaRiesgo-> save();
        
        return REDIRECT ('/MantCategoria');
    }

}
