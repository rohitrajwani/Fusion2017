@extends('layout')

@section('content')
            <h4 class="col s12 m4 offset-m4">Manage Faculty</h4>
            <div class="container col s12 " style="width:90%">

                    
                <div class="divider col s12"></div>
                <div class="section col s12">
				<form action="{{ route('addFaculty') }}" method="post" class="col s12">
                    <h4 class="custom col s12 m3">Add Faculty </h4>
                    <h5 class="custom col s12">Enter Details -</h5>
                    <div class="input-field col s6">
                          <input id="course_id" type="text" name="faculty_id" class="validate">
                          <label for="course_id">Faculty_id</label>
                    </div>
                    <div class="input-field col s6">
                          <input id="last_name" type="text" name="course_id" class="validate">
                          <label for="last_name">Course_id</label>
                    </div>
					<div class="section col s12">
                    <button class="waves-effect btn">Add</button>
					<input type="hidden" value="{{ Session::token() }}" name="_token"></input>
					</div>
					</form>
					 <div class="divider col s12"></div>
                <div class="section col s12">
				<form action="{{ route('delFaculty') }}" method="post" class="col s12">
                    <h4 class="custom col s12 m3">Remove Faculty</h4>
                    <h5 class="custom col s12">Enter Details -</h5>
                    <div class="input-field col s6">
                          <input id="first_name" type="text" name="faculty_id" class="validate">
                          <label for="first_name">Faculty_id</label>
                    </div>
                    <div class="input-field col s6">
                          <input id="last_name" type="text" name="course_id" class="validate">
                          <label for="last_name">Course_id</label>
                    </div>
					<div class="section col s12">
                    <button class="waves-effect btn">Remove</button>
					<input type="hidden" value="{{ Session::token() }}" name="_token"></input>
					</div>
					</form>
					 <div class="divider col s12"></div>
					 </div>
					 </div>
					 </div>
					
					 @endsection
