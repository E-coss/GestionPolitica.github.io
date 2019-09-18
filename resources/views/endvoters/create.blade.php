@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('mensaje'))
      <div class="alert alert-success">{{session('mensaje')}}</div>
    @endif
   <form method="POST" action="/votantes">
    @csrf
     <!-- INICIO -->
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNombre">Nombre</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="nombre"><i class="fab fa-facebook-square"></i></span>
      </div>
      <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="inputNombre" placeholder="Nombre completo" name="nombre" aria-describedby="nombre" value="{{ old('nombre') }}">
        <div class="invalid-feedback">
        @if ($errors->has('nombre'))
        {{ $errors->first('nombre') }}
        @endif
        </div>
        </div>
   
       </div>
    <div class="form-group col-md-6">
      <label for="inputCedula">Cédula</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="cedula"><i class="fas fa-id-card"></i></span>
      </div>
      <input type="text" class="form-control @error('cedula') is-invalid @enderror" id="inputCedula" placeholder="Número de cédula" name="cedula" aria-describedby="cedula" value="{{ old('cedula') }}">
        <div class="invalid-feedback">
        @if ($errors->has('cedula'))
        {{ $errors->first('cedula') }}
        @endif
        </div>
      </div>
       </div>
  </div>
    <!-- INICIO -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTelefono">Teléfono</label>
        <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="tel"><i class="fab fa-facebook-square"></i></span>
      </div>
      <input type="number" class="form-control @error('telefono') is-invalid @enderror" id="inputTelefono" placeholder="Número de Teléfono" name="telefono" aria-describedby="tel" value="{{ old('telefono') }}">
    <div class="invalid-feedback">
        @if ($errors->has('telefono'))
        {{ $errors->first('telefono') }}
        @endif
        </div>
        </div>
      </div>
    <!-- INICIO -->
    <div class="form-group col-md-6">
        <label class="form-label" for="selectEstudia">
        Estudia
        </label>
        <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="estudia"><i class="fas fa-id-card"></i></span>
      </div>
        <select class="form-control" id="selectEstudia" aria-describedby="estudia" name="estudia">
          <option  value="si">Si</option>
          <option value="no">No</option>
        </select>
        </div>
 </div>
  </div>
  <!-- INICIO -->
    <div class="form-row">
         <div class="form-group col-md-6">
      <label for="inputColegio">Colegio electoral</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="colegio"><i class="fas fa-id-card"></i></span>
      </div>
      <input type="text" class="form-control @error('colegio_id') is-invalid @enderror" id="inputColegio" placeholder="Codigo del colegio electoral" name="colegio_id" aria-describedby="colegio" value="{{ old('colegio_id') }}">
        <div class="invalid-feedback">
        @if ($errors->has('colegio_id'))
        {{ $errors->first('colegio_id') }}
        @endif
        </div>
    </div>
       </div>
       
      <div class="form-group col-md-3">
    <label class="form-check-label" for="">Sexo</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sexo" id="radioF" value="F" checked>
        <label class="form-check-label" for="radioF">
        Femenino
        </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="sexo" id="radioM" value="M">
      <label class="form-check-label" for="radioM">
        Masculino
      </label>
    </div>
    </div>
       <!-- INICIO -->
        <div class="form-group col-md-3">
    <label class="form-check-label" for="">Trabajo</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="trabajo" id="radioEmpleado" value="Empleado" checked>
        <label class="form-check-label" for="radioEmpleado">
        Empleado
        </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="trabajo" id="radioDesempleado" value="desempleado">
      <label class="form-check-label" for="radioDesempleado">
        Desempleado
      </label>
    </div>
    </div>
    </div>
    <!-- INICIO -->
   <div class="form-row">
      
    <div class="form-group col-md-6">
        <label class="form-label" for="selectCiudad">
            Ciudad
        </label>
        <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="ciudad"><i class="fas fa-id-card"></i></span>
    </div>
        <select class="form-control" id="selectCiudad" aria-describedby="Ciudad" name="ciudad" value="{{ old('ciudad') }}">
          <option value="La vega">La vega</option>
          <option value="Santiago">Santiago</option>
          <option value="Santo domingo">Santo domingo</option>
        </select>
        </div>
    </div>
    
        <div class="form-group col-md-6">
        <label class="form-label" for="selectMunicipio">
            Municipio
        </label>
        <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="municipio"><i class="fas fa-id-card"></i></span>
    </div>
        <select class="form-control" id="selectMunicipio" aria-describedby="municipio" name="municipio">
          <option value="Concepcion la vega">Concepcion la vega</option>
          <option value="Santiago">Santiago</option>
          <option value="Santo domingo">Santo domingo</option>
        </select>
        </div>
    </div>

  </div>
  <!-- INICIO -->
   <div class="form-row">
            <div class="form-group col-md-6">
        <label class="form-label" for="selectSector">
            Sector
        </label>
        <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="Sector"><i class="fas fa-id-card"></i></span>
    </div>
        <select class="form-control" id="selectSector" aria-describedby="Sector" name="sector">
          <option value="La Riviera">La Riviera</option>
          <option value="Villa rosa">Villa rosa</option>
          <option value="Palmarito">Palmarito</option>
        </select>
        </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputCalle">Calle</label>
      <input type="text" class="form-control @error('calle') is-invalid @enderror" id="inputCalle" placeholder="Calle" name="calle" value="{{ old('calle') }}">
      <div class="invalid-feedback">
        @if ($errors->has('calle'))
        {{ $errors->first('calle') }}
        @endif
        </div>
    </div>
  </div>
  <!-- INICIO -->
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail">Email</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="email"><i class="fab fa-facebook-square"></i></span>
      </div>
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Correo electrónico" aria-describedby="email" name="email" value="{{ old('email') }}">
      <div class="invalid-feedback">
        @if ($errors->has('email'))
        {{ $errors->first('email') }}
        @endif
        </div>
    </div>
      </div>
  </div>
  <!-- INICIO -->
    <div class="form-row">
    <div class="form-group col-md-6 ">
    <label for="inputFacebook">Facebook</label>
     <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="facebook"><i class="fab fa-facebook-square"></i></span>
          
        </div>
      <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="inputFacebook" placeholder="Facebook" aria-describedby="facebook" name="facebook" value="{{ old('facebook') }}">
       <div class="invalid-feedback">
        @if ($errors->has('facebook'))
        {{ $errors->first('facebook') }}
        @endif
        </div>
        </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputInstagram">Instagram</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="instagram"><i class="fab fa-instagram"></i></span>
        </div>
      <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="inputInstagram" placeholder="Instagram" aria-describedby="instagram" name="instagram" value="{{ old('instagram') }}">
      <div class="invalid-feedback">
        @if ($errors->has('instagram'))
        {{ $errors->first('instagram') }}
        @endif
        </div>
    </div>
        </div>
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>
</div>
@endsection