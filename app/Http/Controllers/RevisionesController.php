<?php

namespace App\Http\Controllers;
use App\Models\Revision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Riesgo;
use App\Models\Evento;

class RevisionesController extends Controller
{
    public function inicio(Request $request)
    {
      
      
        if($request->get('orden')=='1')
        //tomar en cuenta que cuando se levanta la página, la orden va ser 1 ---------------------------

        {
            $Eventos = Evento::all();
            $riesgos = Riesgo::all();
        $revisiones = DB::select('select * from revisions ORDER BY updated_at DESC');
        return view ('vwRevisiones', [
            'Eventos'=> $Eventos,
            'riesgos'=> $riesgos,
            'revisiones' => $revisiones
        ]);
        }else if($request->get('orden')=='2')
        {
            $Eventos = Evento::all();
            $riesgos = Riesgo::all();
            $revisiones  = DB::select('select * from revisions where descripcion = "Creación de riesgo" or  descripcion = "Modificación de riesgo" ORDER BY updated_at DESC ');
        return view ('vwRevisiones', [
            'Eventos'=> $Eventos,
            'riesgos'=> $riesgos,
            'revisiones' => $revisiones 
        ]);
        }else if($request->get('orden')=='3')
        {
            $Eventos = Evento::all();
            $riesgos = Riesgo::all();
            $revisiones  = DB::select('select * from revisions where descripcion = "Creación de evento" or  descripcion = "Modificación de evento" ORDER BY updated_at DESC');
            return view ('vwRevisiones', [
                'Eventos'=> $Eventos,
                'riesgos'=> $riesgos,
                'revisiones' =>  $revisiones
            ]);
        }else 
        {
            $Eventos = Evento::all();
            $riesgos = Riesgo::all();
             $revisiones  = DB::select('select * from revisions where nombre= ? ORDER BY updated_at DESC' , [$request->get('nombre')]);
            return view ('vwRevisiones', [
                'Eventos'=> $Eventos,
                'riesgos'=> $riesgos,
            'revisiones' =>  $revisiones
            ]);
       } 

    }
}