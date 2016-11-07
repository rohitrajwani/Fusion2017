@extends('cou/layout')
@section('content')
<h4 class="col s12 m6 offset-m3">Assistant Coordinator Application</h4>
<div class="container">

<form class="s12" method="post" action="form_asstcoor">

 <input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="row">
<div class="input-field col s6">
<input id="name" name ="name" type="text"  required class="validate">
<label for="name">Name</label>
</div>
<div class="input-field col s6">
<input id="stuid" name="stuid" type="text" required class="validate">
<label for="stuid">Student_Id</label>
</div>
<div class="input-field col s6">
<input id="branch" name="branch" type="text" required class="validate">
<label for="branch">Branch</label>
</div>
<div class="input-field col s12">
<input id="cpi" name="cpi" type="number" min="7" step="0.1" required class="validate">
<label for="cpi">CPI (Minimum Requirement >7.0)</label>
</div>
<div class="input-field col s12">
          <textarea id="textarea1" name="reason" required class="materialize-textarea"></textarea>
          <label for="reason">Why You Want To Become Assistant Coordinator (150 Words)</label>
        </div>
		
      </div>
	   <div class="center-align">
      
	  <button class="waves-effect waves-light btn" type="submit">Submit</button>
    </div>
 </form>
  </div>
 
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