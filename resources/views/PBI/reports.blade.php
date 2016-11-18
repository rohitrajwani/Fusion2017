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
                              <li><a href='/PBI/Home'>Home</a></li>
                    <li><a href="/PBI/pbi_topics">PBI Topics</a></li>
                   <li><a href="/PBI/viewgrades">View Grades</a>
            <li><a href="/PBI/studentguidelines">Guidelines</a></li>
                    <li><a href="/PBI/reports">Submit Report</a></li>
                   <li><a href="/PBI/view_marks">View Marks</a>
                             <li><a href="/PBI/viewschedule">View Schedule</a>

           <li><a href="/PBI/feedback">Feedback</a></li>
                    
                            
                            </ul>
                          </div>
                        </nav> 
                    </div><div class="row">
<p><br><br></p>
<h4> <center>Upload Report</center></h4>
<form action="/PBI/uploadreport" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}">

          


          


        <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="faculty_name">
          <label for="email">Faculty Incharge</label>
        </div>
       <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="type">
          <label for="email">Type of Report(choose:MIDterm,INTERIM,ENDterm):</label>
        </div>

			<div class="input-field col s12">
    
    <div class="file-field input-field">
      <div class="btn">


        <span><h6>Choose a File</h6></span>
        <input type="file" multiple name="reports">
		
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload one or more files" name="report">
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
  </div>
  </div>
  </div>
 @stop