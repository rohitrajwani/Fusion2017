@extends('event_organizing.layouts.master')

@section('title', 'Fusion')

@section('content')
	<!--Top Header-->
	<div class="main-container">
		<div class="head custom">
			<div class="container">
				<div class="heading"><h4>Welcome {{Auth::user()->username}},</h4></div>
			</div>
		</div>

		<br><br>
		<div class="container" id="buttons_div">
			@if(Auth::user()->hasRole('club_co') || Auth::user()->hasRole('club_coco'))
			<div class="row">
				<div class="button-container col s12 m6"> <a href="/event_organizing/clubadmin/{{$adminclub}}" id="view_all_events_btn" class="button col s8 offset-s2"> <i class="fa fa-user-secret"></i> <div class="divider col s12"></div> <h5 class="col s12">{{$adminclub}} - Admin</h5> </a> </div>
			</div>
			@endif
			<div class="row">
			@foreach($clubsparts  as $clubspart)
				<div class="button-container col s12 m6"> <a href="/event_organizing/clubmember/{{$clubspart->club_name}}" id="view_all_events_btn" class="button col s8 offset-s2"> <i class="fa fa-user"></i> <div class="divider col s12"></div> <h5 class="col s12">{{$clubspart->club_name}}</h5> </a> </div>
			@endforeach
			</div>
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
