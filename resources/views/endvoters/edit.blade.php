@extends('layouts.dashboard')
@section('content')
<!--#cat option:first-child {
 display: none;
 }
 -->
<div class="container">
    @if(session('mensaje'))
      <div class="alert alert-success">{{session('mensaje')}}</div>
    @endif
   <form method="post" action="/votantes/{{$votantes->id}}">
    @method('PUT')
    @csrf
     <!-- INICIO -->
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNombre">Nombre</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="nombre"><i class="fas fa-signature"></i></span>
      </div>
      <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="inputNombre" placeholder="Nombre completo" name="nombre" aria-describedby="nombre" value="{{$votantes->nombre}}">
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
      <input type="text" class="form-control @error('cedula') is-invalid @enderror" id="inputCedula" placeholder="Número de cédula" name="cedula" aria-describedby="cedula" value="{{$votantes->cedula}}">
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
      <input type="number" class="form-control @error('telefono') is-invalid @enderror" id="inputTelefono" placeholder="Número de Teléfono" name="telefono" aria-describedby="tel" value="{{$votantes->telefono}}">
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
          <option value="{{$votantes->estudia}}" hidden>{{$votantes->estudia}}</option>
          <option value="si">Si</option>
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
      <input type="text" class="form-control @error('colegio_id') is-invalid @enderror" id="inputColegio" placeholder="Codigo del colegio electoral" name="colegio_id" aria-describedby="colegio" value="{{$votantes->colegio_id}}">
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
       <?php  
        if($votantes['sexo']=='F'){?>
        <input class="form-check-input" type="radio" name="sexo" id="radioF" value="F" checked>
        <label class="form-check-label" for="radioF">
        Femenino
        </label>
        <?php }else{?>
        <input class="form-check-input" type="radio" name="sexo" id="radioF" value="F">
        <label class="form-check-label" for="radioF">
        Femenino
        </label>
       <?php }
        ?>
        
    </div>
    <div class="form-check">
            <?php  
        if($votantes['sexo']=='M'){?>
        <input class="form-check-input" type="radio" name="sexo" id="radioM" value="M" checked>
        <label class="form-check-label" for="radioM">
        Masculino
        </label>
        <?php }else{?>
        <input class="form-check-input" type="radio" name="sexo" id="radioM" value="M">
        <label class="form-check-label" for="radioM">
        Masculino
        </label>
       <?php }
        ?>
    </div>
    </div>
       <!-- INICIO -->
        <div class="form-group col-md-3">
    <label class="form-check-label" for="">Trabajo</label>
    <div class="form-check">
       <?php  
        if($votantes['trabajo']=='Empleado'){?>
        <input class="form-check-input" type="radio" name="trabajo" id="radioEmpleado" value="Empleado" checked>
        <label class="form-check-label" for="radioEmpleado">
        Empleado
        </label>
        <?php }else{?>
        <input class="form-check-input" type="radio" name="trabajo" id="radioEmpleado" value="Empleado">
        <label class="form-check-label" for="radioEmpleado">
        Empleado
        </label>
       <?php }
        ?>
    </div>
    <div class="form-check">
     <?php  
        if($votantes['trabajo']=='Desempleado'){?>
      <input class="form-check-input" type="radio" name="trabajo" id="radioDesempleado" value="Desempleado" checked>
      <label class="form-check-label" for="radioDesempleado">
        Desempleado
      </label>
        <?php }else{?>
      <input class="form-check-input" type="radio" name="trabajo" id="radioDesempleado" value="Desempleado">
      <label class="form-check-label" for="radioDesempleado">
        Desempleado
      </label>
       <?php }
        ?>

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
      <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcionColegio" placeholder="Nombre del colegio electoral" aria-describedby="descripcion" name="descripcion" value="{{$votantes->colegio}} {{ old('descripcion') }}">
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
          <option value="{{$votantes->ciudad}}" hidden>{{$votantes->ciudad}}</option>
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
          <option value="{{$votantes->municipio}}" hidden>{{$votantes->municipio}}</option>
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
          <option value="{{$votantes->sector}}" hidden>{{$votantes->sector}}</option>
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
      <input type="text" class="form-control @error('calle') is-invalid @enderror" id="inputCalle" placeholder="Calle" name="calle" value="{{$votantes->calle}}">
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
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Correo electrónico" aria-describedby="email" name="email" value="{{$votantes->redes->email}}">
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
      <input type="text" class="form-control" id="inputFacebook" placeholder="Facebook" aria-describedby="facebook" name="facebook" value="{{$votantes->redes->facebook}}">
        </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputInstagram">Instagram</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="instagram"><i class="fab fa-instagram"></i></span>
        </div>
      <input type="text" class="form-control" id="inputInstagram" placeholder="Instagram" aria-describedby="instagram" name="instagram" value="{{$votantes->redes->instagram}}">
    </div>
        </div>
  </div>
    <div class="form-group">
  <div class="form-group">
    <textarea class="form-control" id="validationTextarea" placeholder="Escribe un comentario" name="comentario" value=" " >{{$votantes->observaciones}} {{ old('longitud') }}</textarea>
       </div>
       </div>
  <button type="submit" class="btn btn-primary float-right"><i class="fas fa-user-edit"></i> Editar</button>
   
</form>
</div>
@endsection