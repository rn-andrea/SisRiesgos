<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteGraficoRiesgosController extends Controller
{
    public function inicio()
    {

        return view('vwreporteGraficoRiesgos');
    }

    public function inicio2()
    {
        $reporteRiesgos = DB::select('SELECT id, nom_riesgos FROM `riesgos`');
            return view ('vwreporteGraficoEventosxRiesgo', [
                'reporteRiesgos' => $reporteRiesgos
            ]);

    }
}