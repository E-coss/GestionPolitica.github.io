@extends('layouts.dashboard')
@section('content')
         <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            <!-- Area Chart -->
            
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Estado de los votantes </h6>
                
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <!-- bigint table-->
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
  <tbody>
    @foreach($votantes as $votante)
    @if($votante->estado==1)
    <tr class="table-success tr{{$votante->id}}">
    @elseif ($votante->estado==2)
    <tr class="table-warning tr{{$votante->id}}">
    @else
    <tr class="table-danger tr{{$votante->id}}">
    @endif
      <td>{{ $votante->nombre }}</td>
      <td>{{ $votante->cedula }}</td>
      <th>{{ $votante->sexo }}</th>
      <td>{{ $votante->colegio_id }}</td>
      <td>{{ $votante->trabajo }}</td>
      <td>{{ $votante->estudia }}</td>
      <td>{{ $votante->ciudad }}</td>
      <td>
        
        <button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target=".estado" id="route{{$votante->id}}" onclick="stateycomment({{$votante->id}})"  direccionamiento="{{ url('/estados')}}/{{$votante->id}}"><i class="fas fa-question"></i></button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
      <div class="mx-auto" style="width: 200px;">
    {{$votantes->links()}}
  </div>
    </div>
               <!--end table-->
                </div>
              </div>
          </div>
             </div>
<!-- Modal -->
<div class="modal fade estado" id="state" tabindex="-1" role="dialog" aria-labelledby="modalComentario" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <form action="/votos/estados/" method="post">
    @method('PUT')
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="modalComentario"><i class="far fa-comment "></i> Agregar comentarios y actualizar estado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
  <div class="form-group">
   <label for="validationTextarea" class=" d-flex flex-row  justify-content-between font-weight-bold">Estado del voto</label>
    <textarea class="form-control @error('comentario') is-invalid @enderror" id="textareacomment" placeholder="Escribe un comentario" name="comentario">{{$votante->observaciones}} {{ old('comentario') }}</textarea>
    <div class="invalid-feedback">
        <li id="mensajes"></li>
    </div>
       </div>
        <div class="form-group">
           <label for="exampleFormControlSelect1" class=" d-flex flex-row  justify-content-between font-weight-bold">Estado del voto</label>
    <select class="form-control" id="selectstate" name="state">
      <option id="state1" value="1">Valido</option>
      <option id="state2" value="2">Pendiente</option>
      <option id="state3" value="3">Nulo</option>
    </select>
<div class="alert alert-success exito pt-2" hidden> <p id="exito" class="text-center"></p></div>
       </div>
         <input type="hidden" id="endvoters_id" value="" name="endvoters_id" >
          </div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        <button type="button" class="btn btn-success" id="actualizar" ruta="{{ url('votos/estados')}}"><i class="far fa-save"></i> Guardar</button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>
@endsection