<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Endvoters;
use App\Http\Requests\StoreVotantesRequest;

class EndvotersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votantes=Endvoters::all();
        
        return view("endvoters.index",["votantes"=>$votantes]);
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
        $votantes->instagram=$request->instagram;
        $votantes->facebook=$request->facebook;
        $votantes->email=$request->email;
        $votantes->usuario_id=Auth::user()->id;
        

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
    public function update(StoreVotantesRequest $request, $id)
    {
        $votantes = Endvoters::findOrFail($id);
        
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
        $votantes->instagram=$request->instagram;
        $votantes->facebook=$request->facebook;
        $votantes->email=$request->email;
        $votantes->usuario_id=Auth::user()->id;
        
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
        return redirect('/votantes');
    }
}
