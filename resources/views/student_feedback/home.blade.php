@extends('layout')

@section('feedback_content')
  <div class="section col s12">
    
  <nav>
        <div class="nav-wrapper">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
           <li><a href="/student_feedback">Home</a></li>
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
            <div class="col s12 m6 l3"><a class="waves-effect btn" href = "/student_feedback/feed/{{$cour->course_id}}/{{$facid}}/{{$id}}/{{$type1}}">Feedback</a></div>
               
     </div>
@endif
        

        @endforeach 



  
  </div> 
  
@stop