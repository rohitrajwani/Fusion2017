
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
					<h4 class="custom col s12">Feedbacks</h4>       
					 <ul class="collapsible" data-collapsible="accordion">
    @foreach($c as $cc)
	<li>
     <div class="collapsible-header active">{{$cc->student_id}}</div>
      <div class="collapsible-body"><p>Cleanliness:- {{$cc->cleanliness}}<br>Service :-{{$cc->service}}<br>Behaviour:- {{$cc->behaviour}}<br>Food Quality:-{{$cc->food_quality}}<br>Comments:-{{$cc->description}}<br></p></div>
    </li>
    @endforeach
  </ul>
        
               
          
               
        
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