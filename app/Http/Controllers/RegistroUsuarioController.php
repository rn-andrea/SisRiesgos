<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class RegistroUsuarioController extends Controller
{
    public function inicio(Request $request)
    {
        if($request->get('orden')=='1')
        //tomar en cuenta que cuando se levanta la página, la orden va ser 1 ---------------------------
        {
            $reporteusuarios = Usuario::all();
        return view ('vwreporteusuarios', [
            'reporteusuarios' => $reporteusuarios
        ]);
        }else if($request->get('orden')=='2')
        {
            $reporteusuarios = DB::select('select * from usuarios where ind_estado = ?', [1]);
        return view ('vwreporteusuarios', [
            'reporteusuarios' => $reporteusuarios
        ]);
        }else if($request->get('orden')=='3')
        {
            $reporteusuarios = DB::select('select * from usuarios where ind_estado = 2');
            return view ('vwreporteusuarios', [
                'reporteusuarios' => $reporteusuarios
            ]);
        }


    }

}