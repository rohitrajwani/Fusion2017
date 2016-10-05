@extends('layouts.master')

@section('title', 'Fusion')

@section('content')

        <!--<header>
            <nav>
                <div class="nav-wrapper">
                  <a href="#!" class="brand-logo">Fusion</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul class="right hide-on-med-and-down">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                  </ul>
                  <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                  </ul>
                </div>
            </nav>
        </header>
        <div class="sidebar">
            <ul id="slide-out" class="side-nav fixed">
                <li><a href="#!" class="waves-effect">First Link</a></li>
                <li><a href="#!" class="waves-effect">Second Link</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Subheader</a></li>
                <li><a class="waves-effect" href="#!">Third Link</a></li>
            </ul>
        </div>-->
        <!--Top Header-->
        <div class="main-container">
        <div class="head">
            <div class="container">
                <div class="heading"><h4>So and So Club</h4></div>
					
            </div>
            <a class="btn-floating btn-large waves-effect waves-light grey darken-1" id="drop_button"><i class="fa fa-arrow-down"></i></a>
		</div>
	<div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#HOME">HOME</a></li>
        <li class="tab col s3"><a href="#EVENTS">EVENTS</a></li>
        
        <li class="tab col s3"><a href="#MEMBERS">MEMBERS</a></li>
		<li class="tab col s3"><a href="#"></a></li>
      </ul>
    </div>
	</div>
	<p></p>
	<div class="row">
    <div id="HOME" class="col s12">
	 <div class="row">
		<br>
        <div id="description" class="col s6 m6">
          
            <div class="container">
              <h5>Club Description</h5><br>
              <br>
			  <br>
			  <br>
			  <br>
			  <br>
            </div> 
        
			  <div class="container">            
				  <h5>Club Admins</h5><br>
				  <h6>Coordinator-</h6>
				  <br>
				  <h6>Co-Coordinator-</h6>
				  <br>         
			  </div>
        </div>
		<div class="col s6 m6" id="buttons_div">
        
            <div class="row">
			<br>
                
                <div class="button-container col s12 m12 "> <a href="#create_event" id="create_event_btn" class="button col s8 offset-s2"> <h5 class="col s12">Create New Event</h5> </a> </div>
			</div>
            <div class="row">
				
                <div class="button-container col s12 m12"> <a href="#cancel_event" id="cancel_event_btn" class="button col s8 offset-s2" > <h5 class="col s12">Cancel Event</h5> </a> </div>
            </div>
            <div class="row">
                <div class="button-container col s12 m12  "> <a href="#propose_event" id="propose_event_btn" class="button col s8 offset-s2">  <h5 class="col s12">Propose Events</h5> </a> </div>
			</div>
            <div class="row">
                <div class="button-container col s12 m12 "> <a href="#event_request" id="request_event_btn" class="button col s8 offset-s2">  <h5 class="col s12">Event Requests</h5> </a> </div>
            </div>
        </div>
        <div class="container" >
            <div class="row" id="block_unblock_room">
                <div><h4 >Block / Unblock Rooms</h4>
                    <form action="#">
                        <p>
                          <input type="checkbox" class="filled-in" id="select_all" checked="unchecked" />
                          <label for="select_all">Select All</label>
                        </p>
                        <p>
                          <input type="checkbox" class="filled-in venue_checkbox" id="cr-box" checked="unchecked" />
                          <label for="cr-box">CR-#</label>
                        </p>
                        <p>
                          <input type="checkbox" class="filled-in venue_checkbox" id="l-box" checked="unchecked" />
                          <label for="l-box">L-#</label>
                        </p>
                        <p>
                          <input type="checkbox" class="filled-in venue_checkbox" id="other-box" checked="unchecked" />
                          <label for="other-box">Others</label>
                        </p>
                      </form>
                </div>
            </div>
            <div class="row" id="propose_event">
                <div><h4 >Propose Event</h4>
                    <div class="row">
						<form class="col s12">
						  <div class="row">
							<div class="input-field col s6">
							  <input id="event_name" type="text" class="validate">
							  <label for="event_name">Event Name</label>
							</div>
						   </div>
						<div class="row">
							<div class="input-field col s6">
							  <input id="Description" type="text" class="validate">
							  <label for="Description">Description</label>
							</div>
						 </div> 
						 Date
						  <div class="row">
							<div class="input-field col s6">
							  <input id="Date" type="Date" class="validate">
							  <label for="Date"></label>
							</div>
						  </div>
						  Time
						  <div class="row">
							<div class="input-field col s6">
							  <input id="Time" type="Time" class="validate">
							  <label for="Time"></label>
							</div>
						  </div>
						  <input type=submit id="propose_submit">
						</form>
					  </div>

                </div>
            </div>
         </div>
     </div>	
    </div>
	
	
	
	</div>
    
	<div id="EVENTS" class="col s12">Current Events</div>
    
    <div id="MEMBERS" class="col s12">MEMBERS</div>
  </div>

        <!--Top Header-->
		
        
@endsection

@section('script')
        <script>
            $(document).ready(function(){
                
                $("#create_event_btn").click(function(){
                    $("#buttons_div").css("display","none");
                    $("#block_unblock_room").css("display","none");
                    $("#create_event").fadeIn();
                    $("#drop_button").css("display","block");
                });
                $("#propose_event_btn").click(function(){
                    $("#buttons_div").css("display","none");
                    $("#description").css("display","none");
                    $("#propose_event").fadeIn();
                    $("#drop_button").css("display","block");
                });
				$("#drop_button").click(function(){
                    $("#buttons_div").slideDown();
					$("#description").slideDown();
                    $("#block_unblock_room").css("display","none");
                    $("#propose_event").css("display","none");
                    $("#drop_button").css("display","none");
                });
                //select all checkboxes
                $("#select_all").change(function(){  //"select all" change
                    $(".venue_checkbox").prop('checked', $(this).prop("checked")); //change all ".venue_checkbox" checked status
                });

                //".checkbox" change
                $('.venue_checkbox').change(function(){
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if(false == $(this).prop("checked")){ //if this item is unchecked
                        $("#select_all").prop('checked', false); //change "select all" checked status to false
                    }
                    //check "select all" if all checkbox items are checked
                    if ($('.venue_checkbox:checked').length == $('.venue_checkbox').length ){
                        $("#select_all").prop('checked', true);
                    }
                });
                $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 2 // Creates a dropdown of 15 years to control year
                });
            });
        </script>
   @endsection