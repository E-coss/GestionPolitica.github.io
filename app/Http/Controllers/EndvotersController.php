<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Endvoters;
use App\Http\Requests\StoreVotantesRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\RedSocial;
use App\Geolocalizacion;
class EndvotersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votantes=Endvoters::paginate(10);
        return view("endvoters.index",compact('votantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('endvoters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVotantesRequest $request)
    { 
        $redes = RedSocial::StoreRedes($request);
        $geolocalizacion=Geolocalizacion::StoreGeolocalizacion($request);
        
        $votantes= new Endvoters;
        
        $votantes->nombre=$request->nombre;
        $votantes->cedula=$request->cedula;
        $votantes->telefono=$request->telefono;
        $votantes->sexo=$request->sexo;
        $votantes->trabajo=$request->trabajo;
        $votantes->estudia=$request->estudia;
        $votantes->colegio_id=$request->colegio_id;
        $votantes->ciudad=$request->ciudad;
        $votantes->calle=$request->calle;
        $votantes->municipio=$request->municipio;
        $votantes->sector=$request->sector;
        $votantes->colegio=$request->descripcion;
        $votantes->redes_id=$redes->id;
        $votantes->geolocalizacion_id=$geolocalizacion->id;
        $votantes->observaciones=$request->comentario;
        $votantes->influencers_id=Auth::user()->id;
        $votantes->candidato=Auth::user()->candidato;
        

        if($votantes->save()){
            return back()->with('mensaje','El votante se ha registrado con éxito');
        }else{
            return view('endvoters.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $votantes = Endvoters::findOrFail($id);
        return view('endvoters.show', compact('votantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $votantes = Endvoters::findOrFail($id);
        return view('endvoters.edit', compact('votantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $votantes = Endvoters::findOrFail($id);
            
            Validator::make($request->all(), [
            'nombre' => 'required|max:50|min:4|string',
            'cedula' => ['required',Rule::unique('endvoters')->ignore($votantes->id),],
            'telefono' => 'required',
            'estudia' => 'required',
            'colegio_id' => 'required',
            'sexo' => 'required',
            'trabajo' => 'required',
            'ciudad' => 'required',
            'municipio' => 'required',
            'sector' => 'required',
            'calle' => 'required',
        
        ])->validate();
        $messages = [
        'cedula.unique' => 'La cedula ya existe!',
        ];
        $id_redes=$votantes->redes_id;
        $redes = RedSocial::UpdateRedes($request,$id_redes);
        
        $votantes->nombre=$request->nombre;
        $votantes->cedula=$request->cedula;
        $votantes->telefono=$request->telefono;
        $votantes->sexo=$request->sexo;
        $votantes->trabajo=$request->trabajo;
        $votantes->estudia=$request->estudia;
        $votantes->colegio_id=$request->colegio_id;
        $votantes->ciudad=$request->ciudad;
        $votantes->calle=$request->calle;
        $votantes->municipio=$request->municipio;
        $votantes->sector=$request->sector;
        $votantes->colegio=$request->descripcion;
        $votantes->observaciones=$request->comentario;
        $votantes->influencers_id=Auth::user()->id;
        $votantes->candidato=Auth::user()->candidato;
        

        if($votantes->save()){
            return redirect('/votantes');
        }else{
            return view('endvoters.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Endvoters::destroy($id);
        return back()->with('mensaje','El registro se ha eliminado exitosamente');
    }
    

}
