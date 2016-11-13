<!--HOD / Admin Page view feedbacks-->
<?php
	use App\Claim;
	use App\TA;
	use App\Ta_feedback;
	$id = $_SESSION['id'];
	$dept = \DB::table('Faculty')->where('faculty_id',$id)->first()->department;//department of the HOD
	$course = \DB::table('Course')->where('department',$dept)->pluck('course_id');//courses under the department 
	$tas = TA::whereIn('course_id',$course)->pluck('student_id');//TA's assigned under the courses under the department
	$feedbacks = Ta_feedback::whereIn('student_id',$tas)->get();
	$i=0;
?>
<?php
    if(isset($_SESSION['hod']))
    {

       
    }
    else
    {
        echo "<script>
            alert('NOT ALLOWED TO VIEW THIS PAGE');
        </script>";
        header("Refresh:0 url=wele",true,303);
        exit();
    }
?>
@section('title', 'POST OPENING')
@section('links')
<nav class="mynav blue">
  <div class="nav-wrapper">
    <ul>
      <li><a href="TA">Home</a></li>
      <li class=""><a href="TA/approve_claims">Approve-Claims</a></li>
      <li ><a href="TA/post_opening">Post-Opening</a></li>
      <li><a href="TA/mail">Mail</a></li>
    </ul>
  </div>
</nav>
@stop
@extends('ta.layouts.master1')
@section('title','Feedbacks')
@section('main_heading','Submitted Feedbacks')
@section('body')
	<table class="centered  highlight  bordered">
	<thead>
		<tr>
			<th></th>
			<th>Name of the TA</th>
			<th>TA ID</th>
			<th>Show Feedback</th>
		</tr>
	</thead>
	<tbody>
		@foreach($feedbacks as $row)
			<tr>
				<th style="width:5%;">{{++$i}}</th>
				<td style="width:30%">{{\DB::table('student')->where('student_id',$row->student_id)->first()->name}}</td>
				<td style="width:25%">{{$row->student_id}}</td>
				<td>
					<a class="waves-effect waves-light btn" style="width: 50%" id="btn{{$row->student_id}}">View Feedback</a>
				</td>
			</tr>
			<tr id="panel{{$row->student_id}}" style="display: none">
            	<td style="width:5%"></td>
            	<td style="width:30%">
        			Rating : 
        			@if($row->rating==1)
        				<div style="color: red">Worst</div>
        			@elseif($row->rating==2)
        				<div style="color: red">Bad</div>
        			@elseif($row->rating==2)
        				<div style="color: orange">Average</div>
        			@elseif($row->rating==2)
        				<div style="color: green">Good</div>
        			@else
        				<div style="color: green">Excellent</div>
        			@endif
            	</td>
            	<td colspan="2" id="panel{{$row->student_id}}">
            		Feedback:
            		<div style="color: blue">
            		{{$row->description}}
            		</div>
            	</td>
            </tr>
		@endforeach
	</tbody>
	</table>
	<br><br>
@endsection
@section('footer')
	<script>
		$(document).ready(function() {
            $('select').material_select();
        
        
        @foreach ($feedbacks as $row)

        	$("#btn{{$row->student_id}}").click(function(){
        		$("#panel{{$row->student_id}}").toggle();
        	});	
        	
        @endforeach
        
        });
	</script>
@endsection