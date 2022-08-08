<?php

namespace App\Http\Controllers;

use App\Models\Impacto;
use Illuminate\Http\Request;

class ImpactoController extends Controller
{
    
    public function index()
    {
        $impactos = Impacto::all();
        
        return view('mantenimientos.vwMantImpacto',
        [ 
            'impactos'=> $impactos,
        ]);
    }

    public function create()
    {
       // return view('mantenimientos.vwMantImpacto');
    }

    public function store(Request $request)
    {
        $Impacto= new Impacto();   
        $Impacto-> id = $request-> get('ID_IMPACTO');     			  
	    $Impacto-> nom_impacto = $request-> get('NOM_IMPACTO');
        $Impacto-> ind_estado = $request-> get('IND_ESTADO');
        $Impacto-> usr_creacion = $request-> get('USR_CREACION');
        $Impacto-> usr_modifica = $request-> get('USR_MODIFICA');
        $Impacto-> des_observacion = $request-> get('DES_OBSERVACION');
        $Impacto-> save();
        return REDIRECT ('/MantImpacto');
    }
    public function show($id)
    {
        //return $id;
        $impactos = Impacto::all();
        $impacto= Impacto::findOrFail($id);
        

       return view('mantenimientos.vwMantImpactoMod',[
        'impactos'=> $impactos,
        'impacto'=> $impacto,
       ]);

    }
    public function update(Request $request, $id)
    {
        $impacto = Impacto::findOrFail($id);
       // $usuario-> ID_USUARIO = $request-> get;
        $impacto-> nom_impacto = $request->NOM_IMPACTO;
        $impacto-> ind_estado = $request->IND_ESTADO ;
        $impacto-> des_observacion = $request->DES_OBSERVACION;
        $impacto-> usr_modifica = $request->USR_MODIFICA;
        $impacto-> updte_at;
        $impacto-> save();
        
        return REDIRECT ('/MantImpacto');
    
    }

}
