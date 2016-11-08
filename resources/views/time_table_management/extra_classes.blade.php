@extends('layout')
@section('title')
	Extra Classes
@stop

@section('content')
	<nav class="mynav">
          <div class="nav-wrapper">
            <ul>
                  <li><a href="/time_table_management">Back to Dashboard</a></li>
		  <li><a href="/time_table_management/view_tt">View Time Table</a></li>
		  @if(Auth::user()->user_type=='student')
			<li><a href="/time_table_management/extra_classes">Extra Classes</a></li>
		  	<li><a href="/time_table_management/quizzes">Quizzes</a></li>
		  @endif
                  @if(Auth::user()->user_type=='faculty')
                        <li><a href="/time_table_management/scheduleanextraclass">Schedule an Extra Class</a></li>
                        <li><a href="/time_table_management/viewmyrequests">View My Requests</a></li>
                  @endif

                  @if(Auth::user()->hasRole('admin'))
                        <li><a href="/time_table_management/modify_tt">Modify Time Table</a></li>
                        <li><a href="/time_table_management/creatett">Create Time Table</a></li>
                        <li><a href="/time_table_management/viewallrequests">Handle Requests</a></li>
                  @endif
            </ul>
          </div>
        </nav>

<table class="bordered highlight centered"> 
<thead>
 <tr> 
 <th>Date</th> 
 <th>Start Time</th>
 <th>End Time</th>
 <th>Course Code</th>
 <th>Room Alotted</th>
 </tr> 
 </thead>
  <tbody>
  @foreach($extra_classes as $class)
      <tr>
      <td>{{ $class->date }}</td>
      <td>{{ $class->start_time }}</td>
      <td>{{ $class->end_time }}</td>
      <td><?php echo substr($class->purpose, 0, count($class->purpose)-2); ?></td>
      <td>{{ $class->room_id }}</td>
    </tr>
  @endforeach
    </tbody> 
    </table>
@stop
	
