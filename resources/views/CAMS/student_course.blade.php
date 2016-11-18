@extends('CAMS.master')
@section('class_attendance_content')
	<br>
<div class="right-align">
	<a style="background-color:#076392" href="#modal3" class="waves-effect waves-light btn modal-trigger">
		<span style="font-size:0.8em">Notification</span>
	</a>
</div>
	<br>
		<center>
			<h3 class="rt">{{$coursename}}</h3>
		</center>
		<br></br>
<div class="container">
	<div class="row">
		
	<div class="col s8 offset-s2 m8 offset-m4 l4 offset-l2" id="btn-fix">

		<a style="background-color:#076392;width:200px" class="btn-large waves-effect waves-light btn modal-trigger" href="#modal1">
			<span style="font-size:0.8em">View Attendance</span>
		</a>
</div>
<div class="col s8 offset-s2 m8 offset-m4  l4 " id="btn-fix">
			<a style="background-color:#076392;width:200px" class="btn-large waves-effect waves-light btn" href="/CAMS/fill_leave-form/{{$coursename}}">
				<span style="font-size:0.8em">Apply For Leave</span>
			</a>
</div>
</div>
</div>	
		<div class="row">
			<div id="modal3" class="modal">
				<div class="modal-content" >
					<table class="bordered highlight">
						<thead>
							<tr>
								<th>Announcement</th>
								<th>Recieved Date</th>
							</tr>
						</thead>
						<tbody>
				@foreach ($notification as $notify)			
				
				
							<tr>
								<td>  
						{{$notify->notification}}</td>
								<td>
						{{$notify->created_at}}
					</td>
							</tr> 
				@endforeach	 
		
		
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
				</div>
			</div>
		</div>
		<!-- Modal Structure -->
		<div id="modal1" class="modal" style="background-color:">
			<div class="modal-content">
				<table class="responsive-table">
						<thead>
							<tr>
								<th>Total Lectures</th>
								<th>Lecture Completed</th>
								<th>Attended</th>
								<th>Percentage</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php $present=0;?>
								<?php $totle=0;?>
				@foreach($classes as $class)
				
								<td>{{$class->total_classes}}</td> @endforeach
  				@foreach($attended as $attend) 
					@if($attend->status==1)
						
								<?php $present++;?>
					@endif
					
								<?php $totle++;?>
				@endforeach
				
								<td>{{$totle}}</td>
								<td>{{$present}}</td>
								@if($totle!=0)
								<td>{{round($present / $totle, 2)*100}}% </td>
							    @else
								<td>no classes yet</td>
							    @endif
							</tr>
						</tbody>
					</table>
				<hr>
				<table class="bordered highlight">
					<thead>
						<tr>
							<th>Date</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
      @foreach($attended as $attend)
      	
						<tr>
							<td>{{$attend->date}}</td> 
		@if($attend->status)
        
							<td>Present</td>
        @else
		
							<td>Absent</td>
		@endif
      
						</tr>@endforeach
          
					</tbody>
				</table>
				
					
					<p></p>
				</div>
				<div class="modal-footer">
					<a href="" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
				</div>
			</div>



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