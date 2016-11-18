@extends('layout')
@section('assignments_content')        
	<nav class="mynav">
	  <div class="nav-wrapper">
		<ul>
		  <li><a href="/Assignments_and_Course_Documentations/student">Current Courses</a></li>
		</ul>
	  </div>
	</nav>
    
  <div class=" col s12 m4 offset-l1">
		<div class="card small">
			<div class="card-image">
			  <img src="/Assignments_and_Course_Documentations/pencil.jpg">
			  
			</div>
			<div class="card-content">
			  <p>
			  {{ $course }}
			  </p>
			</div>
			<div class="card-action">
			  <a href="/Assignments_and_Course_Documentations/student/{{ $course }}/solve_assignment">Solve Assignment</a>
			</div>
		</div>
	</div>
        
					
	<div class=" col s12 m4 offset-l2"> 
		<div class="card small">
			<div class="card-image">
			  <img src="/Assignments_and_Course_Documentations/documents.jpg">
			</div>
			<div class="card-content">
			<p>{{ $course }}</p>
			</div>
			<div class="card-action">
			  <a href="/Assignments_and_Course_Documentations/student/{{ $course }}/course_documents">Course Documents</a>
			</div>
		</div>
	</div>
@stop