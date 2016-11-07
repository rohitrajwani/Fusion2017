<?php
namespace App\Http\Controllers;
use App\Course;
use App\Faculty;
use DB;
use Illuminate\Http\Request;
class cms extends Controller{
	public function home($id){
		$faculty = DB::table('faculty')->where('faculty_id','=',$id)->first();
		if($faculty)
			return view('html.index',['faculty'=>$faculty]);
		//else
		//	  return redirect()->back();
	}
	
	public function getCourses($id){
		$faculty = DB::table('faculty')->where('faculty_id','=',$id)->first();
		$course_list = DB::table('course_taken_by')
						->join('course','course_taken_by.course_id','=','course.course_id')
								->where('course_taken_by.faculty_id','=',$id)
										->get();
		return view('html.courses',['courses'=>$course_list,'faculty'=>$faculty]);
	}
	
	public function getCourse($fid,$id){
		$faculty = DB::table('faculty')->where('faculty_id','=',$fid)->first();
		$course = DB::table('course')->where('course_id','=',$id)->first();
		$students = DB::table('register_course')
						->join('student','register_course.student_id','=','student.student_id')
								->where('register_course.course_id','=',$id)
										->get();
		return view('html.course1',['course'=>$course,'students'=>$students,'faculty'=>$faculty]);
	}
	
	public function manageStudent(){
		return view('html.students');
	}
	
	public function manageFaculty(){
		return view('html.faculty');
	}
	
	public function addStudent(Request $req){
		$query = DB::table('register_course')->insert(['student_id'=>$req['student_id'],'course_id'=>$req['course_id']]);
		return back();
	}
	
	public function delStudent(Request $req){
		$query = DB::table('register_course')->where('student_id',$req['student_id'])->where('course_id',$req['course_id'])->delete();
		return back();
	}
	
	public function addFaculty(Request $req){
		$query = DB::table('course_taken_by')->insert(['faculty_id'=>$req['faculty_id'],'course_id'=>$req['course_id']]);
		return back();
	}
	
	public function delFaculty(Request $req){
		$query = DB::table('course_taken_by')->where('faculty_id',$req['faculty_id'])->where('course_id',$req['course_id'])->delete();
		return back();
	}
	
	public function getforum($fid){
		
		$faculty = DB::table('faculty')->where('faculty_id','=',$fid)->first();
		$questions = DB::table('question')->join('student','question.user_id','=','student.student_id')->select('question.question as question','question.created_at as created_at','student.name as name','question.question_id as question_id')->get();
		$questionf = DB::table('question')->join('faculty','question.user_id','=','faculty.faculty_id')->select('question.question as question','question.created_at as created_at','faculty.name as name','question.question_id as question_id')->get();
		return view('threads.index',['faculty'=>$faculty, 'questions'=>$questions,'questionf'=>$questionf]);
	}
	
	public function getforumstudent($sid){
		
		$student = DB::table('student')->where('student_id','=',$sid)->first();
		$questions = DB::table('question')->join('student','question.user_id','=','student.student_id')->select('question.question as question','question.created_at as created_at','student.name as name','question.question_id as question_id')->get();
		$questionf = DB::table('question')->join('faculty','question.user_id','=','faculty.faculty_id')->select('question.question as question','question.created_at as created_at','faculty.name as name','question.question_id as question_id')->get();
		return view('threads.indexstudent',['student'=>$student, 'questions'=>$questions,'questionf'=>$questionf]);
	}
	
	public function getthread($fid,$tid){
		$faculty = DB::table('faculty')->where('faculty_id','=',$fid)->first();
		$question = DB::table('question')->where('question_id','=',$tid)->first();
		$answers = DB::table('question')->join('answer','question.question_id','=','answer.question_id')->where('question.question_id','=',$tid)->orderBy('answer.created_at','desc')->select('question.question as question','answer.id as answer_id','answer.answer as answer','answer.answer_user_id as user_id','answer.created_at as created_at','question.question_id as question_id')->get();
		return view('threads.onethread',['faculty'=>$faculty,'question'=>$question,'answers'=>$answers]);
	}
	public function getthreadstudent($sid,$tid){
		$student = DB::table('student')->where('student_id','=',$sid)->first();
		$question = DB::table('question')->where('question_id','=',$tid)->first();
		$answers = DB::table('question')->join('answer','question.question_id','=','answer.question_id')->where('question.question_id','=',$tid)->orderBy('answer.created_at','desc')->select('question.question as question','answer.id as answer_id','answer.answer as answer','answer.answer_user_id as user_id','answer.created_at as created_at','question.question_id as question_id')->get();
		return view('threads.onethreadstudent',['student'=>$student,'question'=>$question,'answers'=>$answers]);
	}
	
	public function addanswer(Request $request, $fid, $tid){
		$faculty = DB::table('faculty')->where('faculty_id','=',$fid)->first();
		$question = DB::table('question')->where('question_id','=',$tid)->first();
		DB::table('answer')->insert(array('question_id' => $tid, 'answer_user_id' => $fid, 'answer_user_type' => 'faculty','answer' => $request->answer ));
		$answers = DB::table('question')->join('answer','question.question_id','=','answer.question_id')->where('question.question_id','=',$tid)->orderBy('answer.created_at','desc')->select('question.question as question','answer.id as answer_id','answer.answer as answer','answer.answer_user_id as user_id','answer.created_at as created_at','question.question_id as question_id')->get();
		return view('threads.onethread',['faculty'=>$faculty, 'question'=>$question, 'answers'=>$answers]);
	}
	
