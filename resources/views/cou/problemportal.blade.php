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
<!-- Modal Trigger -->
	<div class ="center-align">
  <a class="waves-effect waves-light btn modal-trigger " href="#modal12">Post </a>
</div>
  <!-- Modal Structure -->
  <div id="modal12" class="modal">
    <div class="modal-content">
	
<h4 class="col s12 m12">Welcome to Problem Portal</h4>
      <div class="row">
    <form class="col s12" method="post" action="/counselling_cell/question">
	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
     <div class="row">
    
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" name="description" class="materialize-textarea"></textarea>
          <label for="textarea1">Problem Description</label>
        </div>
      </div>
    
  </div>
	 	  <button class="waves-effect waves-light btn" type="submit">Submit</button>
      
    </form>
  </div>
        
    </div>
    
  </div>
  
  @foreach($c as $cc)
	<div class="col s12 m12">
    <!--<h2 class="header">Horizontal Card</h2>-->
    <div class="card horizontal hoverable">
      <div class="card-stacked">
        <div class="card-content">
          <p><strong>{{$cc->id}}</strong><br><strong>Posted By -: </strong>{{$cc->student_id}}<br><strong style="font-size:1.4em; color:#0C47F1;  ">{{$cc->description}}</strong><br><br><strong style="font-size:1.2em;">Previous Answers:</strong><br>
		@foreach($d as $dd)
			@if ($cc->id == $dd->pid) 
              <strong style="font-size:1em; color:#0C47F1;">{{$dd->student_id}}</strong>- <strong>{{$dd->des_ans}}</strong>
							<br>
			@endif
		@endforeach
			  <br></p>
        </div>
        <div class="card-action right-align">
          <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" href="#modal{{$cc->id}}">Answer</a>
  
  <div id="modal{{$cc->id}}" class="modal">
    <div class="modal-content">
	
<h4 class="col s12 m12">Submit Your Answer Here</h4>
      <div class="row">
    <form class="col s12"  method="post" action="/counselling_cell/{{$cc->id}}/answer">
	 <input type="hidden" name="_token" value="{{ csrf_token() }}">

      
     <div class="row">
    
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" name="ans" class="materialize-textarea"></textarea>
          <label for="textarea1">Description</label>
        </div>
      </div>
    
  </div>
	 	  <button class="waves-effect waves-light btn" type="submit">Submit</button>
      
    </form>
  </div>
        
    </div>
    
  </div>
        </div>
      </div>
    </div>
  </div>
 @endforeach
 
		<!-- Modal Trigger 
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>-->

  <!-- Modal Structure -->
 
<div id="modal123" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Answers</h4>
      <p>A bunch of text</p>
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
        </script>            @stop
   