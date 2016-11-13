@extends('layout')
@section('content')
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
  
        <script src="js/jquery-3.1.1.min.js"></script>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
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