@extends('layouts.app');
@section('content')
<div class="container">
 <div class="card text-center">
  <div class="card-header">
    Datos del votante
  </div>
  <div class="card-body">
  <div class="row">
    <div class="col-sm-6">
        <p class="card-text text-left"><b>Nombre:</b> {{ $votantes->nombre}}</p>
        <p class="card-text text-left"><b>Cédula:</b> {{ $votantes->cedula}}</p>
        <p class="card-text text-left"><b>Teléfono:</b> {{ $votantes->telefono}}</p>
        <p class="card-text text-left"><b>Sexo:</b> {{ $votantes->sexo}}</p>
        <p class="card-text text-left"><b>Trabajo:</b> {{ $votantes->trabajo}}</p>
        <p class="card-text text-left"><b>Estudia:</b> {{ $votantes->estudia}}</p>
        <p class="card-text text-left"><b>Colegio electoral:</b> {{ $votantes->colegio_id}}</p>
    </div>
    
    <div class="col-sm-6">
        <p class="card-text text-left"><b>Ciudad:</b> {{ $votantes->ciudad}}</p>
        <p class="card-text text-left"><b>Municipio:</b> {{ $votantes->municipio}}</p>
        <p class="card-text text-left"><b>Sector:</b> {{ $votantes->sector}}</p>
        <p class="card-text text-left"><b>Calle:</b> {{ $votantes->calle}}</p>
        <p class="card-text text-left"><b>Instagram:</b> {{ $votantes->instagram}}</p>
        <p class="card-text text-left"><b>Facebook:</b> {{ $votantes->facebook}}</p>
        <p class="card-text text-left"><b>email:</b> {{ $votantes->email}}</p>
    </div>
    
    </div>
  </div>
  <div class="card-footer text-muted">
    {{$votantes->created_at}}
  </div>
</div>
</div>
@endsection