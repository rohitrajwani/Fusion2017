
@extends('layout')
@section('main_content')
<h5 class="col s12 m4 offset-m4">PROJECT BASED INTERNSHIP</h5>
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
                    </div>
        
        
            <h4 class="col s12 m6 offset-m3">CHANGE PBI- FORM</h4>
            <div class="container" style="width:90%">
             
      
                
    <form action="/PBI/changepbi" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token()}}">

    <div class="row">
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="date">
          <label for="application_date">Application Date</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="name">
          <label for="last_name">Name</label>
        </div>
      </div>
      
      
      
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="rollno">
          <label for="email">Roll No.</label>
        </div>
      </div>
     
<p>Select your branch<br>
    <input name="group1" type="radio" id="test1" />
    <label for="test1">E.C.E.</label>
</p>
<p>
    <input name="group1" type="radio" id="test2" />
    <label for="test2">C.S.E.</label>
</p>
<p>
    <input name="group1" type="radio" id="test4" />
    <label for="test4">M.E.</label>
</p>

      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="oldpbi">
          <label for="email">Old PBI topic</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="oldtype">
          <label for="email">Old PBI Type</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="reasons">
          <label for="email">Reason for changing :</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="newpbi">
          <label for="email">New PBI topic</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="newtype">
          <label for="email">New PBI Type</label>
        </div>
      </div>
	  <div class="row">
	  <div class="input-field col s12">
      <textarea id="textarea1" class="materialize-textarea" name="mentorinfo"></textarea>
      <label for="first_name">Mentor Info(If External):</label>
</div>
	  </div>

	  <div class="row">
	  <div class="col s12 m3">
<button type="submit" class="waves-effect btn col" name="submit"> SUBMIT</button>
	  </div>
	 </div>
    </form>
  </div>
  </div>
  <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
    <script>
         Javascript Initialization
               $(document).ready(function() {
                   $('select').material_select();
               });
        </script>
  @stop