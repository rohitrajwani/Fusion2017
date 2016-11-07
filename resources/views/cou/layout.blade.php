<!DOCTYPE html>
  <html>
    <head>
        
        <title>Counselling Cell -IIITDMJ</title>
        
        <link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css">
   
        
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
         
        <link href="css/fusion_style.css" type="text/css" rel="stylesheet">
        
        <link href="css/style.css" type="text/css" rel="stylesheet">

        <link href="css/stylemain.css" rel="stylesheet">
        
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        
        <header>
            <nav>
                <div>
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
        <div class="header row">
            <div class="col s2 m2 l1"><img src="images/logo.png" alt="college_logo" class="clogo"  style="border-radius:5px;"></div>
            <h1 class="heading col s8 m8 l10"><a href="http://www.iiitdmj.ac.in/" class="cname">PDPM IIITDM</a><br><small><a href="">Counselling Service</a></small></h1> <a href="">
        </div>    
        <div class="main_nav">
            	<nav id="mynav">
                    <div class="nav-wrapper">
                        <ul class="hide-on-med-and-down">
                            <li><a href="/main">Home</a></li>
                            <li><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Share Public Posts and Announcements Here!" href="/problemportal" >Forum</a></li>
							@if (Auth::user()->user_type != 'faculty' AND Auth::user()->username != 'coordinator')
                            <li><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Personal Conversation Portal!" href="/privateportal" >Problems</a></li>
						  @endif
                            
                            <li><a href="/study_material">StudyPosts</a></li>
                            
                            @if (Auth::user()->user_type != 'faculty' AND Auth::user()->username != 'coordinator')
							<li><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Application Process will be active from month of February."  href="/formfill">Applications</a></li>
                            @endif
						
							@if (Auth::user()->user_type == 'faculty' AND Auth::user()->username == 'counsellinghead')
									<li><a  href="/faculty_access" >Admin</a></li>	
                            @endif
                            @if (Auth::user()->user_type == 'student' AND Auth::user()->username == 'coordinator')
									<li><a  href="/assign_guides" >Assign Guides</a></li>
                                    <li><a  href="/student_guides_list" >View Guides</a></li>
                            @endif
							<li><a href="/main#faq">FAQ</a></li>
                            
                        </ul>
					                      </div>
				</nav>
        </div>
        @yield('content')
        </body>
        </html>