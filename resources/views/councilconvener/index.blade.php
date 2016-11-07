@extends('layout')
@section('body')
<div class="row">
	<div class="col s1 m1 l1"><a href="{{ route('studentgymkhana/') }}"><i class="fa fa-home fa-3x"></i></a></div>
	<div class="col s10 m10 l10 center"><h2 style="text-transform:capitalize;">{{$input}} Council</h2>
		<br/><br/>
	</div>
	@if(Session::has('message'))
		<div class="col s12 m12 l12 center"><p style="color:red;">{{ Session::get('message') }}</p></div>
        
	@endif

  	

  	<div class="col s12 m8 l8 center ">
  		<h4 class="center-align"> Clubs Budgets </h4>
  		<table class="bordered highlight"> 
  			<thead >
  				<th>Club Name</th>
  				<th>Coordinator</th>
  				<th>Budget</th>
  			<tbody> 
  				@foreach ($club as $c) 
  					<tr><td>{{ $c->club_name }}</td> 
  					<td>{{ $c->coordinator_student_id }}</td> 
  					<td>{{ $c->budget }}</td></tr>
				@endforeach
  			</tbody> 
  		</table>
  		
  	</div>


  	
  	<div class="col s12 m4 l4">
  		<br/><br/><br/>
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
	  		<!-- update Budget -->
	  		<li>
		     	<div class="collapsible-header"><i class="fa fa-exchange"></i>Update Budget</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="clubbudget">
			      		<div class="input-field" >
		        			<select name="clubname" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($club as $c) 
		  							<option value="{{$c->club_name}}">{{$c->club_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Club</label>  
		        		</div>
		            	<label for="budget">New Budget</label>  
						<input id="budget" name="newbudget" type="number" min="0" max="1000000" class="validate" required >    	
						<button class="btn waves-effect waves-light" type="submit" name="action">Update<i class="fa fa- right"></i>
						</button>
	  			  	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> </form>
		      	</div>
		    </li>

		    <!-- insert club-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Insert New Club</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="newclub">
		        		<label for="clubname">New Club Name</label>  
						<input id="clubname" name="newclubname" type="text" class="validate" requrired >
						<label for="id1">New Coordinator Student ID</label>  
						<input id="id1" name="newclubco" type="text" class="validate" required >    
						<label for="id2">New Co-coordinator Student ID</label>  
						<input id="id2" name="newclubcoco" type="text" class="validate" required >
						<p><input class="with-gap" name="newtype" type="radio" id="test5" value="{{$input}}" checked required/>
    					<label for="test5">{{$input}}</label> </p>
						<button class="btn waves-effect waves-light" type="submit" name="action">Form New Club<i class="fa fa- right"></i>
						</button>
	  			  		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
	  			  	</form>
		      	</div>
		    </li>

		    <!-- delete club-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Delete Club</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="deleteclub">
		        		<div class="input-field" >
		        			<select name="clubname" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($club as $c) 
		  							<option value="{{$c->club_name}}">{{$c->club_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Club</label>  
		        		</div>
						<p><input class="with-gap" name="type" type="radio" id="test5" value="{{$input}}" checked required/>
    					<label for="test5">{{$input}}</label> </p>
						<button class="btn waves-effect waves-light" type="submit" name="action">Delete Club<i class="fa fa- right"></i>
						</button>
	  			  	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> </form>
		      	</div>
		    </li>

		    <!-- update coordinator -->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-exchange"></i>Update Coordinator</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="updateco">
		        		<div class="input-field" >
		        			<select name="clubname" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($club as $c) 
		  							<option value="{{$c->club_name}}">{{$c->club_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Club</label>  
		        		</div>
		            	<label for="activity">New Coordinator ID</label>  
						<input id="activity" name="newco" type="text" class="validate" required >    	
						<p><input class="with-gap" name="type" type="radio" id="test5" value="{{$input}}" checked  required/>
    					<label for="test5">{{$input}}</label> </p>	
						<button class="btn waves-effect waves-light" type="submit" name="action">Update<i class="fa fa- right"></i>
						</button>
	  			  	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> </form>
		      	</div>
		    </li>

		    <!-- update cocoordinator -->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-exchange"></i>Update Cocoordinator</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="updatecoco">
		        		<div class="input-field" >
		        			<select name="clubname" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($club as $c) 
		  							<option value="{{$c->club_name}}">{{$c->club_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Club</label>  
		        		</div>
		            	<label for="activity">New Co-coordinator ID</label>  
						<input id="activity" name="newco" type="text" class="validate" required >    	
						<p><input class="with-gap" name="type" type="radio" id="test5" value="{{$input}}" checked required/>
    					<label for="test5">{{$input}}</label> </p>	
						<button class="btn waves-effect waves-light" type="submit" name="action">Update<i class="fa fa- right"></i>
						</button>
	  			  	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> </form>
		      	</div>
		    </li>
	  		
	  	</ul>
  	</div>

 </div>
@stop