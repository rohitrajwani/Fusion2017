@extends('studentlayout')

@section('name')

	{{ $name}}
@stop


@section('content')


<div class="col s12 m12 l12 center">
							<h4> {{strtoupper($club)}} CLUB</h4>
							</div>
			
							
							<div class="row">
									<div class="col s12 m8 l8">
									<div class="row">
									<div class="col s12 m6 l6">
									<div class="col s12 m12 l12 center">
									<h5 style="color: red;">Club Coordinator</h5>
									<font style="font-size: 20px;">
										@foreach($coordinators as $coordinator)
										
										{{ $coordinator->name}}
												@endforeach

									</font>
									<br/><font style="font-size: 20px;">@foreach($coordinators as $coordinator)
		
										{{ $coordinator->roll_no}}
												@endforeach
</font>
									<br/>
									<font style="font-size: 20px;">@foreach($coordinators as $coordinator)
	
										{{ $coordinator->student_phone_no}}
												@endforeach
<!-- </td> --></font>
									</div></div>
									<div class="col s12 m6 l6">
									<div class="col s12 m12 l12 center">
									<h5 style="color: red;">Club Co-Coordinator</h5>
									<font style="font-size: 20px;">@foreach($cocoordinators as $cocoordinator)
	
										{{ $cocoordinator->name}}
												@endforeach
<!-- </td> --></font>
									<br/><font style="font-size: 20px;"@foreach($cocoordinators as $cocoordinator)>
										{{ $cocoordinator->roll_no}}
												@endforeach
</font></font>
									<br/>
									<font style="font-size: 20px;">@foreach($cocoordinators as $cocoordinator)
		
										{{ $cocoordinator->student_phone_no}}
												@endforeach
<!-- </td> --></font></font>
																		</div></div></div>
									<br/>
									<!-- <div class="col s12 m12 l12 center">
									<a class="waves-effect waves-light light-blue darken-3 btn">Club Members</a>
									</div>

									 -->

									 <div class="col s12 m12 l12">
									<div class="col s12 m12 l12 center">
									<h5>Club Members</h5>
									</div>
									<br/><br/>
									<table>
									<thead>
									<tr>
									<th style="width: 10%;"><b>S.No.</b></th>
									
									<th style="width: 20%;"><b>Member Name</b></th>
									<th style="width: 15%;"><b>Roll No </b></th>
									<th style="width: 15%;"><b>Branch</b></th>
									<th style="width: 15%;"><b>Contact No</b></th>
									
									</tr>
									</thead>
									<tbody>
									@foreach($members as $member)
		
									<tr>
									<td>1</td>
									<td><div>
										{{ $member->name}}
												</div></td>
									<td><div>
										{{ $member->roll_no}}
												</div></td>
									<td><div>
										{{ $member->branch}}
												</div></td>
									<td><div>
										{{ $member->student_phone_no}}
												</div></td>
									</tr>
									@endforeach

									</tbody>
									</table>
									
									
									
									
									</div>
									
									</div>
							
									<div class="col s12 m4 l4">
									<div class="col s12 m12 l12 center">
									<h5>Club Activity Calender</h5>
									</div>
									<br/><br/>
									<table>
									<thead>
									<tr>
									<th style="width: 15%;"><b>S. No.</b></th>
									
									<th style="width: 20%;"><b>Activity</b></th>
									
									</tr>
									</thead>
									<tbody>
									<?php $i=1 ?>
									@foreach($activities as $activity)
		
									<tr>
									<td>{{ $i++ }}</td>
									<td><div>
										{{ $activity-> activity_name}}
												</div></td>
									</tr>
									@endforeach
									</tbody>
									</table>
									
									
									
									
									</div>


									</div>

									
									
									
									
									
									


@stop