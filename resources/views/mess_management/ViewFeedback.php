
<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
        
        <link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css">
        
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        
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
            <h4 class="col s12 m4 offset-m4"><b>CENTRAL MESS</b></h4>
								
                            
							
                <div class="section col s12">
                    
                    <div class="col s12 m12">
                        <!-- Dropdown Structure -->
						
                       
                        <nav class="mynav">
                          <div class="nav-wrapper">
                            <ul>
							<li><a href='Admin'>Home</a></li>
                              <li><a href='ViewLeave'>View Leave Application</a></li>
                              <li>
                                  <a class="dropdown-button" href='ViewFeedback' data-activates="dropdown1"> View Feedback</a>
                                </li>
							  <li><a href='#'> Mess Bills</a></li>
                              <!-- Dropdown Trigger -->
                              <li>
                                  <a class="dropdown-button" href="#!" data-activates="dropdown1">Special Order</a>
                                </li>
                            </ul>
                          </div>
                        </nav> 
                    </div>
					<div class="divider col s12"></div>
					<h4 class="custom col s12">Feedback</h4>       
					 <ul class="collapsible" data-collapsible="accordion">
    <li>
     <div class="collapsible-header active">First</div>
      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
    </li>
    <li>
      <div class="collapsible-header">Second</div>
      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
    </li>
    <li>
      <div class="collapsible-header">Third</div>
      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
    </li>
  </ul>
        
               
          
               
        <script src="js/jquery-3.1.1.min.js"></script>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script>
            $(document).ready(function() {
                $('select').material_select();
              });
			  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
   $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
        
        </script>
    </body>
  </html>