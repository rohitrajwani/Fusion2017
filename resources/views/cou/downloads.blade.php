@extends('layout')
@section('content')
<div class ="center-align">
  <a class="waves-effect waves-light btn modal-trigger " href="#modal12">Add</a>
</div>
  <!-- Modal Structure -->
  <div id="modal12" class="modal">
    <div class="modal-content">
	
<h4 class="col s12 m12">Welcome to Downloads Section</h4>
      <div class="row">
    <form class="col s12" method="post" action="/counselling_cell/studymaterial">
	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
        
        <div class="input-field col s6">
          <input id="courseid" type="text" name="coursecode" class="validate">
          <label for="courseid">Course Code</label>
        </div>
		<div class="input-field col s6">
          <input id="url" type="text" name="url"  class="validate">
          <label for="url">URL</label>
        </div>
      </div>
     
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" name="description" class="materialize-textarea"></textarea>
          <label for="textarea1">Description</label>
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
            <p><strong>Posted By - </strong>{{$cc->student_id}}<br><strong>Course Code - </strong>Course- {{$cc->course_id}}<br><strong>Study Material Description - </strong>{{$cc->description}}<br><strong>URL - </strong><a href="{{$cc->url}}"><strong>{{$cc->url}}</strong></a><br></p>
        </div>
       
      </div>
    </div>
  </div>
 
  @endforeach
  
		<!-- Modal Trigger 
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>-->

  <!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Answers</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a class="waves-effect waves-light btn modal-trigger" href="#modal123">Add Answer</a>
    </div>
  </div>

<div id="modal123" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Answers</h4>
      <p>A bunch of text</p>
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