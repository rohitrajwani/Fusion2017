@extends('layout')


@section('content')

<?php 
    if($errors->first()!=''){ 
        $message=$errors->first();
        echo "<script type='text/javascript'>alert('$message');</script>";
       
   }
$id = Auth::user()->username;
?>

<a class="waves-effect btn" href="ug_student">Home</a>
<a class="waves-effect btn" href="ug_student_show">Submissions</a>

    <div class='container'>
                <div class='section'>
                    <div class="row">
                        <div class="button-container col s12 m6 l4 offset-s2">
                            <a href="#modal1" class="waves-effect waves-light modal-trigger button col s8 l12">
                                     <img src="/css/images/q.png" class="col s6 offset-s3">
                                    <div class="divider col s12"></div>
                                <h5 class="col s12">Bonafide</h5>
                            </a>
                            <div id="modal1" class="modal">
                                  <div class="modal-content">
                                    <h4>Application for Bonafide</h4>
                                   
                                      
                                      <form class="col s12" action="acadaff/bonafide" method="post">
                                      <div class="row modal-form-row">
                                        <div class="input-field col s12">
                                          <input name="name" type="text" class="validate">
                                          <label for="name">Name</label>
                                        </div>
                                      </div>
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="student_id" type="hidden" class="validate" value="{{$id}}">
<!--                                              <label for="student_id">student_id</label>-->
                                            </div>
                                          </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                              <input name="purpose" type="text" class="validate">
                                              <label for="purpose">Purpose</label>
                                            </div>
                                          </div> 
                                   <div class="row">
                                            <div class="input-field col s12">
                                              <input name="date" type="date" class="validate">
                                              <label for="date">Date</label>
                                            </div>
                                          </div>
                                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          <input type="submit" class="modal-action modal-close waves-effect btn waves-green">
                                      </form>
                                  </div>
                                
                                
                                
                                  <div class="modal-footer">
                                   
                                  </div>
                            </div>
                        </div>
               
               
                       <div class="button-container col s12 m6 l4 offset-s2">
                            <a href="#modal2" class=" waves-effect waves-light modal-trigger button col s8 l12">
                                <img src="/css/images/q.png" class="col s6 offset-s3">
                                <div class="divider col s12"></div>
                                <h5 class="col s12">Leave</h5>
                            </a>    
                           
                        <div id="modal2" class="modal">
                                  <div class="modal-content">
                                    <h4>Leave Application</h4>
                                    
                                      
                                      <form class="col s12" action="acadaff/leave" method="POST">
                                      <div class="row modal-form-row">
                                        <div class="input-field col s12">
                                          <input name="Name" type="text" class="validate">
                                          <label for="Name">Name</label>
                                        </div>
                                      </div>
                                           <div class="row">
                                            <div class="input-field col s12">
                                              <input name="student_id" type="text" class="validate">
                                              <label for="student_id">student_id</label>
                                            </div>
                                          </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                              <input name="purpose" type="text" class="validate">
                                              <label for="purpose">Purpose</label>
                                            </div>
                                          </div>
                                            <div class="row">
                                            <div class="input-field col s12">
                                              <input name="from_date" type="date" class="validate">
                                              <label for="from_date">From</label>
                                            </div>
                                          </div>
                                           <div class="row">
                                            <div class="input-field col s12">
                                              <input name="till_date" type="date" class="validate">
                                              <label for="till_date">To</label>
                                            </div>
                                          </div>
                                        
                                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          <input type="submit" class="modal-action modal-close waves-effect btn waves-green">
                                     
                                      </form>
                                  </div>
                                
                                
                                
                    
                            </div>
                           
                           
                        </div>
                        
                        <div class="button-container col s12 m6 l4 offset-s2">
                            <a href="#modal3" class="waves-effect waves-light modal-trigger button col s8 l12">
                                
                                <img src="/css/images/q.png" class="col s6 offset-s3">
                                <div class="divider col s12"></div>
                                <h5 class="col s12">Branch Change</h5>
                            </a>
                            
                            
                            <div id="modal3" class="modal">
                                  <div class="modal-content">
                                    <h4>Change of Branch</h4>
                                    
                                      
                                      <form class="col s12" action="acadaff/branch_change" method="post">
                                      <div class="row modal-form-row">
                                        <div class="input-field col s12">
                                          <input name="Name" type="text" class="validate">
                                          <label for="Name">Name</label>
                                        </div>
                                      </div>
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="student_id" type="text" class="validate">
                                              <label for="student_id">Student_id</label>
                                            </div>
                                          </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                              <input name="current_branch" type="text" class="validate">
                                              <label for="current_branch">Current Branch</label>
                                            </div>
                                          </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                              <input name="expected_branch" type="text" class="validate">
                                              <label for="expected_branch">Expected Branch</label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="current_cpi" type="text" class="validate">
                                              <label for="current_cpi">Current CPI</label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="category" type="text" class="validate">
                                              <label for="category">Category</label>
                                            </div>
                                          </div>
                                          
                                          
                                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          <input type="submit" class="modal-action modal-close waves-effect btn waves-green">
                                     
                                      </form>
                                  </div>
                                
                                
                                
                                    </div>
                        </div>
                   
                    
                    </div>
                </div><!--section-->
        
</div>
























<!--
<div class='row '>
    <div>
        <div class='container'>
            
               <div class=" col s12 m4">
                    <div class="card small hoverable">
                        <div class="card-image">
                          <img src="./css/images/start_students.jpg">
                          <span class="card-title">Bonafides</span>
                        </div>
                        <div class="card-content">
                          <p>Fill this form for bonafides for different purposes. </p>
                        </div>
                        <div class="card-action">
                          <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
               
               
               <div class=" col s12 m4">
                    <div class="card small hoverable">
                        <div class="card-image">
                          <img src="./css/images/start_students.jpg">
                          <span class="card-title">TA Evaluation</span>
                        </div>
                        <div class="card-content">
                          <p>For the teaching credits of Ph.D. Scholars</p>
                        </div>
                        <div class="card-action">
                          <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
               
               <div class=" col s12 m4">
                    <div class="card small hoverable">
                        <div class="card-image">
                          <img src="./css/images/start_students.jpg">
                          <span class="card-title">Leave Application</span>
                        </div>
                        <div class="card-content">
                          <p>Apply for academic leave.</p>
                        </div>
                        <div class="card-action">
                          <a href="./bonafide">This is a link</a>
                        </div>
                    </div>
                </div>
               
            </div>
    
    <div class='container'>
         
        <div class=" col s12 m4 ">
                    <div class="card small hoverable">
                        <div class="card-image">
                          <img src="./css/images/start_students.jpg">
                          <span class="card-title">Elective Courses</span>
                        </div>
                        <div class="card-content">
                          <p>Choose a course among the offered subjects. Also to add aditional courses.</p>
                        </div>
                        <div class="card-action">
                          <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>

        <div class=" col s12 m4">
                    <div class="card small hoverable">
                        <div class="card-image">
                          <img src="./css/images/start_students.jpg">
                          <span class="card-title">Drop Courses</span>
                        </div>
                        <div class="card-content">
                          <p>Drop the courses.</p>
                        </div>
                        <div class="card-action">
                          <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
    <div class=" col s12 m4">
                    <div class="card small hoverable">
                        <div class="card-image">
                          <img src="./css/images/start_students.jpg">
                          <span class="card-title">Branch Change</span>
                        </div>
                        <div class="card-content">
                          <p>Apply for the change of branch.</p>
                        </div>
                        <div class="card-action">
                          <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
    
    </div>
    
    </div>       
          
    </div>
-->
@stop