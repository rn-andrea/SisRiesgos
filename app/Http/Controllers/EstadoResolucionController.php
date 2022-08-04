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
        $EstadoResolcions-> NOM_ESTADO_RESOLUCIOND= $request-> get('NOM_ESTADO_RESOLUCIOND');
        $EstadoResolcions-> IND_ESTADO = $request-> get('IND_ESTADO');
        $EstadoResolcions-> USR_CREACION = $request-> get('USR_CREACION');
        $EstadoResolcions-> USR_MODIFICA = $request-> get('USR_MODIFICA');
        $EstadoResolcions-> DES_OBSERVACION = $request-> get('DES_OBSERVACION');
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
        $estadoresolucion-> NOM_ESTADO_RESOLUCIOND = $request->NOM_ESTADO_RESOLUCIOND;
        $estadoresolucion-> IND_ESTADO = $request->IND_ESTADO ;
        $estadoresolucion-> DES_OBSERVACION= $request->DES_OBSERVACION;
        $estadoresolucion-> USR_MODIFICA= $request->USR_MODIFICA;
        $estadoresolucion-> updte_at;
        $estadoresolucion-> save();
        
        return REDIRECT ('MantEstadosEvento/');
    }

}
