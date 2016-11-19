@extends('layout')

@section('feedback_content')
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
                <form class="col s12" method = "POST" action="{{route('/student_feedback/feedinsert')}}">
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
@stop