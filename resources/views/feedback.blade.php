<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
        
        <link rel="stylesheet" href="/fonts/font-awesome-4.6.3/css/font-awesome.min.css">
        
        <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
        
        <link href="/css/fusion_style.css" type="text/css" rel="stylesheet">
        
        <link href="/css/style.css" type="text/css" rel="stylesheet">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        
        <header>
            <nav class = "mynav">
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
          <nav>
        <div class="nav-wrapper">
        <!-- <a href="#" class="brand-logo">Logo</a> -->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
       <!--  <li><a href="sass.html">Sass</a></li> -->
        <!-- <li><a href="badges.html">Components</a></li> -->
         <li><a href="/">Home</a></li>
        </ul>
        </div>
        </nav>
                <div class="section col s12">
				<?php
                $num = 0;
                $temp = 0;
                
                ?>
                <form class="col s12" method = "POST" action="{{route('feedinsert')}}">
                <input type = "hidden" name = "cour" value ={{$cour}}>
            <input type = "hidden" name = "facid" value = {{$facid}}>
                <input type = "hidden" name = "id" value = {{$id}}>
                <input type= 'hidden' name="type1" value={{$type1}}>



                 @foreach($questions as $question)
                
                <br><h5>{{$question->question}}</h5>

                
				
			        <p>
                        <input name="group{{$num}}" type="radio" id="test{{$temp}}" value = "1"/>
                        <label for="test{{$temp}}">poor</label>
                    <?php
                    $temp++;
                    ?>
                    </p>
                    <p>
                        <input name="group{{$num}}" type="radio" id="test{{$temp}}" value = "2">
                        <label for="test{{$temp}}">average</label>
                    <?php
                    $temp++;
                    ?>
                    </p>
					
					<p>
                        <input name="group{{$num}}" type="radio" id="test{{$temp}}" value = "3" />
                        <label for="test{{$temp}}">good</label>
                    <?php
                    $temp++;
                    ?>
                    </p>
					
					<p>
                        <input name="group{{$num}}" type="radio" id="test{{$temp}}" value = "4"/>
                        <label for="test{{$temp}}">excellent</label>
                    <?php
                    $temp++;
                    ?>
                    </p>
         
                <?php
                    $num++;
                ?>           

                  @endforeach

             <div class="input-field col s6">
                        <input placeholder="suggestion" name="suggestion" id="first_name" type="text" class="validate">
                            
                    </div><br><br><br><br>
                        <input type= "hidden" name = "num" value = {{$num}}>
                         <input type = "submit" class="waves-effect btn"></input>
                         <input type = "hidden" value = "{{{ csrf_token() }}}" name = "_token"></input>
                    </form>
				</div>
				</div>

</body>
</html>