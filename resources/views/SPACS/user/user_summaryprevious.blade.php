<?php
$user_id=Auth::user()->username;//$_SESSION('user_id');
?>
@extends('layout')
	@section('SPACS_content')
			
			<div class="main-container row">
				<h4 class="col s12 m8 offset-m2">Summary</h4></br>
				<br><br><br><br><br><br>
				<a href="/SPACS/user_summarycurrent" class="waves-effect btn">CURRENT</a>
				<a href="/SPACS/user_summaryprevious" class="waves-effect btn">PREVIOUS</a>
				<br><br>
				
				<h4 ><i>Scholarships</i></h4>
				</br></br>
				<div class="container" style="width:90%">
					<div class="section col s12">
						<br><br>
				<?php
							$i=1;
							$now = Carbon\Carbon::now();
      						$batch=$now->year;
							$result=DB::table('awards_applications')->join('medals_awards_scholarship','medals_awards_scholarship.scholarship_id','=','awards_applications.scholarship_id','inner')->where([['student_id',$user_id],['type','scholarship'],])->max('end_date');
							$time=date_create($result);
							$results=date_format($time,'Y');
							$difference=$batch-$results;
							
								$result2=DB::table('awards_applications')->join('medals_awards_scholarship','medals_awards_scholarship.scholarship_id','=','awards_applications.scholarship_id','inner')->where([['student_id',$user_id],['type','scholarship'],])->whereNotIn('end_date',[$result])->get();
							
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
    @foreach($result2 as $a)
	   
	      	<tr>
	        	<td>{{$i++}}</td>
	        	<td>{{$a->title}}</td>

				<td>{{$a->submitted_timestamp}}</td>
				<td>{{$a->status}}</td>
	     	 </tr>
     
    @endforeach
     
    </tbody>
</table>


						
						<br><br><br>
					</div>
				</div>

						<?php
							$j=1;
							$results1=DB::table('awards_applications')->join('medals_awards_scholarship','medals_awards_scholarship.scholarship_id','=','awards_applications.scholarship_id','inner')->where([['student_id',$user_id],['type','medal'],['title','Notional Prizes and Certificate of Merit'],])->get();
						?>
				<h4 ><i>Medals/Prizes</i></h4>
				</br></br>
				<div class="container" style="width:90%">
					<div class="section col s12">
						<br><br>
						<table class="bordered highlight">
    <thead>
      <tr>
          <th>S.No</th>
          <th>Medal Name</th>
          <th>Year</th>
      </tr>
    </thead>
    <tbody>
    @foreach($results1 as $a)
      <tr>
        <td>{{$j++}}</td>
        <td>{{$a->title}}</td>

        <td>{{$a->end_date}}</td>
	  </tr>
    @endforeach
     
    </tbody>
</table>

			<br><br><br>
						
					</div>
				</div>
			</div>
			
@stop			