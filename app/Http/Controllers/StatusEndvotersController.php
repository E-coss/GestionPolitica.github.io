<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Endvoters;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
class StatusEndvotersController extends Controller
{
        public function index(){
        
            
        $votantes=Endvoters::paginate(5);
        
        return view("endvoters.state",["votantes"=>$votantes]);
    }
    
    public function edit($id)
    {
        $stateandcomment = Endvoters::findOrFail($id);
        return response()->json($stateandcomment->toArray());
    }
    
    public function update(Request $request, $id)
    {   
        $stateandcomment = Endvoters::findOrFail($id);
        $stateandcomment->estado=$request->state;
        $stateandcomment->observaciones=$request->comment;
        $stateandcomment->influencers_id=Auth::user()->id;
        
        $stateandcomment->save();
       // if($votantes->save()){
           return response()->json($stateandcomment->toArray());
       // }else{
           // return response()->json('mensaje'=>'Ha ocurrido un error');
       // }
    }
    
}
