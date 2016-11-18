@extends('health-centre/main')
@section('title','Appointment Prescribe')
@section('content')
<div class="mar">
    <h2 class="center-align primary-text">Give Prescribe to Patient</h2>
    <div class="line secondary" style="margin:auto;"></div>
    <div class="row" style="margin-top:50px;">
    {!! Form::open(array('route' => 'appointmentpatient.store', 'data-parsley-validate' => '')) !!}
    <div class="row">
      <div class="col s12">
        @foreach ($user_id as $user)

        <h5 class="center-align">Patient Name :
          <strong>
          {{ $user->name }}
        </strong>
      </h5>
    @endforeach
    <input type="text" name="appointment_id" value="{{ $appointment_id }}" style="display:none;">
      </div>
    </div>
    <div class="row">
      <div class="col s3 offset-s3">
        <h5 class="right-align" style="margin-top:25px;">Disease</h5>
    </div>
      <div class="col s3 input-field">
        <input type="text" name="disease">
      </div>
      </div>
      <div class="row">
        <div class="col s3 offset-s3">
          <h5 class="right-align" style="margin-top:25px;">no. of days</h5>
        </div>
        <div class="col s3 input-field">
          <input type="number" name="number_days">
      </div>
    </div>
    <div id="dynamicInput">
    <div class="row">
      {{-- <div class="col s3">
        <h5  class="right-align" style="margin-top:25px;">Tablets</h5>
      </div> --}}

        <div class="col s3">
          <h5 class="right-align" style="margin-top:25px;">Tablet 1</h5>
        </div>
        <div class="col s3 input-field">
          <input type="text" name="tablet">
          <label>Name</label>
        </div>
        <div class="col s3 input-field">
          <input type="number" name="no">
          <label>No. of Tablet</label>
        </div>
        <div class="col s3">
          <input type="button" value="Add Tablet" class="waves-effect btn" style="margin-top:18px;" onClick="addInput('dynamicInput');">
        </div>
      </div>
          {{-- Entry 1<br><input type="text" name="myInputs[]"> --}}
     </div>

     <div class="row">
       <div class="col s12">
     <center>
       {{ Form::submit('Submit',array('class' => 'btn waves-effect waves-light', 'style' => 'margin-top: 20px')) }}</center>
   </div>
 </div>
     {!! Form::close() !!}
    </div>

  </div>

@stop
