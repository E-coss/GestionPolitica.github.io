<?php

namespace App\Http\Controllers;

use App\Endvoters;
use App\Nomina;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchAjaxController extends Controller
{
    public function searchEndvoters(Request $request)
    {
        $search_keyword=$request->word;
        $votantes=Endvoters::where([['nombre', 'like', '%' . $search_keyword . '%']])->orwhere([['cedula', 'like', '%' . $search_keyword . '%' ]])->paginate(10);
        $coincidencias=Endvoters::where([['nombre', 'like', '%' . $search_keyword . '%']])->orwhere([['cedula', 'like', '%' . $search_keyword . '%' ]])->count();
        return response()->json(['votantes' => $votantes,'coincidencias' => $coincidencias]);
    }
    
//    public function searchNominas(Request $request)
//    {
//        $search_keyword=$request->word;
//        $nominas=DB::table('users')
//        ->join('nominas', function ($join) {
//            $join->on('users.id', '=', 'nominas.user_id')
//                 ->where('name', 'like', 'e%' );
//        })->get();
//        //$nominas=User::where([['name', 'like', '%' . $search_keyword . '%']]);
//        //$delegado=User::Where([['name', 'like', '%' . $search_keyword . '%' ]]);
//        //$nominas=Nomina::all()->datos()->Where('name', 'like', '%' . $search_keyword . '%' );
//        //$nominas=Nomina::where([['user_id', 'like', '%' . $search_keyword . '%' ]])->paginate(10);
//        $coincidencias=DB::table('users')->join('nominas', function ($join) {$join->on('users.id', '=', 'nominas.user_id')->where(['name', 'like', 'e%']);})->count();
//        return response()->json(['nominas' => $nominas,'coincidencias' => $coincidencias]);
//    }
}
