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
        $UnidadMedidas-> NOM_UNIDAD_MEDIA = $request-> get('NOM_UNIDAD_MEDIA');    			  
        $UnidadMedidas-> IND_ESTADO = $request-> get('IND_ESTADO');
        $UnidadMedidas-> USR_CREACION = $request-> get('USR_CREACION');
        $UnidadMedidas-> USR_MODIFICA = $request-> get('USR_MODIFICA');
        $UnidadMedidas-> DES_OBSERVACION = $request-> get('DES_OBSERVACION');
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
       $UnidadMedida-> NOM_UNIDAD_MEDIA = $request-> get('NOM_UNIDAD_MEDIA');    			  
       $UnidadMedida-> IND_ESTADO = $request-> get('IND_ESTADO');
       $UnidadMedida-> USR_MODIFICA = $request-> get('USR_MODIFICA');
       $UnidadMedida-> DES_OBSERVACION = $request-> get('DES_OBSERVACION');
       $UnidadMedida-> save();
        return REDIRECT ('/MantUnidadMedida');
    }


}
