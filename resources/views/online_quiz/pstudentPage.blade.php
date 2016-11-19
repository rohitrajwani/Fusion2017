@extends('layout')

@section('online_quiz_content')

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
                   $quizzes=DB::table('Register_Course')
                                ->where('student_id',$student_id)
                                ->join('quiz','quiz.course_id','=','Register_Course.course_id')
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
                    $quizzes=DB::table('Register_Course')->where('student_id',$student_id)
                                ->join('quiz','quiz.course_id','=','Register_Course.course_id')
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
                        <?php 
                            $result=DB::table('Score')->where('student_id',$student_id)->where('quiz_id',$quiz->id)->get();
                            if(count($result)==0)
                            {
                        ?>
                            <a class="waves-effect btn col s6 offset-s3" href=<?php echo '/online_quizzing/give_quiz/'.$quiz->id.'/'.$student_id ?> ">Participate</a>
                        <?php
                            }
                            else
                            {
                        ?>
                            <a class="waves-effect btn col s6 offset-s3" >Completed</a>
                            <?php
                                }
                            ?>
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
            
                    $quizzes=DB::table('Register_Course')->where('student_id',$student_id)
                                ->join('quiz','quiz.course_id','=','Register_Course.course_id')
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
                        
                        
                     </div>   
                <?php
                    }
                ?>
            
            </div>
            </div>
        
        
    </div>
@stop


