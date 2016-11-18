
@extends('layout')
			@section('mess_content')
        
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
                    
        
                <div class="section col s12">
                    <br>
                    <h4 class="custom col s12">Generate Mess Bill</h4><br>
					
					 <form method="POST" action="/mess_management/billform">
					 <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <br><h5 class="custom col s12">Student Id</h5>
                    <div class="input-field col s6">
                          <input id="last_name" type="text" name="roll" class="validate">
                          <label for="last_name">Student Id</label>
                    </div></br>
					<div class="input-field col s12">
					<select name="month">
						<option value="" disabled selected>Choose your option</option>
						<option value="January">January</option>
						<option value="Feburary">Feburary</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="September">September</option>
						<option value="October">October</option>
						<option value="November">November</option>
						<option value="December">December</option>
				</select>
				<label>Day</label>
					</div>
					<br><h5 class="custom col s12">Amount</h5>
					<div class="input-field col s6">
                          <input id="last_name" type="text" name="amount" class="validate">
                          <label for="last_name">Amount</label>
                    </div></br>
					
					
                    <div class="section col s12">
                    
                    
                     <button type="submit" class="waves-effect btn col" name="uplaod">UPLOAD</button>
					
                    
                </div>
				</form>
				
				<script src="js/jquery-3.1.1.min.js"></script>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
		<script>
		Javascript Initialization
$(document).ready(function() {
    $('select').material_select();
  });</script>
    @stop


                
                    
                    
                 
                                 
                    
                    
        
        