<?php
$user_id=Auth::user()->username;
?>
@extends('layout')
@section('content')
			
			<div class="main-container row">
				<h4 class="col s12 m8 offset-m2">Summary</h4></br>
				<br><br><br>
				<a href="/SPACS/user_summarycurrent" class="waves-effect btn">CURRENT</a>
				<a href="/SPACS/user_summaryprevious" class="waves-effect btn">PREVIOUS</a>
				<br><br>
				
				<br><br>
				<h5 ><i>Scholarships</i></h5>
				
				<div class="container" style="width:90%">
					<div class="section col s12">
			
					<?php
							$i=1;

							$now = Carbon\Carbon::now();
      						$batch=$now->year;
							$result=DB::table('awards_applications')->join('medals_awards_scholarship','medals_awards_scholarship.scholarship_id','=','awards_applications.scholarship_id','inner')->where([['student_id',$user_id],['type','scholarship'],])->max('end_date');
				 			$time = date_create($result);
							$results=date_format($time, 'Y');
							
							$difference=$batch-$results;
							if($difference==0){
							$result1=DB::table('awards_applications')->join('medals_awards_scholarship','medals_awards_scholarship.scholarship_id','=','awards_applications.scholarship_id','inner')->where([['student_id',$user_id],['type','scholarship'],['end_date',$result],])->get();
							}
			
						?>					


<table class="bordered highlight">
    <thead>
      <tr>
          <th>S.No</th>
          <th>Scholarship Name</th>
          
		  <th>Last Action on</th>
		  <th>Status</th>
      </tr>
    </thead>
    <tbody>
    @if($difference==0)
    @foreach($result1 as $a)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$a->title}}</td>
        
		<td>{{$a->submitted_timestamp}}</td>
		<td>{{$a->status}}</td>
      </tr>
    @endforeach
     @endif
    </tbody>
</table>

						
						<br><br><br>
					</div>
				</div>
				
						
					</div>
				</div>
			</div>
@stop