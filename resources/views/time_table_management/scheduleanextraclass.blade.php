@extends('layout')
@section('title')
  Schedule an extra class
@stop
@section('content')

<nav class="mynav">
  <div class="nav-wrapper">
    <ul>
  <li><a href="#!">View Time Table</a></li>
  <li><a href="/time_table_management/scheduleanextraclass">Schedule an Extra Class</a></li>
  <li><a href="/time_table_management/viewmyrequests">View my requests</a></li>
    </ul>
  </div>
</nav>
  {!! Form::open(array('route'=> 'schedule.store')) !!}
  <div class="row">
      <div class="col s6 l2 m4">
      <?php echo Form::label('bookingdate','Booking For');
        echo Form::input('date', 'bookingdate',null,array('class'=>'validate')); ?>
      </div>
      <div class="col s6 l2 m4">
      <?php echo Form::label('StartTime','Start Time'); ?>
      <select name="StartTime"> <option value="" disabled selected>Start Time</option> <option value="09:00:00">9:00</option> <option value="10:00:00">10:00</option> <option value="11:00:00">11:00</option> <option value="12:00:00">12:00</option><option value="14:30:00">2:30</option><option value="15:30:00">3:30</option><option value="15:30:00">4:30</option></select>
      </div>
      <div class="col s6 l2 m4">
      <?php echo Form::label('EndTime','End Time'); ?>
        <select name="EndTime"> <option value="" disabled selected>End Time</option> <option value="10:00:00">10:00</option> <option value="11:00:00">11:00</option> <option value="12:00:00">12:00</option><option value="14:30:00">2:30</option><option value="15:30:00">3:30</option><option value="15:30:00">4:30</option> <option value="17:30:00">5:30</option> </select>
        </div>
        <div class="col s6 l3 m4">
      <?php echo Form::label('CourseCode','Course Code'); ?>
      <?php echo Form::text('CourseCode',null,array('class'=>'validate')); ?>
      </div>
        <div class="col s6 l3 m4">
      <?php echo Form::label('Strength','Strength'); ?>
      <?php echo Form::input('number','Strength',null,array('class'=>'validate')); ?>
      </div>
      </div>
      <?php echo Form::submit('Submit' ,array('class'=>'waves-effect btn-flat')); ?>
      {!! Form::close() !!} 
    @stop
