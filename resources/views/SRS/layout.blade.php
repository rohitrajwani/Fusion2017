<!DOCTYPE html>
<html>

<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        {!! MaterializeCSS::include_full() !!}
        
        <link rel="stylesheet" href="{{asset('fonts/font-awesome-4.6.3/css/font-awesome.min.css')}}'>
        
        <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
        
        <link href="{{asset('css/fusion_style.css')}}" type="text/css" rel="stylesheet">
        
        <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
</head>

<body>
    <!--Import jQuery before materialize.js-->
     <header>
            <nav>
                <div class="nav-wrapper">
                  <a href="#!" class="brand-logo">Fusion</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
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
            <li>
                <a href="#!" class="waves-effect">First Link</a>
            </li>
            <li>
                <a href="#!" class="waves-effect">Second Link</a>
            </li>
            <li>
                <div class="divider"></div>
            </li>
            <li>
                <a class="subheader">Subheader</a>
            </li>
            <li>
                <a class="waves-effect" href="#!">Third Link</a>
            </li>
        </ul>
    </div>
    <div class="main-container row">
<div class="container col s12" style="width:100%">       
	<nav style="background-color:#076392">
    <div class="nav-wrapper">
      <span class="brand-logo"><img src="/image/slogo.jpg" style="width:40px;height:40px;margin-top:10px;margin-left:20px"></span>

    </div>
  </nav>
      
        
        @yield('content')
    </div>
	


    @yield('foobar')
	<script>
					 $(document).ready(function(){
								$('ul.tabs').tabs();
					});
					$(document).ready(function(){
						$('ul.tabs').tabs('select_tab', 'tab_id');
					});
					$(".dropdown-button").dropdown();
					$(".button-collapse").sideNav();

            $(document).ready(function(){
                    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                    $('.modal-trigger').leanModal();
            }); 
      </script>
	</body>

</html>