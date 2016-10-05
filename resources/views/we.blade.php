@extends('layouts.master')

@section('title', 'Fusion')

@section('content')
        <!--Top Header-->
        <div class="main-container">
        <div class="head">
            <div class="container">
                <div class="heading"><h4>ACADEMICS</h4></div>
            </div>
            <a class="btn-floating btn-large waves-effect waves-light grey darken-1" id="drop_button"><i class="fa fa-arrow-down"></i></a>
        </div>
        <!--Top Header-->
        
        <br><br>

        <!-- Start Buttons display-->
        <div class="container" id="buttons_div">
            <div class="row">
                <div class="button-container col s12 m6"> <a href="#" id="block_unblock_room_btn" class="button col s8 offset-s2"> <i class="fa fa-unlock-alt"></i> <div class="divider col s12"></div> <h5 class="col s12">Block / Unblock Room</h5> </a> </div>
                <div class="button-container col s12 m6 "> <a href="#" id="create_event_btn" class="button col s8 offset-s2"> <i class="fa fa-calendar-plus-o"></i> <div class="divider col s12"></div> <h5 class="col s12">Create New Event</h5> </a> </div>
            </div>
            <div class="row">
                <div class="button-container col s12 m6 "> <a href="#" id="view_all_events_btn" class="button col s8 offset-s2"> <i class="fa fa-calendar-o"></i> <div class="divider col s12"></div> <h5 class="col s12">View  All Events</h5> </a> </div>
                <div class="button-container col s12 m6 "> <a href="#" id="cancel_event_btn" class="button col s8 offset-s2"> <i class="fa fa-calendar-times-o"></i> <div class="divider col s12"></div> <h5 class="col s12">Cancel Event</h5> </a> </div>
            </div>
        </div>
        <!-- End Buttons display-->

        <div class="container" >
            
        <!-- Start Block / Unblock Room View -->
            <div class="row" id="block_unblock_room">
                <div class="row"><h4 >Block / Unblock Rooms</h4></div>
                <form action="#">
	                <div class="row">
	                        <p>
	                          <input type="checkbox" class="filled-in" id="select_all"/>
	                          <label for="select_all">Select All</label>
	                        </p>
	                        <p>
	                          <input type="checkbox" class="filled-in venue_checkbox" id="cr-box1"/>
	                          <label for="cr-box1">CR-#</label>
	                          <input type="checkbox" class="filled-in venue_checkbox" id="cr-box2"/>
	                          <label for="cr-box2">CR-#</label>
	                          <input type="checkbox" class="filled-in venue_checkbox" id="cr-box3"/>
	                          <label for="cr-box3">CR-#</label>
	                        </p>
	                        <p>
	                          <input type="checkbox" class="filled-in venue_checkbox" id="l-box1"/>
	                          <label for="l-box1">L-#</label>
	                          <input type="checkbox" class="filled-in venue_checkbox" id="l-box2"/>
	                          <label for="l-box2">L-#</label>
	                        </p>
	                        <p>
	                          <input type="checkbox" class="filled-in venue_checkbox" id="other-box1"/>
	                          <label for="other-box1">Others</label>
	                        </p>
	                </div>
	                <br>
	                <div class="row">
	                	<div class="col s12 m6 l6">
	                		
	                		<label for="from_date">From</label>
	                		<input type="date" class="datepicker" id="from_date">
	                		
	                		<label for="to_date">To</label>
	                		<input type="date" class="datepicker" id="to_date">
	                	</div>
	                	<div class="col s12 m6 l6">
	                		 <div class="input-field col s12"> <textarea id="reason_block" class="materialize-textarea"></textarea> <label for="reason_block">Reason For Blocking</label> </div>
	                	</div>
	                </div>
	                <div class="row center">
	                <button class="waves-effect waves-light btn-large">Update Status</button>
	                </div>
                </form>
            </div>
        <!-- End Block / Unblock Room View -->


        <!-- Start Cancel Event View -->
            <div class="row" id="cancel_event">
                <div class="row"><h4 >Cancel Event</h4></div>
                <form>
                    <div class="row">
                        <div class="col s12">
                            <table class="bordered highlight">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Venue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><button class="btn-floating btn-large waves-effect waves-light red"><i class="fa fa-ban"></i></button></td>
                                    <td>Name of the event</td> <td>Description goes here</td> <td>10:00am 10/12/2016</td> <td>CR-106</td>
                                </tr> </tbody> </table>
                        </div>
                    </div>
                </form>
            </div>
        <!-- End Cancel Event View -->

		<!-- Start View All Event View -->        
        <div class="row" id="view_all_events">
	        <div class="row">
	            <div class="col s12">
	              <ul class="tabs">
	                <li class="tab col s3"><a href="#past_tab">Past</a></li>
	                <li class="tab col s3"><a class="active" href="#present_tab">Present</a></li>
	                <li class="tab col s3"><a href="#future_tab">Future</a></li>
	              </ul>
	            </div>
	            <div id="past_tab" class="col s12">
	            	<br>
	            	<table class="bordered highlight">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Venue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Past event</td> <td>Description goes here</td> <td>10:00am 10/12/2016</td> <td>CR-106</td>
                                </tr> </tbody> </table>

	            </div>
	            <div id="present_tab" class="col s12">
	            	<br>
	            	<table class="bordered highlight">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Venue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Present event</td> <td>Description goes here</td> <td>10:00am 10/12/2016</td> <td>CR-106</td>
                                </tr> </tbody> </table>

	            </div>
	            <div id="future_tab" class="col s12">
	            	<br>
	            	<table class="bordered highlight">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Venue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Future event</td> <td>Description goes here</td> <td>10:00am 10/12/2016</td> <td>CR-106</td>
                                </tr> </tbody> </table>

	            </div>
	  		</div>
  		</div>
  		<!-- End View All Event View -->



        <!-- Start Create Event View -->
            <div class="row" id="create_event">
                <div class="row"><h4 >Create Event</h4></div>
                    <form>
                        <div class="row">
                            <div class="col s12 m5 l5">
                                
                                    <div class="row">
                                        
                                            <div class="input-field col s12"> <input id="event_name" type="text" class="validate"> <label for="event_name">*Event Name</label> </div>
                                        
                                    </div>
                                    <div class="row">
                                        
                                            <div class="input-field col s12"> <textarea id="event_desc" class="materialize-textarea"></textarea> <label for="event_desc">*Description</label> </div>
                                        
                                    </div>
                                    <div class="row">
                                        
                                            <div class="input-field col s12"> <input id="capacity" type="text" class="validate"> <label for="event_name">Capacity</label> </div>
                                        
                                    </div>
                                
                            </div>
                            <div class="col s12 m6 l6 push-m1 push-l1">
                                <h5> Suggested SLots</h5>
                                <div class="suggested_list">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</div>
                                <div class="suggested_list">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</div>
                                <div class="suggested_list">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</div>
                            </div>

                    </div>
                    <div class="row">
                        <div class="col s12 m9 l9">
                            <table class="bordered highlight"> <thead> <tr> <th>Name</th> <th>Item Name</th> <th>Item Price</th> </tr> </thead> <tbody> <tr> <td>Alvin</td> <td>Eclair</td> <td>$0.87</td> </tr> <tr> <td>Alan</td> <td>Jellybean</td> <td>$3.76</td> </tr> <tr> <td>Jonathan</td> <td>Lollipop</td> <td>$7.00</td> </tr> <tr> <td>Alvin</td> <td>Eclair</td> <td>$0.87</td> </tr> <tr> <td>Alan</td> <td>Jellybean</td> <td>$3.76</td> </tr> <tr> <td>Jonathan</td> <td>Lollipop</td> <td>$7.00</td> </tr> </tbody> </table>
                        </div>
                        <div class="col s12 m3 l3 center">
                            <br><br><br>
                            <button class="waves-effect waves-light btn">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        <!-- End Create Event View -->


        </div>
