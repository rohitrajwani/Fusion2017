@extends('layout')
@section('content')
<br><br>
             <div class="center-align row">
            <div class="col s12 m4 offset-l2">
          <div class="card blue-grey darken-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Student Guides</span>
              <p>Click Below to apply for Student Guide</p>
            </div>
            <div class="card-action">
              <a href="/counselling_cell/student_guide_form">View</a>
              
            </div>
          </div>
        </div>
                 <div class="col s12 m4">
          <div class="card blue-grey darken-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Assistant Coordinators</span>
              <p>Click Below to apply for Assistant Coordinator</p>
            </div>
            <div class="card-action">
              <a href="/counselling_cell/assistant_coordinator_form">View</a>
              
            </div>
          </div>
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
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
            });
        </script>
@stop