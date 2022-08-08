<?php

namespace App\Http\Controllers;
use App\Models\ProcesoAfecta;
use Illuminate\Http\Request;

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
        $ProcesoAfectas= new ProcesoAfecta();        	
        $ProcesoAfectas-> id = $request-> get('ID_PROCESO');		
        $ProcesoAfectas-> id_nomenclatura= $request-> get('ID_NOMENCLATURA');
	    $ProcesoAfectas-> nom_proceso_afecta = $request-> get('NOM_PROCESO_AFECTA');
        $ProcesoAfectas-> ind_estado = $request-> get('IND_ESTADO');
        $ProcesoAfectas-> usr_creacion= $request-> get('USR_CREACION');
        $ProcesoAfectas-> usr_modifica= $request-> get('USR_MODIFICA');
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
        $ProcesoAfecta= ProcesoAfecta::findOrFail($id);
        $ProcesoAfecta-> id_nomenclatura = $request->ID_NOMENCLATURA ;
        $ProcesoAfecta-> nom_proceso_afecta = $request->NOM_PROCESO_AFECTA ;
        $ProcesoAfecta-> ind_estado = $request->IND_ESTADO ;
        $ProcesoAfecta-> des_observacion= $request->DES_OBSERVACION;
        $ProcesoAfecta-> usr_modifica= $request->USR_MODIFICA;
        $ProcesoAfecta-> updte_at;
        $ProcesoAfecta-> save();
        
        return REDIRECT ('/MantProcesoAfecta');
    }
}
