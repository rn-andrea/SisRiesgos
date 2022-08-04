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
	    $Impacto-> NOM_IMPACTO = $request-> get('NOM_IMPACTO');
        $Impacto-> IND_ESTADO = $request-> get('IND_ESTADO');
        $Impacto-> USR_CREACION = $request-> get('USR_CREACION');
        $Impacto->USR_MODIFICA = $request-> get('USR_MODIFICA');
        $Impacto-> DES_OBSERVACION = $request-> get('DES_OBSERVACION');
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
        $impacto-> NOM_IMPACTO = $request->NOM_IMPACTO;
        $impacto-> IND_ESTADO = $request->IND_ESTADO ;
        $impacto-> DES_OBSERVACION= $request->DES_OBSERVACION;
        $impacto-> USR_MODIFICA= $request->USR_MODIFICA;
        $impacto-> updte_at;
        $impacto-> save();
        
        return REDIRECT ('/MantImpacto');
    
    }

}
