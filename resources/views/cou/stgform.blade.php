@extends('layout')
@section('content')
<h4 class="col s12 m4 offset-m4">Student Guide Application Form</h4>
<div class="container">
<form class="s12" action="#">
<div class="row">
<div class="input-field col s6">
<input id="name" type="text" class="validate">
<label for="name">Name</label>
</div>
<div class="input-field col s6">
<input id="organization" type="text" class="validate">
<label for="organization">Branch</label>
</div>
<div class="input-field col s12">
<input id="address" type="text" class="validate">
<label for="address">CPI (Minimum Requirement >7.0)</label>
</div>
<div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Why You Want To Become Student Guide (150 Words)</label>
        </div>
		
      </div>
	   <div class="center-align">
      <a href="#!" class="waves-effect waves-light btn">Submit</a>
    </div>
 </form>
  </div>
 
<script src="js/jquery-3.1.1.min.js"></script>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
$(document).ready(function() {
$('select').material_select();
$("dropdown-button").dropdown();
});
$('.datepicker').pickadate({
selectMonths: true, // Creates a dropdown to control month
selectYears: 15 // Creates a dropdown of 15 years to control year
});
$('#timepicker').pickatime({
autoclose: false,
twelvehour: false
});
</script>
@stop