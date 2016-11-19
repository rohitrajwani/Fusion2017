@extends('layout')

@section('feedback_content')
          <nav>
        <div class="nav-wrapper">
        <!-- <a href="#" class="brand-logo">Logo</a> -->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
       <!--  <li><a href="sass.html">Sass</a></li> -->
        <!-- <li><a href="badges.html">Components</a></li> -->
         <li><a href="/student_feedback/admin">Home</a></li>
        </ul>
        </div>
        </nav>
                <div class="section col s12">
				
				
				<br><h5>Select professor:</h5><br>
				
						<div class="row">
							<div class="col s12 m6 l3"></div>
    
     @foreach($faculty as $fac)

							<div class="col s12 m6 l3"><b><a href = "/student_feedback/faculty/{{$fac->faculty_id}}/{{$type}}">{{$fac->name}}</a></b></div>

                     @endforeach

        	</div>
 
		
 
 
  
				</div>
				@stop