<?php

namespace App\Http\Controllers\ClassAttendance;

use App\Http\Controllers\Controller as Controller1;
use App\Http\Requests;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Routing\Controller;

use Zizaco\Entrust\Traits\EntrustRoleTrait;

use Carbon\Carbon;

use Auth;

class TakeAttendanceController extends Controller1
{
    public function take_attendance($coursename)
	{
		return view('CAMS.take_attendance',compact('coursename'));
	}
	
	public function online_mode($coursename)
	{
		$register_student = \DB::table('course')->where('course_name',$coursename)
					->join('register_course', 'register_course.course_id', '=', 'course.course_id')
					->join('student', 'student.student_id', '=', 'register_course.student_id')
					->select('student.name','student.roll_no','course.course_name','student.student_id','course.course_id')
					->get();
		return view('CAMS.online_attendance_mode',['coursename' => $coursename , 'register_student' => $register_student]);
	}
	
	 public function offline_mode($coursename)
	{
			$register_student = \DB::table('course')->where('course_name',$coursename)
					->join('register_course', 'register_course.course_id', '=', 'course.course_id')
					->join('student', 'student.student_id', '=', 'register_course.student_id')
					->select('student.name','student.roll_no','course.course_name','student.student_id','course.course_id')
					->get();
		return view('CAMS.offline_attendance_mode',['coursename' => $coursename , 'register_student' => $register_student]);	
	}

	
	public function store_attendance_offline(Request $request,$coursename)
	{
			$date = $request->input('_date');
			$flag = \DB::table('student_attendance')->where('date',$date)
					->where('course_name',$coursename)
					->join('course', 'student_attendance.course_id', '=', 'course.course_id')
					->select('student_attendance.course_id','student_attendance.date')
					->count();
			
			
			if(empty($date))
			{
				return redirect()->back()->with('alert', 'Please fill the date!!');
			}
			else
			{
			 if($flag==0) 
			 {
			  $register_student = \DB::table('course')->where('course_name',$coursename)
					->join('register_course', 'register_course.course_id', '=', 'course.course_id')
					->join('student', 'student.student_id', '=', 'register_course.student_id')
					->select('student.name','student.roll_no','course.course_name','student.student_id','course.course_id')
					->get();
			  foreach ($register_student as $student) {
				$status = $request->input($student->roll_no);
				$s = 0;
				if($status) {
					$s = 1;
				}
				
				\DB::table('student_attendance')->insert(
						['student_id' => $student->student_id, 'course_id' => $student->course_id , 'date' => $date,
						'status' => $s]
					);
			  } 
			  $message = 'successfully submitted attendance on '.$date;
			  return Redirect::to('/CAMS/faculty#course')->with('alert',$message);
		     }
		     else
			 {
				 return redirect()->back()->with('alert', 'you have already taken attendance on this date');
			 }
			}
	}

	public function store_attendance_online(Request $request,$coursename)
	{
			$date = Carbon::today();
			$flag = \DB::table('student_attendance')->where('date',$date)
					->where('course_name',$coursename)
					->join('course', 'student_attendance.course_id', '=', 'course.course_id')
					->select('student_attendance.course_id','student_attendance.date')
					->count();
			
			
			 if($flag==0) 
			 {
			  $register_student = \DB::table('course')->where('course_name',$coursename)
					->join('register_course', 'register_course.course_id', '=', 'course.course_id')
					->join('student', 'student.student_id', '=', 'register_course.student_id')
					->select('student.name','student.roll_no','course.course_name','student.student_id','course.course_id')
					->get();
			  foreach ($register_student as $student) {
				$status = $request->input($student->roll_no);
				$s = 0;
				if($status) {
					$s = 1;
				}
				
				\DB::table('student_attendance')->insert(
						['student_id' => $student->student_id, 'course_id' => $student->course_id , 'date' => $date,
						'status' => $s]
					);
			  } 
			  $message = 'successfully submitted attendance on '.$date;
			  return Redirect::to('/CAMS/faculty#course')->with('alert',$message);
		     }
		     else
			 {
				 return Redirect::to('/CAMS/faculty#course')->with('alert', 'you have already taken attendance on this date');
			 }
			
	}
}
