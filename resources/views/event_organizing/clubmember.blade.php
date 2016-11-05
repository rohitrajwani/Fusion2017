@extends('event_organizing.layouts.master')

@section('title', 'Fusion')

@section('content')
	<!--Top Header-->
	<div class="main-container">
		<div class="head custom">
			<div class="container">
				<div class="heading"><h4>{{$clubname}}</h4></div>
			</div>
			<a class="btn-floating btn-large grey darken-1" id="back_button" href="/event_organizing/clubs"><i class="fa fa-arrow-left"></i></a>
			<a class="btn-floating btn-large waves-effect waves-light grey darken-1" id="drop_button"><i class="fa fa-arrow-down"></i></a>

			<div class="white-text" id="description">
				<div><h5>Coordinator- {{$clubco}}</h5></div>
				<div><h5>Co-Coordinator- {{$clubcoco}}</h5></div>
			</div>
		</div>

		<br><br>

		<div class="container" id="buttons_div">
			<div class="row">

				<div class="button-container col s12 m6"> <a href="#view_all_events" id="view_all_events_btn" class="button col s8 offset-s2"> <i class="fa fa-calendar-o"></i> <div class="divider col s12"></div> <h5 class="col s12">View  All Events</h5> </a> </div>

				<div class="button-container col s12 m6"> <a href="#view_members" id="view_members_btn" class="button col s8 offset-s2"> <i class="fa fa-search"></i> <div class="divider col s12"></div> <h5 class="col s12">View Members</h5> </a> </div>

			</div>
		</div>
		 <div class="container" >

		<!-- Start View All Event View -->
		<div class="row" id="view_all_events">
			<div class="row">
				<div class="col s12">
				  <ul class="tabs">
					<li class="tab col s3"><a href="#past_tab" id="past_link">Previous</a></li>
					<li class="tab col s3"><a class="active" href="#present_tab" id="present_link">Ongoing</a></li>
					<li class="tab col s3"><a href="#future_tab" id="future_link">Upcoming</a></li>
				  </ul>
				</div>
				<div id="past_tab" class="col s12">
					<br>
					@if(count($past_events)>0)
					<table class="bordered highlight responsive-table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Date</th>
									<th>Venue</th>
									<th>Result</th>
								</tr>
							</thead>
							<tbody>
									
								@foreach($past_events  as $past_event)
								<tr><td>{{$past_event->event_name}}</td>
								<td>{{$past_event->description}}</td>
								<td>{{date('h:i:s a',strtotime($past_event->start_timestamp))}}</td>
								<td>{{date('h:i:s a',strtotime($past_event->end_timestamp))}}</td>
								<td>{{date('d/m/Y',strtotime($past_event->start_timestamp))}}</td>
								<td>{{$past_event->room_id}}</td>
								<td><div class="row"><a href="#declare_results{{$past_event->event_id}}" class="btn waves-effect waves-light modal-trigger">Results</a></div><div class="row"><a href="#submit_review{{$past_event->event_id}}" class="btn waves-effect waves-light modal-trigger">Review</a></div>
								</td></tr>
								
								@endforeach
								</tbody> </table>

								@foreach($past_events  as $past_event)
								<div id="submit_review{{$past_event->event_id}}" class="modal col s6">
										<div class="modal-content">
											<?php $f=0; ?>
											@foreach($user_reviewed  as $user_review)
												@if($user_review->event_id==$past_event->event_id)
													<?php $f=1; ?>
												@endif
											@endforeach
												@if($f==0)
													<div class="center"><h5>Do You Want to Review the Event: {{$past_event->event_name}}</h5><div class="divider"></div></div>
													<br>
													<br>
													
													<form method="POST" action="/event_organizing/{{$clubname}}/event_review/{{$past_event->event_id}}">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<div class="input-field col s12"> <input id="event_desc" type="text" class="validate" name="edescription" required> <label for="event_desc">Write Review</label> </div>
													<div class="center">
													<button type="submit" class="btn modal-action modal-close waves-effect waves-light">Post</button>
													<a class="btn modal-action modal-close waves-effect waves-light">Cancel</a>
													</div>
													</form>
												@endif
											@if(count($reviews)>0)
											<div class="center">
														<h5>Reviews for : {{$past_event->event_name}}</h5><div class="divider"></div>
											</div>
												<br>
												<div class="row">
													<div class="col s6 center"><b>Name</b></div>
													<div class="col s6 center"><b>Review</b></div>
												</div>
											@endif
											@foreach($reviews as $review)
												@if($review->event_id==$past_event->event_id)
												<div class="row">
														<div class="col s6 center">{{$review->student_id}}</div>
														<div class="col s6 center">{{$review->description}}</div>
												</div>
												@endif
											@endforeach
											@if(count($reviews)>0)
											<div class="center"><a class="btn modal-action modal-close waves-effect waves-light">OK</a></div>
											@endif
											
										</div>
								</div>
								<div id="declare_results{{$past_event->event_id}}" class="modal col s6">
									<div class="modal-content">
										@if($past_event->result == "")
										<div class="center">
											<h5>Results for : {{$past_event->event_name}}</h5><div class="divider"></div><div class="red-text">Not Declared Yet</div></div><br><br>
										<div class="center"><a class="btn modal-action modal-close waves-effect waves-light">OK</a></div>
										@else
										<div class="center">
											<h5>Results for : {{$past_event->event_name}}</h5><div class="divider"></div><br>
												{{$past_event->result}}</div><br><br>
										<div class="center"><a class="btn modal-action modal-close waves-effect waves-light">OK</a></div>
										@endif
									</div>
								</div>
								@endforeach
					@else
							<div class="row"><h5>No Past Events</h5></div>
					@endif
				</div>
				<div id="present_tab" class="col s12">
					<br>
					@if(count($present_events)>0)
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
								<td>{{date('h:i:s a',strtotime($present_event->start_timestamp))}}</td>
								<td>{{date('h:i:s a',strtotime($present_event->end_timestamp))}}</td>
								<td>{{date('d/m/Y',strtotime($present_event->start_timestamp))}}</td>
								<td>{{$present_event->room_id}}</td></tr>
								@endforeach
								 </tbody> </table>
					@else
							<div class="row"><h5>No Ongoing Events</h5></div>
					@endif

				</div>
				<div id="future_tab" class="col s12">
					<br>
					@if(count($future_events)>0)
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
								<td>{{date('h:i:s a',strtotime($future_event->start_timestamp))}}</td>
								<td>{{date('h:i:s a',strtotime($future_event->end_timestamp))}}</td>
								<td>{{date('d/m/Y',strtotime($future_event->start_timestamp))}}</td>
								<td>{{$future_event->room_id}}</td></tr>
								@endforeach

								 </tbody> </table>
					@else
							<div class="row"><h5>No Upcoming Events</h5></div>
					@endif

				</div>
			</div>
		</div>
		<!-- End View All Event View -->

		{{-- Start View Members View --}}
			<div class="row" id="view_members">
				<div class="row"><h4 >Members List for: {{$clubname}}</h4></div>
				<div class="row">
					<br>
					<table class="bordered highlight responsive-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Roll No</th>
								<th>Student Id</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($clubmemberslist  as $clubmemberl)
							<tr><td>{{$clubmemberl->name}}</td>
							<td>{{$clubmemberl->roll_no}}</td>
							<td>{{$clubmemberl->student_id}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		{{-- End View Members View --}}

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

			$(document).ready(function(){

				$("#create_event_btn").click(function(){
					$("#buttons_div").css("display","none");
					$("#cancel_event").css("display","none");
					$("#view_all_events").css("display","none");
					$("#view_members").css("display","none");
					$("#create_event").fadeIn();
					$("#drop_button").css("display","block");
					scrollingtag(this);
				});
				$("#view_all_events_btn").click(function(){
					$("#buttons_div").css("display","none");
					$("#create_event").css("display","none");
					$("#cancel_event").css("display","none");
					$("#view_members").css("display","none");
					$("#view_all_events").fadeIn();
					$("#drop_button").css("display","block");
					$('#present_link').click();
					scrollingtag(this);
				});
				$("#cancel_event_btn").click(function(){
					$("#buttons_div").css("display","none");
					$("#create_event").css("display","none");
					$("#view_all_events").css("display","none");
					$("#view_members").css("display","none");
					$("#cancel_event").fadeIn();
					$("#drop_button").css("display","block");
					scrollingtag(this);
				});
				$("#view_members_btn").click(function(){
					$("#buttons_div").css("display","none");
					$("#create_event").css("display","none");
					$("#cancel_event").css("display","none");
					$("#view_all_events").css("display","none");
					$("#view_members").fadeIn();
					$("#drop_button").css("display","block");
					scrollingtag(this);
				});
				$("#drop_button").click(function(){
					$("#buttons_div").slideDown();
					$("#create_event").css("display","none");
					$("#cancel_event").css("display","none");
					$("#view_all_events").css("display","none");
					$("#view_members").css("display","none");
					$(this).css("display","none");
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
				min: true, // An integer (positive/negative) sets it relative to today.
				max: 15, // `true` sets it to today. `false` removes any limits.
				clear: '',
				});

				$('ul.tabs').tabs();
				$('.modal-trigger').leanModal({
					// starting_top: '10%',
					ending_top: '30%',
				});
			});
		</script>
   @endsection
