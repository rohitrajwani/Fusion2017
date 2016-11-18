@extends('CAMS.layout')
@section('class_attendance_content')

<br>
<center>
	<h5 class="rt">{{$coursename}}</h5>
</center>
<div class="row">
	<form action="/choose_date/{{$coursename}}" method="post" class="col s12">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
			<div class="row">
				<div class="col s12 m12 l12">
					<div class="input-field col s12">
						<select name="myDate">
								@foreach($dates as $d)
								
							<option value="{{$d->date}}">{{$d->date}}</option>
							@endforeach						
						
						</select>
						<label> Select Date</label>
					</div>
				</div>
			</div>
			<center>
				<button class="btn waves-effect waves-light" type="submit" name="action">Submit
									
					<i class="material-icons right">send</i>
				</button>
			</center>
		</form>
	</div>
@stop
@section('foobar')
<script>		 $(document).ready(function() {
    $('select').material_select();
  });
         $('select').material_select('destroy');
		</script>
@stop