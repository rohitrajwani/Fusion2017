@extends('CAMS.master')

@section('class_attendance_content')

	<br></br>
<form action = "/CAMS/leave_form/{{$coursename}}" method = "post">
	<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
		<div style="margin:auto;width:70%">
				<div class="row">
					<div class="col s12 m6 l6">
					<h5 class="rt">{{$student->name}}</h5>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m6 l6">
					<h5 class="rt">{{$coursename}}</h5>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m6 l6">
						<input type="date" placeholder="From date" class="datepicker"  name="_fromdate" required>
											<label for="From"></label>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m6 l6">
						<input type="date"  placeholder="Till Date" class="datepicker"  name="_tilldate" required>
												<label for="Up To"></label>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m6 l6">
						<center>
							<button style="background-color:#076392" class="btn waves-effect waves-light" type="submit" name="action">Submit
								<i class="material-icons right">send</i>
							</button>
						</center>
					</div>
				</div>					
			</div>
		</form>

@stop
@section('foobar');
	  
		<script>
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 15 ,
				formatSubmit : "yyyy-mm-dd" ,
				hiddenName :true,// Creates a dropdown of 15 years to control year	
			});
			$(document).ready(function(){
					// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
					$('.modal-trigger').leanModal();
			});	
	  </script>
@stop