<?php
	$batch_year=$_GET['batch_year'];
	$id=$_GET['id'];
?>
@extends('layout')
@section('SPACS_content')			
			<div class="main-container row">
				
				<h4 class="col s12 m8 offset-m2"> Details</h4></br>
				<br><br><br><br>
				<?php
					$array_2015=DB::table('student')->where('batch',$batch_year)->count();
					$seven_per=0.07*$array_2015;
					$seven_per=$seven_per+1;
					$seven_per = number_format($seven_per, 0, '.', '');
						$result=DB::table('student')->where('batch',$batch_year)->orderBy('cpi','DESC')->get();

				?>
				

				<div class="container" style="width:90%">
					<div class="section col s12">
					<br><br>
<h5><i>{{$batch_year}} Notional Prize Winner</i></h5>
<table class="bordered highlight">
    <thead>
      <tr>
          <th>Roll No</th>
          <th>Name</th>
		  <th>CPI</th>
		  <th>Declare</th>
      </tr>
    </thead>
    <tbody>
   	 @for($j=0;$j<$seven_per;$j++)
   	 <?php
   	 $array[$j]=$result[$j]->student_id;
   	 ?>
     
      <tr>
        <td>{{$result[$j]->roll_no}}</td>
        <td>{{$result[$j]->name}}</td>
        <td>{{$result[$j]->cpi}}</td>
       <td>
       <?php
					$student_id=$result[$j]->student_id;
					?>
    <form method="GET" action="/SPACS/spacs_not_fir_winners/{{$student_id}}/{{$id}}">
    <input type="hidden" name="_token" value="{{csrf_token()}} ">
   
				<button class="waves-effect btn" type="Submit"  />Announce</button>
   


	</form>
            </td>
      </tr>
	@endfor    
    </tbody>
</table>
					<br><br><br>
				</div>
			</div></div>
			
	@stop