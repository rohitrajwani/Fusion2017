@extends('SRS.layout')
@section('content')
@if($alert = Session::get('alert'))
            <script type="text/javascript">alert("{{$alert}}");</script>
@endif

<div class="row">
   <h4>Student Registration Form</h4>
</div>
<div class="container">
  <div class="row">
          
        <h4>Welcome {{$username}}</h4>
        </div>
<form class="col s12 m12 l12" action="/SRS/toDB" method="post">
     <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
   
      <div class="row">

        <div class="input-field col s6 ">
            <input id="name" type="text" class="validate" name="name" required>
            <label for="name">Name</label>
        </div>

         <div class="input-field col s6 ">
          <input type="date" class="datepicker" name="dob" required> 
          <label for="dob">Date of birth</label>
        </div> 
</div>
<div class="row">

        <div class="input-field col s6">
          <input id="email" type="email" name="email" class="validate" required>
          <label for="email">Email</label>
        </div>

        <div class="input-field col s6 ">
            <input id="roll" type="number" name="roll" class="validate" required>
            <label for="roll">Roll No.</label>
        </div>

</div>
<div class="row">

        <div class="input-field col s6 ">
            <input id="avatar" type="text" name="avatar"  class="validate" required>
            <label for="avatar">Avatar</label>
        </div>
            <div class="input-field col s6">
      <input id="sem" type="number" class="validate" name="sem" required>
      <label for="sem" >Semester</label>
    </div>
</div>
<div class="row">

        <div class="input-filed col s6">
          <p>
        <input name="cat" type="radio" id="test1" required/>
        <label for="test1">Male</label>
        <input name="cat" type="radio" id="test2" />
        <label for="test2">Female</label>
        <input name="cat" type="radio" id="test3" />
        <label for="test3">Other</label>
          </p>
        </div>
      
      <div class="input-field col s6">
        <select required name="catgr" >
        <option value="" disabled selected>Category</option>
        <option value="gen">GEN</option>
        <option value="obc">OBC</option>
        <option value="sc">SC</option>
        <option value="st">ST</option>
        <option value="genpwd">GEN-PWD</option>
        <option value="obcpwd">OBC-PWD</option>
        <option value="scpwd">SC-PWD</option>
        <option value="stpwd">ST-PWD</option>
        </select>
        </div>

</div>
<div class="row">

    <div class="input-field col s6 ">
      <input id="f_name" type="text" class="validate" name="f_name" required>
      <label for="f_name">Father Name</label>
    </div>
    <div class="input-field col s6">
      <input id="m_name" type="text" class="validate" name="m_name" required>
      <label for="m_name">Mother Name</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
      <textarea id="address" class="materialize-textarea" name="p_add" required></textarea>
      <label for="address">Permanent Address</label>
    </div>
</div>
<div class="row">

    <div class="input-field col s6">
      <input id="hometown" type="text" class="validate" name="htown" required>
      <label for="hometown">Hometown</label>
    </div>
    <div class="input-field col s6">
      <input id="state" type="text" class="validate" name="state" required>
      <label for="state">State</label>
    </div>
</div>
<div class="row"> 
    <div class="input-field col s12">
      <textarea id="c_address" class="materialize-textarea" name="c_add" required></textarea>
      <label for="c_address">Correspondence Address</label>
</div>
</div>
    <div class="input-field col s6">
      <input id="bg" type="text" class="validate" name="bg"  required>
      <label for="bg">Blood Group</label>
    </div>

<div class="row">
    
    
    
    <div class="input-field col s6">
      <input id="s_phone" type="number" class="validate" name="s_phone" required>
      <label for="s_phone">Student Phone No</label>
    </div>
</div>
<div class="row">

    <div class="input-field col s6">
      <input id="f_phone" type="number" class="validate" name="f_phone" required>
      <label for="f_phone">Father Phone No</label>
    </div>
    
    <div class="input-field col s6">
      <input id="g_phone" type="number" class="validate" name="g_phone" required>
      <label for="g_phone">Guardian Phone No</label>
    </div>
</div>
<div class="row">

    <div class="input-field col s6">
      <input id="f_email" type="email" class="validate" name="f_email" required>
      <label for="f_email">Father Email Id</label>
    </div>
 <div class="input-field col s6">
      <input id="g_name" type="text" class="validate" name="g_name" required>
      <label for="g_name">Guardian Name</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
      <input id="batch" type="number" class="validate" name="batch" required>
      <label for="batch">Batch</label>
    </div>
        <div class="input-field col s6">
      <input id="cpi" type="number" class="validate" name="cpi" required>
      <label for="cpi">cpi</label>
    </div>
    </div>
    <div class="row">

    <div class="input-field col s6">
      <input id="room" type="text" class="validate" name="room">
      <label for="room">Room No.</label>
    </div>
    <div class="input-field col s6">
      <input id="hall" type="text" class="validate" name="hall">
      <label for="hall">Hall No.</label>
    </div>
</div>
<div class="row">

   <div class="input-field col s6">
    <select required name="dept" >
        <option value="" disabled selected>Programme</option>
        <option value="B.Tech">B.Tech</option>
        <option value="B.Des">B.Des</option>
        <option value="M.Tech">M.Tech</option>
        <option value="M.Des">M.Des</option>
        <option value="Ph.D">Ph.D</option>
    </select>
</div>
    
   
  <div class="input-field col s6">
    <select required name="branch" >
        <option value="" disabled selected>Branch</option>
        <option value="CSE">Computer Science and Engineering</option>
        <option value="ECE">Electronics and Communication Engineering</option>
        <option value="MECH">Mechanical</option>
        <option value="DES">Design</option>
    </select>
</div>
</div> 
<div class="row">
   <div class="input-field col s6">
      <input id="h_id" type="text" class="validate" name="h_id">
      <label for="h_id">Health Insurance Id</label>
    </div>
   <div class="input-field col s6">
      <input id="alla" type="number" class="validate" name="alla">
      <label for="alla">Allahabad bank Account Number</label>
    </div>

</div>
<div class="row">
  <div class="center-align">
  <button name="action" class="btn wave-effect wave light type="sxubmit">Submit</button>
</div></div>      
</form>
</div>
  
@stop
@section('foobar') 
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
            });
         $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 ,
        formatSubmit : "yyyy-mm-dd" ,
        hiddenName :true,// Creates a dropdown of 15 years to control year  
  });
</script>
@stop