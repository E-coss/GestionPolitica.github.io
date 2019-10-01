@extends('layouts.dashboard')
@section('content')

<div class="container">
 <div class="row"> 
    <div class="col-12"> 
    <!-- Area Chart -->
            
   <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Nuevo pago</h6>
    </div>
                <!-- Card Body -->
    <div class="card-body">
               <!--Form-->
               @if(session('mensaje'))
      <div class="alert alert-success">{{session('mensaje')}}</div>
    @endif
   <form method="POST" action="/financiera/pago">
    @csrf
     <!-- INICIO -->
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNombre">Nombre</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="nombre"><i class="fas fa-signature"></i></span>
      </div>
      <select class="form-control @error('nombre') is-invalid @enderror" id="selectstate" name="nombre" value="{{ old('nombre') }}" id="inputNombre">
     @foreach($usuarios as $usuario)
      <option id="state1" value="{{$usuario->id}}">{{$usuario->candidato}}</option>
     @endforeach
    </select>
        <div class="invalid-feedback">
        @if ($errors->has('nombre'))
        Seleccione un nombre valido
        @endif
        </div>
        </div>
   
       </div>
    <div class="form-group col-md-6">
      <label for="inputSueldo">Sueldo</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="sueldo"><i class="fas fa-dollar-sign"></i></span>
      </div>
      <input type="text" class="form-control @error('sueldo') is-invalid @enderror" id="inputSueldo" placeholder="Número de sueldo" name="sueldo" aria-describedby="sueldo" value="{{ old('sueldo') }}">
        <div class="invalid-feedback">
        @if ($errors->has('sueldo'))
        Digite un sueldo válido 
        @endif
        </div>
      </div>
       </div>
  </div>
  
   <div class="form-group">
   <label for="validationTextarea" class=" d-flex flex-row  justify-content-between">Observaciones</label>
    <textarea class="form-control @error('observaciones') is-invalid @enderror" id="validationTextarea" placeholder="Escribe un comentario" name="observaciones">{{ old('observaciones') }}</textarea>
    <div class="invalid-feedback">
     @foreach ($errors->all() as $error)
        <li>Ha ocurrido un error</li>
    @endforeach
      @if ($errors->has('observaciones'))
        {{ $errors->first('observaciones') }}
        @endif
    </div>
       </div>
       <button type="submit" class="btn btn-primary">Realizar pago</button>
    </form>
    </div>
              </div>
          </div>
             </div>
</div>

@endsection