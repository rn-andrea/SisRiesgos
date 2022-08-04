<?php

namespace App\Http\Controllers;
use App\Models\Accion;
use Illuminate\Http\Request;

class AccionController extends Controller
{
    
    public function index()
    {
        $Accions = Accion::all();
        
        return view('mantenimientos.vwMantAccionRiesgo',
        [ 
            'Accions'=> $Accions,
        ]);
    }

    public function create()
    {
        //return view('mantenimientos.vwMantAccionRiesgo'),
    }

    public function store(Request $request)
    {
        $Accions= new Accion(); 
        $Accions-> id = $request-> get('ID_ACCION'); 
        $Accions-> NOM_ACCION = $request-> get('NOM_ACCION');
        $Accions-> IND_ESTADO = $request-> get('IND_ESTADO');
        $Accions-> USR_CREACION = $request-> get('USR_CREACION');
        $Accions-> USR_MODIFICA = $request-> get('USR_MODIFICA');
        $Accions-> DES_OBSERVACION = $request-> get('DES_OBSERVACION');
        $Accions-> save();
        return redirect('/MantAccion');
    }
    public function show($id)
    {
        //return $id;
        $accions = Accion::all();
        $accion= Accion::findOrFail($id);
        

       return view('mantenimientos.vwMantAccionRiesgoMod',[
        'accions'=> $accions,
        'accion'=> $accion,
       ]);

    }
    public function update(Request $request, $id)
    {
        $action= Accion::findOrFail($id);
       // $usuario-> ID_USUARIO = $request-> get;
        $action-> NOM_ACCION = $request->NOM_ACCION;
        $action-> IND_ESTADO = $request->IND_ESTADO ;
        $action-> DES_OBSERVACION= $request->DES_OBSERVACION;
        $action-> USR_MODIFICA= $request->USR_MODIFICA;
        $action-> updte_at;
        $action-> save();
        
        return REDIRECT ('/MantAccion');
    }

}
