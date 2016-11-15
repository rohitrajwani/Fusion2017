@extends('SRS.layout')
@section('content')
@if($alert = Session::get('alert'))
            <script type="text/javascript">alert("{{$alert}}");</script>
@endif

<div class="row">
	<div class="container col s12" style="width:98%">
		
				<div class="row">
					
				<h4>Welcome {{$username}}</h4>
				</div>
</div>
<div class="row">
	<div class="col s8 offset-s2 m8 offset-m4 l2 offset-l2" id="btn-fix">
	<a class="btn-large waves-effect waves-light" style="background-color:#076392;width:200px" href="/SRS/student/register_course"><span style="font-size:0.8em">Register Course</span></a></p>
					</div>
	<div class="col s8 offset-s2 m8 offset-m4 l2 offset-l2" id="btn-fix">
		<a class="btn-large waves-effect waves-light" style="background-color:#076392;width:200px" href="/SRS/student/update_course"><span style="font-size:0.8em">Update Course</span></a></p>
	</div>
					
</div>
</div>

				
	@stop
	@section('foobar')
					
					<script>
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