
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
					<div class="divider col s12"></div>
                <div class="section col s12">
                    <h5 class="col s12">MESS CATERING SERVICE</h5>
                    <p class="col s12">Central mess is a common mess for boys and girls residing in all Halls, 
					with a total strength of around 1500. It is a special hall including both Veg and Non-Veg meals. 
					The whole mess is managed by a manger with a committee of 5 members of PG student. 
					Atmost 10-15 workers including cleaners and cook work here. 
					Central mess is situtated near all residing halls and Institute.<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					All the workers are from nearby villages. To check the list of workers click here . 
           The whole mess is managed by a manger with a committee of 5 members of PG student. 
		   Atmost 10-15 workers including cleaners and cook work here. Central mess is situtated near all residing halls and Institute. 
		   All the workers are from nearby villages.</p>
                </div>
					<br><h4 class="custom col s12">CheckOut Mess Menu</h4><br>
				<!-- Modal Trigger -->
  <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Mess I</a>
  <a class="modal-trigger waves-effect waves-light btn" href="#modal2">Mess II</a>
  <a class="modal-trigger waves-effect waves-light btn" href="#modal3">EDIT</a>
   <form method="POST" action="/mess_management/reset">
					 <input type="hidden" name="_token" value="{{ csrf_token()}}">
					 
					 <div class="input-field col s6">
				<input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " name="deleteall" value="Delete">
				</div>
					 
					 </form>
  
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mess-Menu I</h4>
          <table class="bordered highlight" border="1">
                        <thead>
                          <tr>
							  <th>Meal</th>
                              <th>Breakfast</th>
                              <th>Lunch</th>
                              <th>Dinner</th>
							 
                          </tr>
                        </thead>
                        <tbody>
						<tr>
						<td width="50"> <b>Monday</td>
						 @foreach($c1 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td  width="16"> <b> Tuesday</td>
						 @foreach($c2 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
                          <tr>
						<td  width="16"> <b> Wednesday</td>
						 @foreach($c3 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"><b> Thursday</td>
						 @foreach($c4 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Friday</td>
						 @foreach($c5 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Saturday</td>
						 @foreach($c6 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Sunday</td>
						 @foreach($c7 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
                        </tbody>
                    </table>
					
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Back</a>
    </div>
  </div>
   <div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mess-Menu II</h4>
      <table class="bordered highlight" border="1">
                        <thead>
                          <tr>
							  <th>Meal</th>
                              <th>Breakfast</th>
                              <th>Lunch</th>
                              <th>Dinner</th>
							 
                          </tr>
                        </thead>
                        <tbody>
						<tr>
						<td width="50"> <b>Monday</td>
						 @foreach($c8 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td  width="16"> <b> Tuesday</td>
						 @foreach($c9 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
                          <tr>
						<td  width="16"> <b> Wednesday</td>
						 @foreach($c10 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"><b> Thursday</td>
						 @foreach($c11 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Friday</td>
						 @foreach($c12 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Saturday</td>
						 @foreach($c13 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
						  <tr>
						<td width="50"> <b>Sunday</td>
						 @foreach($c14 as $cc)
                         <td width="12">{{$cc->item_name }}</td>
                           @endforeach 
						  </tr>
                        </tbody>
                    </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Back</a>
    </div>
  </div>
   <div id="modal3" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Edit Menu</h4>
      <form method="POST" action="/mess_management/updatemenu">
		
					 <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <div class="input-field col s12">
                          <input id="last_name" type="text" class="validate" name="id">
                          <label for="last_name">Mess Id</label>
                    </div>
					<div class="input-field col s6">
				<select name="day">
						<option value="" disabled selected>Choose your option</option>
						<option value="1">Monday</option>
						<option value="2">Tuesday</option>
						<option value="3">Wednesday</option>
						<option value="4">Thursday</option>
						<option value="5">Friday</option>
						<option value="6">Saturday</option>
						<option value="7">Sunday</option>
				</select>
					<label>Day</label>
					</div>
					 <div class="input-field col s6">
				<select name="meal">
						<option value="" disabled selected>Choose your option</option>
						<option value="breakfast">Breakfast</option>
						<option value="lunch">Lunch</option>
						<option value="dinner">Dinnner</option>
					</select>
					<label>Meal</label>
					</div>
					<div class="input-field col s12">
					<h6 class="custom col s6"><b>Effective From</b></h6>
                          <input id="last_name" type="date" class="validate" name="eff">
                          
                    </div>
					<div class="input-field col s12">
      <textarea id="textarea1" class="materialize-textarea" name="item"></textarea>
      <label for="first_name">Items Name</label>
</div>  
<div class="input-field col s6">
<input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " name="submit" value="Insert">
</div>
<div class="input-field col s6">
<input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " name="submit" value="Update">
</div>  
                    </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Back</a>
    </div>
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
		<script>
		Javascript Initialization
$(document).ready(function() {
    $('select').material_select();
  });</script>
    @stop