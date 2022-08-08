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
        $Accions-> nom_accion = $request-> get('NOM_ACCION');
        $Accions-> ind_estado = $request-> get('IND_ESTADO');
        $Accions-> usr_creacion = $request-> get('USR_CREACION');
        $Accions-> usr_modifica = $request-> get('USR_MODIFICA');
        $Accions-> des_observacion = $request-> get('DES_OBSERVACION');
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
        $action-> nom_accion = $request->NOM_ACCION;
        $action-> ind_estado = $request->IND_ESTADO ;
        $action-> des_observacion = $request->DES_OBSERVACION;
        $action-> usr_modifica= $request->USR_MODIFICA;
        $action-> updte_at;
        $action-> save();
        
        return REDIRECT ('/MantAccion');
    }

}
