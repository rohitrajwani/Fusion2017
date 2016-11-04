<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

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
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;

use DB;
use Auth;

use Request as Request4;
use App\Http\Requests;


class StudentProfileController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show() {
        if(Auth::user()->user_type != 'student'){
            return Redirect::to('training_and_placement_cell');
        }
        $student_id = Auth::user()->username;
        $student = DB::table('All_Student')->where('student_id', '=', $student_id)->get();
    	$students = DB::table('All_Student')->where('student_id', '=', $student_id)->pluck('student_id');
    	$achieve = DB::table('St_Achievement')->where('student_id', '=', $student_id)->get();
    	$certif = DB::table('St_Cert')->where('student_id', '=', $student_id)->get();
    	$courses = DB::table('St_Courses')->where('student_id', '=', $student_id)->get();
    	$education = DB::table('St_Education')->where('student_id', '=', $student_id)->get();
    	$interest = DB::table('St_Interest')->where('student_id', '=', $student_id)->get();
    	$intern = DB::table('St_Internship')->where('student_id', '=', $student_id)->get();
    	$objective = DB::table('St_Objective')->where('student_id', '=', $student_id)->get();
    	$patent = DB::table('St_Patent')->where('student_id', '=', $student_id)->get();
    	$respo = DB::table('St_Pos_Of_Resp')->where('student_id', '=', $student_id)->get();
    	$projects = DB::table('St_Projects')->where('student_id', '=', $student_id)->get();
    	$public = DB::table('St_Publications')->where('student_id', '=', $student_id)->get();
    	$skills = DB::table('St_Skills')->where('student_id', '=', $student_id)->get();
    	$train = DB::table('St_Training')->where('student_id', '=', $student_id)->get();
    	return view ('training_and_placement_cell.profile.student', compact('students', 'student', 'achieve', 'certif', 'courses', 'education', 'interest', 'intern', 'objective', 'patent', 'respo', 'projects', 'public', 'skills', 'train'));
    }

    public function showTpo($student_id) {
        if(Auth::user()->user_type != 'others'){
            return Redirect::to('training_and_placement_cell');
        }
        $student = DB::table('All_Student')->where('student_id', '=', $student_id)->get();
        $students = DB::table('All_Student')->where('student_id', '=', $student_id)->pluck('student_id');
        $achieve = DB::table('St_Achievement')->where('student_id', '=', $student_id)->get();
        $certif = DB::table('St_Cert')->where('student_id', '=', $student_id)->get();
        $courses = DB::table('St_Courses')->where('student_id', '=', $student_id)->get();
        $education = DB::table('St_Education')->where('student_id', '=', $student_id)->get();
        $interest = DB::table('St_Interest')->where('student_id', '=', $student_id)->get();
        $intern = DB::table('St_Internship')->where('student_id', '=', $student_id)->get();
        $objective = DB::table('St_Objective')->where('student_id', '=', $student_id)->get();
        $patent = DB::table('St_Patent')->where('student_id', '=', $student_id)->get();
        $respo = DB::table('St_Pos_Of_Resp')->where('student_id', '=', $student_id)->get();
        $projects = DB::table('St_Projects')->where('student_id', '=', $student_id)->get();
        $public = DB::table('St_Publications')->where('student_id', '=', $student_id)->get();
        $skills = DB::table('St_Skills')->where('student_id', '=', $student_id)->get();
        $train = DB::table('St_Training')->where('student_id', '=', $student_id)->get();
        return view ('training_and_placement_cell.profile.studentTpo', compact('students', 'student', 'achieve', 'certif', 'courses', 'education', 'interest', 'intern', 'objective', 'patent', 'respo', 'projects', 'public', 'skills', 'train'));
    }
}
