<?php

namespace App\Http\Controllers;
use App\Models\ProcesoAfecta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcesoAfectaController extends Controller
{
    
    public function index()
    {
        $ProcesoAfectas = ProcesoAfecta::all();
        
        return view('mantenimientos.vwMantProcesoAfecta',
        [ 
            'ProcesoAfectas'=> $ProcesoAfectas,
        ]);
    }

    public function create()
    {
        return view('mantenimientos.vwMantProcesoAfecta');
    }

    public function store(Request $request)
    {
        $correo = auth()->user()->email;
        $consulta = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
       
        $ProcesoAfectas= new ProcesoAfecta();        	
        $ProcesoAfectas-> id = $request-> get('ID_PROCESO');		
        $ProcesoAfectas-> id_nomenclatura= $request-> get('ID_NOMENCLATURA');
	    $ProcesoAfectas-> nom_proceso_afecta = $request-> get('NOM_PROCESO_AFECTA');
        $ProcesoAfectas-> ind_estado = $request-> get('IND_ESTADO');
        $ProcesoAfectas-> usr_creacion= $consulta;
        $ProcesoAfectas-> usr_modifica= $consulta;
        $ProcesoAfectas-> des_observacion = $request-> get('DES_OBSERVACION');
        $ProcesoAfectas-> save();
        return redirect('/MantProcesoAfecta');
        
    }

    public function show($id)
    {
        //return $id;
        $ProcesoAfectas = ProcesoAfecta::all();
        $ProcesoAfecta = ProcesoAfecta::findOrFail($id);
        

       return view('mantenimientos.vwMantProcesoAfectaMod',[
        'ProcesoAfectas'=> $ProcesoAfectas,
        'ProcesoAfecta'=> $ProcesoAfecta,
       ]);

    }
    public function update(Request $request, $id)
    {
        $correo = auth()->user()->email;
        $consulta = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
       

        $ProcesoAfecta= ProcesoAfecta::findOrFail($id);
        $ProcesoAfecta-> id_nomenclatura = $request->ID_NOMENCLATURA ;
        $ProcesoAfecta-> nom_proceso_afecta = $request->NOM_PROCESO_AFECTA ;
        $ProcesoAfecta-> ind_estado = $request->IND_ESTADO ;
        $ProcesoAfecta-> des_observacion= $request->DES_OBSERVACION;
        $ProcesoAfectas-> usr_modifica= $consulta;
        $ProcesoAfecta-> updte_at;
        $ProcesoAfecta-> save();
        
        return REDIRECT ('/MantProcesoAfecta');
    }
}
