@extends('CAMS.layout')

@section('class_attendance_content')
	<br>
			<center><h3><span class="rt" >{{$coursename}}</span></h3></p></center><br></br>
			<div class="container">
				<div class="row">
					<div class="col s8 offset-s2 m8 offset-m4 l2 offset-l2" id="btn-fix">
						<a class="btn-large waves-effect waves-light" style="background-color:#076392;width:200px" href="/CAMS/take-attendance/online/{{$coursename}}"><span style="font-size:0.8em">Online Mode</span></a></p>
					</div>
					<div class="col s8 offset-s2 m8 offset-m4 l2 offset-l2" id="btn-fix">
						<a class="btn-large waves-effect waves-light" style="background-color:#076392;width:200px" href="/CAMS/take-attendance/offline/{{$coursename}}"><span style="font-size:0.8em">Offline Mode</span></a></p>
					</div>
					
				</div>
			</div>
@stop