@extends('event_organizing.layouts.master')

@section('title', 'Fusion')

@section('content')
		<!--Top Header-->
		<div class="main-container">
		<div class="head custom">
			<div class="container">
				<div class="heading" ><h4>ACADEMICS</h4></div>
			</div>
			<a class="btn-floating btn-large waves-effect waves-light grey darken-1" id="drop_button"><i class="fa fa-arrow-down"></i></a>
		</div>
		<!--Top Header-->

		<br><br>

		<!-- Start Buttons display-->
		<div class="container" id="buttons_div">
			<div class="row">

				<div class="button-container col s12 m6"> <a href="#create_event" id="create_event_btn" class="button col s8 offset-s2"> <i class="fa fa-calendar-plus-o"></i> <div class="divider col s12"></div> <h5 class="col s12">Create New Event</h5> </a> </div>

				<div class="button-container col s12 m6"> <a href="#view_all_events" id="view_all_events_btn" class="button col s8 offset-s2"> <i class="fa fa-calendar-o"></i> <div class="divider col s12"></div> <h5 class="col s12">View  All Events</h5> </a> </div>

			</div>
			<div class="row">

				<div class="button-container col s12 center"> <a href="#cancel_event" id="cancel_event_btn" class="button col s8 offset-s2"> <i class="fa fa-calendar-times-o"></i> <div class="divider col s12"></div> <h5 class="col s12">Cancel Event</h5> </a> </div>
			</div>

		</div>
		<!-- End Buttons display-->

		<div class="container" >

		<!-- Start Cancel Event View -->
			<div class="row" id="cancel_event">
				<div class="row"><h4 >Cancel Event</h4></div>

					<div class="row">
						<div class="col s12">
							<table class="bordered highlight responsive-table">
							<thead>
								<tr>
									<th></th>
									<th>Name</th>
									<th>Description</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Date</th>
									<th>Venue</th>
								</tr>
							</thead>
							<tbody>

								@foreach($future_events  as $future_event)
								<tr>
								<td>
								<a class="btn-floating tooltipped waves-effect waves-light red modal-trigger" href="#cancel_event{{$future_event->event_id}}" data-position="left" data-tooltip="Cancel"><i class="fa fa-close"></i></a>
								</td>
								<td>{{$future_event->event_name}}</td>
								<td>{{$future_event->description}}</td>
								<td>{{date('h:i a',strtotime($future_event->start_timestamp))}}</td>
								<td>{{date('h:i a',strtotime($future_event->end_timestamp))}}</td>
								<td>{{date('d/m/Y',strtotime($future_event->start_timestamp))}}</td>
								<td>{{$future_event->room_id}}</td>
								@endforeach

								</tr> </tbody> </table>
						</div>
					</div>
					@foreach($future_events  as $future_event)
					<div id="cancel_event{{$future_event->event_id}}" class="modal col s6">
						<div class="modal-content">
							<div class="center"><h5>Do You Want to Cancel the Event: <span class="red-text">{{$future_event->event_name}}</span></h5></div>
							<br>
							<br>
							<div class="row center">
								<form method="POST" action="/event_organizing/acad/eventcanceled/{{$future_event->event_id}}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn modal-action modal-close waves-effect waves-light">YES</button>
								<a class="btn modal-action modal-close waves-effect waves-light">NO</a>
								</form>
							</div>
						</div>
					</div>
					@endforeach

			</div>
		<!-- End Cancel Events View -->

		<!-- Start View All Event View -->
		<div class="row" id="view_all_events">
			<div class="row">
				<div class="col s12">
				  <ul class="tabs">
					<li class="tab col s3"><a href="#past_tab" id="past_link">Past</a></li>
					<li class="tab col s3"><a class="active" href="#present_tab" id="present_link">Present</a></li>
					<li class="tab col s3"><a href="#future_tab" id="future_link">Future</a></li>
				  </ul>
				</div>
				<div id="past_tab" class="col s12">
					<br>
					<table class="bordered highlight responsive-table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Date</th>
									<th>Venue</th>
								</tr>
							</thead>
							<tbody>

								@foreach($past_events  as $past_event)
								<tr><td>{{$past_event->event_name}}</td>
								<td>{{$past_event->description}}</td>
								<td>{{date('h:i a',strtotime($past_event->start_timestamp))}}</td>
								<td>{{date('h:i a',strtotime($past_event->end_timestamp))}}</td>
								<td>{{date('d/m/Y',strtotime($past_event->start_timestamp))}}</td>
								<td>{{$past_event->room_id}}</td></tr>
								@endforeach

								</tbody> </table>

				</div>
				<div id="present_tab" class="col s12">
					<br>
					<table class="bordered highlight responsive-table">
							<thead>
								<tr>
									<th contenteditable="true">Name</th>
									<th>Description</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Date</th>
									<th>Venue</th>
								</tr>
							</thead>
							<tbody>
								@foreach($present_events  as $present_event)
								<tr><td>{{$present_event->event_name}}</td>
								<td>{{$present_event->description}}</td>
								<td>{{date('h:i a',strtotime($present_event->start_timestamp))}}</td>
								<td>{{date('h:i a',strtotime($present_event->end_timestamp))}}</td>
								<td>{{date('d/m/Y',strtotime($present_event->start_timestamp))}}</td>
								<td>{{$present_event->room_id}}</td></tr>
								@endforeach
								 </tbody> </table>

				</div>
				<div id="future_tab" class="col s12">
					<br>
					<table class="bordered highlight responsive-table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Date</th>
									<th>Venue</th>
								</tr>
							</thead>
							<tbody>

								@foreach($future_events  as $future_event)
								<tr><td>{{$future_event->event_name}}</td>
								<td>{{$future_event->description}}</td>
								<td>{{date('h:i a',strtotime($future_event->start_timestamp))}}</td>
								<td>{{date('h:i a',strtotime($future_event->end_timestamp))}}</td>
								<td>{{date('d/m/Y',strtotime($future_event->start_timestamp))}}</td>
								<td>{{$future_event->room_id}}</td></tr>
								@endforeach

								 </tbody> </table>

				</div>
			</div>
		</div>
		<!-- End View All Event View -->



		<!-- Start Create Event View -->
			<div class="row" id="create_event">
				<div class="row"><h4 >Create Event</h4></div>
					<form method="POST" action="/event_organizing/acad/eventcreated" id="create_event_form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="row">
							<div class="col s12 m6 l6">
									<div class="input-field col s12"> <input id="event_name" type="text" class="validate" name="ename" pattern="[a-zA-Z][a-zA-Z ]+" required> <label for="event_name">*Event Name</label> </div>
							</div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12"> <input id="capacity" type="text" class="validate" name="ecapacity" pattern="[0-9]{1,3}" required> <label for="event_name">*Capacity</label> </div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s12">
								<div class="input-field col s12"> <input id="event_desc" type="text" class="validate" name="edescription" pattern="[a-zA-Z][a-zA-Z ]+" required> <label for="event_desc">*Description</label> </div>
							</div>
						</div>

						<div class="row">
							<div class="col s12 m6 l6">
								<div class="col s12">
									<label for="event_date">Event Date</label>
									<input type="date" name="edate" class="datepicker" id="event_date" data-value={{date("Y-m-d")}} required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<select id="time_range" name="timeranges" required>
										<option value="" disabled selected>Choose your options</option>
									</select>
									<label>Time Range</label>
								</div>
							</div>
							<div class="col s12 m6 l6">
								<a id="find_room" style="display:none;" class="waves-effect waves-light btn-large tooltipped" data-position="right" data-tooltip="Enter Capacity, Date and Time">Find Rooms</a>
							</div>
						</div>
						<div class="row">
							<div class="col s12 m6 l6">
								<div class="input-field col s12" >
									<select id="found_rooms" name="foundrooms" required>
										<option value="" disabled selected>Choose your options</option>
									</select>
									<label>Select Rooms</label>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s12 center">
								{{-- <br><br><br><br><br><br><br><br><br><br> --}}
								<button type="submit" class="waves-effect waves-light btn" id="create_btn">Create</button>
							</div>
						</div>
					</form>
				</div>
		<!-- End Create Event View -->


		</div>
	</div>

