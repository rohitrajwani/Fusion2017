@extends('health-centre/main')
@section('title','Appointment Details')
@section('content')
<div class="mar">
    <h2 class="center-align primary-text">Appointment Details of Patient</h2>
    <div class="line secondary" style="margin:auto;"></div>
    <table class="bordered centered" style="margin-top:30px;margin-bottom:30px;">
    <thead>
      <tr>
          <th>Roll No.</th>
          <th>Patient Name</th>
          <th>Patient Email</th>
          <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @foreach ($student as $student)
            <th class="center-align">
              {{ $student->student_id }}
            </th>
            <td>
            {{ $student->name }}
          </td>
          <td>
            {{ $student->email }}
          </td>
        <td>
          <a href="{{ route('appointmentpatient.edit',$id) }}" class="waves-effect btn">Prescribe</a>
        </td>
      </tr>
          @endforeach
      </tbody>
</table>
<div class="row">
  <div class="col s12">
    @foreach ($prescribe as $prescribe)
      <h5>Disease: <strong>{{ $prescribe->disease }}</h5></strong>
      <h5>Number of Days Treatment: <strong>{{ $prescribe->number_days }}</h5></strong>
      <h5>Tablet: <strong>{{ $prescribe->tablet }}</strong> = {{ $prescribe->no }}</h5>
      <h5>Dated: <strong>{{ $prescribe->created_at }}</h5></strong>
    @endforeach
  </div>
</div>

</div>
@stop
