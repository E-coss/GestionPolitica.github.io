<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Nomina;
use App\User;
use Carbon\Carbon; 

class NominaController extends Controller
{
    public function index()
    {
        $hoy=Nomina::whereDate('created_at', '=', Carbon::today()->format('Y-m-d'))->Where('estado', '!=', 0)->count();
        $month=Nomina::whereMonth('created_at', '=', Carbon::today()->format('m'))->where('estado',1)->count();
        $fondos=Nomina::Where('estado', '!=', 0)->sum('sueldo');
        $fondo=number_format($fondos ,2 ,'.',',' );
        $all=Nomina::Where('estado', '!=', 0)->count();
        $nulos=Nomina::Where('estado', '=', 0)->count();
        //$gastos=Nomina::where();
        $nominas=Nomina::Where('estado', '!=', 0)->paginate(5);
        
        return view("financiera.index",compact('nominas','hoy','month','fondo','all','nulos'));
    }
     
    public function create(){
        $usuarios=User::all();
        return view("financiera.pago",compact('usuarios'));
    }
    
    public function store(Request $request){
            Validator::make($request->all(),[
            'nombre' => 'required|max:50|numeric',
            'sueldo' => 'required|numeric',
        
        ])->validate();
        $nominas= new Nomina;
        $nominas->sueldo=$request->sueldo;
        $nominas->delegado_id=$request->nombre;
        $nominas->user_id=Auth::user()->id;
        $nominas->observaciones=$request->observaciones;

        if($nominas->save()){
            return redirect('/financiera');
        }else{
            return view('financiera.pago');
        }
    }

    public function historial(){
        $nominas=Nomina::Where('estado', '!=', 0)->paginate(10);
        return view("financiera.historial",["nominas"=>$nominas]);
    }
    
   public function edit($id)
    {
        $nomina = Nomina::findOrFail($id);
        $delegado= Nomina::findOrFail($id)->datos;
        return response()->json(['nomina' => $nomina, 'delegado' => $delegado]);
    }
    
        public function update(Request $request, $id)
    {
        $nomina= Nomina::findOrFail($id);
        $nomina->estado=$request->eliminar;
        $nomina->sueldo=$request->sueldo;
        $nomina->save();
        return response()->json(['nomina' => $nomina]);
        
    }
}
