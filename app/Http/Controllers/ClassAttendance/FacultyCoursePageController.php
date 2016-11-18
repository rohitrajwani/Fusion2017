<?php

namespace App\Http\Controllers\ClassAttendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class FacultyCoursePageController extends Controller
{	  
    public function view_course($coursename){
		
		
			$dates = \DB::table('course')->where('course_name', $coursename )
					->join('student_attendance', 'student_attendance.course_id', '=', 'course.course_id')
					->select('student_attendance.date')
					->groupBy('student_attendance.date')
					->get();
			
			$enrolled_students = \DB::table('course')->where('course_name', $coursename )
					->join('register_course', 'register_course.course_id', '=', 'course.course_id')
					->join('student', 'register_course.student_id', '=', 'student.student_id')	
					->select('student.roll_no','student.student_id')
					->orderBy('student.roll_no') 
					->get();
			return view('CAMS.faculty_course_page', [ 
					'dates' => $dates ,				
					'coursename' => $coursename  ,
					'enrolled_students' => $enrolled_students
				]
			);
			
	}
}
