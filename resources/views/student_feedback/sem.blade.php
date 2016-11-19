@extends('layout')

@section('feedback_content')
            <div id="modal1" class="modal">
            <div class="modal-content">

            <br>
            <h5>Enter the Question</h5>
            <br>
            <form action="/student_feedback/admin/add" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <textarea id="question_id" name="question_id" class="materialize-textarea" placeholder="enter question_id" ></textarea>
              <textarea id="question" name="question" class="materialize-textarea" placeholder="enter question"></textarea><br>
              <button type="submit" class="btn">Save</button>
              <div class="modal-action modal-close waves-effect waves-green btn ">Cancel </div>
              </form>
            </div>
            
          </div>


            <div id="modal2" class="modal">
            <div class="modal-content">

            <br>
            <h5>Enter Question Number to be deleted</h5>
            <br>
            <form action="/student_feedback/admin/delete" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <textarea id="del_id" name="question_id" class="materialize-textarea" placeholder="enter question_id" ></textarea>
              <br>
              <button type="submit" class="btn">Delete</button>
              <div class="modal-action modal-close waves-effect waves-green btn ">Cancel </div>
              </form>
            </div>
            
          </div>
        
         <nav>
        <div class="nav-wrapper">
        <!-- <a href="#" class="brand-logo">Logo</a> -->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
       <!--  <li><a href="sass.html">Sass</a></li> -->
        <!-- <li><a href="badges.html">Components</a></li> -->
         <li><a href="/student_feedback/admin">Home</a></li>
        </ul>
        </div>
        </nav>


          
                <div class="section col s12">
        
       
        <br><h5>Select Review type:</h5><br>
        
            <div class="row">
              <div class="col s12 m6 l3"></div>
              <div class="col s12 m6 l3"><a class="waves-effect btn" href = "/student_feedback/view/1">Mid_Sem</a></div>
               <div class="col s12 m6 l3"><a class="waves-effect btn" href = "/student_feedback/view/2">End_Sem</a></div>
              
            </div>
 
        
 
 
  
        </div>
@stop