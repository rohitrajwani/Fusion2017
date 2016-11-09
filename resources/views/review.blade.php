<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->
        
        <!-- <link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css"> -->
        
        <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
        
        <link href="/css/fusion_style.css" type="text/css" rel="stylesheet">
        
        <link href="/css/style.css" type="text/css" rel="stylesheet">

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
        
		<br>

        <div class="main-container row">   
                    <nav>
                        <div class="nav-wrapper">
                                <!-- <a href="#" class="brand-logo">Logo</a> -->
                              <ul id="nav-mobile" class="right hide-on-med-and-down">
                                 <!--  <li><a href="sass.html">Sass</a></li> -->
                                  <!-- <li><a href="badges.html">Components</a></li> -->
                                <li><a href="/admin">Home</a></li>
                             </ul>
                        </div>
                   </nav>   
            <br><br>

                <div class="section col s12"><h4>Feedback:</h4></div><br>

                <div class="section col s12">
                    <table class="bordered highlight">
                        <thead>
                          <tr>
                              <th>Question Id</th>
                              <th>poor</th>
                              <th>average</th>
                              <th>good</th>
                              <th>excellent</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $row)
                         <tr>
                            <td>{{$row->question_id}}</td>
                            <td>
                              {{ count(\DB::table('semester_feedback')->where('faculty_id',$fid)->where('course_id',$cid)->where('question_id',$row->question_id)->where('excellent','1')->where('average',$type)->get()) }}
                            </td>
                            <td>
                              {{count(\DB::table('semester_feedback')->where('faculty_id',$fid)->where('course_id',$cid)->where('question_id',$row->question_id)->where('excellent','2')->where('average',$type)->get())}}
                            </td>
                            <td>
                              {{count(\DB::table('semester_feedback')->where('faculty_id',$fid)->where('course_id',$cid)->where('question_id',$row->question_id)->where('excellent','3')->where('average',$type)->get())}}
                            </td>
                            <td>
                              {{count(\DB::table('semester_feedback')->where('faculty_id',$fid)->where('course_id',$cid)->where('question_id',$row->question_id)->where('excellent','4')->where('average',$type)->get())}}
                            </td>
                          </tr>
                          @endforeach
                        
                        </tbody>
                    </table>

                     <br><br>

                     </div>



                     <div class="section col s4"><h4>Suggestions:</h4></div><br>

                    <div class="section col s12"></div>
                <div class="section col s4">
                    <table class="bordered highlight">
                        <thead>
                          <tr>
                              <th>Suggestions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($suggestion as $row)
                         <tr>
                            <td>{{$row->suggestion}}</td>
                          </tr>
                          @endforeach
                        
                        </tbody>
                    </table>
 
        </div>
				</div>

</body>
</html>