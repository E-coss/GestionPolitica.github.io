<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchAjaxNominaController extends Controller
{
        public function searchNominas(Request $request)
    {
        $search_keyword=$request->word;
        //$nomina=Nomina::all()->datos->where([['name', 'like', '%' . $search_keyword . '%']]);
        $nominas=Nomina::where([['sueldo', 'like', '%' . $search_keyword . '%' ]])->paginate(10);
        $coincidencias=Nomina::where([['sueldo', 'like', '%' . $search_keyword . '%' ]])->count();
        return response()->json(['nominas' => $nominas,'coincidencias' => $coincidencias]);
    }
}
