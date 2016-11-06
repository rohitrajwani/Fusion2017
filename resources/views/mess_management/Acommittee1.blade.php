
@extends('layout')
			@section('content')
        
        <div class="main-container row">
            <h4 class="col s12 m4 offset-m4"><b>CENTRAL MESS</b></h4>
								
                            
							
                <div class="section col s12">
                    
                    <div class="col s12 m12">
                        <!-- Dropdown Structure -->
						<ul id="dropdown1" class="dropdown-content">
                          
                          <li><a href='/mess_management/Aviewfeedback'>View Feedback</a></li>
                         
                          
                        </ul>
                        <ul id="dropdown1" class="dropdown-content">
                          
                          <li><a href='/mess_management/Avieworder'>View Order Status</a></li>
                         
                          
                        </ul>
                       <ul id="dropdown1" class="dropdown-content">
                          <li><a href='/mess_management/Acommittee1'>Mess-I</a></li>
                          <li><a href='/mess_management/Acommittee2'>Mess-II</a></li>
                         
                          
                        </ul>
                        <nav class="mynav">
                          <div class="nav-wrapper">
                            <ul>
							<li><a href='/mess_management/Admin'>Home</a></li>
                              <li><a href='/mess_management/Viewleave'>View Leave Application</a></li>
							  
                              <li>
                                  <a class="dropdown-button" href="#!" data-activates="dropdown1">Feedback<i class="fa fa-arrow-down right"></i></a>
                                </li>
							  <li><a href='/mess_management/Abillform'> Mess Bills</a></li>
                              <!-- Dropdown Trigger -->
                              <li>
                                  <a class="dropdown-button" href="#!" data-activates="dropdown1">Special Order<i class="fa fa-arrow-down right"></i></a>
                                </li>
								<li>
                                  <a class="dropdown-button" href="#!" data-activates="dropdown1">Mess_Committee<i class="fa fa-arrow-down right"></i></a>
                                </li>
								<li><a href='/mess_management/AContact'>Contact Us</a></li>
								
                            </ul>
                          </div>
                        </nav> 
                    </div>
					
					
    </div>
                    <div class="section col s12">
                    <br>
                    <h4 class="custom col s12">Insert Mess Committee</h4><br>
						<p>&nbsp;&nbsp;* All fields are compulsory</p>
						
					 <form method="POST" action="/mess_management/committee1">
					 <input type="hidden" name="_token" value="{{ csrf_token()}}">
					 <h4 class="custom col s12">Mess I</h4><br>
                    <br><h5 class="custom col s12">Member</h5>
                    <div class="input-field col s6">
                          <input id="last_name" type="text" name="mem11" class="validate">
                          <label for="last_name">RollNo</label>
                    </div>
					 <div class="input-field col s6">
                          <input id="last_name" type="text" name="name11" class="validate">
                          <label for="last_name">Name</label>
                    </div>
					</br>
					<br><h5 class="custom col s12">Member2</h5>
                    <div class="input-field col s6">
                          <input id="last_name" type="text" name="mem12" class="validate">
                          <label for="last_name">RollNo</label>
                    </div>
					 <div class="input-field col s6">
                          <input id="last_name" type="text" name="name12" class="validate">
                          <label for="last_name">Name</label>
                    </div>
					<br><h5 class="custom col s12">Member3</h5>
                     <div class="input-field col s6">
                          <input id="last_name" type="text" name="mem13" class="validate">
                          <label for="last_name">RollNo</label>
                    </div>
					 <div class="input-field col s6">
                          <input id="last_name" type="text" name="name13" class="validate">
                          <label for="last_name">Name</label>
                    </div>
					</br>
					
					<h5 class="custom col s12">Member4</h5>
                    <div class="input-field col s6">
                          <input id="last_name" type="text" name="mem14" class="validate">
                          <label for="last_name">RollNo</label>
                    </div>
					 <div class="input-field col s6">
                          <input id="last_name" type="text" name="name14" class="validate">
                          <label for="last_name">Name</label>
                    </div>
					</br>
					<h5 class="custom col s12">Member5</h5>
                    <div class="input-field col s6">
                          <input id="last_name" type="text" name="mem15" class="validate">
                          <label for="last_name">RollNo</label>
                    </div>
					 <div class="input-field col s6">
                          <input id="last_name" type="text" name="name15" class="validate">
                          <label for="last_name">Name</label>
                    </div>
					</br>
					
               
                   
					

					
                    
                
					<div class="input-field col s6">
<input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " name="insert" value="Insert">
</div>
<div class="input-field col s6">
<input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " name="deleteall" value="Delete">
</div>
				</form>
    </div>
          
               
        
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
			  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
        </script>
    @stop