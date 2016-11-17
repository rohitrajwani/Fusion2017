@extends('layout')

@section('title')
	Create Time Table
@stop

@section('TT_content')
	<nav class="mynav">
	  <div class="nav-wrapper">
	    <ul>
		  <li><a href="/time_table_management">Back to Dashboard</a></li>
		  <li><a href="/time_table_management/view_tt">View Time Table</a></li>
		  <li><a href="/time_table_management/scheduleanextraclass">Schedule an Extra Class</a></li>
                  <li><a href="/time_table_management/modify_tt">Modify Time Table</a></li>
		  <li><a href="/time_table_management/viewallrequests">Handle Requests</a></li>

		  @if(Auth::user()->user_type=='faculty')
			<li><a href="/time_table_management/viewmyrequests">View My Requests</a></li>
		  @endif
	    </ul>
	  </div>
	</nav>

	<center>
		<div class="col" style="color:red"> Note: Please fill mutiple adjacent columns with same course for duration greater than 1 hour  </div> <br>
		<form action="/time_table_management/post_tt" method="get">
			<div class="input-field col s2">
                <select id="prog">
					<option value="0" disabled selected>Choose Programme</option>
                    <option value="1">B.Tech.</option>
                    <option value="2">B.Des.</option>
                    <option value="3">M.Tech.</option>
                    <option value="4">M.Des.</option>
					<option value="5">Ph.D.</option>
                </select>
                <label>Programme</label>
    		</div>

			<div class="input-field col s2">
				<select id="sem">
					<option value="0" disabled selected>Choose Semester</option>
					@for($i=1; $i<=8; $i++)
						<option value=<?php echo $i; ?>><?php echo $i ?></option>
					@endfor
				</select>
			    <label>Semester</label>
			</div>

			<table class="responsive-table bordered highlight" id="tt"></table>
			<div class="input-field col s2" id="change_tt">
				<input type="submit" class="waves-effect btn" value="Create">
			</div>
		</form>	

	</center>

	<script>
		var tslots = ['Day/Time', 'Room No.', '09:00-09:55', '10:00-10:55', '11:00-11:55', '12:00-12:55', 'BREAK', '02:30-03:25', '03:30-04:25', '04:30-05:25'];
		var dslots = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];


		$(document).ready(function(){
				$('#tt').html('<thead>');
				for(var i=0; i<tslots.length; i++)
					$('thead').html($('thead').html() + '<th>' + tslots[i] + '</th>');
				
				for(var i=0,k=1,l=0,m=2; i<dslots.length; i++,k+=3,l+=3,m+=3){
					$('#tt').html($('#tt').html() + "<tr id='"+l+"'>" + "<tr id='"+k+"'>"+ "<tr id='"+m+"'>");
					
					$('#'+l).html('<td rowspan="3">'+ dslots[i] +'</td>');
					for (var j=1; j<tslots.length; j++){
						
						if(j!=6){
							if(j==1){
								$('#'+l).html($('#'+l).html() + '<td>'+ "<div class=\"input-field col s12\">\
	 					    	<input name='room"+l+"' id=\"slot" + l + "\" type=\"text\" class=\"validate\">\
	      						<label for=\"slot" + l + "\">Room</label>\
								</div>" +'</td>');

								$('#'+k).html($('#'+k).html() + '<td>'+ "<div class=\"input-field col s12\">\
	 					    	<input name='room"+k+"' id=\"slot" + k + "\" type=\"text\" class=\"validate\">\
	      						<label for=\"slot" + k + "\">Room</label>\
								</div>" +'</td>');
								
								$('#'+m).html($('#'+m).html() + '<td>'+ "<div class=\"input-field col s12\">\
	 					    	<input name='room"+m+"' id=\"slot"+ m +"\" type=\"text\" class=\"validate\">\
	      						<label for=\"slot" + m + "\">Room</label>\
								</div>" +'</td>');
								
							}	
							else{
								$('#'+l).html($('#'+l).html() + '<td>'+ "<div class=\"input-field col s12\">\
	 					    	<input name='course"+ l + j +"' id=\"slot"+ k + j +"\" type=\"text\" class=\"validate\">\
	      						<label for=\"slot" + l + j + "\">Course ID</label>\
								</div>" +'</td>');

								$('#'+k).html($('#'+k).html() + '<td>'+ "<div class=\"input-field col s12\">\
	 					    	<input name='course"+ k + j +"' id=\"slot"+ k + j +"\" type=\"text\" class=\"validate\">\
	      						<label for=\"slot"+ k + j +"\">Course ID</label>\
								</div>" +'</td>');

								$('#'+m).html($('#'+m).html() + '<td>'+ "<div class=\"input-field col s12\">\
	 					    	<input name='course"+ m + j +"' id=\"slot"+ m + j +"\" type=\"text\" class=\"validate\">\
	      						<label for=\"slot"+ m + j +"\">Course ID</label>\
								</div>" +'</td>');
							}
						}
						else{
							$('#'+l).html($('#'+l).html() + '<td> </td>');
							$('#'+k).html($('#'+k).html() + '<td> </td>');	
							$('#'+m).html($('#'+m).html() + '<td> </td>');	
						}
    				}
				}
		});
	</script>
@stop

