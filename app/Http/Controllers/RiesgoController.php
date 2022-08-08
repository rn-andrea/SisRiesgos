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
        $Riesgos = new Riesgo();        			  	    	
        $Riesgos-> nom_riesgo = $request-> get('NOM_RIESGO ');
        $Riesgos-> id_categoria = $request-> get('ID_CATEGORIA ');
        $Riesgos-> id_proceso_afecta= $request-> get('ID_PROCESO_AFECTA');
        $Riesgos-> id_probabilidad = $request-> get('ID_PROBABILIDAD');
	    $Riesgos-> id_impacto = $request-> get('ID_IMPACTO');
        $Riesgos-> tot_calificacion = $request-> get('TOT_CALIFICACION');
        $Riesgos-> num_pos_matriz = $request-> get('NUM_POS_MATRIZ');
        $Riesgos-> id_accion = $request-> get('ID_ACCION');
	    $Riesgos-> ind_afecta_servicio= $request-> get('IND_AFECTA_SERVICIO');
	    $Riesgos-> num_rto= $request-> get('NUM_RTO');
	    $Riesgos-> id_unidad_medida= $request-> get('ID_UNIDAD_MEDIDA');
	    $Riesgos-> tot_tolerancia = $request-> get('TOT_TOLERANCIA');
	    $Riesgos-> tot_capacidad= $request-> get('TOT_CAPACIDAD');
	    $Riesgos-> ind_estado= $request-> get('IND_ESTADO');
	    $Riesgos-> fec_creacion= $request-> get('FEC_CREACION ');
        $Riesgos-> usr_creacion= $request-> get('USR_CREACION ');
	    $Riesgos-> fec_modifica= $request-> get('FEC_MODIFICA  ');
        $Riesgos-> usr_modifica= $request-> get('USR_MODIFICA ');

        $Riesgos-> save();
        return redirect('/procesos/vwIdentificar');
    }

}
