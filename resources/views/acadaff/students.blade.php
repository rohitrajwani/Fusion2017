@extends('layout')


@section('content')

<?php 
    if($errors->first()!=''){ 
        $message=$errors->first();
        echo "<script type='text/javascript'>alert('$message');</script>";
       
   }
?>

<a class="waves-effect btn" href="students">Home</a>
<a class="waves-effect btn" href="submission">Submissions</a>

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
                                              <input name="date" type="date" class="validate">
                                              <label for="date">Date</label>
                                            </div>
                                          </div>
                                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          <input type="submit" class="modal-action modal-close waves-effect btn waves-green" name="Submit"/>
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
                                <h5 class="col s12">CEC</h5>
                            </a>
                            
                            
                            <div id="modal3" class="modal">
                                  <div class="modal-content">
                                    <h4>Comprehensive Examination Committee Request</h4>
                                    
                                      
                                      <form class="col s12" action="acadaff/cec" method="post">
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
                                              <input name="title" type="text" class="validate">
                                              <label for="title">Title Of Thesis</label>
                                            </div>
                                          </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                              <input name="cm1" type="text" class="validate">
                                              <label for="cm1">Committee Member 1</label>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="cm2" type="text" class="validate">
                                              <label for="cm2">Committee Member 2</label>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="cm3" type="text" class="validate">
                                              <label for="cm3">Committee Member 3</label>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="cm4" type="text" class="validate">
                                              <label for="cm4">Committee Member 4</label>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="cm5" type="text" class="validate">
                                              <label for="cm5">Committee Member 5</label>
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
        
                <cdd>
                    
                       <div class='section'>
                    <div class="row">
                        <div class="button-container col s12 m6 l4 offset-s2">
                            <a href="#modal4" class="waves-effect waves-light modal-trigger button col s8 l12">
                                     <img src="/css/images/q.png" class="col s6 offset-s3">
                                    <div class="divider col s12"></div>
                                <h5 class="col s12">Seminar Comm.</h5>
                            </a>
                            <div id="modal4" class="modal">
                                   <div class="modal-content">
                                    <h4>Seminar Committee</h4>
                                    
                                    
                                           <form class="col s12" action="acadaff/seminar_committee" method="post">
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
                                              <input name="date" type="date" class="validate">
                                              <label for="date">Date of Examination</label>
                                            </div>
                                          </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                              <input name="title" type="text" class="validate">
                                              <label for="title">Title Of Thesis</label>
                                            </div>
                                          </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                              <input name="pcm1" type="text" class="validate">
                                              <label for="pcm1">Committee Member 1</label>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="pcm2" type="text" class="validate">
                                              <label for="pcm2">Committee Member 2</label>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="pcm3" type="text" class="validate">
                                              <label for="pcm3">Committee Member 3</label>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="pcm4" type="text" class="validate">
                                              <label for="pcm4">Committee Member 4</label>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="pcm5" type="text" class="validate">
                                              <label for="pcm5">Committee Member 5</label>
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
                            <a href="#modal5" class=" waves-effect waves-light modal-trigger button col s8 l12">
                                <img src="/css/images/q.png" class="col s6 offset-s3">
                                <div class="divider col s12"></div>
                                <h5 class="col s12">Seminar report</h5>
                            </a>    
                           
                        <div id="modal5" class="modal">
                               <div class="modal-content">
                                    <h4>Seminar Report</h4>
                                    
                                      
                                      <form class="col s12" action="acadaff/seminar_report" method="post">
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
                                              <input name="date_of_seminar" type="date" class="validate">
                                              <label for="date_of_seminar">Date of Seminar</label>
                                            </div>
                                          </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                              <input name="discipline" type="text" class="validate">
                                              <label for="discipline">Discipline</label>
                                            </div>
                                          </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                              <input name="theme" type="text" class="validate">
                                              <label for="theme">Theme of master's work</label>
                                            </div>
                                          </div>  
                                         
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <input name="contribution" type="text" class="validate">
                                              <label for="contribution">Contribution in this semester</label>
                                            </div>
                                          </div>                                           
                                          
                                          
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          <input type="submit" class="modal-action modal-close waves-effect btn waves-green">
                                     
                                      </form>
                                  </div>
                                
                                
                                
                                
                    
                            </div>
                           
                           
                        </div>
                        
                        <div class="button-container col s12 m6 l4 offset-s2">
                            <a href="#modal6" class="waves-effect waves-light modal-trigger button col s8 l12">
                                
                                <img src="/css/images/q.png" class="col s6 offset-s3">
                                <div class="divider col s12"></div>
                                <h5 class="col s12">Supervisor</h5>
                            </a>
                            
                            
                            <div id="modal6" class="modal">
                                <div class="modal-content">
                                    <h4>Request For Supervisor</h4>
                                    
                                      
                                      <form class="col s12" action="acadaff/supervisor" method="post">
                                       <div class="row modal-form-row">
                                        <div class="input-field col s12">
                                          <input name="name" type="text" class="validate">
                                          <label for="name">Name</label>
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
                                              <input name="discipline" type="text" class="validate">
                                              <label for="discipline">Discipline</label>
                                            </div>
                                          </div>  
                                         <div class="row">
                                            <div class="input-field col s12">
                                              <input name="faculty_id" type="text" class="validate">
                                              <label for="faculty_id"> Faculty ID</label>
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
        
             </cdd>
         
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