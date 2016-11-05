@extends('layout')

@section('title')
  View My Requests
@stop

@section('content')

<nav class="mynav">
        <div class="nav-wrapper">
                <ul>
                        <li><a href="/time_table_management/">Back To Dashboard</a></li>
                        <li><a href="/time_table_management/view_tt/">View Time Table</a></li>
                        <li><a href="/time_table_management/scheduleanextraclass">Schedule an Extra Class</a></li>
                        @if(Auth::user()->hasRole('admin'))
                                <li><a href="/time_table_management/modify_tt">Modify Time Table</a></li>
                                <li><a href="/time_table_management/creatett">Create Time Table</a></li>
				<li><a href="/time_table_management/viewallrequests">Handle Requests</a></li>
                        @endif
                </ul>
        </div>
</nav>
<br>
<input name="filters" type="radio" id="all"/>
<label for="all">All</label>

<input name="filters" type="radio" id="app" />
<label for="app">Approved</label>

<input name="filters" type="radio" id="rej" />
<label for="rej">Rejected</label>


<table class="bordered highlight centered"> 
<thead>
 <tr> 
 <th>Booked On</th> 
 <th>Booked For</th> 
 <th>Start Time</th>
 <th>End Time</th>
 <th>Course Code</th>
 <th>Strength</th> 
  <th>Status</th> 
  <th>Room Alotted</th>
 </tr> 
 </thead>
  <tbody>
  @foreach($requests as $request)
      <tr>
      <td>{{ $request->created_at }}</td>
      <td>{{ $request->date }}</td>
      <td>{{ $request->start_time }}</td>
      <td>{{ $request->end_time }}</td>
      <td>{{ $request->purpose }}</td>
      <td>{{$request->expected_no_of_students }}</td>
      <td>{{ $request->status }}</td>
      <td>{{ $request->room_id }}</td>
    </tr>
  @endforeach
    </tbody> 
    </table>

   <script>
	$(document).ready(function(){
		var loc = window.location.search;
		
		if(loc){
			var loc_d = loc.split('?');
			var search_term = loc_d[1];

			if(search_term){
				var filter = search_term.split('=')[0];

				$('#'+filter).attr('checked', true);
			}
			else{
				$('#all').attr('checked', true);
			}
		}
		else{
			$('#all').attr('checked', true);
		}
	});

	$('input:radio').on('change', function(){
		var type = $(this).attr('id');
		var data;

		if(type==='all'){
			window.location = '/time_table_management/viewmyrequests';
		}

		else if(type==='app')
			window.location = '/time_table_management/viewmyrequests?app=1';

		else
			window.location = '/time_table_management/viewmyrequests?rej=1';
	});
   </script>    
@stop
