@extends('layouts.dashboard')

@section('content') 
<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Reportes de nominas</h1>
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
                        <a href="{{url('reportes/nominas/hoy')}}" target="_blank"><i class="fas fa-hand-holding-usd fa-2x text-primary"></i></a>
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
                        <a href="{{url('reportes/nominas/mes')}}" target="_blank"><i class="fas fa-search-dollar fa-2x text-success"></i></a>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nominas</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$all}} ( ${{$fondo}} )</div> 
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                        <a href="{{url('reportes/nominas/todos')}}" target="_blank"><i class="fas fa-dollar-sign fa-2x text-info"></i></a>
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
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Nulos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nulos}}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('nominas-nulos')}}"><i class="fas fa-ban fa-2x text-danger"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
 @endsection