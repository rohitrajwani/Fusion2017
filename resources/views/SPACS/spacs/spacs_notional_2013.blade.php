<?php
	$batch_year=$_GET['batch_year'];
	$id=$_GET['id'];
?>
@extends('layout')
			@section('SPACS_content')
			<div class="main-container row">
				
				<h4 class="col s12 m8 offset-m2">Notional Prize Winners Details</h4></br>
				<br><br><br><br>
				<?php
					$array_2015=DB::table('student')->where([['batch',$batch_year],['branch','CSE'],])->count();
					$seven_per=0.07*$array_2015;
					$seven_per=$seven_per+1;
					$seven_per = number_format($seven_per, 0, '.', '');
					$array_students=DB::table('student')->where([['batch',$batch_year],['branch','CSE'],])->orderBy('CPI','DESC');
					$result=DB::table('student')->where([['batch',$batch_year],['branch','CSE'],])->orderBy('CPI','DESC')->limit($seven_per);

				?>
				

				<div class="container" style="width:90%">
					<div class="section col s12">
					<br><br>
<h2><i>{{$batch_year}} Computer Science and Engineering</i></h2>
<table class="bordered highlight">
    <thead>
      <tr>
          <th>Student ID</th>
          <th>Name</th>
		  <th>CPI</th>
      </tr>
    </thead>
    <tbody>
   	@foreach($result as $a)
      <tr>
        <td>{{$a[0]->student_id}}</td>
        <td>{{$a[0]->name}}</td>
        <td>{{$a[0]->CPI}}</td>
       
      </tr>
	@endforeach     
    </tbody>
</table>

					<br><br>
					<?php
					$array1_2015=DB::table('student')->where([['batch',$batch_year],['branch','ECE'],])->count();
					$seven1_per=0.07*$array1_2015;
					$seven1_per=$seven1_per+1;
					$seven1_per = number_format($seven1_per, 0, '.', '');
					$array1_students=DB::table('student')->where([['batch',$batch_year],['branch','ECE'],])->orderBy('CPI','DESC');
					$result1=DB::table('student')->where([['batch',$batch_year],['branch','ECE'],])->orderBy('CPI','DESC')->limit($seven1_per);

				?>
<h2><i>{{$batch_year}} Electronics and Communication and Engineering</i></h2>
<table class="bordered highlight">
    <thead>
      <tr>
          <th>Roll No</th>
          <th>Name</th>
		  <th>CPI</th>
      </tr>
    </thead>
    <tbody>
   	@foreach($result1 as $a)
      <tr>
        <td>{{$a[0]->student_id}}</td>
        <td>{{$a[0]->name}}</td>
        <td>{{$a[0]->CPI}}</td>
       
      </tr>
	@endforeach     
    </tbody>
</table>

<br><br>
					<?php
					$array10_2015=DB::table('student')->where([['batch',$batch_year],['branch','ME'],])->count();
					$seven10_per=0.07*$array10_2015;
					$seven10_per=$seven10_per+1;
					$seven10_per = number_format($seven10_per, 0, '.', '');
					$array10_students=DB::table('student')->where([['batch',$batch_year],['branch','ME'],])->orderBy('CPI','DESC');
					$result10=DB::table('student')->where([['batch',$batch_year],['branch','ECE'],])->orderBy('CPI','DESC')->limit($seven10_per);

				?>
<h2><i>{{$batch_year}} Mechanical Engineering</i></h2>
<table class="bordered highlight">
    <thead>
      <tr>
          <th>Student ID</th>
          <th>Name</th>
		  <th>CPI</th>
      </tr>
    </thead>
    <tbody>
   	@foreach($result10 as $a)
      <tr>
        <td>{{$a[0]->student_id}}</td>
        <td>{{$a[0]->name}}</td>
        <td>{{$a[0]->CPI}}</td>
       
      </tr>
	@endforeach     
    </tbody>
</table>

					
				</div>
			</div></div>

@stop
