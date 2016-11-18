<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;
use Redirect;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Company;
use App\Http\Requests;

class SelectedStudentController extends Controller
{
    public function show() {
    	if(Auth::user()->user_type != 'student'){
            return Redirect::to('training_and_placement_cell');
        }

    	$students = DB::table('All_Student')->where('student_id', '=', Auth::user()->username)->get();
		$company = Company::with('compStud')->orderBy('name', 'asc')->get();
		// $student = Student::with('compStud')->orderBy('name', 'asc')->get();
		$student = DB::table('Applied_For_Company')
						->join('Company', 'Applied_For_Company.company_id', '=', 'Company.company_id')
						->join('All_Student', 'Applied_For_Company.student_id', '=', 'All_Student.student_id')
						->select('Company.name as name1', 'All_Student.roll_no as roll_no', 'All_Student.name as name', 'All_Student.student_id as student_id', 'All_Student.branch as branch')
						->where('Applied_For_Company.status_of_placement', '=', '1')
						->groupBy(['Company.name', 'All_Student.name', 'All_Student.roll_no', 'All_Student.student_id', 'All_Student.branch'])
						// ->orderBy('Company.name', 'asc')
						->get();
		// echo ($student);
	    return view('training_and_placement_cell.list.selectedStudent', compact(['company', 'student', 'students']));
	}

	public function showTpo() {
		if(Auth::user()->user_type != 'others'){
            return Redirect::to('training_and_placement_cell');
        }
		$company = Company::with('compStud')->orderBy('name', 'asc')->get();
		// $student = Student::with('compStud')->orderBy('name', 'asc')->get();
		$student = DB::table('Applied_For_Company')
						->join('Company', 'Applied_For_Company.company_id', '=', 'Company.company_id')
						->join('All_Student', 'Applied_For_Company.student_id', '=', 'All_Student.student_id')
						->select('Company.name as name1', 'All_Student.roll_no as roll_no', 'All_Student.name as name', 'All_Student.student_id as student_id', 'All_Student.branch as branch')
						->where('Applied_For_Company.status_of_placement', '=', '1')
						->groupBy(['Company.name', 'All_Student.name', 'All_Student.roll_no', 'All_Student.student_id', 'All_Student.branch'])
						// ->orderBy('Company.name', 'asc')
						->get();
		// echo ($student);
	    return view('training_and_placement_cell.list.selectedStudentTpo', compact(['company', 'student', 'students']));
	}
}
