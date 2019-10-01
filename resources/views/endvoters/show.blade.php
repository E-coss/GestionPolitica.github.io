@extends('layouts.dashboard')
@section('content')
<div class="container">
 <div class="card text-center">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Datos del votante</h6>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target=".estado">
  <i class="fas fa-comment-dots fa-lg"></i>
</button>
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
        <p class="card-text text-left state"><b>Estado:</b> {{ $votantes->estado}}</p>
    </div>
    
    <div class="col-sm-6">
        <p class="card-text text-left"><b>Ciudad:</b> {{ $votantes->ciudad}}</p>
        <p class="card-text text-left"><b>Municipio:</b> {{ $votantes->municipio}}</p>
        <p class="card-text text-left"><b>Sector:</b> {{ $votantes->sector}}</p>
        <p class="card-text text-left"><b>Calle:</b> {{ $votantes->calle}}</p>
        <p class="card-text text-left"><b>Instagram:</b> {{ $votantes->redes->instagram}}</p>
        <p class="card-text text-left"><b>Facebook:</b> {{ $votantes->redes->facebook}}</p>
        <p class="card-text text-left"><b>email:</b> {{ $votantes->redes->email}}</p>
    </div>
    
    </div>
  </div>
  
  
  <div class="card-footer">
   <div class="row">
    <div class="col-sm-9 py-3 d-flex flex-row  justify-content-between text-muted">
    <h6 class="blockquote-footer m-0 font-weight-bold text-primary">{{ $votantes->nombre }}: <cite id="commen" title="Source Title">{{ $votantes->observaciones}}
  </cite></h6> 
    </div>
    <div class="col-sm-3 py-3 d-flex flex-row  justify-content-between text-muted">
        <h6 class="m-0 font-weight-bold text-primary">{{$votantes->created_at}}</h6>
    </div>
  </div>
</div>
 
<!-- Modal -->
<div class="modal fade estado" id="" tabindex="-1" role="dialog" aria-labelledby="modalComentario" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <form action="/votos/estados/" method="post">
    @method('PUT')
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="modalComentario">Agregar comentarios y actualizar estado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
  <div class="form-group">
   <label for="validationTextarea" class=" d-flex flex-row  justify-content-between font-weight-bold">Estado del voto</label>
    <textarea class="form-control" id="textareacomment" placeholder="Escribe un comentario" name="comentario" value="">{{$votantes->observaciones}} {{ old('comentario') }}</textarea>
       </div>
        <div class="form-group">
           <label for="exampleFormControlSelect1" class=" d-flex flex-row  justify-content-between font-weight-bold">Estado del voto</label>
    <select class="form-control" id="selectstate" name="state">
     @if($votantes->estado==1)
      <option id="state1" value="1" selected>Valido</option>
      @else
      <option id="state1" value="1">Valido</option>
      @endif
      
      @if($votantes->estado==2)
      <option id="state2" value="2" selected>Pendiente</option>
      @else
      <option id="state2" value="2">Pendiente</option>
      @endif
      
      @if($votantes->estado==3)
      <option id="state3" value="3" selected>Nulo</option>
      @else
      <option id="state3" value="3">Nulo</option>
      @endif
    </select>
       </div>

      <div class="alert alert-success exito" hidden> <p id="exito"></p></div>
         <input type="hidden" id="endvoters_id" value="{{$votantes->id}}" name="id" >
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        <button type="button" class="btn btn-success" id="comentar" ruta="{{ url('votos/estados')}}"><i class="far fa-save"></i> Guardar</button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>
@endsection