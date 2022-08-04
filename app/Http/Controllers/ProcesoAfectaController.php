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
	    $ProcesoAfectas-> NOM_PROCESO_AFECTA = $request-> get('NOM_PROCESO_AFECTA');
        $ProcesoAfectas-> IND_ESTADO = $request-> get('IND_ESTADO');
        $ProcesoAfectas-> USR_CREACION = $request-> get('USR_CREACION');
        $ProcesoAfectas-> USR_MODIFICA = $request-> get('USR_MODIFICA');
        $ProcesoAfectas-> DES_OBSERVACION = $request-> get('DES_OBSERVACION');
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
        $ProcesoAfecta-> ID_PROCESO = $request->ID_PROCESO ;
        $ProcesoAfecta-> NOM_PROCESO_AFECTA = $request->NOM_PROCESO_AFECTA ;
        $ProcesoAfecta-> IND_ESTADO = $request->IND_ESTADO ;
        $ProcesoAfecta-> DES_OBSERVACION= $request->DES_OBSERVACION;
        $ProcesoAfecta-> USR_MODIFICA= $request->USR_MODIFICA;
        $ProcesoAfecta-> updte_at;
        $ProcesoAfecta-> save();
        
        return REDIRECT ('/MantProcesoAfecta');
    }
}
