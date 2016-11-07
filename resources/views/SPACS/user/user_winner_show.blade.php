<?php
					$i=1;
					?>
@extends('layout')
@section('content')
			<div class="main-container row">
				<h4 class="col s12 m8 offset-m2">Winners</h4></br>
				</br></br>
				<div class="container" style="width:90%">
					<div class="section col s12">
					<br><br>
						
				<h5 class="col s12 m2">MEDALS/PRIZES</h5>
				</br></br>
				<div class="container" style="width:100%">
					<div class="section col s12"><br><br>

					
		</form><br><br>
<table class="bordered highlight">
    <thead>
      <tr>
          <th>S.No</th>
          <th>Name</th> 
          <th>RollNo</th>
          <th>Branch</th>
          <th>Medal Name</th>
          <th>Year</th>
      </tr>
    </thead>
    <tbody>
    @foreach($result as $a)
      <tr>
        <td>{{$i++}}</td>
        <?php
        $ids=$a->student_id;
        $student=DB::table('student')->where('student_id',$ids)->get();
        ?>
        <td>{{$student[0]->name}}</td>
        <td>{{$student[0]->roll_no}}</td>
        <td>{{$student[0]->branch}}</td>
        <td>{{$a->title}}</td>
        <td>{{$year}}</td>
      </tr>
      @endforeach
      </tbody>
</table>		<br><br>		
					</div>
				</div>
			</div>
		
@stop