	public function addanswerstudent(Request $request, $sid, $tid){
		$student = DB::table('student')->where('student_id','=',$sid)->first();
		$question = DB::table('question')->where('question_id','=',$tid)->first();
		DB::table('answer')->insert(array('question_id' => $tid, 'answer_user_id' => $sid, 'answer_user_type' => 'faculty','answer' => $request->answer ));
		$answers = DB::table('question')->join('answer','question.question_id','=','answer.question_id')->where('question.question_id','=',$tid)->orderBy('answer.created_at','desc')->select('question.question as question','answer.id as answer_id','answer.answer as answer','answer.answer_user_id as user_id','answer.created_at as created_at','question.question_id as question_id')->get();
		return view('threads.onethreadstudent',['student'=>$student, 'question'=>$question, 'answers'=>$answers]);
	}
	
	public function newthread($fid){
		$faculty = DB::table('faculty')->where('faculty_id','=',$fid)->first();
		return view('threads.newthread',['faculty'=>$faculty]);
	}
	
	public function newthreadstudent($sid){
		$student = DB::table('student')->where('student_id','=',$sid)->first();
		return view('threads.newthreadstudent',['student'=>$student]);
	}
	
	public function addthread(Request $request, $fid){
		$faculty = DB::table('faculty')->where('faculty_id','=',$fid)->first();
		DB::table('question')->insert(array('user_id' => $fid, 'course_id' => 'CS308', 'question' => $request->question));
		$questions = DB::table('question')->join('student','question.user_id','=','student.student_id')->select('question.question as question','question.created_at as created_at','student.name as name','question.question_id as question_id')->get();
		$questionf = DB::table('question')->join('faculty','question.user_id','=','faculty.faculty_id')->select('question.question as question','question.created_at as created_at','faculty.name as name','question.question_id as question_id')->get();
		return view('threads.index',['faculty'=>$faculty, 'questions'=>$questions,'questionf'=>$questionf]);
	}
	
	public function addthreadstudent(Request $request, $sid){
		$student = DB::table('student')->where('student_id','=',$sid)->first();
		DB::table('question')->insert(array('user_id' => $sid, 'course_id' => 'CS308', 'question' => $request->question));
		$questions = DB::table('question')->join('student','question.user_id','=','student.student_id')->select('question.question as question','question.created_at as created_at','student.name as name','question.question_id as question_id')->get();
		$questionf = DB::table('question')->join('faculty','question.user_id','=','faculty.faculty_id')->select('question.question as question','question.created_at as created_at','faculty.name as name','question.question_id as question_id')->get();
		return view('threads.indexstudent',['student'=>$student, 'questions'=>$questions,'questionf'=>$questionf]);
	}
	
	public function deletethread(Request $request, $fid, $tid){
		$faculty = DB::table('faculty')->where('faculty_id','=',$fid)->first();
		DB::table('question')->where('question_id','=',$tid)->delete();
		$questions = DB::table('question')->join('student','question.user_id','=','student.student_id')->select('question.question as question','question.created_at as created_at','student.name as name','question.question_id as question_id')->get();
		$questionf = DB::table('question')->join('faculty','question.user_id','=','faculty.faculty_id')->select('question.question as question','question.created_at as created_at','faculty.name as name','question.question_id as question_id')->get();
		return view('threads.index',['faculty'=>$faculty, 'questions'=>$questions,'questionf'=>$questionf]);
	}
	
	public function editthread($fid, $tid){
		$faculty = DB::table('faculty')->where('faculty_id','=',$fid)->first();
		$question = DB::table('question')->where('question_id','=',$tid)->first();
		return view('threads.editthread',['faculty'=>$faculty, 'question'=>$question]);
	}
	
	public function editstudentthread($sid, $tid){
		$student = DB::table('student')->where('student_id','=',$sid)->first();
		$question = DB::table('question')->where('question_id','=',$tid)->first();
		return view('threads.editstudentthread',['student'=>$student, 'question'=>$question]);
	}
	
	public function changestudentthread(Request $request, $sid, $tid){
		$student = DB::table('student')->where('student_id','=',$sid)->first();
		DB::table('question')->where('question_id','=',$tid)->update(['question' => $request->question]);
		$questions = DB::table('question')->join('student','question.user_id','=','student.student_id')->select('question.question as question','question.created_at as created_at','student.name as name','question.question_id as question_id')->get();
		$questionf = DB::table('question')->join('faculty','question.user_id','=','faculty.faculty_id')->select('question.question as question','question.created_at as created_at','faculty.name as name','question.question_id as question_id')->get();
		return view('threads.indexstudent',['student'=>$student, 'questions'=>$questions,'questionf'=>$questionf]);
	}
	
	public function changethread(Request $request, $fid, $tid){
		$faculty = DB::table('faculty')->where('faculty_id','=',$fid)->first();
		DB::table('question')->where('question_id','=',$tid)->update(['question' => $request->question]);
		$questions = DB::table('question')->join('student','question.user_id','=','student.student_id')->select('question.question as question','question.created_at as created_at','student.name as name','question.question_id as question_id')->get();
		$questionf = DB::table('question')->join('faculty','question.user_id','=','faculty.faculty_id')->select('question.question as question','question.created_at as created_at','faculty.name as name','question.question_id as question_id')->get();
		return view('threads.index',['faculty'=>$faculty, 'questions'=>$questions,'questionf'=>$questionf]);
	}
}