
		@extends('layout')
		@section('content')
		
        <div class="main-container row">
            <h4 class="col s12 m4 offset-m4"><b>CENTRAL MESS</b></h4>
                            
                
            
                <div class="section col s12">
                    
                    <div class="col s12 m12">
                        <!-- Dropdown Structure -->
						<ul id="dropdown1" class="dropdown-content">
                          <li><a href='/mess_management/CFeedback'>Give Feedback</a></li>
                          <li><a href='/mess_management/Cviewfeedback'>View Feedback</a></li>
                         
                          
                        </ul>
                        <ul id="dropdown1" class="dropdown-content">
                          <li><a href='/mess_management/COrder'>Place Order</a></li>
                          <li><a href='/mess_management/Cvieworder'>View Order Status</a></li>
                         
                          
                        </ul>
                        <nav class="mynav">
                          <div class="nav-wrapper">
                            <ul>
							<li><a href='/mess_management/Committee'>Home</a></li>
                              <li><a href='/mess_management/CLeave'>Leave Application</a></li>
                              <li>
                                  <a class="dropdown-button" href="#!" data-activates="dropdown1">Feedback<i class="fa fa-arrow-down right"></i></a>
                                </li>
							  <li><a href='/mess_management/Cviewbill'>View Mess Bill</a></li>
                              <!-- Dropdown Trigger -->
							  
                              <li>
                                  <a class="dropdown-button" href="#!" data-activates="dropdown1">Special Order<i class="fa fa-arrow-down right"></i></a>
                                </li>
								<li><a href='/mess_management/CContact'>Contact Us</a></li>
                            </ul>
                          </div>
                        </nav> 
                    </div>
                    
        
                <div class="section col s12">
                    <br>
                    <h4 class="custom col s12">Leave Application form</h4><br>
					
					 <form method="POST" action="/mess_management/leaveform">
					 <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <br><h5 class="custom col s12">Roll No.</h5>
                    <div class="input-field col s6">
                          <input id="last_name" type="text" class="validate" value="{{Auth::user()->username}}">
                          <label for="last_name">Roll No.</label>
                    </div></br>
					<h5 class="custom col s12">Date</h5>
					<div class="input-field col s6">
                          <input id="last_name" type="date" name ="fdate" class="validate">
                          <label for="last_name"></label>
                    </div></br>
					<div class="input-field col s6">
                          <input id="last_name" type="date" name="tdate"class="validate">
                          <label for="last_name"></label>
                    </div></br>
					<h5 class="custom col s12">Reason</h5>
                    <div class="col s12">
                    <p>
                        <input name="group1" type="radio" id="test1" value="casual leave"/>
                        <label for="test1">Casual Leave</label>
                    </p>
                    <p>
                        <input name="group1" type="radio" id="test2" value="medical leave"/>
                        <label for="test2">Medical Leave</label>
                    </p>
                    <p>
                        <input name="group1" type="radio" id="test3" value="vacation leave" />
                        <label for="test3">Vacation Leave</label>
                    </p>
                    
                    </div>
                    </div></br>
					
                    <div class="section col s12">
                    
                    
                     <button type="submit" class="waves-effect btn col" name="submit"> SUBMIT</button>
					
                    
                </div>
				</form>
				
				
         
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
			  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
   $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
        
        </script>
    


                
                    
                    
                 
                                 
                    
                    
        
        