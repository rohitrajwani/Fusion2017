@extends('layout')
@section('content')
		
		
		@if($sg_count == 0 AND $as_count == 0)
		<div class ="center-align">
			<a class="waves-effect waves-light btn modal-trigger " href="#modal12">Post  </a>
		</div>
		@endif
  <!-- Modal Structure -->
  <div id="modal12" class="modal">
    <div class="modal-content">
	
<h4 class="col s12 m12">Welcome to Problem Portal</h4>
      <div class="row">
    <form class="col s12" method="post" action="/counselling_cell/privatequestion">
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
		 @if(Auth::user()->username == $cc->student_id  OR Auth::user()->username == $cc->sg_id OR Auth::user()->username == $cc->ac_id)
			<div class="col s12 m12">
			<!--<h2 class="header">Horizontal Card</h2>-->
			<div class="card horizontal hoverable">
			
			<div class="card-stacked">
			<div class="card-content">
			<p><strong>{{$cc->id}}</strong><br><strong>Posted By -: </strong>{{$cc->student_id}}<br><strong style="font-size:1.4em;color:#0C47F1;">{{$cc->question}}</strong><br><br><strong style="font-size:1.3em;">Previous Answer:</strong><br>
				@foreach($d as $dd)
					@if ($cc->id == $dd->pid) 
						<strong style="font-size:1em; color:#0C47F1;">{{$dd->student_id}}</strong>-<strong>{{$dd->answer_desc}}</strong>
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
    <form class="col s12"  method="post" action="/counselling_cell/{{$cc->id}}/privateanswer">
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
   @endif
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