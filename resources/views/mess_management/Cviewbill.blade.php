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
                            </ul
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
					
    </div>
                  
                    
					
                   
                  
                    
       
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
        
        @stop

   