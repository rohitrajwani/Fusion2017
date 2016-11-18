@extends('CAMS.layout')
@section('class_attendance_content')
 @if($alert = Session::get('alert'))
            <script type="text/javascript">alert("{{$alert}}");</script>
        @endif
	<div class="container">
			<center><span class="rt"><h3>{{$coursename}}</h3></span></center><br></br>
		</div>
	</div>	
	<br></br>
	<div class="container">
	
	<form action="/CAMS/store-attendance_offline/{{$coursename}}" method="post">
	  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
	<div  style="width:100%;height:200px;overflow-y:scroll;margin:auto">
	 <table class="responsive-table centered " align="center" border="2 px solid red">
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Roll No.</th>
              <th data-field="price">Status</th>
			  
          </tr>
        </thead>

        <tbody>
			@foreach($register_student as $student)
          <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->roll_no}}</td>
            <td><input type="checkbox" class="filled-in" id="{{$student->roll_no}}" name="{{$student->roll_no}}" /><label for="{{$student->roll_no}}"></label></td>
          </tr>
		  @endforeach
        </tbody>
      </table>
     </div><br></br>
		<div class="row">
			<div class="col s12 m6 offset-m3 l5 offset-l1">
				<input type="date" required class="datepicker" style="width:200px" placeholder="Select date (required)" name="_date">
				
			</div>
			<div class="col s12 m5 offset-m1 l5 offset-l1">
				<button style="background-color:#076392" class="btn waves-effect waves-light" type="submit" name="action">Submit
									<i class="material-icons right">send</i>
						</button>
				
			</div>
		</div>
	 
	 </form>
	 
	</div>
	@stop
	@section('foobar')
		<script>
			 $('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 15 ,// Creates a dropdown of 15 years to control year
	
				formatSubmit: "yyyy-mm-dd",
				hiddenName : true,
			});
			$(document).ready(function(){
				// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
				$('.modal-trigger').leanModal();
			});
		</script>
	@stop