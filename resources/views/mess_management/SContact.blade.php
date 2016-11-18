 @extends('layout')
		@section('mess_content')
        
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
                                  <a class="dropdown-button" href="#!" data-activates="dropdown1">Feedback<i class="fa fa-arrow-down right"></i></a>
                                </li>
							  <li><a href='/mess_management/Sviewbill'>View Mess Bill</a></li>
							  <li>
                                  <a class="dropdown-button" href="#!" data-activates="dropdown1">Special Order<i class="fa fa-arrow-down right"></i></a>
                                </li>
							  <li><a href='/mess_management/SContact'>Contact Us</a></li>
                              <!-- Dropdown Trigger -->
                              </ul>
                          </div>
                        </nav> 
                    </div>
					<div class="section col s12"><h5><u>MESS MANAGER</u><br></h5>
                    <p class="col s12"><h6>Mr.Talib Ahmad</h6><h6>Faculty Incharge Central Mess</h6><h6>email:talib@iiitdmj.ac.in</h6><br><br></p>
            
                <h5><u>MESS COMMITTEE</u><br></h5>
				<table class="bordered highlight">
				<thead>
      <tr bgcolor="#DCDCDC">
          <th><center>MESS-I</th>
          <th><center>MESS-II</th>
      </tr>
    </thead>
    <tbody>
      <tr >
        <td><center>A</td>
		<td><center>X</td>
              </tr>
	   <tr bgcolor="#f0f5f5" >
        <td><center>A</td>
		<td><center>X</td>
              </tr>
			  <tr >
        <td><center>A</td>
		<td><center>X</td>
              </tr>
			  <tr bgcolor="#f0f5f5" >
        <td><center>A</td>
		<td><center>X</td>
              </tr>
    </tbody>
</table></div></div></div>
               
          
                
        
        
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
    @stop