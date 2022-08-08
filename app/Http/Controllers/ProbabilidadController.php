<?php

namespace App\Http\Controllers;
use App\Models\Probabilidad;
use Illuminate\Http\Request;

class ProbabilidadController extends Controller
{
    
    public function index()
    {
        $probabilidads = Probabilidad::all();
        
        return view('mantenimientos.vwMantProbabilidad',
        [ 
            'probabilidads'=> $probabilidads,
        ]);
    }

    public function create()
    {
       // return view('mantenimientos.vwMantProbabilidad',
    }

    public function store(Request $request)
    {
        $Probabilidades= new Probabilidad();  
        $Probabilidades-> id = $request-> get('ID_PROBABILIDAD');
        $Probabilidades-> nom_probabilidad = $request-> get('NOM_PROBABILIDAD');
        $Probabilidades-> ind_estado = $request-> get('IND_ESTADO');
        $Probabilidades-> usr_creacion = $request-> get('USR_CREACION');
        $Probabilidades-> usr_modifica = $request-> get('USR_MODIFICA');
        $Probabilidades-> des_observacion = $request-> get('DES_OBSERVACION');
        $Probabilidades-> save();
        return REDIRECT ('/MantProbabilidad');
    }
    public function show($id)
    {
        //return $id;
        $probabilidads = Probabilidad::all();
        $probabilidad= Probabilidad::findOrFail($id);
        

       return view('mantenimientos.vwMantProbabilidadmod',[
        'probabilidads'=> $probabilidads,
        'probabilidad'=> $probabilidad,
       ]);

    }
    public function update(Request $request, $id)
    {
        $probabilidad = Probabilidad::findOrFail($id);
       // $usuario-> ID_USUARIO = $request-> get;
        $probabilidad-> nom_probabilidad = $request->NOM_PROBABILIDAD;
        $probabilidad-> ind_estado = $request->IND_ESTADO ;
        $probabilidad-> des_observacion= $request->DES_OBSERVACION;
        $probabilidad-> usr_modifica= $request->USR_MODIFICA;
        $probabilidad-> updte_at;
        $probabilidad-> save();
        
        return REDIRECT ('/MantProbabilidad');
    }

}
