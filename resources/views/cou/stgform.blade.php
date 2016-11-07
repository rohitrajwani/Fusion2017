	<!DOCTYPE html>
<html>
<head>
<title>Fusion - UI Documentation</title>
<!--Import Google Icon Font-->
<!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
<!--Import materialize.css-->
<link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
<link href="css/fusion_style.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<header>
<nav>
<div class="nav-wrapper">
<a href="#!" class="brand-logo">Fusion</a>
<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
<ul class="right hide-on-med-and-down">
<li><a href="#">Link</a></li>
<li><a href="#">Link</a></li>
<li><a href="#">Link</a></li>
</ul>
<ul class="side-nav" id="mobile-demo">
<li><a href="#">Link</a></li>
<li><a href="#">Link</a></li>
<li><a href="#">Link</a></li>
</ul>
</div>
</nav>
</header>
<div class="sidebar">
<ul id="slide-out" class="side-nav fixed">
<li><a href="#!" class="waves-effect">First Link</a></li>
<li><a href="#!" class="waves-effect">Second Link</a></li>
<li><div class="divider"></div></li>
<li><a class="subheader">Subheader</a></li>
<li><a class="waves-effect" href="#!">Third Link</a></li>
</ul>
</div>
<div class="main-container row">
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
</body>
</html>