@extends('layout')

@section('nav')
<!--

	nav bar with the funtionality avial to VH incharge

-->
 <nav class="mynav">
  <div class="nav-wrapper">
    <ul>
      
      <li><a href="/vhbooking/roomDetailsVH">Room Details</a></li>
        <li><a href="/vhbooking/respond_to_complaint">Complaint</a></li>
          <li><a href="/vhbooking/bookingRequest">Booking Request</a></li>
            
      <!-- Dropdown Trigger -->
     
    </ul>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/vhbooking">Home</a></li>
        </ul>
  </div>
</nav>

@endsection

@section('content')
<!--

	Following section allows VH incharge to Respond to a complaint and add fine if necessary

-->

	<div class="row">
		<div class="col s12 m4 offset-m4">
			<h4>Complaints List</h4>
		</div>
	</div>

	
	<table class="bordered highlight">
	    <thead>
	      <tr>
	          <th>Complaint No</th>
	          <th>Booking ID</th>
	          <th>Description</th>
	          <th>Created_At</th>
	          <th>Updated_At</th>
	          <th><center>Fine</center></th>
	      </tr>
	    </thead>
	    <tbody>
	      	@foreach($complaints as $complaint)
	      		
			      	<tr>	      	
				    	<td>{{ $complaint->complaint_no }}</td>
				        <td>{{ $complaint->booking_id }}</td>			        
				        <td>{{ $complaint->description }}</td>
				        <td>{{ $complaint->created_at }}</td>
				        <td>{{ $complaint->updated_at }}</td>	        
				        <th>	

				        	@if(is_numeric($complaint->fine)==NULL)
		                		<center><button data-target="modal{{$complaint->complaint_no}}" class="btn modal-trigger">Add Fine</button></center>	                		

			                		<div id="modal{{$complaint->complaint_no}}" class="modal modal-fixed-footer">
			                			<form method="POST" action="/{{$complaint->complaint_no}}/addFine">
		                			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
									    <div class="modal-content">
									    	<h4>How Much?</h4>	
									      	<div class="input-field col s6 offset-m3">
										    	<input name="amount" id="fine" type="number" class="validate">
										    	<label for="fine">Enter Amount</label>
											</div>									
									    </div>
									    <div class="modal-footer">
									      <button input="submit" class="modal-action modal-close waves-effect waves-green btn-flat ">Submit</button>
									    </div>
									    </form>
		 							</div>
		 					@endif
		 					@if(is_numeric($complaint->fine)!=NULL)
		 						<div class="row">
		 							<div class="col s12">
				 						<center><p>Fine Added : Rs {{$complaint->fine}}</p></center>
				 					</div>
				 				</div>

				 				<div class="row>">
				 					<div class="col s12">
				 						<center><button data-target="modal{{$complaint->complaint_no}}" class="btn modal-trigger">Edit Fine</button></center>	                		

					                		<div id="modal{{$complaint->complaint_no}}" class="modal modal-fixed-footer">
					                			<form method="POST" action="/{{$complaint->complaint_no}}/addFine">
				                			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
											    <div class="modal-content">
											    	<h4>How Much?</h4>	
											      	<div class="input-field col s6 offset-m3">
												    	<input name="amount" id="fine" type="number" class="validate">
												    	<label for="fine">Enter Amount</label>
													</div>									
											    </div>
											    <div class="modal-footer">
											      <button input="submit" class="modal-action modal-close waves-effect waves-green btn-flat ">Submit</button>
											    </div>
											    </form>
				 							</div>
				 					</div>
				 				</div>
			 					
		 					@endif
	 							
		          		</th>
			      	</tr>
		      	
	      	@endforeach	      
	    </tbody>
	</table>

@endsection

@section('scripts')

	<script>
       $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
        });
   </script>

@endsection