@extends('health-centre/main')
@section('title','Doctor - Primary Medical Care PDPM IIITDM Jabalpur')
@section('stylesheets')
{{ Html::style('css/pmc_doctor.css') }}
@endsection
@section('content')
  <div class="mar">
<h2 class="center-align primary-text">Doctors</h2>
<div class="line secondary" style="margin:auto"></div>
          <center style="margin-top:30px;margin-bottom:30px;">
            @foreach ($staff as $doc)

            <div class="row">
              <div class="card">
                <img src="img/male.png" class="avatar">
                <h5 class="center-align">Dr. {{ $doc->name }}</h5>
                <p class="center-align" style="margin:4px;">{{ $doc->department }}</p>
                {!! Form::open(array('route' => 'appointment.create', 'data-parsley-validate' => '','method' => 'GET')) !!}
                <input type="text" style="display:none" name="staff_id" value="{{ $doc->staff_id }}">
                @if(Auth::user()->user_type === 'student' || Auth::user()->user_type === 'faculty'){
                {{ Form::submit('Appointment',array('class'=>'waves-effect waves-light btn','style' => 'font-size:12px;')) }}
              }
            @endif
                {!! Form::close() !!}
                {{-- <a class="waves-effect waves-light btn modal-trigger" href="" margin:4px;>Appointment</a> --}}
                {{ HTML::linkRoute('doctor.show', 'Profile', $doc->staff_id, array('class' => 'waves-effect waves-light btn')) }}
                {{-- <a class="waves-effect waves-light btn" style="margin:4px;" href="">Profile</a> --}}
              </div>
            </div>
          @endforeach
          </center>
        </div>
@stop
