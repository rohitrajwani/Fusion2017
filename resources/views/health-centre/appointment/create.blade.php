@extends('layout')
@section('title','Create An Appointment')
@section('health_center_content')
  <div class="mar">
<h2 class="primary-text center-align">Create an Appointment</h2>
<center><div class="line secondary"></div></center>
<div class="row" style="margin-top:50px;">
{!! Form::open(array('route' => 'appointment.store', 'data-parsley-validate' => '')) !!}

    <div class="row">
      <div class="col s6">
        <h5 class="center-align">Doctor Name : <strong>
          {{ $staff->name }}
          <input type="text" style="display:none" value="{{ $staff->staff_id }}" name="doctor_id">
          <label ></label>
        </strong>
      </h5>
      </div>
      <div class="col s6">
        <?php
        $user_id = Auth::user()->username;
        $results = DB::select( DB::raw("SELECT * FROM student WHERE student_id = '$user_id'") );
        ?>
       <h5 class="center-align">Patient Name:   <strong>
         @foreach ($results as $result)
           {{ $result->name }}
         @endforeach
       </strong></h5>
      </div>
      </div>
    <div class="row">
      <div class="col s3">
        <h5 class="center-align" style="margin-top:25px;">Select A Day</h5>
      </div>
      <div class="input-field col s3">
          <input type="date" class="datepicker" name="days">
      </div>
      <div class="col s3">
        <h5 class="center-align" style="margin-top:25px;">Select A Slot</h5>
      </div>
      <div class="input-field col s3">
          <select name="slot">
            <option value="" disabled selected>Slots</option>
              <option value="8:00 a.m - 10:00 a.m">8:00 a.m - 10:00 a.m</option>
              <option value="6:00 p.m - 8:00 p.m">6:00 p.m - 8:00 p.m</option>
              {{-- <option value="10:00 a.m.-11:00 a.m.">10:00 a.m.-11:00 a.m.</option>
              <option value="10:00 a.m.-11:00 a.m.">10:00 a.m.-11:00 a.m.</option>
              <option value="10:00 a.m.-11:00 a.m.">10:00 a.m.-11:00 a.m.</option> --}}
          </select>
      </div>
    </div>


  <div class="row">
    <div class="col s3 offset-s5">
    {{ Form::submit('Book',array('class' => 'btn waves-effect waves-light', 'style' => 'margin-top: 20px')) }}
    {!! Form::close() !!}
  </div>
  </div>

</div>
</div>
@stop
