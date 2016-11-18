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
	 @foreach($c1 as $cc)
      <tr >
        <td><center>{{$cc->student_id}}</center></td>
		 <td><center>{{$cc->member_name}}</center></td>
		</tr>
	  @endforeach
	 
    </tbody>
</table>
</div>

<div class="section col s6">
<table class="bordered highlight">
				<thead>
      <tr bgcolor="#DCDCDC">
          <th><center>RollNo</th>
		  <th><center>Name</th>
		 
         
      </tr>
    </thead>
    <tbody>
	 @foreach($c2 as $cc)
      <tr >
        <td><center>{{$cc->student_id}}</center></td>
		 <td><center>{{$cc->member_name}}</center></td>
		</tr>
	  @endforeach
	 
    </tbody>
</table>
</div>
               
          
               
          
                
        
        
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
    @stop