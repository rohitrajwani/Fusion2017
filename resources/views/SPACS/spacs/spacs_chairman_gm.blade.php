<?php
$scholarship_id=$_GET['id'];
?>
@extends('layout')
@section('content')
			
			<div class="main-container row">
				
				<h4 class="col s12 m8 offset-m2">Chairman gold Medal</h4></br>
				<br><br><br><br>
				
				

				<div class="container" style="width:90%">
					<div class="section col s12">
					<br><br>
						
<table class="bordered highlight">
    <thead>
      <tr>
          <th>Roll No</th>
          <th>Name</th>
		  <th>CPI</th>
		  <th>Finalise</th>
      </tr>
    </thead>
    <tbody>
   @foreach($ch_winner as $ch_winner)
      <tr>
        <td>{{$ch_winner->roll_no}}</td>
        <td>{{$ch_winner->name}}</td>
        <td>{{$ch_winner->cpi}}</td>
       <?php
		$student_id=$ch_winner->student_id;
		?>
		<td><form method="POST" action="/SPACS/chair_announce/{{$scholarship_id}}/{{$student_id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <button type="submit" class="waves-effect btn">Finalise</button>


      
         </form>
</td>
      </tr>
@endforeach
      
    </tbody>
</table>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
					</div>
				</div>
			</div>
@stop			
	
