<?php

namespace App\Http\Controllers;
use App\Models\Probabilidad;
use Illuminate\Http\Request;

class ProbabilidadController extends Controller
{
    
    public function index()
    {
        $probabilidads = Probabilidad::all();
        
        return view('mantenimientos.vwMantProbabilidad',
        [ 
            'probabilidads'=> $probabilidads,
        ]);
    }

    public function create()
    {
       // return view('mantenimientos.vwMantProbabilidad',
    }

    public function store(Request $request)
    {
        $Probabilidades= new Probabilidad();  
        $Probabilidades-> id = $request-> get('ID_PROBABILIDAD');
        $Probabilidades-> NOM_PROBABILIDAD = $request-> get('NOM_PROBABILIDAD');
        $Probabilidades-> IND_ESTADO = $request-> get('IND_ESTADO');
        $Probabilidades-> USR_CREACION = $request-> get('USR_CREACION');
        $Probabilidades-> USR_MODIFICA = $request-> get('USR_MODIFICA');
        $Probabilidades-> DES_OBSERVACION = $request-> get('DES_OBSERVACION');
        $Probabilidades-> save();
        return REDIRECT ('/MantProbabilidad');
    }
    public function show($id)
    {
        //return $id;
        $probabilidads = Probabilidad::all();
        $probabilidad= Probabilidad::findOrFail($id);
        

       return view('mantenimientos.vwMantProbabilidadmod',[
        'probabilidads'=> $probabilidads,
        'probabilidad'=> $probabilidad,
       ]);

    }
    public function update(Request $request, $id)
    {
        $probabilidad = Probabilidad::findOrFail($id);
       // $usuario-> ID_USUARIO = $request-> get;
        $probabilidad-> NOM_PROBABILIDAD = $request->NOM_PROBABILIDAD;
        $probabilidad-> IND_ESTADO = $request->IND_ESTADO ;
        $probabilidad-> DES_OBSERVACION= $request->DES_OBSERVACION;
        $probabilidad-> USR_MODIFICA= $request->USR_MODIFICA;
        $probabilidad-> updte_at;
        $probabilidad-> save();
        
        return REDIRECT ('/MantProbabilidad');
    }

}
