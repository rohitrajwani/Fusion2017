@extends('layout')
@section('counselling_content')
<div class="header row">
            <div class="col s2 m2 l1"><img src="images/logo.png" alt="college_logo" class="clogo"  style="border-radius:5px;"></div>
            <h1 class="heading col s8 m8 l10"><a href="http://www.iiitdmj.ac.in/" class="cname">PDPM IIITDM</a><br><small><a href="">Counselling Service</a></small></h1> <a href="">
        </div>    
        <div class="main_nav">
              <nav id="mynav">
                    <div class="nav-wrapper">
                        <ul class="hide-on-med-and-down">
                            <li><a href="/counselling_cell/">Home</a></li>
                            <li><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Share Public Posts and Announcements Here!" href="/counselling_cell/problemportal" >Forum</a></li>
              @if (Auth::user()->user_type != 'faculty' AND Auth::user()->username != 'coordinator')
                            <li><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Personal Conversation Portal!" href="/counselling_cell/privateportal" >Problems</a></li>
              @endif
                            
                            <li><a href="/counselling_cell/study_material">StudyPosts</a></li>
                            
                            @if (Auth::user()->user_type != 'faculty' AND Auth::user()->username != 'coordinator')
              <li><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Application Process will be active from month of February."  href="/formfill">Applications</a></li>
                            @endif
            
              @if (Auth::user()->user_type == 'faculty' AND Auth::user()->username == 'counsellinghead')
                  <li><a  href="/counselling_cell/faculty_access" >Admin</a></li> 
                            @endif
                            @if (Auth::user()->user_type == 'student' AND Auth::user()->username == 'coordinator')
                  <li><a  href="/counselling_cell/assign_guides" >Assign Guides</a></li>
                                    <li><a  href="/counselling_cell/student_guides_list" >View Guides</a></li>
                            @endif
              <li><a href="/counselling_cell#faq">FAQ</a></li>
                            
                        </ul>
                    </div>
        </nav>
        </div>
<div class ="center-align">
  <a class="waves-effect waves-light btn modal-trigger " href="#modal12">Add Assistant</a>
</div>
  <!-- Modal Structure -->
  <div id="modal12" class="modal">
    <div class="modal-content">
	
<h4 class="col s12 m12">Assign Students Guides To Assistant Coordinators</h4>
      <div class="row">
    <form class="col s12" method="post" action="/counselling_cell/studymaterial">
	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
        
        <div class="input-field col s6">
          <input id="studentguideid" type="number" name="sg_id" required class="validate">
          <label for="studentguideid">Roll No of Assistant Coordiantor</label>
        </div>
		<div class="input-field col s6">
          <input id="studentid" type="number" name="student_id" required class="validate">
          <label for="studentid">Roll No of Student Guide</label>
        </div>
      </div>
     <div class="row">
      
	  <button class="waves-effect waves-light btn" type="submit">Submit</button>
    
        </div> 
          </form>
  </div>        
    </div> 
  </div>
  
        
       <script>$(document).ready(function() {
    $(".dropdown-button").dropdown();
});
      </script> 
	   <script>
	   $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
       </script>  
      
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
            });
        </script>
@stop