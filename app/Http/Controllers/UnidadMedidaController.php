<?php

namespace App\Http\Controllers;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    
    public function index()
    {
        $UnidadMedidas = UnidadMedida::all();
        
        return view('mantenimientos.vwMantUnidadMedida',
        [ 
            'UnidadMedidas'=> $UnidadMedidas,
        ]);
    }

    public function create()
    {
       // return view('mantenimientos.vwMantUnidadMedida');
    }

    public function store(Request $request)
    {
        $UnidadMedidas = new UnidadMedida();  
        $UnidadMedidas-> id = $request-> get('ID_UNIDAD_MEDIA');
        $UnidadMedidas-> nom_unidad_medida = $request-> get('NOM_UNIDAD_MEDIA');    			  
        $UnidadMedidas-> ind_estado = $request-> get('IND_ESTADO');
        $UnidadMedidas-> usr_creacion = $request-> get('USR_CREACION');
        $UnidadMedidas-> usr_modifica = $request-> get('USR_MODIFICA');
        $UnidadMedidas-> des_observacion = $request-> get('DES_OBSERVACION');
        $UnidadMedidas-> save();
        return redirect('/MantUnidadMedida');
    }

    
   
    public function show($id)
    {
        //return $id;
        $UnidadMedidas = UnidadMedida::all();
        $UnidadMedida= UnidadMedida::findOrFail($id);
        

       return view('mantenimientos.vwMantUnidadMedidaMod',[
        'UnidadMedidas'=> $UnidadMedidas,
        'UnidadMedida'=> $UnidadMedida,
       ]);

    }
    public function update(Request $request, $id)
    {
        $UnidadMedida = UnidadMedida::findOrFail($id);
      // $UnidadMedida-> id = $request-> get('id');
       $UnidadMedida-> nom_unidad_medida = $request-> get('NOM_UNIDAD_MEDIA');    			  
       $UnidadMedida-> ind_estado = $request-> get('IND_ESTADO');
       $UnidadMedida-> usr_modifica = $request-> get('USR_MODIFICA');
       $UnidadMedida-> des_observacion = $request-> get('DES_OBSERVACION');
       $UnidadMedida-> save();
        return REDIRECT ('/MantUnidadMedida');
    }


}
