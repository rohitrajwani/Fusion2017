@extends('health-centre/main')
@section('title','Appointment ')
@section('content')
<div class="mar">
    <h2 class="center-align primary-text">Upcoming Appointment</h2>
    <div class="line secondary" style="margin:auto;"></div>
    @foreach ($appointment as $appointment)
      @if($appointment->day > date('Y-m-d'))
    <table class="bordered centered" style="margin-top:30px;margin-bottom:30px;">
    <thead>
      <tr>
          <th>#</th>
          <th>Patient Type</th>
          <th>Date</th>
          <th>Day</th>
          <th>Slot</th>
          <th></th>
      </tr>
    </thead>
    <tbody>
        <tr>
        <th class="center-align">{{ $appointment->appointment_id }}</th>
        <td>{{ $appointment->user_type }}</td>
        <td>{{ date('j M, Y ' , strtotime($appointment->day)) }}</td>
        <td>{{ date('l',strtotime($appointment->day)) }}</td>
        <td>{{ $appointment->slot }}</td>
        <td>
          <a href= "{{route('appointmentpatient.show',$appointment->appointment_id) }}" class="waves-effect btn">View</a>
        </td>
        </tr>
      @else
        <h6 class="center-align" style="color:red;margin-top:20px;">No Record Found</h6>
      @endif
    @endforeach
    </tbody>
</table>
</div>
@stop
