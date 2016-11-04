<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use Illuminate\Http\Request;
use App\StudentResume;
use App\StudentEducation;
use App\StudentAchievement;
use App\StudentCourses;
use App\StudentCertifications;
use App\StudentInterest;
use App\StudentInternships;
use App\StudentPatents;
use App\StudentProjects;
use App\StudentPublications;
use App\StudentResponsibility;
use App\StudentSkills;
use App\StudentTraining;
use DB;
use PDF;
use Auth;
use App\Http\Requests;

class ProductController extends Controller
{
    public function htmltopdfview(Request $request)
    {
        if(Auth::user()->user_type != 'student'){
            return Redirect::to('training_and_placement_cell');
        }
        // $products = Products::all();
        $student = DB::table('All_Student')->where('student_id', '=', Auth::user()->username)->get();
        $students = DB::table('All_Student')->where('student_id', '=', Auth::user()->username)->pluck('student_id');
        $achieve = DB::table('St_Achievement')->where('student_id', '=', Auth::user()->username)->get();
        $certif = DB::table('St_Cert')->where('student_id', '=', Auth::user()->username)->get();
        $courses = DB::table('St_Courses')->where('student_id', '=', Auth::user()->username)->get();
        $education = DB::table('St_Education')->where('student_id', '=', Auth::user()->username)->get();
        $interest = DB::table('St_Interest')->where('student_id', '=', Auth::user()->username)->get();
        $intern = DB::table('St_Internship')->where('student_id', '=', Auth::user()->username)->get();
        $objective = DB::table('St_Objective')->where('student_id', '=', Auth::user()->username)->get();
        $patent = DB::table('St_Patent')->where('student_id', '=', Auth::user()->username)->get();
        $respo = DB::table('St_Pos_Of_Resp')->where('student_id', '=', Auth::user()->username)->get();
        $projects = DB::table('St_Projects')->where('student_id', '=', Auth::user()->username)->get();
        $public = DB::table('St_Publications')->where('student_id', '=', Auth::user()->username)->get();
        $skills = DB::table('St_Skills')->where('student_id', '=', Auth::user()->username)->get();
        $train = DB::table('St_Training')->where('student_id', '=', Auth::user()->username)->get();
        view()->share('students', $students);
        view()->share('student', $student);
        view()->share('achieve', $achieve);
        view()->share('certif', $certif);
        view()->share('courses', $courses);
        view()->share('education', $education);
        view()->share('interest', $interest);
        view()->share('intern', $intern);
        view()->share('objective', $objective);
        view()->share('patent', $patent);
        view()->share('respo', $respo);
        view()->share('projects', $projects);
        view()->share('public', $public);
        view()->share('skills', $skills);
        view()->share('train', $train);

        if($request->has('download')){
            $pdf = PDF::loadView('training_and_placement_cell.htmltopdfview');
            return $pdf->download('htmltopdfview');
    	// return view('profile.student', ['students' => $students]);
        }
        return view('training_and_placement_cell.htmltopdfview', compact('students', 'student', 'achieve', 'certif', 'courses', 'education', 'interest', 'intern', 'objective', 'patent', 'respo', 'projects', 'public', 'skills', 'train'));
    }
}
