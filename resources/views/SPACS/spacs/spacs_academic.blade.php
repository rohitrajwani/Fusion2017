<?php
$scholarship_id=$_GET['id'];
?>
@extends('layout')
@section('SPACS_content')
			<div class="main-container row">
				
				<h4 class="col s12 m8 offset-m2">ACADEMIC PRIZES</h4></br>
				<br><br><br><br>
				
				

				<div class="container" style="width:90%">
					<div class="section col s12">
					<br><br>
<h6><i>Computer Science and Engineering</i></h6>
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
   @foreach($ac_winner_cse as $ac_winner_cse)
      <tr>
        <td>{{$ac_winner_cse->roll_no}}</td>
        <td>{{$ac_winner_cse->name}}</td>
        <td>{{$ac_winner_cse->cpi}}</td>
       <?php
		$student_id=$ac_winner_cse->student_id;
		?>
		<td><form method="POST" action="/SPACS/acad_announce/{{$scholarship_id}}/{{$student_id}}">
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
<h6><i>Electronics and Communication Engineering</i></h6>
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
   @foreach($ac_winner_ece as $ac_winner_ece)
      <tr>
        <td>{{$ac_winner_ece->roll_no}}</td>
        <td>{{$ac_winner_ece->name}}</td>
        <td>{{$ac_winner_ece->cpi}}</td>
       <?php
		$student_id=$ac_winner_ece->student_id;
		?>
		<td><form method="POST" action="/SPACS/acad_announce/{{$scholarship_id}}/{{$student_id}}">
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
<h6><i>Mechanical Engineering</i></h6>
<table class="bordered highlight">
    <thead><tr>
          <th>Roll No</th>
          <th>Name</th>
		  <th>CPI</th>
		  <th>Finalise</th>
      </tr>
    </thead>
    <tbody>
   @foreach($ac_winner_me as $ac_winner_me)
      <tr>
        <td>{{$ac_winner_me->roll_no}}</td>
        <td>{{$ac_winner_me->name}}</td>
        <td>{{$ac_winner_me->cpi}}</td>
       <?php
		$student_id=$ac_winner_me->student_id;
		?>
		<td><form method="POST" action="/SPACS/acad_announce/{{$scholarship_id}}/{{$student_id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="waves-effect btn">Finalise</button>
  

         </form>
</td></tr>
@endforeach
      
    </tbody>
</table>
						<br>
						<br>
					</div>
				</div>
			</div>
			
	@stop	