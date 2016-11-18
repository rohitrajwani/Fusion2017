<?php

namespace App\Http\Controllers\Assignments_and_Course_Documentations;

use Illuminate\Http\Request;
use App\Solve_assignment;
use App\Assessment;
use Request as Request1;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;

class Student extends Controller
{
	public function check(){
		
		if(Auth::user()->user_type == 'student')
                	return Redirect::to('/Assignments_and_Course_Documentation/student');
        else if(Auth::user()->user_type == 'faculty')
	                return Redirect::to('/Assignments_and_Course_Documentation/faculty');
	}

	public function home() {
	$courses = DB::table('Register_Course')->where('student_id', Auth::user()->username)->get();
		return view('Assignments_and_Course_Documentations/index1', compact('courses'));
		
	}
	
	public function selected_course($course) {
		return view('Assignments_and_Course_Documentations/selected_course', compact('course'));
		}
	
	public function solve_assignment($course) {
		$solve= DB::table('Assignment')->where('course_id', '=', $course)->get();
		$assigns = DB::table('Solves_Assignment')->where('student_id', Auth::user()->username)->where('course_id', $course)->get();

                return view('Assignments_and_Course_Documentations/solve_assignments',compact('solve','course','assigns'));
        }     

	public function course_documents($course) {
		$doc= DB::table('Document')->where('course_id', '=', $course)->get();
                return view('Assignments_and_Course_Documentations/course_documents',compact('course','doc'));
        }

    public function store(Request1 $request) {
    	$file_name = $request::file('solved_assignment')->getClientOriginalName();
    	$destination_path = 'Assignments_and_Course_Documentations/solved_assignments';

    	Solve_assignment::create([

    		'assign_id' =>$request::input('assign'),
    		'student_id' =>$request::input('student'),
    		'url_sol' =>$request::input('assignment'),
    		'course_id' =>$request::input('dummy'),
    		'deadline' =>$request::input('deadline'),
    		]);
   
		$request::file('solved_assignment')->move($destination_path, $file_name);    	

    	return redirect()->back()->with('status', 'Successful');
    }
}
