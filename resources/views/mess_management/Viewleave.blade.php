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
							  <li><a href='/mess_management/Abillform'>Mess Bills</a></li>
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
						<br><br><br><h4 class="custom col s12">Leave Applications</h4><br><br><br>
	<table class="bordered highlight">
	<th>Application No.</th>
	<th>Student Id</th>
	<th>From Date</th>
	<th>End Date</th>
	<th>Reason</th>
	
	@foreach($c as $cc)
	<tr><td>{{$cc->application_no}}</td>
	<td>{{$cc->student_id}}</td>
	<td>{{$cc->from_date}}</td>
	<td>{{$cc->till_date}}</td>
	<td>{{$cc->reason}}</td></tr>
	@endforeach
	
	</table>
	
	
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
    @stop