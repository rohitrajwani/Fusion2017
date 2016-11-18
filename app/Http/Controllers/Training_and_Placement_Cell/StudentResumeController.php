<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use DB;
use App\StudentResume;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Http\Requests;

class StudentResumeController extends Controller
{
    public function index()
    {
    	$students = DB::table('All_Student')->get();
    	return view('training_and_placement_cell.profile.student', ['students' => $students]);
    }

    public function show($id)
    {
    	$student = DB::table('Student_Info')->where('student_id', '=', $id)->get();
    	// $student = StudentResume::find($student_id);
    	// return $student_id;
    	return view('training_and_placement_cell.profile.eachStud', compact('student'));
    }
}
