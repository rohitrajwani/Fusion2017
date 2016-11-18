 @extends('layout')
		@section('mess_content')
        
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
                
            
                
                    
        
                <div class="section col s12">
                    
                    <br><h4 class="custom col s12">Mess Bill</h4><br>
                    
                    <table class="bordered highlight">
    <thead>
      <tr bgcolor="#DCDCDC">
          <th><center>Student_Id</th>
          <th><center>Month</th>
          <th><center>Amount</th>
	  </tr>
    </thead>
	
    <tbody>
	@foreach($c as $cc)
      <tr >
        <td><center>{{$cc->student_id}}</td>
		<td><center>{{$cc->month}}</td>
		<td><center>{{$cc->amount}}</td>
      </tr>
	  @endforeach
    </tbody>
</table>
					
    </div></div></div>
                  
                    
					
                   
                  
                    
                    
        
        <script src="js/jquery-3.1.1.min.js"></script>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        

  @stop