 @extends('layout')
		@section('content')
        
        <div class="main-container row">
            <h4 class="col s12 m4 offset-m4"><b>CENTRAL MESS</b></h4>
								
			<div class="section col s12">
                    
                    <div class="col s12 m12">
                        <!-- Dropdown Structure -->
						<ul id="dropdown1" class="dropdown-content">
                          <li><a href='/mess_management/SFeedback'>Give Feedback</a></li>
                          <li><a href='/mess_management/Sviewfeedback'>View Feedback</a></li>
                         
                          
                        </ul>
                        <ul id="dropdown1" class="dropdown-content">
						
                          <li><a href='/mess_management/Svieworder'>View Order Status</a></li>
                         
                          
                        </ul>
                        <nav class="mynav">
                          <div class="nav-wrapper">
                            <ul>
							<li><a href='/mess_management/Student'>Home</a></li>
                              <li><a href='/mess_management/SLeave'>Leave Application</a></li>
                              <li>
                                  <a class="dropdown-button" href="#!" data-activates="dropdown1">Feedback<i class="fa fa-arrow-down right"></i></a>
                                </li>
							  <li><a href='/mess_management/Sviewbill'>View Mess Bill</a></li>
                              <!-- Dropdown Trigger -->
                              <li>
                                  <a class="dropdown-button" href="#!" data-activates="dropdown1">Special Order<i class="fa fa-arrow-down right"></i></a>
                                </li>
								<li><a href='/mess_management/SContact'>Contact Us</a></li>
                            </ul>
                          </div>
                        </nav> 
                    </div>	
						<br><br><br><h4 class="custom col s12">View Special Order</h4><br><br><br>
	<table class="bordered highlight">
	<th>Student ID</th>
	<th>Breakfast</th>
	<th>Lunch</th>
	<th>Dinner</th>
	<th>Begin date</th>
	<th>End date</th>
	
	@foreach($c as $cc)
	<tr><td>{{$cc->student_id}}</td>
	<td>{{$cc->breakfast}}</td>
	<td>{{$cc->lunch}}</td>
	<td>{{$cc->dinner}}</td>
	<td>{{$cc->begin_date}}</td>
	<td>{{$cc->end_date}}</td></tr>
	@endforeach
	
	</table>
	
	</div></div>
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
   @stop