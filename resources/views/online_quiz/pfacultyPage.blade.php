@extends('layout')

@section('header')

<!--    <link type="text/css" rel="stylesheet" href="/css/materialize.min.css" media="screen,projection" />-->
    <link type="text/css" rel="stylesheet" href="/css/materialize.clockpicker.css" media="screen,projection" />
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/materialize.clockpicker.js"></script>

@stop

@section('content')

    <div class="main-container row">
        <div class="col l12">
            <ul class="tabs">
                <li class="tab col l4"><a class="active" href="#completed">Completed Quiz</a></li>
                <li class="tab col l4"><a href="#ongoing">Ongoing Quiz</a></li>
                <li class="tab col l4"><a href="#upcoming">Upcoming Quiz</a></li>
            </ul>
        </div>
        
        <div id="completed" class="col l12">
            <div class="row" style="padding:20px;">

        <?php
                    $cur_date=date("Y-m-d"); 
                    $cur_time=date("H:i:s");
                    $quizzes=DB::table('Course_taken_by')->where('faculty_id',$faculty_id)
                                ->join('quiz','quiz.course_id','=','Course_taken_by.course_id')
                                ->where('quiz.date','<',$cur_date)
                                ->orWhere(function($query){
                                        $cur_time=date("H:i:s");
                                        $cur_date=date("Y-m-d");
                                        $query->where('quiz.end_time','<',$cur_time)
                                                ->where('quiz.date','=',$cur_date);
                                    })
                                ->select('quiz.*')
                                ->get()
                    ;
                    foreach($quizzes as $quiz)
                    {
                        
                    ?>
                    
            
                    <div class="col l4">
                        <div class="card small">
                            <img src="{{asset('assets/images/ongoing.jpg')}}">
                        </div>

                        <div class="card-content center">
                            <p> {{ $quiz->quiz_name }}</p>
                            <p>Course ID - {{ $quiz->course_id }}</p>
                            <p> Date: {{ $quiz->date }} </p>
                            <p> Start Time: {{ $quiz->start_time }} </p>
                            <p> End Time: {{ $quiz->end_time }} </p>
                        </div>
                        
                        <div class="card-action center">
                            <a class="waves-effect btn col s6 offset-s3" href=<?php echo '/online_quizzing/view_result/'.$quiz->id ?> ">View Results</a>
                        </div>
                     </div>   
                <?php
                    }
                ?>
            
            </div>
        </div>
        
        <div id="ongoing" class="col l12">
        
           <div class="row" style="padding:20px;">

        <?php
                    $cur_date=date("Y-m-d"); 
                    $cur_time=date("H:i:s");
                    
                    $quizzes=DB::table('Course_taken_by')->where('faculty_id',$faculty_id)
                                ->join('quiz','quiz.course_id','=','Course_taken_by.course_id')
                                ->where('quiz.date','=',$cur_date)
                                ->where('quiz.start_time','<',$cur_time)
                                ->where('quiz.end_time','>',$cur_time)
                                ->select('quiz.*')
                                ->get()
                    ;
                    foreach($quizzes as $quiz)
                    {
                        
                    ?>
                    
            
                    <div class="col l4">
                        <div class="card small">
                            <img src="">
                        </div>

                        <div class="card-content center">
                            <p> {{ $quiz->quiz_name }}</p>
                            <p>Course ID - {{ $quiz->course_id }}</p>
                            <p> Date: {{ $quiz->date }} </p>
                            <p> Start Time: {{ $quiz->start_time }} </p>
                            <p> End Time: {{ $quiz->end_time }} </p>
                        </div>
                        
                        <div class="card-action center">
                            <a class="waves-effect btn col s6 offset-s3" href=<?php echo '/online_quizzing/quiz/'.$quiz->id ?> ">Edit Quiz</a>
                        </div>
                     </div>   
                <?php
                    }
                ?>
            
            </div>
            
        </div>
        
        <div id="upcoming" class="col l12">
        <div class="row" style="padding:20px;">

        <?php
                    $cur_date=date("Y-m-d"); 
                    $cur_time=date("H:i:s");
                    $quizzes=DB::table('Course_taken_by')->where('faculty_id',$faculty_id)
                                ->join('quiz','quiz.course_id','=','Course_taken_by.course_id')
                                ->where('quiz.date','>',$cur_date)
                                ->orWhere(function($query){
                                    $cur_time=date("H:i:s");
                                        $cur_date=date("Y-m-d");
                                        $query->where('quiz.start_time','>',$cur_time)
                                                ->where('quiz.date','=',$cur_date);
                                    })
                                ->select('quiz.*')
                                ->get()
                    ;
                    foreach($quizzes as $quiz)
                    {
                        
                    ?>
                    
            
                    <div class="col l4">
                        <div class="card small">
                            <img src="">
                        </div>

                        <div class="card-content center">
                            <p> {{ $quiz->quiz_name }}</p>
                            <p>Course ID - {{ $quiz->course_id }}</p>
                            <p> Date: {{ $quiz->date }} </p>
                            <p> Start Time: {{ $quiz->start_time }} </p>
                            <p> End Time: {{ $quiz->end_time }} </p>
                        </div>
                        
                        <div class="card-action center">
                            <a class="waves-effect btn col s6 offset-s3" href=<?php echo '/online_quizzing/quiz/'.$quiz->id ?> ">Edit Quiz</a>
                        </div>
                     </div>   
                <?php
                    }
                ?>
            
            </div>
            
        </div>   
        </div>
        
@stop