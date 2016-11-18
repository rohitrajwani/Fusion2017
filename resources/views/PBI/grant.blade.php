@extends('layout')

@section('main_content')
 <h5 class="col s12 m4 offset-m4"><b>PROJECT BASED INTERNSHIP</b></h5>
            <div class="container col s12 ">
               
                    
                
                <div class="section col s12">

                    <div class="col s12 m12">
                        <!-- Dropdown Structure -->
                        
                        <nav class="mynav">
                          <div class="nav-wrapper">
                      <ul>
                        <li><a href="/PBI/welcome_faculty">Home</a></li>
                    
                    <li><a href="/PBI/uploadtopic1">Upload PBI Topic</a></li>
                   
            <li><a href="/PBI/facultyguidelines">Guidelines</a></li>
                    <li><a href="/PBI/viewreport">View Reports</a></li>
                                        <li><a href="/PBI/viewschedule">View Schedule</a></li>

                   <li><a href="/PBI/marks">Upload Marks</a>
                   <li><a href="/PBI/grades">Upload Grades</a>
                         
                          <li><a href="/PBI/feedbackfaculty">Feedback</a></li>
             
                  </ul>
                     </div>
                        </nav> 
                  </div>

			    <div class="row">
        <div class="col m12"><br><br>
<h4>Student Id {{$student_id}}</h4>
<h5><b>Roll no:</b> {{$student_id}}</b> </h5><br>
<h5><b>Faculty Name: </b> {{$faculty_name}} </h5><br>
<h5><b>PBI NAME </b> {{$pbi_name}} </h5><br>
<h5><b>TYPE </b> {{$type}} </h5><br>
<h5><b>MENTOR_INFO </b> {{$mentor_info}} </h5><br>

</div>
<div class="row">
<div class="col m3  offset-m2">
<form action= "/PBI/Accept/{{$student_id}}" method="POST">

<input type="hidden" name="_token" value="{{ csrf_token()}}">
					 <button type="submit" class="waves-effect waves-light btn-large" name="accept">Accept</button>
</form>
</div>
<div class="col m3 offset-m1">
<form action= "/PBI/Decline/{{$student_id}}" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token()}}">
					 <button type="submit" class="waves-effect waves-light btn-large" name="decline"> Decline</button>
</form>
</div>
</div>
 </div>
				
				
@stop
