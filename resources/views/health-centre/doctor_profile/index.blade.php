@extends('layout')
@section('title','Appointment ')
@section('health_center_content')
<div class="mar">
    <h2 class="center-align primary-text">Today's Appointment</h2>
    <div class="line secondary" style="margin:auto;"></div>
    @foreach ($appointment as $appointment)
      @if($appointment->day === date('Y-m-d'))
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
          <?php $results = DB::select( DB::raw("SELECT * FROM patient_records WHERE appointment_id = '$appointment->appointment_id'") );?>
          @if($results == null)
            <a href="{{ route('appointmentpatient.edit',$appointment->appointment_id) }}" class="waves-effect btn">Prescribe</a>
          @else
            <a href="" class="waves-effect btn disabled tooltipped" data-position="right" data-delay="50" data-tooltip="Prescibed Already">Prescribe</a>
          @endif

        </td>
        </tr>
      @else
        <h6 class="center-align" style="color:red;margin-top:20px;">Today there is no appointment</h6>
      @endif

    @endforeach
    </tbody>
</table>
</div>
@stop
