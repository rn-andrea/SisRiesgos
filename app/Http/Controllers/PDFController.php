<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
        public function cargarBD(Request $request)
        {
            $orden = $request->get('orden');

            if($orden=='generarpdf1')
            {
                $reporteusuarios = Usuario::all();
                return view ('vwReportePDF', [
                    'reporteusuarios' => $reporteusuarios
                ]);
            }else if($orden=='generarpdf2')
            {
                $reporteusuarios = DB::select('select * from usuarios where ind_estado = ?', [1]);
                return view ('vwReportePDF', [
                    'reporteusuarios' => $reporteusuarios
                ]);
            }
            else if($orden=='generarpdf3')
            {
                $reporteusuarios = DB::select('select * from usuarios where ind_estado = 2');
                return view ('vwReportePDF', [
                    'reporteusuarios' => $reporteusuarios
                ]);
            }

        }

}
