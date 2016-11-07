<!DOCTYPE HTML>

<html>
    <head>
        <title>Student Gymkhana</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../../assets/css/materialize.min.css" />     
        <link rel="stylesheet" href="../../assets/css/fusion_style.css" />
        <link rel="stylesheet" href="../../assets/css/main.css" />
        <!--
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/css/materialize.min.css">    
        -->
        
            
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
        
        <div class="main-container row">
            <div class="col s1 m1 l1"><a href="{{ route('studentgymkhana/') }}"><i class="fa fa-home fa-3x"></i></a></div>    
            <div class="col s11 m11 l11 center">
                <h2> Student Gymkhana System </h2>
            </div>
            <div class="col s12 m12 l12">
                <nav>
                    <div class="nav-wrapper">
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-navicon"></i></a>
                        <ul class="hide-on-med-and-down main_nav ">
                            <li><a href="welcome">About</a></li>
                            <!-- Dropdown Trigger -->
                            <li><a class="dropdown-button" href="#!" data-activates="dropdown" data-beloworigin="true">Clubs <span class="fa  fa-angle-down"></span></a></li>
                            <li><a href="project" >Projects</a></li>
                            <li><a href="committees">Committees</a></li>
                            <li><a href="guideline">Guidelines</a></li>
                            <li><a href="election">Elections</a></li>
                            <li><a href="senate">Senate</a></li>
                        </ul>
                        <ul class="right hide-on-small-only welcome-msg">
                             Welcome : @yield('name')
                        

                                            
                         </ul>
                    </div>
                </nav>
                <!-- Dropdown Structure -->
                <ul id="dropdown" class="dropdown-content">
                    <li><a href="#!" class="dropdown-button2" href="#!" data-activates="dropdown_technical">Technical <span class="fa  fa-angle-right"></span></a></li>
                    <li><a href="#!" class="dropdown-button2" href="#!" data-activates="dropdown_cultural">Cultural <span class="fa  fa-angle-right"></span></a></li>
                    <li><a href="#!" class="dropdown-button2" href="#!" data-activates="dropdown_sports">Sports <span class="fa  fa-angle-right"></span></a></li>
                </ul>
                
                <ul id="dropdown_technical" class="dropdown-content">
                    <li><?php $club='robotics' ?><a href="{{$club}}">Robotics</a></li>
                    </ul>
                <ul id="dropdown_cultural" class="dropdown-content">
                    <li><?php $club='jazbaat' ?><a href="{{$club}}">Jazbaat</a></li>
                    <li><?php $club='dance' ?><a href="{{$club}}">Dance</a></li>
                    </ul>
                <ul id="dropdown_sports" class="dropdown-content">
                    <li><?php $club='cricket' ?><a href="{{$club}}">Cricket</a></li>
                    </ul>
                <!-- For menu on small screen sizes as drop down-->
                <ul id="mobile-demo" class="dropdown-content" >
                    <li><a href="welcome">About</a></li>
                    <li><a class="dropdown-button3" href="#!" data-activates="dropdown_all" >Clubs <span class="fa fa-caret-square-o-down"></span></a></li>
                    <li><a href="projects">Projects</a></li>
                    <li><a href="committees">Committees</a></li>
                    <li><a href="guidelines">Guidelines</a></li>
                    <!-- <li><a href="election">Election</a></li>
                     --><li><a href="senate">Senate</a></li>
                </ul>
                <ul id="dropdown_all" class="dropdown-content">
                    <li><a href="#">Clubname 1</a></li>
                    <li><a href="#">Clubnameasdj</a></li>
                    <li><a href="#">Clubname adad</a></li>
                    <li><a href="#">Clubname adad</a></li>
                    <li><a href="#">Clubname</a></li>
                    <li><a href="#">Clubname</a></li>
                    <li><a href="#">Clubname adakdha</a></li>
                    <li><a href="#">Clubname</a></li>
                    <li><a href="#">Clubname</a></li>
                    <li><a href="#">Clubname adakdha</a></li>
                    <li><a href="#">Clubname</a></li>
                    </ul>
            </div>

            @yield('content')
            </div>
        <!-- Scripts -->

            
        <script src="../../assets/js/jquery-2.1.3.min.js"></script> 
        <script src="../../assets/js/materialize.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/js/materialize.min.js"></script> -->
        <script src="../../assets/js/main.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->

    </body>
</html>