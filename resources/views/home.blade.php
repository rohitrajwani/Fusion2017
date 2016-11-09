<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
        
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        
        <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
        
        <link href="/css/fusion_style.css" type="text/css" rel="stylesheet">
        
        <link href="/css/style.css" type="text/css" rel="stylesheet">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        
        <header>
       
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
        
        
		<br><br>
    

    <div class="main-container">


  <div class="section col s12">
    
  <nav>
        <div class="nav-wrapper">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
           <li><a href="/">Home</a></li>
        </ul>
        </div>
 </nav>
      
      <?php
        
         $ty=$type1;

          $type1=$ty;

        ?>
        
         @foreach($course as $cour)
         <?php
         $courid=$cour->course_id;
         ?>
  @foreach($faculty as $fac)
                @if($cour->course_id == $fac->course_id)
                  <?php
                    $facid = $fac->faculty_id;
                  ?>
                  @foreach($name as $nam)
                    @if($facid == $nam->faculty_id)

                    <?php
                    $name1 = $nam->name;
                     ?>
                    @endif
                  @endforeach
                @endif
       @endforeach
      <?php

$count=count(\DB::table('semester_feedback')->where('faculty_id',$facid)->where('course_id',$courid)->where('good',$id)->where('average',$type1)->get());
?>
     @if($count==0)

     <div class="row">

            <div class="col s12 m6 l3"><b><h5>{{$cour->course_id}}</h5></b></div>
            <div class="col s12 m6 l3"><b><h5>{{$cour->course_name}}</h5></b></div>
            <div class="col s12 m6 l3"><b><h5>{{$name1}} </h5></b></div>
            <div class="col s12 m6 l3"><a class="waves-effect btn" href = "/feed/{{$cour->course_id}}/{{$facid}}/{{$id}}/{{$type1}}">Feedback</a></div>
               
     </div>
@endif
        

        @endforeach 



  
  </div> 
  </div>
  
  

</body>
</html>