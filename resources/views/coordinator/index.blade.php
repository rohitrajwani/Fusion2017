@extends('layout')
@section('body')
<div class="row">
	<div class="col s1 m1 l1"><a href="{{ route('studentgymkhana/') }}"><i class="fa fa-home fa-3x"></i></a></div>
	<div class="col s10 m10 l10 center"><h2> {{ $club->club_name }}</h2></div>
	@if(Session::has('message'))
		<div class="col s12 m12 l12 center"><p style="color:red;">{{ Session::get('message') }}</p></div>
        
	@endif
	<div class="col s12 m4 l4">
         <div class="card indigo lighten-5">
            <div class="card-content ">
             	<h4><span class="center-align">Budget Alloted  :- {{ $club->budget}}</span></h4>
             	<br/>
             	<h5><span class="center-align">Description  :- {{ $club->description}}</span></h5>
            </div>
          </div>
  	</div>

  	

  	<div class="col s12 m4 l4 center ">
  		<div class="card indigo lighten-5">
  		<div class="card-content ">
  		<h4 class="center-align"> Club Activities </h4>
  		</div>
  		<div class="card-action">
  		<table class="bordered highlight"> 
  			<tbody> 
  				@foreach ($activity as $a) 
  					<tr><td>{{ $a->activity_name }}</td></tr>  
				@endforeach
  			</tbody> 
  		</table>
  		</div>
  		</div>
  	</div>

  	<div class="col s12 m4 l4 center ">
  		<div class="card indigo lighten-5">
  		<div class="card-content ">
  		<h4 class="center-align"> Club Members </h4>
  		</div>
  		<div class="card-action">
  		<table class="bordered highlight"> 
  			<tbody> 
  				@foreach ($members as $m) 
  					<tr><td>{{ $m->name }}</td></tr>  
				@endforeach
  			</tbody> 
  		</table>
  		</div>
  		</div>
  	</div>
  	
  	<div class="col s12 m12 l12 center"> 		
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
			<!-- update Website -->
	  		<li>
		     	<div class="collapsible-header"><i class="fa fa-exchange"></i>Update Description</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="updatewebsite">
			      		<label for="website">New Description</label> 
						<input id="website" name="newwebsite" type="text" class="validate" required length="500">
						<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
						<button class="btn waves-effect waves-light" type="submit" name="action">Update<i class="fa fa- right"></i>
						</button>
					</form>
		      	</div>
		    </li>
	  		<!-- update activity -->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-exchange"></i>Update Activity</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="updateactivity">
		        		<div class="input-field" >
		        			<select name="oldactivity" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($activity as $a) 
		  							<option value="{{$a->activity_name}}">{{$a->activity_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Activity</label>  
		        		</div>
		        		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
		            	<label for="activity">New Activity</label>  
						<input id="activity" name="newactivity" type="text" class="validate" required length="100">	
						<button class="btn waves-effect waves-light" type="submit" name="action">Update<i class="fa fa- right"></i>
						</button>
	  			  	</form>
		      	</div>
		    </li>
		    <!-- delete activity-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-trash"></i>Delete Activity</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="deleteactivity">
		        		<div class="input-field" >
		        			<select name="oldactivity" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($activity as $a) 
		  							<option value="{{$a->activity_name}}">{{$a->activity_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Activity</label>  
		        		</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Delete<i class="fa fa- right"></i>
						</button>
	  			  	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> </form>
		      	</div>
		    </li>
		    <!-- insert activity-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Insert Activity</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="insertactivity">
		        		<label for="activity3">New Activity</label>  
						<input id="activity3" name="newactivity" type="text" class="validate" required length="100">  
						<button class="btn waves-effect waves-light" type="submit" name="action">Insert<i class="fa fa- right"></i>
						</button>
	  			  	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> </form>
		      	</div>
		    </li>
		   
		    <!-- delete member-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-trash"></i>Delete Member</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="deletemember">
		        		<div class="input-field" >
		        			<select name="oldmember" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($members as $m) 
		  							<option value="{{$m->student_id}}">{{$m->student_id }} - {{$m->name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Member</label>  
		        		</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Delete<i class="fa fa- right"></i>
						</button>
	  			  	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> </form>
		      	</div>
		    </li>
		    <!-- insert member-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Insert Member</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="insertmember">
		        		<label for="member1">New Member</label>  
						<input id="member1" name="newmember" type="text" class="validate" required length="100"/>    			
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