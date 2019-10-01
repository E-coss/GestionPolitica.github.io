@extends('layouts.dashboard')

@section('content') 
<div class="container">
<div class="row">
<div class="col-md-6">
{!!  $chart->container() !!} 
</div>

<div class="col-md-6">
{!!  $chart1->container() !!} 
</div>
</div>

<div class="row">
{!!  $chart2->container() !!} 
</div>
</div>

 {!! $chart->script() !!}
 {!! $chart1->script() !!}
  {!! $chart2->script() !!}

@endsection