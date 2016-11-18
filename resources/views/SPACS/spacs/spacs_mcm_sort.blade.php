@extends('layout')
@section('SPACS_content')
			<?php
		  $batch_year1=$_GET['batch_year'];	
		  $scho_id=$_GET['id']; 
		

$mcm_sort= DB::table('awards_applications')->join('student','student.student_id','=','awards_applications.student_id','inner')->where([['student.batch',$batch_year1],['awards_applications.scholarship_id',$scho_id],['awards_applications.status','Verified'],])->orderBy('cpi','desc')->get(); 
$i=0;

?> 
	<div class="main-container row">
				<h4 class="col s12 m8 offset-m2">MCM SCHOLARSHIP</h4></br>
				<br>
				<br>
				<h6 class="col s12 m6">MCM {{$batch_year1}} APPLICANTS:</h6>
				</br></br>
				<div class="container" style="width:90%">
					<div class="section col s12">
					<br><br>
					
						
<table class="bordered highlight">
    <thead>
      <tr>
       <th>S.No</th>
          <th>Student Id</th>
           <th>Roll no</th>
  			<th>Name</th>
          <th>CPI</th>
		  <th>Annual Income</th>
      </tr>
    </thead>
    <tbody>
    @foreach($mcm_sort as $a)
      <tr>
      	<td>{{++$i}}</td>
        <td>{{$a->student_id}}</td>
        <td>{{$a->roll_no}}</td>
		<td>{{$a->name}}</td>
		<td>{{$a->cpi}}</td>
		<td>{{$a->tot_an_inc_p}}</td>
      </tr>
     @endforeach
      
    </tbody>
 
</table>
						<br>
						<br>
					<div class="button_container col s12 m12 offset-m4">
                        <br>                 
            <a href="spacs_mcm_results?batch_year2= {{ $batch_year1 }}&id={{$scho_id}}&mcm_count={{$i}}" class="waves-effect btn">Sort List</a>
            </div>
					</div>
				</div>
			</div>
	
    @stop	