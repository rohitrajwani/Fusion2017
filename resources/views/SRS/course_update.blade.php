@extends('SRS.layout')
@section('content')

<form action = "/SRS/Course_reg/{{$username}}" method = "post">
  <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
    <div style="margin:auto;width:70%">
        <div class="row">
          <h4>{{$username}}</h4>
         </div>
          <div class="input-field col s2">
        <h5> 1. </h5>
        </div>
<div class="input-field col s5 ">
            <input id="user_name" type="text" class="validate">
            <label for="course_id">Course Id</label>
            </div>
      <div class="input-field col s5 ">
            <input id="first_name" type="text" class="validate">
            <label for="course_name">Course Name</label>
      </div>
       <div class="input-field col s2 ">
        <h5> 2. </h5>
        </div>
      <div class="input-field col s5 ">
            <input id="user_name" type="text" class="validate">
            <label for="course_id">Course Id</label>
            </div>
      <div class="input-field col s5 ">
            <input id="first_name" type="text" class="validate">
            <label for="course_name">Course Name</label>
      </div>
       <div class="input-field col s2 ">
        <h5> 3. </h5>
        </div>
<div class="input-field col s5 ">
            <input id="user_name" type="text" class="validate">
            <label for="course_id">Course Id</label>
            </div>
      <div class="input-field col s5 ">
            <input id="first_name" type="text" class="validate">
            <label for="course_name">Course Name</label>
      </div>
       <div class="input-field col s2 ">
        <h5> 4. </h5>
        </div>
      <div class="input-field col s5 ">
            <input id="user_name" type="text" class="validate">
            <label for="course_id">Course Id</label>
            </div>
      <div class="input-field col s5 ">
            <input id="first_name" type="text" class="validate">
            <label for="course_name">Course Name</label>
      </div>
        <div class="input-field col s2 ">
        <h5> 5. </h5>
        </div>
 <div class="input-field col s5 ">
            <input id="user_name" type="text" class="validate">
            <label for="course_id">Course Id</label>
            </div>
      <div class="input-field col s5 ">
            <input id="first_name" type="text" class="validate">
            <label for="course_name">Course Name</label>
      </div>
       <div class="input-field col s2">
        <h5> 6. </h5>
        </div>
      <div class="input-field col s5">
                  <input id="user_name" type="text" class="validate">
            <label for="course_id">Course Id</label>
            </div>
      <div class="input-field col s5 ">
            <input id="first_name" type="text" class="validate">
            <label for="course_name">Course Name</label>
      </div>

  <div class="center-align">
  <button name="action" class="btn wave-effect wave light type="submit">Submit</button>

  </div>      
@stop
