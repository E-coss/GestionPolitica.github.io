@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">       
<div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<form method="POST" action="">
@csrf
<div class="box">
  <div class="container-1">
      <span class="icon"><i class="fa fa-search"></i></span>
      <input type="search" id="search" placeholder="Buscar..." name="buscar" direccionamiento="{{ url('/filajax/votantes')}}">
  </div>
</div>
</form>
<div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Acciones:</div>
                      <a class="dropdown-item" href="#"><i class="fas fa-print"></i> Imprimir</a>
                      <a class="dropdown-item" href="#"><i class="far fa-save"></i> Guardar</a>
                    </div>
                  </div>
</div>
@if(session('mensaje'))
      <div class="alert alert-success my-2">{{session('mensaje')}}</div>
    @endif
<!-- Card Body -->
  <div class="card-body">
<div class="table-responsive-lg">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Cédula</th>
      <th scope="col">Sexo</th>
      <th scope="col">Colegio</th>
      <th scope="col">Trabajo</th>
      <th scope="col">Estudia</th>
      <th scope="col">Ciudad</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="row">
    @foreach($votantes as $votante)
    <tr id="row{{$votante->id}}">
      <td id="nombre {{ $votante->id }}">{{ $votante->nombre }}</td>
      <td id="cedula {{ $votante->id }}">{{ $votante->cedula }}</td>
      <th id="sexo {{ $votante->id }}">{{ $votante->sexo }}</th>
      <td id="colegio_id {{ $votante->id }}">{{ $votante->colegio_id }}</td>
      <td id="trabajo {{ $votante->id }}">{{ $votante->trabajo }}</td>
      <td id="estudia {{ $votante->id }}">{{ $votante->estudia }}</td>
      <td id="ciudad {{ $votante->id }}">{{ $votante->ciudad }}</td>
      <td id="{{$votante->id}}"><a href="/votantes/{{ $votante->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
      <a href="/votantes/{{ $votante->id }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
        <button type="button" class="btn btn-danger btn-sm text-right" data-toggle="modal" data-target=".estado" id="route{{$votante->id}}" onclick="eliminar({{$votante->id}})"  direccionamiento="{{ url('/estados')}}/{{$votante->id}}"><i class="fas fa-trash-alt"></i></button>
      </td>
    </tr >
    @endforeach
    
  </tbody>
  
</table>

 <div id="coincidencias" class="mx-auto text-dark font-weight-bold"></div>
  <div class="mx-auto" style="width: 200px;">
    {{$votantes->links()}}
  </div>
      </div>
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade estado" id="" tabindex="-1" role="dialog" aria-labelledby="modalComentario" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="modalComentario">Eliminar votante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
      <div class="text-center text-danger mb-3"><i class="fas fa-user-times fa-5x"></i></div>
       <h4 class="text-center text-danger">Estas seguro de eliminar al siguiente votante?</h4>
        <h5 class="text-center mt-3 font-weight-bold" id="name"></h5>
        <div class="form-group">

         <input type="hidden" id="endvoters_id" value="" name="endvoters_id" >
          </div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-times"></i></button>
        <form action="/votantes/" id="id_vote" class="d-inline" method="POST" ruta="{{ url('/votantes')}}/">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
        </form> 
      </div>
    </div>
  </div>
</div>
</div>
@endsection