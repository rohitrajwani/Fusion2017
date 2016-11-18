<?php

namespace App\Http\Controllers\ClassAttendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class DateSelectController extends Controller
{
    public function date_choose($coursename)
	{
		$classes_on_date = \DB::table('course')->where('course_name', $coursename )
					->join('student_attendance', 'student_attendance.course_id', '=', 'course.course_id')
					->select('student_attendance.date')
					->groupBy('student_attendance.date')
					->get();
		return view('CAMS.select_date_to_view',['coursename' => $coursename,'classes_on_date' => $classes_on_date]);
	}
}
