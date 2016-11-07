@extends('cou/layout')
@section('content')
<br><br>
             <div class="center-align row">
            <div class="col s12 m4 offset-l2">
          <div class="card blue-grey darken-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Student Guides</span>
              <p>Details of Student Guides from BTech 2015</p>
            </div>
            <div class="card-action">
              <a href="/student_guides_list">View</a>
              
            </div>
          </div>
        </div>
                 <div class="col s12 m4">
          <div class="card blue-grey darken-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Assistant Coordinators</span>
              <p>Details of Ast-Coordinators, BTech 2014</p>
            </div>
            <div class="card-action">
              <a href="/assistant_coordinator_list">View</a>
              
            </div>
          </div>
        </div>
      
      </div>
                    <div class=" center-align row">
            <div class="col s12 m4 offset-l2 ">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Student Guide Applications</span>
              <p>Review applications submitted By BTech 2016</p>
            </div>
            <div class="card-action">
              <a href="/student_guides_application">View</a>
             
            </div>
          </div>
        </div>
                 <div class="col s12 m4">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Ast-Coordinator Applications</span>
              <p>Review applications submitted By BTech 2015.</p>
            </div>
            <div class="card-action">
             
              <a href="/assistant_coordinator_application">View</a>
            </div>
          </div>
        </div>
      
      </div>
  <div class="center-align row">
            <div class="col s12 m4 offset-l4">
          <div class="card blue-grey darken-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Assign Roles To Students</span>
              <p>Assign Assistant Coordinators Here!</p>
            </div>
            <div class="card-action">
              <a href="/assign_assistant">View</a>
              
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