@extends('layouts.dashboard')

@section('content') 

<div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Reportes votantes</h1>
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
                     <a href="{{url('reportes/endvoters/hoy')}}" target="_blank"><i class="fas fa-person-booth fa-2x text-primary"></i></a>
                 
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
                        <a href="{{url('reportes/endvoters/mes')}}" target="_blank"><i class="fas fa-user-friends fa-2x text-success"></i></a>
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
                        <a href="{{url('reportes/endvoters/todos')}}" target="_blank"><i class="fas fa-users fa-2x text-info"></i> </a>
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
                        <a href="{{url('reportes/endvoters/nulos')}}" target="_blank"> <i class="fas fa-ban fa-2x text-danger"></i> </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>
<!--               <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">REPORTES DEL SISTEMA</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>/.box-header
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                   
                    <thead><tr>
                      <th>ID</th>
                      <th>reporte</th>
                      <th>ver</th>
                      <th>descargar</th>
                    </tr></thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Reporte de votantes</td>
                      <td><a href="{{url('/crearPDF/1')}}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="{{url('/crearPDF/2')}}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>
                    
                    </tr>
                   
                  </tbody></table>
                </div> /.box-body 
              </div>/.box -->
            
 @endsection