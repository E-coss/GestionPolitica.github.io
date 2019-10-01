<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Endvoters;

class EliminarVotantesController extends Controller
{
     public function update(Request $request, $id)
    {
            $votante = Endvoters::findOrFail($id);
            Validator::make($request->all(), [
            'endvoters_id' => 'required',
        ])->validate();
        
        $votante->estado=0;
        $votante->influencers_id=Auth::user()->id;
        
        if($votante->save()){
            return redirect('/votantes');
        }else{
            return view('endvoters.index');
        }
    }
}
