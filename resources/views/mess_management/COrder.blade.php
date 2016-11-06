
@extends('layout')
		@section('content')
        
        <div class="main-container row">
            <h4 class="col s12 m4 offset-m4"><b>CENTRAL MESS</b></h4>
                            
                
            <div class="section col s12">
                    
                    <div class="col s12 m12">
                        <!-- Dropdown Structure -->
						<ul id="dropdown1" class="dropdown-content">
                          <li><a href='/mess_management/CFeedback'>Give Feedback</a></li>
                          <li><a href="Cviewfeedback">View Feedback</a></li>
                         
                          
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
                    
                    <h4 class="custom col s12">Special Order form</h4>
					<form method="POST" action="/mess_management/corderform">
					 <input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div class="input-field col s6">
                          <input id="last_name" type="text" class="validate" value="{{Auth::user()->username}}">
                          <label for="last_name">Roll No.</label>
                    </div></br>
                    <h5 class="custom col s12">Food Requirement</h5>
                    <div class="input-field col s6">
                          <input id="last_name" type="text" class="validate" name="breakfast">
                          <label for="last_name">Breakfast</label>
                    </div></br>
					<div class="input-field col s6">
                          <input id="last_name" type="text" class="validate" name="lunch">
                          <label for="last_name">Lunch</label>
                    </div></br>
					<div class="input-field col s6">
                          <input id="last_name" type="text" class="validate" name="dinner">
                          <label for="last_name">Dinner</label>
                    </div></br>
					<h5 class="custom col s12">Date</h5>
					<p><div class="input-field col s6">
                          <input id="last_name" type="date" class="validate" name="from">
                          <label for="last_name"></label>
                    </div></p></br>
					<div class="input-field col s6">
                          <input id="last_name" type="date" class="validate" name="to">
                          <label for="last_name"></label>
                    </div></br>                  
                    
                    
                    
                    <div class="section col s12">
                    
                    
                     <button type="submit" class="waves-effect btn col" name="submit">PLACE ORDER</button>
                    
                </div>
                    </form>
					
                    
                    
                    
                    
        
        
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
    @stop