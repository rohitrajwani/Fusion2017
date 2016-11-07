<?php
$student_id=$_GET['student_id'];
$scholarship_id=$_GET['scholarship_id'];
?>
@extends('layout')
@section('content')
        <div class="main-container row">
            <h4 class="col s12 m8 offset-m2">MCM VERIFICATION</h4><br><br><br><br><br><br><br><br>
            <div class="container" style="width:90%">
          <div class="section col s12">
           <br><br>
          
            
<table class="bordered highlight">
    <thead>
      <tr>
         <th>S.No</th>
          <th>FORM</th>
          
          <th>STATUS</th>
               </tr>
    </thead>
    <tbody><form method="POST" action="/SPACS/staff_verify/{{$student_id}}/{{$scholarship_id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <tr>
       <td>1</td>
        <td>FORM A/B/C</td>
        
        <td> <p><input type="radio" id="test1"  name="declare1" value="declare1" />
    <label for="test1"></label></td>
        </p>
       </tr>
      <tr>
      <td>2</td>
        <td>CASTE CERTIFICATE</td>
        
         <td><p> <input type="radio" id="test2"  name="declare2" value="declare2" />
    <label for="test2"></label></td> 
        </p></tr>
    </tbody>
</table>
        <center>
           <?php
   $medal34=DB::table('awards_applications')->where([['scholarship_id',$scholarship_id],['student_id',$student_id],])->get();
   ?>
   @if($medal34[0]->status=='Verified'|| $medal34[0]->status=='Finalised')
   <p>Verified</p>
   @endif
   @if($medal34[0]->status!='Verified'&& $medal34[0]->status!='Finalised')
   
        <button class="waves-effect btn" type="Submit"  />Submit</button>
        @endif


         </center></form>
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
      
                  <!----  <table class="bordered highlight" >
    <thead>
      <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>Roll No</th>
          <th>Category</th>
          <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      </tr>
      <tr>
         <td>1</td>
        <td>Alvin</td>
        <td>1235</td>
        <td>OBC</td>
        <td><a href="obc_sc_st_verification" class="waves-effect btn">Verify</a></td>
      </tr>
      
    </tbody>
</table>
                    
                   
                    
                      
                    
                     
                   
                    
              
            </div>
        </div>
        
        <script src="js/jquery-3.1.1.min.js"></script>
        <!--Import jQuery before materialize.js-->
    @stop