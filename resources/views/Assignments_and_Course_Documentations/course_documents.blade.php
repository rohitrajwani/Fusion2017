@extends('layout')
@section('content')
	<nav class="mynav">
	  <div class="nav-wrapper">
  		<ul>
  		  <li><a href="/Assignments_and_Course_Documentations/student">Registered Courses</a></li>
  		</ul>
	  </div>
	</nav>
                    
  <table class="bordered highlight">
    <thead>
      <tr>
          <th>Document ID</th>
          <th>Date/Time</th>
          <th>Topic</th>
      </tr>
    </thead>
    
    <tbody>
      @foreach( $doc as $doc1 )
        <tr>
          <td>{{ $doc1->doc_id }}</td>
          <td>{{ $doc1->upload_time }}</td>
          <td><a href="/Assignments_and_Course_Documentations/documents/{{$doc1->doc_url}}" download>{{ $doc1->doc_url }}</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@stop