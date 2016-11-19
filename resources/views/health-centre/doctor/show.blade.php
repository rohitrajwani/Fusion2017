@extends('layout')
@section('title','Doctor - Primary Medical Care PDPM IIITDM Jabalpur')
@section('stylesheets')
{{ Html::style('css/pmc_doctor.css') }}
@endsection
@section('health_center_content')
  <div class="mar">
<h2 class="center-align primary-text">{{ $staff->name }}</h2>
<div class="line secondary" style="margin:auto"></div>
<center>
<h5>Speclization in : {{ $staff->doctor->specialization }}</h5>
<p>Post : {{ $staff->post }}</p>
<p>Department : {{ $staff->department }}</p>
<p>Email : {{ $staff->email }}</p>
<p>Address : {{ $staff->address }}</p>
</center>
</div>
@stop
