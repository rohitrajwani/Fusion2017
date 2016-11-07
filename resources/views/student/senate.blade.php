@extends('studentlayout')
@section('name')

	{{ $name}}
@stop

@section('content')
<div class="col s12 m12 l12 center">
							<h4> Students Senate </h4>
											<div class="divider"></div>
				
							</div>
				
							<div class="row">
					<div class="col s12 m12 l8">
							<div class="col s12 m12 l12 center">
							<h5> Students Senate Members </h5>
							</div>
						<table class="bordered highlight">
										<thead>
										<tr>
										<th style="width: 5%;" >S.No.</th>
										<th style="width: 25%">Name</th>
										<th style="width: 20%">Roll No.</th>
										<th style="width: 20%">Contect Number</th>
										<th style="width: 30%">Responsibility</th>
										</tr>
										</thead>
										<tbody>
										<?php $i=1 ?>
										@foreach($senate as $senate)
		
										<tr>
										<td>{{ $i++ }}</td>
										<td><div>
										{{ $senate->name}}
												</div>
										</td>
										<td><div>
										{{ $senate->roll_no}}
												</div>
										 </td>
										<td><div>
										{{ $senate->student_phone_no}}
												</div>
										</td>
										<td><div>
										{{ $senate->responsibility}}
												</div>
										</td>
										</tr>
											@endforeach

										</tbody>
										</table>
							
				 
	  </div>
	  
	  <div class="col s12 m12 l4">
							<div class="col s12 m12 l12 center">
							<h5> Students Senate Meeting Minutes</h5>
							</div><br/><br/>
				@foreach($meetings as $meeting)
				
				<div class="card light-blue darken-4">
            <div class="card-content white-text">
             <!-- <span class="card-title">Student Senate Meating 11/10/2016</span>
             -->
			 <p></b><h5>Student Senate Meeting</h5> 
			 									<div>
										{{$meeting->timestamp}}
												</div>
										 </b></p>

										
										 

			 </div>
            <div class="card-action">
             	 <a href="http://{{$meeting->agenda}}" target="_blank">Agenda Of Meeting</a>
              	<a href="http://{{$meeting->minutes}}" target="_blank">Minutes Of Meeting</a>
             

          
				</div>
				</div>
				@endforeach

<!--	  <div class="card light-blue darken-4">
            <div class="card-content white-text">
             <!-- <span class="card-title">Student Senate Meating 11/10/2016</span>
             -->
			<!-- <p></b>Student Senate Meeting 15/05/2016</b></p>
			 </div>
            <div class="card-action">
              <a href="#">Agenda Of Meeting</a>
              <a href="#">Minutes Of Meeting</a>
            
          
				</div>
				</div>-->
	  </div>
	  </div>
	  		
@stop	  		