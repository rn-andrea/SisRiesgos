<?php

namespace App\Http\Controllers;
use App\Models\EstadoResolucion;
use Illuminate\Http\Request;

class EstadoResolucionController extends Controller
{
    
    public function index()
    {
        $estadoresolucions= EstadoResolucion::all();
        
        return view('mantenimientos.vwMantEstadosEvento',
        [ 
            'estadoresolucions'=> $estadoresolucions,
        ]);
    }

    public function create()
    {
       
    }

    public function store(Request $request)
    {
        $EstadoResolcions= new EstadoResolucion ();        			  		 
        $EstadoResolcions-> nom_estado_resolucion= $request-> get('NOM_ESTADO_RESOLUCIOND');
        $EstadoResolcions-> ind_estado = $request-> get('IND_ESTADO');
        $EstadoResolcions-> usr_creacion = $request-> get('USR_CREACION');
        $EstadoResolcions-> usr_modifica = $request-> get('USR_MODIFICA');
        $EstadoResolcions-> des_observacion = $request-> get('DES_OBSERVACION');
        $EstadoResolcions-> save();
        return redirect('/MantEstadosEvento');
    }
    public function show($id)
    {
        //return $id;
        $estadoresolucions = EstadoResolucion::all();
        $estadoresolucion= EstadoResolucion::findOrFail($id);
        

       return view('mantenimientos.vwMantEstadosEventoMod',[
        'estadoresolucions'=>  $estadoresolucions,
        'estadoresolucion'=>  $estadoresolucion,
       ]);

    }
    public function update(Request $request, $id)
    {
        $estadoresolucion= EstadoResolucion::findOrFail($id);
        $estadoresolucion-> nom_estado_resolucion = $request->NOM_ESTADO_RESOLUCIOND;
        $estadoresolucion-> ind_estado = $request->IND_ESTADO ;
        $estadoresolucion-> des_observacion = $request->DES_OBSERVACION;
        $estadoresolucion-> usr_modifica= $request->USR_MODIFICA;
        $estadoresolucion-> updte_at;
        $estadoresolucion-> save();
        
        return REDIRECT ('MantEstadosEvento/');
    }

}
