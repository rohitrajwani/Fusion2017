@extends('layout')

@section('online_quiz_content')

    <div class="main-container row">
        <h4 align="center">Quiz Results</h4>
            <table class="bordered highlight">
                    <thead>
                        <tr>    
                            <th>SNo</th>
                            <th>Name</th>
                            <th>Roll Number</th>
                            <th>
                                <?php
                                    $questions=DB::table('questions')->where('quiz_id',$quiz->id)->get();
                                    echo "Marks ( ".count($questions)." )";
                                ?>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result=DB::table('Score')
                                    ->where('Score.quiz_id',$quiz->id)
                                    ->join('Student','Score.student_id','Student.student_id')
                                    ->get();
                        $i=1;
                        foreach($result as $x)
                        {


                    ?>
                        
                            <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $x->name }}</td>
                            <td>{{ $x->roll_no  }}</td>
                            <td>{{ $x->marks }}</td>
                            </tr>
                        <?php
                            }
                    ?>
                </tbody>
                </table>
    
    </div>
    
@stop
