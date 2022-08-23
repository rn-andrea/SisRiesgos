<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteGraficoRXRController extends Controller
{
    public function inicio()
    {

        $reporteRiesgos = DB::select('SELECT COUNT(id) as cantidad, usr_creacion from riesgos GROUP by usr_creacion');
            return view ('vwReporteGraficoRiesgosxResp', [
                'reporteRiesgos' => $reporteRiesgos
            ]);
    }
}
