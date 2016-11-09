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
            <div id="modal1" class="modal">
            <div class="modal-content">

            <br>
            <h5>Enter the Question</h5>
            <br>
            <form action="admin/add" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <textarea id="question_id" name="question_id" class="materialize-textarea" placeholder="enter question_id" ></textarea>
              <textarea id="question" name="question" class="materialize-textarea" placeholder="enter question"></textarea><br>
              <button type="submit" class="btn">Save</button>
              <div class="modal-action modal-close waves-effect waves-green btn ">Cancel </div>
              </form>
            </div>
            
          </div>


            <div id="modal2" class="modal">
            <div class="modal-content">

            <br>
            <h5>Enter Question Number to be deleted</h5>
            <br>
            <form action="admin/delete" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <textarea id="del_id" name="question_id" class="materialize-textarea" placeholder="enter question_id" ></textarea>
              <br>
              <button type="submit" class="btn">Delete</button>
              <div class="modal-action modal-close waves-effect waves-green btn ">Cancel </div>
              </form>
            </div>
            
          </div>
        
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
        
    <br><br><br><br>
        <div class="main-container row">
          
                <div class="section col s12">
        
       
        <br><h5>Select Feedback type:</h5><br>
        
            <div class="row">
              <div class="col s12 m6 l3"></div>
              <div class="col s12 m6 l3"><a class="waves-effect btn" href = "/home/1">Mid_Sem</a></div>
               <div class="col s12 m6 l3"><a class="waves-effect btn" href = "/home/2">End_Sem</a></div>
              
            </div>
 
        
 
 
  
        </div>
        </div>
          <script src="js/jquery-3.1.1.min.js"></script>
    <!--Import jQuery before materialize.js-->
         <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
            });
        </script>
</body>
</html>