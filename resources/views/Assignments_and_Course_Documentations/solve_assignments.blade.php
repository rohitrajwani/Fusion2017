@extends('layout')
@section('content')
	<nav class="mynav">
	  <div class="nav-wrapper">
		  <ul>
		    <li><a href="/Assignments_and_Course_Documentations/student">Registered Courses</a></li>
		  </ul>
	  </div>
	</nav>
			
	<h4> {{ $course }} </h4>                    
  
  <table class="bordered highlight centered">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Date/Time</th>
        <th>Topic</th>
        <th>Deadline</th>
		    <th>Upload </th>
      </tr>
    </thead>
    
    <tbody>
      @foreach( $solve as $solve1 )
        <tr>
          <td>{{ $solve1->assign_id }}</td>
          <td>{{ $solve1->upload_time }}</td>
          <td><a href="/Assignments_and_Course_Documentations/assignments/{{ $solve1->url_assign }}" download>{{ $solve1->url_assign }}</a></td>
          <td>{{ $solve1->deadline }}</td>

      		<td>
            <form action="/Assignments_and_Course_Documentations/solve_assignment" method='post' class="col s12" enctype="multipart/form-data">
              {{ csrf_field() }}

              <input type='hidden' name='dummy' value= {{ $solve1->course_id }} >
              <input type='hidden' name='student' value= "{{ Auth::user()->username }}" >
              <input type='hidden' name='assign' value= {{ $solve1->assign_id }} >
              <input type='hidden' name='deadline' value= {{ $solve1->deadline }} >


              <div class="file-field input-field">
                <div class="btn">
                  <span>Upload</span>
                  <input type="file" name="solved_assignment">
                </div>
                <div class="file-path-wrapper col s3">
                  <input class="file-path validate" name='assignment' type="text">
                </div>
              </div>
              
              <div class="col s2" id="submit{{$solve1->assign_id}}">
                <input type='submit' value='Submit' class="waves-effect btn-flat" >
              </div>
            </form>
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@stop