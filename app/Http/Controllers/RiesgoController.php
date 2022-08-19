<?php

namespace App\Http\Controllers;
use App\Models\Riesgo;
use App\Models\Usuario;
use App\Models\CategoriaRiesgo;
use App\Models\ProcesoAfecta;
use App\Models\Probabilidad;
use App\Models\Impacto;
use App\Models\Accion;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RiesgoController extends Controller
{

    public function index()
    {
        $riesgos = Riesgo::all();
        $categorias= CategoriaRiesgo::all();
        $categoriasel = CategoriaRiesgo::select('id','nom_categoria')->where('ind_estado','1')->get();
        $procesoafectasel = ProcesoAfecta::select('id','nom_proceso_afecta')->where('ind_estado','1')->get();
        $probabilidadsel = Probabilidad::select('id','nom_probabilidad')->where('ind_estado','1')->get();
        $impactosel = Impacto::select('id','nom_impacto')->where('ind_estado','1')->get();
        $accionsel = Accion::select('id','nom_accion')->where('ind_estado','1')->get();
        $unidadmedidasel = UnidadMedida::select('id','nom_unidad_medida')->where('ind_estado','1')->get();

        return view('procesos.vwIdentificar',
        [
            'riesgos'=> $riesgos,
            'categoriasel'=> $categoriasel,
            'categorias'=> $categorias,
            'probabilidadsel'=>   $probabilidadsel,
            'procesoafectasel'=>$procesoafectasel,
            'impactosel'=>$impactosel,
            'accionsel'=>$accionsel,
            'unidadmedidasel'=>$unidadmedidasel,

        ]);
    }

    public function create()
    {
        //return view('procesos.vwIdentificar');
    }

    public function store(Request $request)
    {

        $Riesgos = new Riesgo();
        $verificardato1= $request->ID_PROCESO_AFECTA;

        $val1= $request->ID_PROBABILIDAD;
        $val2= $request->ID_PROBABILIDAD;


        //$consulta = DB::table('proceso_afectas')->select('id_nomenclatura')->where('id',$verificardato1);

        $Riesgos-> id_riesgos = $request-> get('ID_RIESGO');
        $Riesgos-> nom_riesgos = $request-> get('NOM_RIESGO');
        $Riesgos-> id_categoria = $request-> get('ID_CATEGORIA');
        $Riesgos-> des_detalle = $request-> get('DES_DETALLE');
        $Riesgos-> id_proceso_afecta= "1";
        $Riesgos-> id_probabilidad = $request-> get('ID_PROBABILIDAD');
	    $Riesgos-> id_impacto = $request-> get('ID_IMPACTO');
        $Riesgos-> tot_calificacion =  $request-> get('ID_IMPACTO');
        $Riesgos-> num_pos_matriz == $request-> get('NUM_POS_MATRIZ');
        $Riesgos-> id_accion = $request-> get('ID_ACCION');
	    $Riesgos-> ind_afecta_servicio= $request-> get('IND_AFECTA_SERVICIO');
	    $Riesgos-> num_rto= $request-> get('NUM_RTO');
	    $Riesgos-> id_unidad_medida= "1";
	    $Riesgos-> tot_tolerancia = $request-> get('TOT_TOLERANCIA');
	    $Riesgos-> tot_capacidad= $request-> get('TOT_CAPACIDAD');
	    $Riesgos-> ind_estado= $request-> get('IND_ESTADO');
        $Riesgos-> usr_creacion= $request-> get('USR_CREACION ');
        $Riesgos-> usr_modifica= $request-> get('USR_MODIFICA ');
        $Riesgos ->nom_archivo = $request->file('inpArchivo')->store('public');

        $Riesgos-> save();
        return redirect('/procesos/vwIdentificar');
    }

    public function show($id)
    {
        //return $id;
        $riesgos = Riesgo::all();
        $riesg= Riesgo::findOrFail($id);
        $categorias= CategoriaRiesgo::all();
        $categoriasel = CategoriaRiesgo::select('id','nom_categoria')->where('ind_estado','1')->get();
        $procesoafectasel = ProcesoAfecta::select('id','nom_proceso_afecta')->where('ind_estado','1')->get();
        $probabilidadsel = Probabilidad::select('id','nom_probabilidad')->where('ind_estado','1')->get();
        $impactosel = Impacto::select('id','nom_impacto')->where('ind_estado','1')->get();
        $accionsel = Accion::select('id','nom_accion')->where('ind_estado','1')->get();
        $unidadmedidasel = UnidadMedida::select('id','nom_unidad_medida')->where('ind_estado','1')->get();

        return view('procesos.vwIdentificarMod',
        [
            'riesgos'=> $riesgos,
            'riesg'=>$riesg,
            'categoriasel'=> $categoriasel,
            'categorias'=> $categorias,
            'probabilidadsel'=>   $probabilidadsel,
            'procesoafectasel'=>$procesoafectasel,
            'impactosel'=>$impactosel,
            'accionsel'=>$accionsel,
            'unidadmedidasel'=>$unidadmedidasel,

        ]);

    }
}
