@extends('layouts.dashboard')
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
          <span class="input-group-text" id="nombre"><i class="fas fa-signature"></i></span>
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
          <span class="input-group-text" id="tel"><i class="fas fa-phone-square"></i></span>
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
          <span class="input-group-text" id="estudia"><i class="fas fa-graduation-cap"></i></span>
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
          <span class="input-group-text" id="colegio"><i class="fas fa-university"></i></span>
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
    <div class="form-group col-md-12">
      <label for="descripcionColegio">Nombre del colegio</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="descripcion"><i class="fas fa-university"></i></span>
      </div>
      <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcionColegio" placeholder="Nombre del colegio electoral" aria-describedby="descripcion" name="descripcion" value="{{ old('descripcion') }}">
      <div class="invalid-feedback">
        @if ($errors->has('decripcion'))
        {{ $errors->first('decripcion') }}
        @endif
        </div>
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
          <span class="input-group-text" id="ciudad"><i class="fas fa-city"></i></span>
    </div>
        <select class="form-control" id="selectCiudad" aria-describedby="Ciudad" name="ciudad">
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
          <span class="input-group-text" id="municipio"><i class="fas fa-city"></i></span>
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
          <span class="input-group-text" id="Sector"><i class="fas fa-city"></i></span>
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
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="Sector"><i class="fas fa-road"></i></span>
    </div>
      <input type="text" class="form-control @error('calle') is-invalid @enderror" id="inputCalle" placeholder="Calle" name="calle" value="{{ old('calle') }}">
      <div class="invalid-feedback">
        @if ($errors->has('calle'))
        {{ $errors->first('calle') }}
        @endif
        </div>
    </div>
  </div>
       </div>
  <!-- INICIO -->
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail">Email</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="email"><i class="fas fa-at"></i></span>
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
      <input type="text" class="form-control" id="inputFacebook" placeholder="Facebook" aria-describedby="facebook" name="facebook" value="{{ old('facebook') }}">
        </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputInstagram">Instagram</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="instagram"><i class="fab fa-instagram"></i></span>
        </div>
      <input type="text" class="form-control" id="inputInstagram" placeholder="Instagram" aria-describedby="instagram" name="instagram" value="{{ old('instagram') }}">
    </div>
        </div>
  </div>
  
     <!--INICIO-->
      <div class="form-row">
    <div class="form-group col-md-6 ">
    <label for="inputLatitud">Latitud</label>
     <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="latitud"><i class="fas fa-map-marker-alt"></i></span>
          
        </div>
      <input type="text" class="form-control @error('latitud') is-invalid @enderror" id="inputLatitud" placeholder="Latitud" aria-describedby="latitud" name="latitud" value="{{ old('latitud') }}">
       <div class="invalid-feedback">
        @if ($errors->has('latitud'))
        {{ $errors->first('latitud') }}
        @endif
        </div>
        </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputLongitud">Longitud</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="longitud"><i class="fas fa-map-marker-alt"></i></span>
        </div>
      <input type="text" class="form-control @error('longitud') is-invalid @enderror" id="inputLongitud" placeholder="Longitud" aria-describedby="longitud" name="longitud" value="{{ old('longitud') }}">
      <div class="invalid-feedback">
        @if ($errors->has('longitud'))
        {{ $errors->first('longitud') }}
        @endif
        </div>
    </div>
        </div>
  </div>
  <p id="mensaje" class="alert alert-danger" hidden></p>
  
  <div class="form-group">
  <div class="form-group">
    <textarea class="form-control" id="validationTextarea" placeholder="Escribe un comentario" name="comentario" value="{{ old('longitud') }}" ></textarea>
       </div>
       </div>
  <button type="button" class="btn btn-success" onclick="getLocation()"><i class="fas fa-map-marker-alt text-danger"></i> Obtener Ubicación</button>
  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Registrar</button>
</form>
</div>

@endsection
@section('script')
<script>

var x = document.getElementById("mensaje");
        var latitud = document.getElementById("inputLatitud");
        var longitud = document.getElementById("inputLongitud");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
      x.innerHTML = "La geolocalizacion no es soportada en este dispositivo.";
      x.removeAttribute("hidden");
  }
}

function showPosition(position) {
    x.removeAttribute("hidden");
    x.setAttribute("class", "alert alert-success");
    x.innerHTML = " Ubicación obtenida éxitosamente";
    latitud.setAttribute("value", ""+position.coords.latitude+"");
    longitud.setAttribute("value", ""+position.coords.longitude+"");
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      x.innerHTML = "El usuario ha denegado la solicitud de ubicación"
          x.removeAttribute("hidden");
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML = "La información de localizacion es inválida."
          x.removeAttribute("hidden");
      break;
    case error.TIMEOUT:
      x.innerHTML = "Se agotó el tiempo de espera de la solicitud para obtener la ubicación del usuario."
          x.removeAttribute("hidden");
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML = "Ha ocurrido un error desconocido."
          x.removeAttribute("hidden");
      break;
  }
}
   
</script>
@endsection





