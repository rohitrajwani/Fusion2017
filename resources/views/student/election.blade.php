@extends('studentlayout')

@section('name')

	{{$name}}
@stop


@section('content')
	@if(Session::has('message'))
		<div class="col s12 m12 l12 center"><p style="color:red;">{{ Session::get('message') }}</p></div>
        
	@endif
<div class="col s12 m4 l4 center" style="margin-top: 100px">
	<h4> Your Nominations </h4>
	<table class="bordered highlight"> 
  			<thead>
  				<th> Election Name </th><th> Votes </th><th> Approval </th><th> Last update at </th>
  			</thead>
  			<tbody> 
  				@foreach ($forstatus as $e) 
  					<tr><td>{{ $e->election_name }}</td>
  						<td>{{ $e->votes }}</td>
  						<td>{{ $e->approval }}</td>
  						<td>{{ $e->updated_at }}</td>
  					</tr>  
				@endforeach
  			</tbody> 
  	</table>
  	<p> Approval = 1 means you are approved for election </p>
  	<p> Approval = 0 means you are yet not approved for election </p>
</div>
<div class="col s12 m4 l4 center" style="margin-top: 100px">
	<a class="btn-large waves-effect waves-light modal-trigger" href="#nominate"> Nominate Yourself </a>
</div>
<div class="col s12 m4 l4 center" style="margin-top: 100px">
	<a class="btn-large waves-effect waves-light modal-trigger" href="#vote"> Vote Here</a>
</div>

<div id="nominate" class="modal">
    <div class="modal-content center">
      	<h4>Nominate Yourself</h4>
      		<form method="post" action="nominate">
		       <div class="input-field" >
		        	<select name="election_name" required> 
		        		<option value="" disabled selected>Choose your option</option> 
		        		@foreach ($tonominate as $e) 
		  					<option value="{{$e->election_name}}">{{$e->election_name }}</option>
						@endforeach
		        	</select> 
		        	<label>Select Election</label>  
		        </div>
		        <label for="cpi">CPI</label> 
				<input id="cpi" name="cpi" type="number" step="0.01" min="0.0" max="10.0" class="validate" required length="6">
				<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
				<button class="btn waves-effect waves-light" type="submit" name="action">Apply<i class="fa fa- right"></i>
				</button>
	  		</form>
    </div>
</div>

<div id="vote" class="modal">
    <div class="modal-content center">
      	<h4>Vote</h4>
      		<form method="post" action="vote">
		       			<div class="input-field" >
		        			<select name="election_name" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($tovote as $n) 
		  							<option value="{{$n->election_name}}">{{$n->election_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Election</label>  
		        		</div>
		        		<div class="input-field" >
		        			<select name="nominee_id" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($tovote as $n) 
		  							<option value="{{$n->nominee_id}}">{{ $n->nominee_id }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Nominee</label>  
		        		</div>
				<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
				<button class="btn waves-effect waves-light" type="submit" name="action">Vote<i class="fa fa- right"></i>
				</button>
	  		</form>
    </div>
</div>

								

@stop