@extends('layout')
@section('body')
<div class="row">
	<div class="col s1 m1 l1"><a href="{{ route('studentgymkhana/') }}"><i class="fa fa-home fa-3x"></i></a></div>
	<div class="col s10 m10 l10 center"><h2> Election Coordinator </h2></div>
	@if(Session::has('message'))
		<div class="col s12 m12 l12 center"><p style="color:red;">{{ Session::get('message') }}</p></div>
        
	@endif
  	


  	
  	<div class="col s12 m6 l6 center">
  		
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
			<!-- Create Election -->
	  		<li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Create Election</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="createelection">
			      		<div class="input-field" >
		        			<select name="batch" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				<option value=2010>2010</option>
		  						<option value=2011>2011</option>
		  						<option value=2012>2012</option>
		  						<option value=2013>2013</option>
		  						<option value=2014>2014</option>
		  						<option value=2015>2015</option>
		  						<option value=2016>2016</option>
		  						<option value=2017>2017</option>
		  						<option value=2018>2018</option>
		  						<option value=2019>2019</option>
		  						<option value=2020>2020</option>
		  						<option value=2021>2021</option>
		  						<option value=2022>2022</option>
		  						<option value=2023>2023</option>
		  						<option value=2024>2024</option>
		  						<option value=2025>2025</option>
		        			</select> 
		        			<label>Select Batch</label>  
		        		</div>
			      		<label for="election_name">Election Name</label> 
						<input id="election_name" name="election_name" type="text" class="validate" required length="100">
						<label for="this1">Nomination Last Date</label> 
						<input id="this1" name="nomination_last_date" type="date" class="datepicker" class="validate" required>
						<label for="this2">Voting Last Date</label> 
						<input id="this2" name="voting_last_date" type="date" class="datepicker" class="validate" required>
						<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
						<button class="btn waves-effect waves-light" type="submit" name="action"> Create <i class="fa fa- right"></i>
						</button>
					</form>
		      	</div>
		    </li>
	  		<!-- update Election -->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-exchange"></i>Update Election Dates</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="updateelection">
		        		<div class="input-field" >
		        			<select name="election_name" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($election as $e) 
		  							<option value="{{$e->election_name}}">{{$e->election_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Election</label>  
		        		</div>
		        		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
		        		<label for="this3">NEW Nomination Last Date</label> 
						<input id="this3" name="nomination_last_date" type="date" class="datepicker" class="validate" required>
						<label for="this4">NEW Voting Last Date</label> 
						<input id="this4" name="voting_last_date" type="date" class="datepicker" class="validate" required> 		
						<button class="btn waves-effect waves-light" type="submit" name="action">Update<i class="fa fa- right"></i>
						</button>
	  			  	</form>
		      	</div>
		    </li>
		    <!-- delete Election-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-trash"></i>Delete Election</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="deleteelection">
		        		<div class="input-field" >
		        			<select name="election_name" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($election as $e) 
		  							<option value="{{$e->election_name}}">{{$e->election_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Election</label>  
		        		</div>
		        		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
						<button class="btn waves-effect waves-light" type="submit" name="action">Delete<i class="fa fa- right"></i>
						</button>
	  			  	</form>
		      	</div>
		    </li>
		    <!-- Approve Nomination-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Approve Nomination</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="approvenomination">
		        		<div class="input-field" >
		        			<select name="election_name" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($nominee as $n) 
		  							<option value="{{$n->election_name}}">{{$n->election_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Election</label>  
		        		</div>
		        		<div class="input-field" >
		        			<select name="nominee_id" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($nominee as $n) 
		  							<option value="{{$n->nominee_id}}">{{ $n->nominee_id }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Nominee</label>  
		        		</div>
		        		 <p>
						    <input class="with-gap" name="approval" value=1 type="radio" id="test5" checked required/>
						    <label for="test5">Approving</label>
						 </p>
						<button class="btn waves-effect waves-light" type="submit" name="action">Approve<i class="fa fa- right"></i>
						</button>
	  			  	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> </form>
		      	</div>
		    </li>
		   
		    <!-- delete Nomination-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-trash"></i>Delete Nominee</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="deletenominee">
		        		<div class="input-field" >
		        			<select name="election_name" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($nominee as $n) 
		  							<option value="{{$n->election_name}}">{{$n->election_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Election</label>  
		        		</div>
		        		<div class="input-field" >
		        			<select name="nominee_id" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($nominee as $n) 
		  							<option value="{{$n->nominee_id}}">{{ $n->nominee_id }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Nominee</label>  
		        		</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Delete<i class="fa fa- right"></i>
						</button>
	  			  	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> </form>
		      	</div>
		    </li>
		    
	  	</ul>
  	</div>

  	<div class="col s12 m6 l6 center ">
  		<div class="card indigo lighten-5">
  		<div class="card-content ">
  		<h4 class="center-align"> Elections Details </h4>
  		</div>
  		<div class="card-action">
  		<table class="bordered highlight"> 
  			<thead>
  				<th> Election Name </th><th> Batch </th><th> Last Date for Nomination </th><th> Last Date for Voting </th>
  			</thead>
  			<tbody> 
  				@foreach ($election as $e) 
  					<tr><td>{{ $e->election_name }}</td>
  						<td>{{ $e->batch }}</td>
  						<td>{{ $e->nomination_last_date }}</td>
  						<td>{{ $e->voting_last_date }}</td>
  					</tr>  
				@endforeach
  			</tbody> 
  		</table>
  		</div>
  		</div>
  	</div>

  	<div class="col s12 m12 l12 center ">
  		<div class="card indigo lighten-5">
  		<div class="card-content ">
  		<h4 class="center-align"> Nominees For Elections </h4>
  		</div>
  		<div class="card-action">
  		<table class="bordered highlight"> 
  			<thead>
  				<th> Election Name </th><th> Nominee ID </th><th> CPI </th><th> Branch </th><th> Batch </th> <th> Votes </th> <th> Approval  </th>
  			</thead>
  			<tbody> 
  				@foreach ($nominee as $n) 
  					<tr><td>{{ $n->election_name }}</td>
  						<td>{{ $n->nominee_id }}</td>
  						<td>{{ $n->cpi }}</td>
  						<td>{{ $n->branch }}</td>
  						<td>{{ $n->batch }}</td>
  						<td>{{ $n->votes }}</td>
  						<td>{{ $n->approval }}</td>
  					</tr>  
				@endforeach
  			</tbody> 
  		</table>
  		</div>
  		</div>
  	</div>

  	

 </div>
@stop