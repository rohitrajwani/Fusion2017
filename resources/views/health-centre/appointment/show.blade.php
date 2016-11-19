@extends('layout')
@section('title','Appointment ')
@section('health_center_content')
<div class="mar">
    <h2 class="center-align">Appointment Details</h2>

    <table class="bordered centered">
    <thead>
      <tr>
          <th>Doctor Name</th>
          <th>Date</th>
          <th>Day</th>
          <th>Slot</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="center-align">Dr. {{ $appointment->doctor->staff->name }}</th>
        <td>{{ date('j M, Y ' , strtotime($appointment->day)) }}</td>
        <td>{{ date('l',strtotime($appointment->day)) }}</td>
        <td>{{ $appointment->slot }}</td>
      </tr>
    </tbody>
</table>
<div class="row">
  <div class="col s12">
    @foreach ($prescribe as $prescribe)
      <h5>Disease: <strong>{{ $prescribe->disease }}</h5></strong>
      <h5>Number of Days Treatment: <strong>{{ $prescribe->number_days }}</h5></strong>
      <h5>Tablet: <strong>{{ $prescribe->tablet }}</strong> = {{ $prescribe->no }}</h5>
      <h5>Dated: <strong>{{ date('j M, Y h:ia' , strtotime($prescribe->created_at)) }}</h5></strong>
    @endforeach
  </div>
</div>
</div>
@stop
