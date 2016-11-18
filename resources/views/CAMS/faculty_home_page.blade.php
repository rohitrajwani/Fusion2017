@extends('CAMS.layout')
@section('class_attendance_content')
@if($alert = Session::get('alert'))
            <script type="text/javascript">alert("{{$alert}}");</script>
@endif

<div class="row">
	<div class="container col s12" style="width:100%">
			<center>
				<image class="responsive-image" src="/image/back.jpg" id="myImage">
				</center>
				<div class="container" id="course">
					<br></br>
					<center>
						<h3 class="rt">My Courses</h3>
					</center>
					<br></br>
					<div class="row">
		@foreach ($courses as $course)
        
						<div class="col s12 m6 l6">
							<div class="card small">
								<div class="card-image">
									<img src="/image/sample-2.jpg" style="height:200px">
										<span class="card-title black-text text-darken-4" style="text-transform:capitalize;font-size:2em;c">
											<center>
												<h5><strong>{{$course->course_name}}</strong></h5>
											</center>
										</span>
									</div>
									<div class="card-action">
										<center>
											<a class="btn waves-effect waves-light"  href="/CAMS/faculty/{{$course->course_name}}">{{$course->course_id}}
						
						</a>
										</center>
									</div>
								</div>
							</div>
		@endforeach
	
						</div>
					</div>
	@stop
	@section('foobar')
					
		<script>
		$(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });
        $(document).ready(function(){
            $('.collapsible').collapsible({
            accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });
        });
     
     </script>
@stop