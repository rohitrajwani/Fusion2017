@extends('layout')

@section('title')
	Modify Time Table
@stop

@section('TT_content')
	<nav class="mynav">
          <div class="nav-wrapper">
            <ul>
		  <li><a href="/time_table_management">Back to Dashboard</a></li>
                  <li><a href="/time_table_management/view_tt">View Time Table</a></li>
                  <li><a href="/time_table_management/scheduleanextraclass">Schedule an Extra Class</a></li>
                  <li><a href="/time_table_management/creatett">Create Time Table</a></li>
                  <li><a href="/time_table_management/viewallrequests">Handle Requests</a></li>
		  @if(Auth::user()->user_type=='faculty')
			<li><a href="/time_table_management/viewmyrequests">View My Requests</a></li>
		  @endif
            </ul>
          </div>
        </nav>

	<center>
		<div class="col" style="color:red">Note: Choose Course ID, Time and Class Room below to remove the slot from the time table. Additions can only be done <a href="/time_table_management/creatett/">here</a>.</div>

		<div class="col">
			<div class="input-field col s2">
				<input name="room_id" id="room_id" type="text" class="validate">
				<label for="room_id">Room ID</label>
			</div>

			<div class="input-field col s3">
				<select id="from_time">
					<option value="0">Choose From Time</option>
					<option>09:00:00</option>
                                        <option>10:00:00</option>
                                        <option>11:00:00</option>
                                        <option>12:00:00</option>
                                        <option>02:30:00</option>
                                        <option>03:30:00</option>
                                        <option>04:30:00</option>
				</select>
				<label for="from_time">From Time</label>
			</div>

			<div class="input-field col s3">
                                <select id="end_time">
                                        <option value="0">Choose End Time</option>
                                        <option>09:55:00</option>
                                        <option>10:55:00</option>
                                        <option>11:55:00</option>
                                        <option>12:55:00</option>
                                        <option>03:25:00</option>
                                        <option>04:25:00</option>
                                        <option>05:25:00</option>
                                </select>
				<label for="end_time">End Time</label>
                        </div>

			<div class="input-field col s2">
				<input name="course_id" id="course_id" type="text" class="validate">
				<label for="course_id">Course ID</label>
			</div>

			<div class="input-field col s2">
				<input name="submit" value="Delete" id="delete" type="button" class="btn">
			</div>
		</div>	
	</center>

	<script>
		$(document).on('click', '#delete', function () {
			var cid = $('#course_id').val();
			var rid = $('#room_id').val();
			var ftime = $('#from_time option:selected').text();
			var etime = $('#end_time option:selected').text();

			if(cid && rid && ftime!=="Choose From Time" && etime!=="Choose End Time"){
				var data = "cid="+cid+"&rid="+rid+"&ftime="+ftime+"&etime="+etime;

				$.ajax({
					url: "/time_table_management/modify_tt",
					data: data,
					type: "get",
					success: function(data){
						location.reload();
					}
				});
			}

			else{
				alert ('Please choose all the details');
			}
		}); 
	</script>
@stop
