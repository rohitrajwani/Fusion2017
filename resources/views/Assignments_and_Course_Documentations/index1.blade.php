@extends('layout')
@section('assignments_content')

    <nav class="mynav">
      <div class="nav-wrapper">
    	<ul>
    	  <li><a href="/Assignments_and_Course_Documentations/student">Registered Courses</a></li>
    	</ul>
      </div>
    </nav>

    @foreach($courses as $course)
    	<div class=" col l12"> 
			<div class="card small">
				<div class="card-image">
				    <img src="/Assignments_and_Course_Documentations/course-of-study.jpg">  
				</div>
				<div class="card-content">
				  <p></p>
				</div>
				<div class="card-action">
				  <a href="/Assignments_and_Course_Documentations/student/{{ $course->course_id }}">
    				{{ $course->course_id }}
    				</a>
				</div>
			</div>
		</div>
	@endforeach	
@stop
