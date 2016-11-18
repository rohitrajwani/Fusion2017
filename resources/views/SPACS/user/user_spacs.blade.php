@extends('layout')
@section('SPACS_content')			
			<div class="main-container row">
				
				<h4 class="col s12 m8 offset-m2">SPACS Details</h4></br>
				<br><br>
				
				

				<div class="container" style="width:90%">
					<div class="section col s12">
					<br><br>
					
						
<table class="bordered highlight">
    <thead>
      <tr>
           <th><i>Staff Id</i></th>
          <th><i>Name</i></th>
		  <th><i>Designation</i></th>
		  <th><i>Contact Info</i></th>
      </tr>
    </thead>
    <tbody>
    @foreach($spacsnames as $a)
      <tr>
        <td>{{$a->faculty_id}}</td>
        <td>{{$a->name}}</td>
		<td>{{$a->designation}}</td>
		<td>{{$a->email}}</td>
      </tr>
     @endforeach
      
    </tbody>
</table>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
					</div>
				</div>
			</div>
			
@stop			