@extends('layout')
@section('title','Appointment ')
@section('health_center_content')
<div class="mar">
  <?php $count=0; ?>
    <h2 class="center-align primary-text">Upcoming Appointment Details</h2>
    <div class="line secondary" style="margin:auto;"></div>
    <table class="bordered centered" style="margin-top:30px;margin-bottom:30px;">
    <thead>
      <tr>
          <th>Doctor Name</th>
          <th>Date</th>
          <th>Day</th>
          <th>Slot</th>
          <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($appointment as $appointment)
        @if($appointment->day > date('Y-m-d') && $appointment->user_id === Auth::user()->username)
        <tr>
        <th class="center-align">Dr. {{ $appointment->doctor->staff->name }}</th>
        <td>{{ date('j M, Y ' , strtotime($appointment->day)) }}</td>
        <td>{{ date('l',strtotime($appointment->day)) }}</td>
        <td>{{ $appointment->slot }}</td>
        <td><a href= "{{route('appointment.show',$appointment->appointment_id) }}" class="waves-effect btn">View</a>
          <center>
          {!! Form::open(['route' => ['appointment.destroy',$appointment->appointment_id],'method' => 'DELETE']) !!}
          {!! Form::submit('Cancel',['class' => 'btn btn-danger btn-block']) !!}
          {!! Form::close() !!}
        </center>
        </td>
      </tr>
      <?php $count++; ?>
    @endif
    @endforeach
    </tbody>
</table>
@if($count === 0)
<h6 class="center-align" style="color:red;margin-top:20px;">No Record Found</h6>
@endif
</div>
@stop
