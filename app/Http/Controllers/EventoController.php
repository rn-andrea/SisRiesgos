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
        return view('mantenimientos.vwMantEstadosEventos'),
    }

    public function store(Request $request)
    {
        $Eventos= new Evento();        			  		   
        $Eventos-> nom_evento = $request-> get('NOM_EVENTO');
	    $Eventos-> nom_riesgo = $request-> get('NOM_RIESGO');
        $Eventos-> fec_evento = $request-> get('FEC_EVENTO');
	    $Eventos-> des_situacion_pre = $request-> get('DESC_SITUACION_PRE');
        $Eventos-> des_detalle_medidas = $request-> get('DES_DETALLE_MEDIDAS');
        $Eventos-> id_estado_resolucion= $request-> get('ID_ESTADO_RESOLUCION');
	    $Eventos-> id_accion = $request-> get('ID_ACCION');
        $Eventos-> jus_evento_no_resuelto = $request-> get('JUS_EVENTO_NO_RESUELTO');
        $Eventos-> jus_medida_aplicada = $request-> get('JUS_MEDIDA_APLICADA');
        $Eventos-> num_perdida_estimada= $request-> get('NUM_PERDIDA_ESTIMADA');
        $Eventos-> des_lecciones_aprend= $request-> get('DES_LECCIONES_APREND');
	    $Eventos-> ind_estado= $request-> get('IND_ESTADO');
	   	$Eventos-> usr_creacion = $request-> get('USR_CREACION ');
        $Eventos-> usr_modifica = $request-> get('USR_MODIFICA ');


        $Eventos-> save();
        return redirect('/mantenimientos/vwMantEstadosEventos');
    }

}
