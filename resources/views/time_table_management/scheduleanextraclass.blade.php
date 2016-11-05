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
  <form method="post" action='schedule.store'>
  <div class="row">
      <div class="col s6 l2 m4">
      <label for='bookingdate'>Booking For</label>
      <input type='date' name="bookingdate" id='bookingdate' class='validate'>
      </div>
      <div class="col s6 l2 m4">
      <label for='StartTime'>Start Time</label>
      <select name="StartTime" id="StartTime"> <option value="" disabled selected>Start Time</option> <option value="09:00:00">9:00</option> <option value="10:00:00">10:00</option> <option value="11:00:00">11:00</option> <option value="12:00:00">12:00</option><option value="14:30:00">2:30</option><option value="15:30:00">3:30</option><option value="15:30:00">4:30</option></select>
      </div>
      <div class="col s6 l2 m4">
      <label for='EndTime'>End Time</label>
        <select name="EndTime" id="EndTime"> <option value="" disabled selected>End Time</option> <option value="10:00:00">10:00</option> <option value="11:00:00">11:00</option> <option value="12:00:00">12:00</option><option value="14:30:00">2:30</option><option value="15:30:00">3:30</option><option value="15:30:00">4:30</option> <option value="17:30:00">5:30</option> </select>
        </div>
        <div class="col s6 l3 m4">
      <label for='CourseCode'>Course Code</label>
      <input type="text" name="CourseCode" id='CourseCode' class='validate'>
      </div>
        <div class="col s6 l3 m4">
      <label for='Strength'>Strength</label>
      <input type='number' name='Strength' class='validate'>
      </div>
      </div>
      <input type='submit' value='Submit' class='waves-effect btn-flat'>
      </form>
    @stop
