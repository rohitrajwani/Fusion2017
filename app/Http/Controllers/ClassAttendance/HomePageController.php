<?php
namespace App\Http\Controllers\ClassAttendance;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
class HomePageController extends Controller
{
    public function facHome(Request $request)
	{
		
		$user=Auth::user();
		$username = $user->username;
		$request->session()->put('faculty_id',$username);
		$faculty = DB::table('faculty')->where('faculty_id',$username)->first();
		$courses = DB::table('course_taken_by')->where('faculty_id',$username) 
					->join('course', 'course_taken_by.course_id', '=', 'course.course_id')
					->select('course_taken_by.course_id','course.course_name')		
					->get();	
		return view('CAMS.faculty_home_page',['faculty' => $faculty,'courses' =>$courses]); 		
	}
	public function stuHome(Request $request)
	{	
		$user=Auth::user();
		$username = $user->username;
		$request->session()->put('student_id',$username);
		$student = DB::table('student')->where('student_id',$username)->first();
		$courses = DB::table('register_course')->where('student_id',$username)
				->join('course', 'register_course.course_id', '=', 'course.course_id')
					->select('register_course.course_id','course.course_name')
					->get();
		$notification = DB::table('notification')->where('user_id',$username)->get();
		return view('CAMS.student_home_page',['student' =>$student,'courses' =>$courses,'notification'=>$notification]);			
	}
}
