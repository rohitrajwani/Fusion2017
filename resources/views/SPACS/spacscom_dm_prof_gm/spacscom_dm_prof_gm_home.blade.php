@extends('layout')
@section('content')
			<div class="main-container row">
				<h4 class="col s12 m8 offset-m2 ">D & M PROFICIENCY GOLD MEDAL</h4></br>
				<br>
				<br><br><br><br><br>
				<h6 class="col s12 m6">D & M PROFICIENCY GOLD MEDAL APPLICANTS</h6>
				</br></br>
				<div class="container" style="width:90%">
					<div class="section col s12">
					<br><br>
					 <?php $medal02=DB::table('medals_awards_scholarship')->where('title','D&M Proficiency Gold Medal ')->max('end_date');
        $medal2=DB::table('medals_awards_scholarship')->where([['end_date',$medal02],['title','D&M Proficiency Gold Medal '],])->get();
        $scholarship_id=$medal2[0]->scholarship_id;
        $medal3=DB::table('awards_applications')->where([['scholarship_id',$medal2[0]->scholarship_id],])->get();
        
           ?>	
						
<table class="bordered highlight">
    <thead>
      <tr>
          <th>S.No</th>
          <th>RollNo</th>
          <th>Name</th>
          <th>Marks Obtained</th>
          <th>Docs Details</th>
		  <th>Details</th>
		  
		  <th>Verify</th>
      </tr>
    </thead>
    <tbody>
     <?php $i=1 ?>
    @foreach($medal3 as $a)
   
      <tr>
        <td>{{$i++}}</td>
        <?php
        $student_id=$a->student_id;
        $student=DB::table('student')->where('student_id',$student_id)->get();
        $rollno=$student[0]->roll_no;
        $category=$student[0]->category;
        $name=$student[0]->name;
       ?>
       
        <td>{{$rollno}}</td>
        <td>{{$name}}</td>
		<td>	
						<div class="input-field col s4">
						<form method="POST" action="/SPACS/dm_prof_gm_m/{{$scholarship_id}}/{{$student_id}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" >
    @if($a->marks==NULL)
        <input  name="marks" type="number" class="validate" >
    @endif
    @if($a->marks!=NULL)
        {{$a->marks}}
    @endif
</td>
    <td><a href="/SPACS/spacscom_dm_prof_gm_docs?student_id={{$student_id}}" target="_blank" > View Details</a></td>
		<td><a href="/SPACS/spacscom_dm_prof_gm_form?student_id={{$student_id}}&id={{$scholarship_id}}" target="_blank" > View Details</a></td>
		
		@if($a->marks==NULL)
    <td><button class="waves-effect btn" type="submit" />Submit<button></td>
@endif

@if($a->marks!=NULL)
  <td>Submitted</td>
@endif
</form>      
</div>				
	
      </tr>
       @endforeach
      </tbody>
</table>
						<br>
						<br>
						<br>
					<div class="button_container col s12 m12 offset-m4">
                                     
           
            </div>
					</div>
				</div>
			</div>
			
		@stop