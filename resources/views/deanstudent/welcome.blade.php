@extends('layout')
@section('body')


<div class="row">
	<div class="col s1 m1 l1"><a href="{{ route('studentgymkhana/') }}"><i class="fa fa-home fa-3x"></i></a></div>
	<div class="col s10 m10 l10 center"><h2> Dean Student Portal</h2></div>
	@if(Session::has('message'))
		<div class="col s12 m12 l12 center"><p style="color:red;">{{ Session::get('message') }}</p></div>
        
	@endif
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
	  	
	  		<!-- insert Project-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Insert Project</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="insertproject">
		        		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 						
		        		<label for="project3">New Project</label>  
						<input id="project3" name="newproject" type="text" class="validate" required>  
						<label for="project3">Project Description </label>  
						<input  id="project3" name="description" type="text" class="validate" required length="100">  
						<label for="project3">Date of Proposal (YY-MM-DD)</label>  
						<input id="project3" name="proposaldate" type="date" class="validate datepicker" required>  
						<label for="project3">Proposed By</label>  
						<input placeholder="Placeholder" id="project3" name="by" type="text" class="validate" required>  
						<button class="btn waves-effect waves-light" type="submit" name="action">Insert<i class="fa fa- right"></i>
						</button>
	  			  	</form>
		      	</div>
		    </li>
		   
		    <!-- delete project-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-trash"></i>Delete Project</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="deleteproject">
		        		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
						<div class="input-field" >
		        			<select name="oldproject" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($project as $p) 
		  							<option value="{{$p->project_name}}">{{$p->project_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Project</label>  
		        		</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Delete<i class="fa fa- right"></i>
						</button>
	  			  	</form>
		      	</div>
		    </li>
		    
		    <!-- insert committee -->
		     <li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Insert Committee</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="insertcommittee">
		        		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
						<label for="committee3">New Committee</label>  
						<input id="committee3" name="newcommittee" type="text" class="validate" required>  
						<label for="committee3">Committee Description </label>  
						<input id="committee3" name="description" type="text" class="validate" required length="100">  
						<label for="committee3">Budget</label>  
						<input id="committee3" name="budget" type="number" min="0" max="10000000" class="validate" required>  
						<button class="btn waves-effect waves-light" type="submit" name="action">Insert<i class="fa fa- right"></i>
						</button>
	  			  	</form>
		      	</div>
		    </li>

		    <!-- delete committee -->
		   <li>
		     	<div class="collapsible-header"><i class="fa fa-trash"></i>Delete Committee</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="deletecommittee">
		        		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
						<div class="input-field" >
		        			<select name="oldcommittee" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($committees as $c) 
		  							<option value="{{$c->committee_name}}">{{$c->committee_name}}</option>
								@endforeach
		        			</select> 
		        			<label>Select Committee</label>  
		        		</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Delete<i class="fa fa- right"></i>
						</button>
	  			  	</form>
		      	</div>
		    </li>
		     
		   <!-- insert committee member -->
		   <li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Insert Committee Member</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="insertcommitteemember">
		        		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
						<div class="input-field" >
		        			<select name="committeename" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($committees as $c) 
		  							<option value="{{$c->committee_name}}">{{$c->committee_name }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Committee</label>  
		        		</div>
						<label for="committeemamber3">Student ID </label>  
						<input id="committeemember3" name="studentid" type="text" class="validate" required>  
						<button class="btn waves-effect waves-light" type="submit" name="action">Insert<i class="fa fa- right"></i>
						</button>
	  			  	</form>
		      	</div>
		    </li>
		   


		    <!-- insert notification-->
		    <li>
		     	<div class="collapsible-header"><i class="fa fa-save"></i>Insert Notification</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="insertnotification">
		        		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
						<label for="notification1">New Notification</label>  
						<input id="notification1" name="newnotification" type="text" class="validate" required length="1000">  
						<button class="btn waves-effect waves-light" type="submit" name="action">Insert<i class="fa fa- right"></i>
						</button>
	  			  	</form>
		      	</div>
		    </li>
		   
		    	<!-- delete notification -->
			<li>
		     	<div class="collapsible-header"><i class="fa fa-trash"></i>Delete Notification</div>
		      	<div class="collapsible-body container" style="padding:20px 0px 20px 0px">
			      	<form method="post" action="deletenotification">
		        		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
						<div class="input-field" >
		        			<select name="oldnotification" required> 
		        				<option value="" disabled selected>Choose your option</option> 
		        				@foreach ($notification as $n) 
		  							<option value="{{$n->notification}}">{{$n->notification }}</option>
								@endforeach
		        			</select> 
		        			<label>Select Project</label>  
		        		</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Delete<i class="fa fa- right"></i>
						</button>
	  			  	</form>
		      	</div>
		    </li>

		    
		   
	  	</ul>
  	</div></div>

<!-- ////////////////////////////////////////////////////////////////////////////////// -->
<div class="row">
	
	<div class="col s12 m3 l3 notification_box ">
  	<div class="teal lighten-5">
					<div class="notification_head">	
						<h4 class="valign center-align">Notification</h4>
						<div class="divider"></div>
					</div>
					<div class="marquee">
						<!--<marquee direction="up" behavior="scroll" height="300"  scrollamount="3" vspace="30"  onmouseover="this.stop();" onmouseout="this.start();"> -->
						<div class="marquee_box">
						<?php $count=0 ?>
						@foreach($notification as $notifications)
										<?php if($count == 4) break; ?>
    
    					<p><i class="fa  fa-arrow-circle-right"></i> 
																			{{ $notifications->notification}}
																	
						</p>
						<!-- <p><i class="fa  fa-arrow-circle-right"></i>  this website is under construction it will be launced soon</p>
						<p><i class="fa  fa-arrow-circle-right"></i>  aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
						<p><i class="fa  fa-arrow-circle-right"></i>  aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
						 --><!-- </marquee> -->
						<?php $count++; ?>
						@endforeach
										
						</div>
					</div>
				</div>
			
  	</div>
  	





  	<div class="col s12 m5 l5 center ">
  		<div class="card indigo lighten-5">
  		<div class="card-content ">
  		<h4 class="center-align"> Projects</h4>
  		</div>
  		<div class="card-action">
  		<table class="bordered highlight"> 
  			<thead>
										<tr>
										<th style="width: 5%;" >S.No.</th>
										<th style="width: 25%">Project Name</th>
										<th style="width: 40%">Description</th>
										<th style="width: 15%">Proposal Date</th>
										<th style="width: 15%">Proposed By</th>
										</tr>
										</thead>
										<tbody>
										<?php $i=1 ?>
										@foreach($project as $project)
												
										<tr>
										<td>{{$i++}}</td>
										<td>	<div>
												{{ $project->project_name}}
												</div>
										</td>
										<td><div>
												{{ $project->project_description}}
												</div>
										</td>
										<td><div>
												{{ $project->date_of_proposal}}
												</div>
										</td>
										<td><div>
												{{ $project->proposed_by }}
												</div>
										</td>
										</tr>
										@endforeach
										
										</tbody>
										
  		</table>
  		</div>
  		</div>
  	</div>

  	<div class="col s12 m4 l4 center ">
  		<div class="card indigo lighten-5">
  		<div class="card-content ">
  		<h4 class="center-align"> Committees</h4>
  		</div>
  		<div class="card-action">
  		<table class="bordered highlight"> 
  			<thead>
										<tr>
										<th style="width: 5%;" >S.No.</th>
										<th style="width: 25%">Committee</th>
										<th style="width: 40%">Description</th>
										</tr>
										</thead>
										<tbody>
										<?php $i=1 ?>
										@foreach($committees as $committee)
										
										<tr>
										<td>{{$i++}}</td>
										<td><div>
												{{ $committee->committee_name}}
												</div>
										</td>
										<td><div>
												{{ $committee->description}}
												</div>
										<td>
										
												
  										</td>
										</tr>

										@endforeach
										
										</tbody>
										</table>
  		</div>
  		</div>
  	</div>
  	
  	

 </div>
@stop