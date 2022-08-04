<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    
    public function index()
    {
        $Eventos = Evento::all();
        
        return view('mantenimientos.vwMantEstadosEventos',
        [ 
            'Eventos'=> $Eventos,
        ]);
    }

    public function create()
    {
        return view('mantenimientos.vwMantEstadosEventos',
    }

    public function store(Request $request)
    {
        $Eventos= new Evento();        			  		   	   $Eventos-> NOM_EVENTO = $request-> get('NOM_EVENTO');
	   $Eventos-> NOM_RIESGO = $request-> get('NOM_RIESGO');
        $Eventos-> FEC_EVENTO = $request-> get('FEC_EVENTO');
	   $Eventos-> DESC_SITUACION_PRE = $request-> get('DESC_SITUACION_PRE');
        $Eventos-> DES_DETALLE_MEDIDAS = $request-> get('DES_DETALLE_MEDIDAS');
        $Eventos-> ID_ESTADO_RESOLUCION= $request-> get('ID_ESTADO_RESOLUCION');
	   $Eventos-> ID_ACCION = $request-> get('ID_ACCION');
        $Eventos-> JUS_EVENTO_NO_RESUELTO = $request-> get('JUS_EVENTO_NO_RESUELTO');
        $Eventos-> JUS_MEDIDA_APLICADA = $request-> get('JUS_MEDIDA_APLICADA');
        $Eventos-> NUM_PERDIDA_ESTIMADA= $request-> get('NUM_PERDIDA_ESTIMADA');
        $Eventos-> DES_LECCIONES_APREND= $request-> get('DES_LECCIONES_APREND');
	  $Eventos-> IND_ESTADO= $request-> get('IND_ESTADO');
	  $Eventos-> FEC_CREACION = $request-> get('FEC_CREACION ');	  $Eventos-> USR_CREACION = $request-> get('USR_CREACION ');
	  $Eventos-> FEC_MODIFICA = $request-> get('FEC_MODIFICA  ');
        $Eventos-> USR_MODIFICA = $request-> get('USR_MODIFICA ');


        $Eventos-> save();
        return redirect('/mantenimientos/vwMantEstadosEventos');
    }

}
