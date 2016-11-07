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
                  <ul class="side-nav" id="mobile-demo">
             
                     <li><a href="#">Home</a></li>
                    
                    <li><a href="uploadtopic1">Upload PBI Topic</a></li>
                   
            <li><a href="guidelines">Guidelines</a></li>
                    <li><a href="viewreport">ViewReports</a></li>
                   <li><a href="marks">Upload Marks</a>
                   <li><a href="grades">Upload Grades</a>
           <li><a href="feedback">Feedback</a></li>
                  </ul>
                          </div>
                        </nav> 
                    </div>
        
        <div class="row">
            <h4 class="col s12 m6 offset-m3">Upload PBI Topic</h4>
            <div class="container" style="width:90%"><div class="row">
			</div>

      <form action="/PBI/upload_topic" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}">
			<div class="main-container row">
            <h6 class="col s12 m3"><b>PBI TOPIC</b></h6>
			<div class="input-field col s6">
      <input placeholder="" id="first_name" type="text" name="pbi_topic" class="validate">
      <label for="first_name"></label>
</div>
</div>
<div class="main-container row">
            <h6 class="col s12 m3"><b>PBI Description</b></h6>
			<div class="input-field col s6">
      <input placeholder="" id="first_name" type="text" name="des" class="validate">
      <label for="first_name"></label>
</div>
</div>
</div>
	<div class="row">
	  <div class="col s12 offset-m5 m3">
	    <button type="submit" class="waves-effect btn col" name="submit"> SUBMIT</button>
	  </div>
	  <div class="row">
    </form>
  </div>
  </div>
 @stop