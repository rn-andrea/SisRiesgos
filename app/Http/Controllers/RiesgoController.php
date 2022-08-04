<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiesgoController extends Controller
{
    
    public function index()
    {
        $Riesgos = Riesgo::all();
        
        return view('procesos.vwIdentificar',
        [ 
            'Riesgos'=> $Riesgos,
        ]);
    }

    public function create()
    {
        return view('procesos.vwIdentificar');
    }

    public function store(Request $request)
    {
         $Riesgos = new Riesgo();        			  	    		    $Riesgos-> NOM_RIESGO = $request-> get('NOM_RIESGO ');
        $Riesgos-> ID_CATEGORIA = $request-> get('ID_CATEGORIA ');
        $Riesgos-> ID_PROCESO_AFECTA= $request-> get('ID_PROCESO_AFECTA');
        $Riesgos-> ID_PROBABILIDAD = $request-> get('ID_PROBABILIDAD');
	   $Riesgos-> ID_IMPACTO = $request-> get('ID_IMPACTO');
        $Riesgos-> TOT_CALIFICACION = $request-> get('TOT_CALIFICACION');
        $Riesgos-> NUM_POS_MATRIZ = $request-> get('NUM_POS_MATRIZ');
        $Riesgos-> ID_ACCION= $request-> get('ID_ACCION');
	  $Riesgos-> IND_AFECTA_SERVICIO= $request-> get('IND_AFECTA_SERVICIO');
	   $Riesgos-> NUM_RTO= $request-> get('NUM_RTO');
	   $Riesgos-> ID_UNIDAD_MEDIDA= $request-> get('ID_UNIDAD_MEDIDA');
	   $Riesgos-> TOT_TOLERANCIA = $request-> get('TOT_TOLERANCIA');
	   $Riesgos-> TOT_CAPACIDAD = $request-> get('TOT_CAPACIDAD');
	   $Riesgos-> IND_ESTADO = $request-> get('IND_ESTADO');
	   $Riesgos-> FEC_CREACION = $request-> get('FEC_CREACION ');
        $Riesgos-> USR_CREACION = $request-> get('USR_CREACION ');
	  $Riesgos-> FEC_MODIFICA = $request-> get('FEC_MODIFICA  ');
        $Riesgos-> USR_MODIFICA = $request-> get('USR_MODIFICA ');

        $Riesgos-> save();
        return redirect('/procesos/vwIdentificar');
    }

}
