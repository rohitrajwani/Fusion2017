<?php

namespace App\Http\Controllers\Assignments_and_Course_Documentations;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request as Request21;
use Request as Request11;

use App\Document;
use App\Assignment;
use App\Assessment;
use App\Assess_assignment;
use Redirect;
use Request as Request3;
use DB;
use Auth;


class Faculty extends Controller
{
	public function home() {
        if(Auth::user()->user_type!='faculty'){
            $courses = DB::table('Register_Course')->where('student_id', Auth::user()->username)->get();
            return Redirect::to('Assignments_and_Course_Documentations/student');
        }
		$course2=DB::table('Faculty_Takes_Course')->where('faculty_id',Auth::user()->username)->get();
		$course3=DB::table('Faculty_Takes_Course')->whereNotIn('faculty_id',[Auth::user()->username])->get();
		
		return view('Assignments_and_Course_Documentations/index2',compact('course2','course3'));
	}
    public function assess_assignment($course) {
        if(Auth::user()->user_type!='faculty'){
            $courses = DB::table('Register_Course')->where('student_id', Auth::user()->username)->get();
            return Redirect::to('Assignments_and_Course_Documentations/student');
        }

        $assess=DB::table('Solves_Assignment')->where('course_id','=',$course)->get();
        return view('Assignments_and_Course_Documentations/assess_assignments',compact('assess'));
        }
	public function Documents2($course) {
            if(Auth::user()->user_type!='faculty'){
            $courses = DB::table('Register_Course')->where('student_id', Auth::user()->username)->get();
            return Redirect::to('Assignments_and_Course_Documentations/student');
        }
			$courses = DB::table('Course')->where('course_id', '=', $course)->get();
            $assign = DB::table('Assignment')->where('course_id', '=', $course)->get();
            $doc = DB::table('Document')->where('course_id', '=', $course)->get();

                return view('Assignments_and_Course_Documentations/Documents2', compact('courses','assign','doc'));
        }

	public function selected_course2($course) {
        if(Auth::user()->user_type!='faculty'){
            $courses = DB::table('Register_Course')->where('student_id', Auth::user()->username)->get();
            return Redirect::to('Assignments_and_Course_Documentations/student');
        }
        return view('Assignments_and_Course_Documentations/selected_course2',compact('course'));
    }

    public function store(Request11 $request) {
        if(Auth::user()->user_type!='faculty'){
            $courses = DB::table('Register_Course')->where('student_id', Auth::user()->username)->get();
            return Redirect::to('Assignments_and_Course_Documentations/student');
        }
        $file_name = $request::file('doc_file')->getClientOriginalName();
    	$destination_path = 'Assignments_and_Course_Documentations/documents';

        Document::create([
    		'doc_url' => $request::input('document'),
    		'course_id' => $request::input('dummy')
    	]);

        $request::file('doc_file')->move($destination_path, $file_name);

    	return redirect()->back()->with('status', 'Successful');
    }
    
   public function store1(Request11 $request) {
    if(Auth::user()->user_type!='faculty'){
            $courses = DB::table('Register_Course')->where('student_id', Auth::user()->username)->get();
            return Redirect::to('Assignments_and_Course_Documentations/student');
        }
    $file_name = $request::file('assign_file')->getClientOriginalName();
    $destination_path = 'Assignments_and_Course_Documentations/assignments';
    
	Assignment::create([
		'url_assign' => $request::input('assignment'),
		'course_id' => $request::input('dummy'),
		'deadline' => $request::input('deadline')
		]);

    $request::file('assign_file')->move($destination_path, $file_name);

	return redirect()->back()->with('status', 'Successful');
	} 
    
    public function store2(Request3 $request){
        if(Auth::user()->user_type!='faculty'){
            $courses = DB::table('Register_Course')->where('student_id', Auth::user()->username)->get();
            return Redirect::to('Assignments_and_Course_Documentations/student');
        }

        Assess_assignment::create([
            'assign_id' => $request::input('dummy'),
            'student_id' => $request::input('dummy1'),
            'marks' => $request::input('marks')
            ]);

        return redirect()->back()->with('status', 'Successful');

    }
    public function student_performance($course) {
        if(Auth::user()->user_type!='faculty'){
            $courses = DB::table('Register_Course')->where('student_id', Auth::user()->username)->get();
            return Redirect::to('Assignments_and_Course_Documentations/student');
        }

        $assess=DB::table('Assessment')->where('assign_id','=',1)->where('course_id','=',$course)->get();
        return view('Assignments_and_Course_Documentations/assess_assignments',compact('assess'));
    }


    public function delete(){
        if(Auth::user()->user_type!='faculty'){
            $courses = DB::table('Register_Course')->where('student_id', Auth::user()->username)->get();
            return Redirect::to('Assignments_and_Course_Documentations/student');
        }

        $doc_id = $_GET['id'];
        $doc_type = $_GET['type'];
        
        $doc_table = '';

        if($doc_type=='D'){
            $doc_table  = 'Document';
            $col_name = 'doc_id';
        }

        DB::table($doc_table)->where($col_name,'=',$doc_id)->delete();
    }
}

