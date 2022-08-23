<?php

namespace App\Http\Controllers;
use App\Models\Revision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RevisionesController extends Controller
{
    public function inicio(Request $request)
    {
        if($request->get('orden')=='1')
        //tomar en cuenta que cuando se levanta la página, la orden va ser 1 ---------------------------

        {
        $revisiones = DB::select('select * from revisions');
        return view ('vwRevisiones', [
            'revisiones' => $revisiones
        ]);
    }
    }
}