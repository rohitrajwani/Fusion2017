@extends('layout')
@section('title')
  Schedule an extra class
@stop
@section('content')

<nav class="mynav">
	<div class="nav-wrapper">
		<ul>
			<li><a href="/time_table_management/">Back To Dashboard</a></li>
			<li><a href="/time_table_management/view_tt/">View Time Table</a></li>
			<li><a href="/time_table_management/scheduleanextraclass">Schedule an Extra Class</a></li>
			<li><a href="/time_table_management/viewmyrequests">View My Requests</a></li>
			@if(Auth::user()->hasRole('admin'))
				<li><a href="/time_table_management/modify_tt">Modify Time Table</a></li></li>
				<a href="/time_table_management/creatett">Create Time Table</a></li>
			@endif
		</ul>
  	</div>
</nav>

<center>
  	<form method="get" action='/time_table_management/scheduleanextraclass/schedule'>
		<div class="col s6 l2 m4">
		      <label for='bookingdate'>Booking For</label>
		      <input type='date' data-date-inline-picker="true" name="bookingdate" id='bookingdate' class='validate'>
		</div>
		
		<div class="col s6 l2 m4">
		      <label for='StartTime'>Start Time</label>
		      <select name="StartTime" id="StartTime">
				<option value="" disabled selected>Start Time</option>
				<option value="09:00:00">9:00</option>
				<option value="10:00:00">10:00</option>
				<option value="11:00:00">11:00</option>
				<option value="12:00:00">12:00</option>
				<option value="14:30:00">14:30</option>
				<option value="15:30:00">15:30</option>
				<option value="15:30:00">16:30</option>
			</select>
		</div>
		
		<div class="col s6 l2 m4">
			<label for='EndTime'>End Time</label>
			<select name="EndTime" id="EndTime">
				<option value="" disabled selected>End Time</option>
				<option value="10:00:00">10:00</option>
				<option value="11:00:00">11:00</option>
				<option value="12:00:00">12:00</option>
				<option value="13:00:00">13:00</option>
				<option value="15:30:00">15:30</option>
				<option value="15:30:00">16:30</option>
				<option value="17:30:00">17:30</option>
			</select>
		</div>
		
		<div class="col s6 l3 m4">
		      <label for='CourseCode'>Course Code</label>
		      <input type="text" name="CourseCode" id='CourseCode' class='validate'>
		</div>
		
		<div class="col s6 l3 m4">
		      <label for='Strength'>Strength</label>
		      <input type='number' name='Strength' class='validate'>
		</div>
	
		<input type='submit' value='Submit' class='waves-effect btn'>
	</form>
</center>

<script>
	var etimes = ['10:00', '11:00', '12:00', '13:00', '15:30', '16:30', '17:30'];

	$('#EndTime').on('contentChanged', function() {
        	$(this).material_select();
        });

	$('#StartTime').on('change', function(){
		var stime = $('#StartTime option:selected').text();

		var stmp = stime.split(':');

		var shr = stmp[0];
		var smin = stmp[1];
		
		$('#EndTime').html('<option value="" disabled selected>End Time</option>');
		for (var i=0; i<etimes.length; i++){
			var etime = etimes[i];
			var etmp = etimes[i].split(':');

			var ehr = etmp[0];
			var emin = etmp[1];

			if(parseInt(ehr)>parseInt(shr) && parseInt(emin)>= parseInt(smin)){
				$('#EndTime').append('<option value="'+etime+':00">'+etime+'</option>');
			}
		}

		$('#EndTime').trigger('contentChanged');
	});
</script>
@stop
