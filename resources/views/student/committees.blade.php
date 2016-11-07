@extends('studentlayout')

@section('name')

	{{ $name}}
@stop


@section('content')


<div class="col s12 m12 l12 center">
							<h4> Committees </h4>
							</div>
			
							
							<table border="" class="bordered highlight">
										<thead>
										<tr>
										<th style="width: 5%;" >S.No.</th>
										<th style="width: 15%">Committee</th>
										<th style="width: 45%">Description</th>
										<th style="width: 20%">Committee Members</th>
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
										
												<table>
										<tr>
										<thead>
										<th>Name</th>
										<th>Roll No.</th>
										</thead>
										</tr>
										<tbody>
										@foreach($member as $m)
										@if($committee->committee_name == $m->committee_name)
										<tr>
										<td>	<div>
												{{ $m->name}}
												</div>
										</td>
										<td>	<div>
												{{ $m->roll_no}}
												</div>
										</td>
										</tr>
										@endif
										@endforeach
										
										</tbody>
										</table>
										
										
										
										
										
										
										
										</td>
										</tr>
										@endforeach
										
										</tbody>
										</table>


										
							
@stop