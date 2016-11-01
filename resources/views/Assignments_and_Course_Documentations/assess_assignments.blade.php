@extends('layout')
@section('content')
  <nav class="mynav">
      <div class="nav-wrapper">
      <ul>
        <li><a href="/Assignments_and_Course_Documentations/faculty">Courses</a></li>
      </ul>
      </div>
  </nav>
                    
  <table class="bordered highlight">
    <thead>
      <tr>
          <th>Assign.No.</th>
          <th>Student_ID</th>
          <th>Solution File</th>
          <th>Marks(MM:100)</th>
      </tr>
    </thead>
    
    <tbody>
      @foreach($assess as $assess1)
        <tr>
          <td>{{$assess1->assign_id}}</td>
          <td>{{$assess1->student_id}}</td>
          <td><a href="/Assignments_and_Course_Documentations/solved_assignments/{{$assess1->url_sol}}" download>{{$assess1->url_sol}}</a></td>
          <td>
            <form action="/Assignments_and_Course_Documentations/assess_assignment" method='post' class="col s12">
                {{ csrf_field() }}
                <input type='hidden' name='dummy' value= {{ $assess1->assign_id }} >
                <input type='hidden' name='dummy1' value= {{ $assess1->student_id }} >
                <div class="input-field col s2">
                  <input placeholder="Marks" id="marks" type="text" class="validate" name='marks'>
                </div>
                <input type='submit' value='Submit' class="waves-effect btn-flat" >
            </form>
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </td>
        </tr>
      @endforeach
  
      
    </tbody>
  </table>
@stop
