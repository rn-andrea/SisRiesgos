<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riesgo;

class SubirArchivoController extends Controller
{

    public function subir(Request $request)
    {

        $subirarchivo = new subirarchivo();
        $request->file('inpArchivo')->store('public');

        /*$subirarchivo ->NombreArchivo = $request->file('inpArchivo')->store('public');
        $subirarchivo ->save();*/

        $Archivo = subirarchivo::all();
        return view ('vwIdentificar', [
            'Archivo' => $Archivo
        ]);
    }

    public function index()
    {
        $Archivo = subirarchivo::all();
        return view ('vwIdentificar', [
            'Archivo' => $Archivo
        ]);
    }

}