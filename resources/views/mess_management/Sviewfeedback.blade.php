 @extends('layout')
		@section('mess_content')
        
        <div class="main-container row">
            <h4 class="col s12 m4 offset-m4"><b>CENTRAL MESS</b></h4>
								
                            
							
                <div class="section col s12">
                    
                    <div class="col s12 m12">
                        <!-- Dropdown Structure -->
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
					<div class="divider col s12"></div>
					<h4 class="custom col s12">Feedbacks</h4>  
							
				 <ul class="collapsible" data-collapsible="accordion">
    @foreach($c as $cc)	
				<li>
     <div class="collapsible-header active">{{$cc->student_id}}</div>
      <div class="collapsible-body"><p>Cleanliness:- {{$cc->cleanliness}}<br>Service :-{{$cc->service}}<br>Behaviour:- {{$cc->behaviour}}<br>Food Quality:-{{$cc->food_quality}}<br>
	Comments:-{{$cc->description}}<br></p></div>
    </li>
    @endforeach
  </ul></div></div></div>
               
          
               
        
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
    