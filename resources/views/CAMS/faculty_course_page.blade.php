@extends('CAMS.layout')
@section('class_attendance_content')
<br>
<center>
	<h3 class="rt">{{$coursename}}</h3>
</center>
<br></br>
<div class="container">
<div class="row">

<div class="col s8 offset-s2 m8 offset-m4 l2" id="btn-fix">
			<a style="background-color:#076392;width:200px" class="btn-large waves-effect waves-light btn" href="/CAMS/take-attendance/{{$coursename}}">
				<span style="font-size:0.8em">Take Attendance</span>
			</a>
</div>

<div class="col s8 offset-s2 m8 offset-m4 l2  offset-l2" id="btn-fix">
	<a style="background-color:#076392;width:200px" class="btn-large waves-effect waves-light btn modal-trigger" href="#modal1">
		<span style="font-size:0.8em">Send Message</span>
	</a>
</div>

<div class="col s8 offset-s2 m8 offset-m4 l2 offset-l2" id="btn-fix">
	<a style="background-color:#076392;width:200px" class="btn-large waves-effect waves-light btn modal-trigger" href="#modal2">
		<span style="font-size:0.8em">View Attendance</span>
	</a>
</div>
</div>
</div>

<div id="modal2" class="modal">
<div class="modal-content">
<center>
	<h5 class="rt">{{$coursename}}</h5>
</center>
<div class="row">
	<form action="/CAMS/choose_date/{{$coursename}}" method="post" class="col s12">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
			<div class="row">
				<div class="col s12 m12 l12">
					<div class="input-field col s12">
						<select name="myDate">
								@foreach($dates as $d)
								
							<option value="{{$d->date}}">{{$d->date}}</option>
							@endforeach						
						
						</select>
						<label> Select Date</label>
					</div>
				</div>
			</div>
			<center>
				<button class="btn waves-effect waves-light" type="submit" name="action">Submit
									
					<i class="material-icons right">send</i>
				</button>
			</center>
		</form>
	</div>
</div>
	<div class="modal-footer">
								<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"></a>
							</div>
</div><!-- Modal Structure -->

<div id="modal1" class="modal">
<div class="modal-content">
	<h4 class="rt">{{$coursename}}</h4>
	<div class="row">
		<form action="/CAMS/send-notification/{{$coursename}}" method="post" class="col s12">
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
				<div class="row">
					<div class="col s12 m12 l12">
						<div class="input-field col s12">
							<select name="enrolled">
								<option value="All">Send To All</option>
								@foreach($enrolled_students as $student)								
								<option value="{{$student->student_id}}">{{$student->roll_no}}</option>
								@endforeach						
						
							</select>
							<label> Select Roll No</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="input col s12 m12 l12">
						<i class="material-icons prefix">mode_edit</i>
						<textarea id="message" name="message" class="materialize-textarea"></textarea>
						<label for="message">Informe About Course</label>
					</div>
				</div>
				<center>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
									
						<i class="material-icons right">send</i>
					</button>
				</center>
			</form>
		</div>
	</div>
</div>
@stop
@section('foobar')
<script>
		$(document).ready(function(){
			
			$("#course-atten-btn").click(function(){
				$("#show-format").show();	
			});
			$("#course-atten-btn2").click(function(){
				$("#show-format2").show();	
			});
			$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
					$('.modal-trigger').leanModal();
				});
				
				
			$('#modal1').openModal();
			 $('#modal1').closeModal();
			 $('#modal2').openModal();
			 $('#modal2').closeModal();
		});
		 $(document).ready(function() {
    $('select').material_select();
  });
         $('select').material_select('destroy');
		</script>
@stop