@endsection

@section('script')
		<script>
			function scrollingtag(link){
				$.smoothScroll({
						scrollTarget:link.hash,
						offset: -175
					});
				};

			function timerangedisplay(j){
				var hours_display="";
				var i=9;
				while((i+j)<=13){
					if(i<12){
						hours_display = i+":00 am";
					}
					else if(i==12){
						hours_display = "12:00 pm";
					}
					hours_display = hours_display+" TO ";
					if((i+j)<12){
						hours_display = hours_display+(i+j)+":00 am";
					}
					else if((i+j)==12){
						hours_display = hours_display+"12:00 pm";
					}
					else if((i+j)>12){
						hours_display = hours_display+(i+j-12)+":00 pm";
					}
					$('#time_range').append($('<option>', {
						value: i+ " "+(i+j),
						text: hours_display,
					}));
					i=i+1;
				}
				i=2;
				while((i+j)<=8){
					hours_display = i+":30 pm"+" TO "+(i+j)+":30 pm";
					$('#time_range').append($('<option>', {
						value: (i+12)+ " "+(i+12+j),
						text: hours_display,
					}));
					i=i+1;
				}
				
			}

			$(document).ready(function(){
				
				
				$("#create_event_btn").click(function(){
					$("#buttons_div").css("display","none");
					$("#cancel_event").css("display","none");
					$("#view_all_events").css("display","none");
					$("#create_event").fadeIn();
					$("#drop_button").css("display","block");
					scrollingtag(this);
				});
				$("#view_all_events_btn").click(function(){
					$("#buttons_div").css("display","none");
					$("#create_event").css("display","none");
					$("#cancel_event").css("display","none");
					$("#view_all_events").fadeIn();
					$("#drop_button").css("display","block");
					$('#present_link').click();
					scrollingtag(this);
				});
				$("#cancel_event_btn").click(function(){
					$("#buttons_div").css("display","none");
					$("#create_event").css("display","none");
					$("#view_all_events").css("display","none");
					$("#cancel_event").fadeIn();
					$("#drop_button").css("display","block");
					scrollingtag(this);
				});
				$("#drop_button").click(function(){
					$("#buttons_div").slideDown();
					$("#create_event").css("display","none");
					$("#cancel_event").css("display","none");
					$("#view_all_events").css("display","none");
					$(this).css("display","none");
				});

				if({{$event_created }}==1){
					$('#view_all_events_btn').click();
					$('#future_link').click();
					alert("Event has been created");
				}

				

				timerangedisplay(1);
				timerangedisplay(2);
				timerangedisplay(3);

				$('select').material_select();

				$("#find_room").click(function(){
					
					// $('#create_event_form select[id!="time_range"] option:not(:first)').remove().end();
					$('#found_rooms').find('option').not(':first').remove();
					var formData = {
					ecapacity: $('#capacity').val(),
					edate: $("input[name='edate']").val(),
					timeranges: $('#time_range').val(),
					}

					$.ajax({
					   type:'POST',
					   url:'/event_organizing/getrooms',
					   data:formData,
					   headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
					   success:function(data){
							for(var i=0;i<data.length;i++){
							$("#found_rooms").append($('<option>', {
							value: data[i],
							text: data[i],
							}));
							$("#found_rooms").material_select();
						}
					   }
					 });
				});

				$('#capacity').on('change', function () {
					$("#find_room").click();
					});
				$('#time_range').on('change', function () {
					$("#find_room").click();
					});
				$('#event_date').on('change', function () {
					$("#find_room").click();
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
				$('#event_date').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 1, // Creates a dropdown of 1 years to control year
				format: 'dddd, dd mmm, yyyy',
				formatSubmit: 'yyyy-mm-dd',
				hiddenName: true,
				  min: 1, // An integer (positive/negative) sets it relative to today.
				max: 15, // `true` sets it to today. `false` removes any limits.
				clear: '',
				today: '',
				closeOnSelect: true,
				close: 'OK'
				});

				$('ul.tabs').tabs();
				$('.modal-trigger').leanModal({
					// starting_top: '10%',
					ending_top: '30%',
				});
				$('.tooltipped').tooltip({delay: 100});
				
			});
		</script>
   @endsection
