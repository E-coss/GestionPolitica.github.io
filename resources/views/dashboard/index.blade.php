@extends('layouts.dashboard')
@section('title','Dashboard')
@section('content')

       
        <!-- Begin Page Content -->
        
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="/votantes/create" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm "><i class="fas fa-plus"></i> Agregar votante</a>
          </div>

            
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nuevos votantes (Hoy)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$hoy}}</div>
                    </div>
                    <div class="col-auto">
                     <a href="{{url('filtro/votantes/hoy')}}"><i class="fas fa-person-booth fa-2x text-primary"></i></a>
                 
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nuevos votantes (Mes)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$month}}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{url('filtro/votantes/mes')}}"><i class="fas fa-user-friends fa-2x text-success"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Votantes (Todos)</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$all}}</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                        <a href="{{url('/votantes')}}"><i class="fas fa-users fa-2x text-info"></i> </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Votos nulos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$deleted}}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{url('/filtro/votantes/nulos')}}"> <i class="fas fa-ban fa-2x text-danger"></i> </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">
            <div class="col-12">
            <!-- Area Chart -->
            
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ultimos votantes registrados</h6>
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
                <!-- Card Body -->
                <div class="card-body">
                 @if(session('mensaje'))
      <div class="alert alert-success my-2">{{session('mensaje')}}</div>
    @endif
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
    <tr>
      <td>{{ $votante->nombre }}</td>
      <td>{{ $votante->cedula }}</td>
      <th>{{ $votante->sexo }}</th>
      <td>{{ $votante->colegio_id }}</td>
      <td>{{ $votante->trabajo }}</td>
      <td>{{ $votante->estudia }}</td>
      <td>{{ $votante->ciudad }}</td>
      <td><a href="/votantes/{{ $votante->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
      <a href="/votantes/{{ $votante->id }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
      <button type="button" class="btn btn-danger btn-sm text-right" data-toggle="modal" data-target=".estado" id="route{{$votante->id}}" onclick="eliminar({{$votante->id}})"  direccionamiento="{{ url('/estados')}}/{{$votante->id}}"><i class="fas fa-trash-alt"></i></button>
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
            
<!--           Content Row
          <div class="row">
          
            Content Column
            <div class="col-lg-6 mb-4">
          
              Project Card Example
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Votos registrados</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">La Vega <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Santiago <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Puerto plata <span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Santo Domingo <span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">San juan <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
          
            </div>
          
            <div class="col-lg-6 mb-4">
          
            </div>
          </div> -->
          <!-- Modal -->
<div class="modal fade estado" id="" tabindex="-1" role="dialog" aria-labelledby="modalComentario" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalComentario">Eliminar votante</h5>
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
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        <form action="/votantes/" id="id_vote" class="d-inline" method="POST" ruta="{{ url('/votantes')}}/">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Eliminar</button>
        </form> 
      </div>
    </div>
  </div>
</div>
        </div>
        <!--conntainer fluid-->
        
@endsection
