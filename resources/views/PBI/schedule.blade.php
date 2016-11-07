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
                                <li><a href='/PBI/welcome_chairman'>Home</a></li>
             
                   <li><a href="/PBI/viewgrades_chair">View Grades</a>
            <li><a href="/PBI/chairmanguidelines">Guidelines</a></li>
                    <li>
          <a class="dropdown-button" href="#!" data-activates="dropdown1">
              Search
              <i class="fa fa-arrow-down right"></i>
          </a>
          <ul id="dropdown1" class="dropdown-content">
  <li><a href="/PBI/student_list">Student List</a></li>
  <li><a href="/PBI/faculty_list">Faculty List</a></li>

</ul>
      </li>
                    <li><a href="/PBI/viewreport_chair">View Report</a></li>
                     <li><a href="/PBI/schedule">Post Schedule</a>

                   <li><a href="/PBI/view_marks_chair">Marks</a>
                            </ul>
                          </div>
                        </nav> 
                    </div><div class="row">
<p><br><br></p>
<h4> <center>Upload PBI Schedule</center></h4>
<form action="/PBI/post_schedule" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}">

          <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="branch">
          <label for="email">Branch</label>
        </div>
      

      <div class="input-field col s12">
    
    <div class="file-field input-field">
      <div class="btn">


        <span><h6>Choose a File</h6></span>
        <input type="file" multiple name="schedules">
    
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" name="schedule" type="text" placeholder="Upload one or more files">
      </div>
    </div>
  <div class="row">
    <div class="col s12 offset-m5 m3">
      <button type="submit" class="waves-effect btn col" name="submit"> Upload</button>
    </div>
    <div class="row">
    </form>
  </div>
  </div>
  </div>
  </div>
 @stop