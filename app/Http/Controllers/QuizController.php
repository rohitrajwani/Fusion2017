<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Quiz;

use App\Option;

use App\Question;

use App\Response;

use App\Response_option;

use App\Score;

class QuizController extends Controller
{
    public function show()
    {
    	$quizzes=Quiz::all();

    	return view('quizzes',compact('quizzes'));
    }

    public function edit(Quiz $quiz)
    {
    	return view('edit_quiz',compact('quiz'));
    }

    public function question(Question $question)
    {
    	return view('question',compact('question'));
    }

    public function addquestion()
    {
    	return view('addquestion');
    }

    public function savequestion(Request $request)
    {
    	$body=$_POST['body'];
		$option_count=$_POST['option_count'];
		$quiz_id=$_POST['quiz_id'];
		$quiz=Quiz::find($quiz_id);
		$ques=new Question;
		$ques->body=$body;
		$quiz->addquestion($ques);
		for($i=1;$i<=$option_count;$i++)
        {
            $correctness=0;
            if(isset($_POST['correct'.$i]))
            {
                $correctness=1;
            }
            $option_body=$_POST['option'.$i];
            $option=new Option;
            $option->body=$option_body;
            $option->correctness=$correctness;
            $ques->addoption($option);
        }

    	return view('quiz_questions',compact('quiz'));
    }


    public function give_quiz(Quiz $quiz,$student_id)
    {
        return view('give_quiz',compact('quiz'),compact('student_id'));
    }

    public function answer_question(Question $ques,$student_id)
    {
        return view('answer_question',compact('ques'),compact('student_id'));
    }

    public function save_answer()
    {

        $student_id=$_POST['student_id'];
        $question_id=$_POST['question_id'];
        
        $prev_response=Response::where('student_id',$student_id)->where('question_id',$question_id)->get();
        if(count($prev_response)!=0)
        {
            $prev_response_id=$prev_response[0]->id;
            Response_option::where('response_id',$prev_response_id)->delete();
            Response::where('student_id',$student_id)->where('question_id',$question_id)->delete();
        }
        if(isset($_POST['response']))
        {
            $response_array=$_POST['response'];

            if(count($response_array)!=0)
            {
                $response=new Response;
                $response->student_id=$student_id;
                $response->question_id=$question_id;
                $response->save();
                foreach($response_array as $option_id)
                {
                    $response_option=new Response_option;
                    $response_option->response_id=$response->id;
                    $response_option->option_id=$option_id;
                    $response_option->save();
                }
            }
        }

        //add code to insert answer,, but first create necessary tables baby!!
        return '<i class="material-icons">done</i>';
    }



    public function facultyhome($faculty_id)
    {
        return view('facultyPage',compact('faculty_id'));
    }

    public function faculty_quiz($faculty_id)
    {
        return view('pfacultyPage',compact('faculty_id'));
    }

    public function hostquiz()
    {
        return view('phostQuiz');
    }

    public function student_quiz($student_id)
    {
        return view('pstudentPage',compact('student_id'));
    }

    public function studenthome($student_id)
    {
        return view('studentPage',compact('student_id'));
    }

    public function submit_quiz($student_id,Quiz $quiz)
    {
        $marks=0;
        $quiz_questions=$quiz->questions;
        foreach($quiz_questions as $question)
        {

            $correct_options=Option::where('question_id',$question->id)->where('correctness',1)->select('id')->get();
            $option_array=array();

            foreach($correct_options as $option)
            {
                array_push($option_array,$option->id);
            }
            sort($option_array);
            $response=Response::where('student_id',$student_id)->where('question_id',$question->id)->get();
            if(count($response)!=0)
            {
                $response_options=$response[0]->options;
                $response_array=array();

                foreach($response_options as $option)
                {
                    array_push($response_array,$option->option_id);
                }
                sort($response_array);
                if(count($response_array)==count($option_array))
                {
                    
                    for($i=0;$i<count($response_array);$i++)
                    {
                        if($response_array[$i]!=$option_array[$i])
                        {
                            break;
                        }
                    }
                    if($i==count($response_array))
                    {
                        $marks++;
                    }
                }
            }
        }
        
        $score=new Score;
        $score->student_id=$student_id;
        $score->marks=$marks;
        $score->quiz_id=$quiz->id;
        $score->save();
        return redirect('/online_quizzing/student/'.$student_id);
    }


    public function view_profile($student_id)
    {
        return view('view_profile',compact('student_id'));
    }

    public function view_result(Quiz $quiz)
    {
        return view('pviewResults',compact('quiz'));
    }

    public function add_quiz(Request $request)
    {
       /* $course_id=$_POST['course_id'];
        $quiz_name=$_POST['quiz_name'];
        $date=$_POST['date'];
        $start_time=$_POST['start_time'];
        $end_time=$_POST['end_time'];*/
        $quiz=new Quiz;
        $quiz->course_id=$request->course_id;
        $quiz->quiz_name=$request->quiz_name;
        $quiz->date=$request->date;
        $quiz->start_time=$request->start_time;
        $quiz->end_time=$request->end_time;
        $quiz->save();
        return view('edit_quiz',compact('quiz'));
    }

}
