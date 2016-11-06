
 @extends('layout')
		@section('content')
        
        <div class="main-container row">
            <h4 class="col s12 m4 offset-m4"><b>CENTRAL MESS</b></h4>
                            <div class="section col s12">
                    
                    <div class="col s12 m12">
                        <!-- Dropdown Structure -->
						<ul id="dropdown1" class="dropdown-content">
                          <li><a href='/mess_management/SFeedback'>Give Feedback</a></li>
                          <li><a href="/mess_management/Sviewfeedback">View Feedback</a></li>
                         
                          
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
                                  <a class="dropdown-button" href="SFeedback" data-activates="dropdown1">Feedback<i class="fa fa-arrow-down right"></i></a>
                                </li>
							  <li><a href='/mess_management/Sviewbill'>View Mess Bill</a></li>
                              <!-- Dropdown Trigger -->
							  <li>
                                  <a class="dropdown-button" href="#!" data-activates="dropdown1">Special Order<i class="fa fa-arrow-down right"></i></a>
                                </li>
							  <li><a href='SContact'>Contact Us</a></li>
                              
                            </ul>
                          </div>
                        </nav> 
                    </div>
                
            
                
                    
        
                <div class="section col s12">
                    
                    <br><h4 class="custom col s12">Feedback form</h4><br>
                    <form method="POST" action="/mess_management/sfeedbackform">
					 <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <div class="input-field col s6">
                          <input id="last_name" type="text" class="validate" value="{{Auth::user()->username}}">
                          <label for="last_name">Roll No.</label>
                    </div></br>
					<h6 class="custom col s12"><b>Please rate your mess according to following criteria:-</b></h6>
					<table class="bordered highlight">
    <thead>
      <tr bgcolor="#DCDCDC">
          <th><center>Criteria</th>
          <th><center>Very Bad</th>
          <th><center>Bad</th>
		  <th><center>Average</th>
		  <th><center>Good</th>
		  <th><center>Excellent</th>
      </tr>
    </thead>
    <tbody>
	<form class="col s12">
      <tr >
        <td><center>Cleanliness</td>
        <td><center><input name="group1" type="radio" value="Very Bad" id="test1" />
                        <label for="test1"></label></td>
        <td><center><input name="group1" type="radio" value="Bad" id="test2" />
                        <label for="test2"></label></td>
		<td><center><input name="group1" type="radio" value="Average" id="test3" />
                        <label for="test3"></label></td>
		<td><center><input name="group1" type="radio" value="Good" id="test4" />
                        <label for="test4"></label></td>
		<td><center><input name="group1" type="radio" value="Excellent" id="test5" />
                        <label for="test5"></label></td>
      </tr>
      <tr bgcolor="#f0f5f5">
        <td><center>Service</td>
        <td><center><input name="group2" type="radio" value="Very Bad" id="test6" />
                        <label for="test6"></label></td>
        <td><center><input name="group2" type="radio" value="Bad" id="test7" />
                        <label for="test7"></label></td>
		<td><center><input name="group2" type="radio" value="Average" id="test8" />
                        <label for="test8"></label></td>
		<td><center><input name="group2" type="radio" value="Good" id="test9" />
                        <label for="test9"></label></td>
		<td><center><input name="group2" type="radio" value="Excellent" id="test10" />
                        <label for="test10"></label></td>
      </tr>
      <tr>
        <td><center>Mess Workers Behaviour</td>
        <td><center><input name="group3" type="radio" value="Very Bad" id="test31" />
                        <label for="test31"></label></td>
        <td><center><input name="group3" type="radio" value="Bad" id="test32" />
                        <label for="test32"></label></td>
		<td><center><input name="group3" type="radio" value="Average" id="test33" />
                        <label for="test33"></label></td>
		<td><center><input name="group3" type="radio" value="Good" id="test34" />
                        <label for="test34"></label></td>
		<td><center><input name="group3" type="radio" value="Excellent" id="test35" />
                        <label for="test35"></label></td>
      </tr>
	  <tr bgcolor=" #f0f5f5">
        <td><center>Food Quality</td>
        <td><center><input name="group4" type="radio" value="Very Bad" id="test41" />
                        <label for="test41"></label></td>
        <td><center><input name="group4" type="radio" value="Bad" id="test42" />
                        <label for="test42"></label></td>
		<td><center><input name="group4" type="radio" value="Average" id="test43" />
                        <label for="test43"></label></td>
		<td><center><input name="group4" type="radio" value="Good" id="test44" />
                        <label for="test44"></label></td>
		<td><center><input name="group4" type="radio" value="Excellent" id="test45" />
                        <label for="test45"></label></td>
      </tr>
	  </form>
    </tbody>
</table>
					
    
    <br>
  <h6 class="custom col s12"><b>Additional Comments</b></h6>
  <div class="input-field col s6">
      <textarea id="textarea1" class="materialize-textarea" name="desc"></textarea>
      <label for="first_name">Description</label>
</div>  
					
                    
                    <div class="section col s12">
                    
                    
                     <button type="submit" class="waves-effect btn col" name="submit"> SUBMIT</button>
                    
                </div></div></div></div>
                
                  
                    
					
                   
                  
                    
                    
        
        
        

  @stop