@endsection

@section('script')
        <script>
            $(document).ready(function(){
                $("#block_unblock_room_btn").click(function(){
                    $("#buttons_div").css("display","none");
                    $("#create_event").css("display","none");
                    $("#cancel_event").css("display","none");
                    $("#view_all_events").css("display","none");
                    $("#block_unblock_room").fadeIn();
                    $("#drop_button").css("display","block");
                });
                $("#create_event_btn").click(function(){
                    $("#buttons_div").css("display","none");
                    $("#block_unblock_room").css("display","none");
                    $("#cancel_event").css("display","none");
                    $("#view_all_events").css("display","none");
                    $("#create_event").fadeIn();
                    $("#drop_button").css("display","block");
                });
                $("#view_all_events_btn").click(function(){
                    $("#buttons_div").css("display","none");
                    $("#block_unblock_room").css("display","none");
                    $("#create_event").css("display","none");
                    $("#cancel_event").css("display","none");
                    $("#view_all_events").fadeIn();
                    $("#drop_button").css("display","block");
                });
                $("#cancel_event_btn").click(function(){
                    $("#buttons_div").css("display","none");
                    $("#block_unblock_room").css("display","none");
                    $("#create_event").css("display","none");
                    $("#view_all_events").css("display","none");
                    $("#cancel_event").fadeIn();
                    $("#drop_button").css("display","block");
                });
                $("#drop_button").click(function(){
                    $("#buttons_div").slideDown();
                    $("#block_unblock_room").css("display","none");
                    $("#create_event").css("display","none");
                    $("#cancel_event").css("display","none");
                    $("#view_all_events").css("display","none");
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
                $('ul.tabs').tabs();
            });
        </script>
   @endsection