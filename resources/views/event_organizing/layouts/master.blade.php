<!doctype html>
<html>
	<head>
		<meta name="charset" content="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@yield('title')</title>
		{{-- {!! MaterializeCSS::include_full() !!} --}}
		<link href="{{asset("fonts/materialfont/material-icons.css")}}" rel="stylesheet"/>
		<link href="{{asset("css/materialize1.css")}}" rel="stylesheet" />
		<link href="{{asset("css/font-awesome.min.css")}}" rel="stylesheet" />
		<link href="{{asset("css/fusion_style.min.css")}}" rel="stylesheet"/>
		<link href="{{asset('css/styles.css') }}" rel="stylesheet"/>
	</head>

	<body>
		<header>
			<nav>
				<div class="nav-wrapper">
				  <a href="#!" class="brand-logo">Fusion</a>
				  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons grey">menu</i></a>
				  <ul class="right hide-on-med-and-down">
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="/logout">Logout</a></li>
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

   
		 @yield('content')
	   


	<script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
	<script src="{{asset("js/materialize.min.js")}}"></script>
	<script src="{{asset("js/jquery.smooth-scroll.min.js")}}"></script>
	@yield('script')
	</body>
</html>

