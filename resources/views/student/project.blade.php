@extends('studentlayout')
@section('name')

	{{ $name}}
@stop


@section('content')
							<div class="col s12 m12 l12 center">
							<h4> Project List </h4>
							</div>
			
							
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
@stop