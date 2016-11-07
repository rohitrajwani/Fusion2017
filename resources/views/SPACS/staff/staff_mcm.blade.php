@extends('layout')
@section('content')
          <?php
     $batch_year=$_GET['batch_year'];
$scholarship_id=$_GET['id'];
$applications= DB::table('awards_applications')->join('student','student.student_id','=','awards_applications.student_id','inner')->where([['student.batch',$batch_year],['awards_applications.scholarship_id',$scholarship_id],])->orderBy('cpi','desc')->get(); 
$i=0;

?> 
        
        <div class="main-container row">
            <h4 class="col s12 m8 offset-m2">MCM SCHOLARSHIPS</h4><br><br><br>
            <br>
        <h6 class="col s12 m6">MCM {{$batch_year}} APPLICANTS:</h6>
        </br>
            <div class="container" style="width:90%">
          <div class="section col s12">
        
          
     
            
<table class="bordered highlight">
    <thead>
      <tr>
         <th>S.No</th>
          <th>Name</th>
          <th>Roll No</th>
          <th>Category</th>
          <th>View Details</th>
          <th>Status</th>
      </tr>
    </thead>
    <tbody>
     <tr>
      @foreach($applications as $a)
       <td>{{++$i}}</td>
        <td>{{$a->name}}</td>
        <td>{{$a->roll_no}}</td>
        <td>{{$a->category}}</td>
        <td><a href="/SPACS/staff_view_form?scholarship_id={{$scholarship_id}}&student_id={{$a->student_id}}" target="_blank">View Details</a></td>
        <td>
           <?php
           $student_id=$a->student_id;
   $medal34=DB::table('awards_applications')->where([['scholarship_id',$scholarship_id],['student_id',$student_id],])->get();
   ?>
   @if($medal34[0]->status=='Verified'||$medal34[0]->status=='Finalised')
   <p>Verified</p>
   @endif
   @if($medal34[0]->status!='Verified'&& $medal34[0]->status!='Finalised')
   
<a href="/SPACS/staff_verify_form?student_id={{$a->student_id}}&scholarship_id={{$scholarship_id}}" target="_blank" class="waves-effect btn">Verify</a></td>
        
        @endif
     
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
      @stop