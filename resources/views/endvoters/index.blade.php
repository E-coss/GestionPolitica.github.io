@extends('layouts.app');
@section('content')
<div class="container">
<h1 class="leader">Lista de votantes</h1>
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
  <tbody>
    @foreach($votantes as $votante)
    <tr>
      <td>{{ $votante->nombre }}</td>
      <td>{{ $votante->cedula }}</td>
      <th>{{ $votante->sexo }}</th>
      <td>{{ $votante->colegio_id }}</td>
      <td>{{ $votante->trabajo }}</td>
      <td>{{ $votante->estudia }}</td>
      <td>{{ $votante->ciudad }}</td>
      <td><a href="/votantes/{{ $votante->id }}/edit" class="btn btn-primary btn-sm">Editar</a>
      <a href="/votantes/{{ $votante->id }}" class="btn btn-success btn-sm">Ver</a>
      <form action="/votantes/" class="d-inline" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
        </form> 
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection