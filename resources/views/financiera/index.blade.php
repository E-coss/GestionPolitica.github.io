@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Financiera</h1>
            <a href="/financiera/pago" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-hand-holding-usd"></i> Nuevo pago</a>
          </div>

            
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nuevos pagos (Hoy)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$hoy}}</div>
                    </div>
                    <div class="col-auto">
                     <i class="fas fa-hand-holding-usd fa-2x text-primary"></i>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pagos del mes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$month}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-search-dollar fa-2x text-success"></i>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Fondos</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">19,000</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Gastos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">${{$fondo}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-money-bill-alt fa-2x text-warning"></i>
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
                  <h6 class="m-0 font-weight-bold text-primary">Ultimos pagos realizados</h6>
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
                  <!-- bigint table-->
    <div class="table-responsive-lg">
                  <table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Sueldo</th>
      <th scope="col">Fecha</th>
      <th scope="col">Observaciones</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($nominas as $nomina)
    <tr>
      <td>{{ $nomina->datos->name }}</td>
      <td id="sueldo{{$nomina->id}}">{{ '$'.number_format($nomina->sueldo ,2 ,'.',',' )  }}</td>
      <th>{{ $nomina->created_at }}</th>
      <td>{{ $nomina->observaciones  }}</td>
      <td>
      <button type="button" class="btn btn-primary btn-sm text-right" data-toggle="modal" data-target=".edit" id="edit{{$nomina->id}}" onclick="EditNomina({{$nomina->id}})"  direccionamiento="{{ url('/financiera/pago/')}}/{{$nomina->id}}"><i class="fas fa-edit"></i></button>
      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".ver" id="ver{{$nomina->id}}" onclick="verNomina({{$nomina->id}})"  direccionamiento="{{ url('/financiera/pago/')}}/{{$nomina->id}}"><i class="fas fa-eye"></i></button>
        <button type="button" class="btn btn-danger btn-sm text-right" data-toggle="modal" data-target=".estado" id="route{{$nomina->id}}" onclick="DatosNomina({{$nomina->id}})"  direccionamiento="{{ url('/financiera/pago/')}}/{{$nomina->id}}"><i class="fas fa-trash-alt"></i></button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
   <div class="mx-auto" style="width: 200px;">
    {{$nominas->links()}}
  </div>
    </div>
<!--end table-->
</div>
</div>
</div>
</div>

<!-- Modal ELIMINAR-->
<div class="modal fade estado" id="delete" tabindex="-1" role="dialog" aria-labelledby="modalEliminar" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <form action="financiera/pago" method="post">
    @method('PUT')
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="modalEliminar"> Eliminar nómina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="nomina_id" value="" name="nomina_id">
        <input type="hidden" class="form-control sueldo"  name="sueldos" value="">
        <div class="text-center text-danger mb-3"><i class="fas fa-times fa-5x"></i></div>
       <h4 class="text-center text-danger">Estas seguro de eliminar el siguiente registro?</h4>
        <h5 class="text-center pt-3 font-weight-bold" id="delegado"></h5>
        <h5 class="text-center pt-3 font-weight-bold" id="pago"></h5>
        <div class="alert alert-success exito py-2" role="alert"  hidden> <p id="exito" class="text-center"></p></div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        <button type="button" class="btn btn-danger" id="eliminar" ruta="{{ url('/financiera/pago/')}}"><i class="fas fa-trash-alt"></i> Eliminar</button>
      </div>
    </div>
    </form>
  </div>
</div>
       
<!-- Modal EDITAR-->
<div class="modal fade edit" id="edit" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <form action="financiera/pago" method="post">
    @method('PUT')
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="modalEditar"> Editar nómina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">
     <h4 id="name"></h4>
      <label for="inputCedula">Sueldo</label>
      <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="sueldo"><i class="fas fa-dollar-sign"></i></span>
      </div>
      <input type="text" class="form-control" id="inputSueldo" placeholder="Sueldo" name="sueldo" aria-describedby="sueldo" value="">
    </div>
       </div>
  </div>
        <input type="hidden" id="nomina_id" value="" name="nomina_id">
        <div class="alert alert-success exitoEdit py-0 mt-2" role="alert"  hidden> <p id="exitoEdit" class="text-center"></p></div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" id="editar" ruta="{{ url('/financiera/pago/')}}"><i class="fas fa-edit"></i> Editar</button>
      </div>
    </div>
    </form>
  </div>
</div>
       
    <!-- Modal ELIMINAR-->
<div class="modal fade ver" id="ver" tabindex="-1" role="dialog" aria-labelledby="modalVer" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="modalVer">Nómina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="nomina_id" value="" name="nomina_id">
        <input type="hidden" class="form-control sueldo"  name="sueldos" value="">
        <div class="text-center mb-3 text-success"><i class="fas fa-file-invoice-dollar fa-5x"></i></div>
       <h4 class="text-center text-success">Información de pago</h4>
        <h5 class="text-center text-dark pt-3 font-weight-bold" id="ver_nombre"></h5>
        <h5 class="text-center text-dark pt-3 font-weight-bold" id="ver_sueldo"></h5>
        <h5 class="text-center text-dark pt-3 font-weight-bold" id="ver_comentario"></h5>
        <h5 class="text-center text-dark pt-3 font-weight-bold" id="ver_fecha"></h5>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>
        </div>
        <!--conntainer fluid-->
@endsection