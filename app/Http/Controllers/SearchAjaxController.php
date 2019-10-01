<?php

namespace App\Http\Controllers;

use App\Endvoters;
use App\Nomina;
use App\user;
use Illuminate\Http\Request;

class SearchAjaxController extends Controller
{
    public function searchEndvoters(Request $request)
    {
        $search_keyword=$request->word;
        $votantes=Endvoters::where([['nombre', 'like', '%' . $search_keyword . '%']])->orwhere([['cedula', 'like', '%' . $search_keyword . '%' ]])->paginate(10);
        $coincidencias=Endvoters::where([['nombre', 'like', '%' . $search_keyword . '%']])->orwhere([['cedula', 'like', '%' . $search_keyword . '%' ]])->count();
        return response()->json(['votantes' => $votantes,'coincidencias' => $coincidencias]);
    }
    
    public function searchNominas(Request $request)
    {
        $search_keyword=$request->word;
        //$nominas=User::where([['name', 'like', '%' . $search_keyword . '%']]);
        //$delegado=User::Where([['name', 'like', '%' . $search_keyword . '%' ]]);
        $nominas=Nomina::all()->datos->Where(['name', 'like', '%' . $search_keyword . '%' ]);
        //$nominas=Nomina::where([['user_id', 'like', '%' . $search_keyword . '%' ]])->paginate(10);
        $coincidencias=Nomina::findOrFail($search_keyword)->count();
        return response()->json(['nominas' => $nominas,'coincidencias' => $coincidencias]);
    }
}
