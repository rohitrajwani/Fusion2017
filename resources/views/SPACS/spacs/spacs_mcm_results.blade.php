@extends('layout')
@section('SPACS_content')
			<div class="main-container row">
				<h4 class="col s12 m8 offset-m2">MCM SCHOLARSHIP</h4></br>
				<br>
				<br><br><br><br><br>
				<h5 class="col s12 m6">MCM APPLICANTS</h5>
				</br></br>
		<?php 

		  $batch_year3=$_GET['batch_year2'];
		  $scholarship_id=$_GET['id']; 
		  $mcm_count=$_GET['mcm_count']; 
		  $batch_count=0;
		  $batch=DB::table('student')->where('batch',$batch_year3)->count();
		   $twentyfive_per=0.25*$batch_count;
		   $twentyfive_per=$twentyfive_per+1;
	
			$twentyfive_per = number_format($twentyfive_per, 0, '.', '');
						 $i=0;
		 ?>
			
			
		

				<div class="container" style="width:90%">
					<div class="section col s12">
					<br><br>
					
@if($twentyfive_per>$mcm_count)

	<?php			$mcm_result= DB::table('awards_applications')->join('student','student.student_id','=','awards_applications.student_id','inner')->where([['student.batch',$batch_year3],['awards_applications.scholarship_id',$scholarship_id],['awards_applications.status','Verified'],])->orWhere([['student.batch',$batch_year3],['awards_applications.scholarship_id',$scholarship_id],['awards_applications.status','Finalised'],])->orderBy('cpi','desc')->get(); 
?>
									
<table class="bordered highlight">
    <thead>
      <tr>
          <th>S.No</th>
          <th>RollNo</th>
          <th>Name</th>
          <th>CPI</th>
		  <th>Annual Income</th>
		  <th>Declare</th>
      </tr>
    </thead>
    <tbody>
      @for($j=0;$j<$mcm_count;$j++)
      <tr>
      	<td>{{$j+1}}</td>
        <td>{{$mcm_result[$j]->roll_no}}</td>
        <td>{{$mcm_result[$j]->name}}</td>
		<td>{{$mcm_result[$j]->cpi}}</td>
		<td>{{$mcm_result[$j]->tot_an_inc_p}}</td>
		<?php
		$student_id=$mcm_result[$j]->student_id;
		?>
		<td><form method="POST" action="/SPACS/mcm_announce/{{$scholarship_id}}/{{$student_id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <?php
   $medal34=DB::table('awards_applications')->where([['scholarship_id',$scholarship_id],['student_id',$student_id],])->get();
   ?>
   @if($medal34[0]->status=='Finalised')
   <p>FINALISED</p>
   @endif
   @if($medal34[0]->status!='Finalised')
   


      <button type="submit" class="waves-effect btn">Finalise</button>
        @endif
         </form>
</td>
      </tr>
     @endfor
     </tbody>
</table>
@endif
@if($twentyfive_per<=$mcm_count)

	<?php			$mcm_result= DB::table('awards_applications')->join('student','student.student_id','=','awards_applications.student_id','inner')->where([['student.batch',$batch_year3],['awards_applications.scholarship_id',$scholarship_id],['awards_applications.status','Verified'],])->orWhere([['student.batch',$batch_year3],['awards_applications.scholarship_id',$scholarship_id],['awards_applications.status','Finalised'],])->orderBy('cpi','desc')->get(); 
?>
									
<table class="bordered highlight">
    <thead>
      <tr>
          <th>S.No</th>
          <th>RollNo</th>
          <th>Name</th>
          <th>CPI</th>
		  <th>Annual Income</th>
		  <th>Declare</th>
      </tr>
    </thead>
    <tbody>
      @for($j=0;$j<$twentyfive_per;$j++)
      <tr>
      	<td>{{$j+1}}</td>
        <td>{{$mcm_result[$j]->roll_no}}</td>
        <td>{{$mcm_result[$j]->name}}</td>
		<td>{{$mcm_result[$j]->cpi}}</td>
		<td>{{$mcm_result[$j]->tot_an_inc_p}}</td>
     <?php
		$student_id=$mcm_result[$j]->student_id;
		?>
		<td><form method="POST" action="/SPACS/mcm_announce/{{$scholarship_id}}/{{$student_id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <?php
   $medal34=DB::table('awards_applications')->where([['scholarship_id',$scholarship_id],['student_id',$student_id],])->get();
   ?>
   @if($medal34[0]->status=='Finalised')
   <p>Announced</p>
   @endif
   @if($medal34[0]->status!='Finalised')
   

      <button type="submit" class="waves-effect btn">Finalise</button>
        @endif

         </form>
</td>
      </tr>
     @endfor
     </tbody>
</table>
@endif

					<br><br><br>
					</div>@stop
					<!---
					<div class="section col s12">
					<br><br>
					
						
<table class="bordered highlight">
    <thead>
      <tr>
          <th>Student Id</th>
          <th>RollNo</th>
          <th>Name</th>
          <th>CPI</th>
		  <th>Annual Income</th>
	      </tr>
    </thead>

    <tbody>
      <tr>
        <td>1</td>
        <td>2014194</td>
        <td>Jellybean</td>
		<td>9.5</td>
		<td>2014194@gmail.com</td>
		
      </tr>
          </tbody>
</table>
					<div class="button_container col s12 m12 offset-m4">
                        <br><br><br>                    
            <a href="spacs_mcm_winners"class="waves-effect btn">TutionWaivie Results</a>
            </div>
					</div>
				</div>
			</div>
			
			<script src="js/jquery-3.1.1.min.js"></script>
	*/
