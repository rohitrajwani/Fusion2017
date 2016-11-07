@extends('layout')
@section('content')	

			<div class="main-container row">
				<h4 class="col s12 m8 offset-m2">Staff Members Details</h4></br>
				
				<br>
				<br><br>
				
				<div class="container" style="width:90%">
					<div class="section col s12">
					<br><br>
					
						
<table class="bordered highlight">
    <thead>
      <tr>
          <th><i>S.No</i></th>
          <th><i>Name</i></th>
		  <th><i>Post</i></th>
		  <th><i>Email</i></th>
      </tr>
    </thead>
    <tbody>
    <?php $i=0 ?>
    @foreach($staffnames as $a)
    <tr>
    	<td>{{++$i}}</td>
          <td>{{$a->name}}</td>
		  <td>{{$a->post}}</td>
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