<?php

namespace App\Http\Controllers\ClassAttendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
class SendMessageController extends Controller
{
    public function alert()
	{
		return view('Projec
		t.alert_student');
	}
	public function send(Request $request,$coursename)
	{
		$message = $request->input('message');
		$student_id = $request->input('enrolled');
		$time = Carbon::now();
		if(!empty($message))
		{
			if($student_id=='All') {
				$enrolled_students = \DB::table('course')->where('course_name', $coursename )
					->join('register_course', 'register_course.course_id', '=', 'course.course_id')
					->select('register_course.student_id')
					->orderBy('register_course.student_id')
					->get();
				foreach($enrolled_students as $student)
				{
					\DB::table('notification')->insert(
						['user_id' => $student->student_id, 'user_type' => 'faculty' , 'notification' => $message ,'created_at' => $time , 'updated_at' => $time
						]
					);
				}
				return redirect()->back()->with('message', 'Notfication send successfully ');
			}
			else
			{
					\DB::table('notification')->insert(
						[
						'user_id' => $student_id,
						'user_type' => 'student' ,
						'notification' => $message ,
						'created_at' => $time ,
						'updated_at' => $time
						]
					);
					return redirect()->back();
			}
		}
		else
		{
			return redirect()->back();
		}
		
	}
}
