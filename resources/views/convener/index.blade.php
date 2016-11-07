@extends('layout')
@section('body')
<div class="row">
	<div class="col s1 m1 l1"><a href="{{ route('studentgymkhana/') }}"><i class="fa fa-home fa-3x"></i></a></div>
	<div class="col s10 m10 l10 center"><h2> Senate Convener</h2></div>
	@if(Session::has('message'))
		<div class="col s12 m12 l12 center"><p style="color:red;">{{ Session::get('message') }}</p></div>
        
	@endif
  	

  	<div class="col s12 m4 l4 center ">
  		<div class="card indigo lighten-5">
  		<div class="card-content ">
  		<h4 class="center-align"> Senate Members </h4>
  		</div>
  		<div class="card-action">
  		<table class="bordered highlight"> 
  			<thead>
  				<th>Student ID</th><th>Responsibility</th>
  			</thead>
  			<tbody> 
  				@foreach ($members as $m) 
  					<tr><td>{{ $m->student_id }}</td><td>{{ $m->responsibility}}</td></tr>  
				@endforeach
  			</tbody> 
  		</table>
  		</div>
  		</div>
  	</div>

  	<div class="col s12 m4 l4 center ">
  		<div class="card indigo lighten-5">
  		<div class="card-content ">
  		<h4 class="center-align"> Senate Meetings </h4>
  		</div>
  		<div class="card-action">
  		<table class="bordered highlight"> 
  			<thead>
  				<th>Agenda</th><th>Minutes</th><th>Timestamps</th>
  			</thead>
  			<tbody> 
  				@foreach ($meetings as $m) 
  					<tr><td>{{ $m->agenda }}</td><td>{{ $m->minutes }}</td><td>{{ $m->timestamp }}</td></tr>  
				@endforeach
  			</tbody> 
  		</table>
  		</div>
  		</div>
  	</div>
  		
  	<div class="col s12 m4 l4 center">
	  	<ul class="collapsible popout" data-collapsible="accordion">
	  		@if (count($errors) > 0)
    		<div class="alert alert-danger left-align">
	        <ol>
	            @foreach ($errors->all() as $error)
	                <li style="color:red"><i class="fa fa-circle"></i> {{ $error }}</li>
	            @endforeach
	        </ol>
    		</div>
			@endif
		    <!-- delete member-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-trash"></i>Delete Member</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="deletesenatemember">
		        		<div class="input-field" >
		        			<select name="oldmember" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($members as $m) 
		  							<option value="{{$m->student_id}}">{{$m->student_id }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Member</label>  
		        		</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Delete<i class="fa fa- right"></i>
						</button>
	  			  	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
	  			  	</form>
		      	</div>
		    </li>
		    <!-- insert member-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Insert Member</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="insertsenatemember">
		        		<label for="member1">New Member Student ID</label>  
						<input id="member1" name="newmember" type="text" class="validate" required max="100">
						<label for="member1">Responsibility</label>  
						<input id="member1" name="role" type="text" class="validate" requried max="100">    
						<button class="btn waves-effect waves-light" type="submit" name="action">Insert<i class="fa fa- right"></i>
						</button>
	  			  		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
	  			  	</form>
		      	</div>
		    </li>
		    <!-- insert minutes-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Insert Minutes and Agenda</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="insertminutes">
		        		<label for="member1">URL for Minutes</label>  
						<input id="member1" name="newminute" type="url" class="validate" required max="100">
						<label for="member1">URL for Agenda</label>  
						<input id="member1" name="newagenda" type="url" class="validate" required max="100">
						 <label for="member1">Date and Time : YYYY-MM-DD HH:MM:SS</label>  
						<input placeholder="YYYY-MM-DD HH:MM:SS" id="member1" name="time" type="text" class="validate" required max="20">
						<button class="btn waves-effect waves-light" type="submit" name="action">Insert<i class="fa fa- right"></i>
						</button>
	  			  		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
	  			  	</form>
		      	</div>
		    </li>
	  	</ul>
  	</div>

 </div>
@stop