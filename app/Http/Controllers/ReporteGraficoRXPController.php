<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteGraficoRXPController extends Controller
{
    public function inicio()
    {

        $reporteRiesgos = DB::select('SELECT COUNT(riesgos.id) as cantidad, proceso_afectas.nom_proceso_afecta from riesgos, proceso_afectas WHERE riesgos.id_proceso_afecta = proceso_afectas.id GROUP by proceso_afectas.nom_proceso_afecta ORDER by proceso_afectas.nom_proceso_afecta ASC;');
            return view ('vwreporteGraficoRiesgosxProcAfect', [
                'reporteRiesgos' => $reporteRiesgos
            ]);
    }
}
