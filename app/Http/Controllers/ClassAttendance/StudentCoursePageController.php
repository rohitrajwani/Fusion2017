<?php

namespace App\Http\Controllers\ClassAttendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class StudentCoursePageController extends Controller
{
    public function student_course(Request $request,$course_id)
	{	
		
		$student_id = $request->session()->get('student_id');
		$student = DB::table('student')->where('student_id',$student_id)->first();
		$course = DB::table('course')->where('course_id',$course_id)->first();
		$courses = DB::table('register_course')->where('student_id',$student_id)->where('course_id',$course_id)->get();
		$classes = DB::table('course')->where('course_id',$course_id)->get();
		$attended = DB::table('student_attendance')->where('student_id',$student_id)->where('course_id',$course_id)->orderBy('date')->get();
		$notification = DB::table('notification')->where('user_id',$student_id)->get();
		return view('CAMS.student_course',['student' =>$student,'coursename' => $course->course_name,'course_id' => $course_id, 'courses' =>$courses,'classes'=>$classes,'attended' =>$attended, 'notification'=>$notification]);

	}
}
