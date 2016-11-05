<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use Illuminate\Http\Request;

use DB;
use Redirect;
use Auth;
use App\Company;
use App\CompanyStudent;
use App\Student;
use Request as Request2;
use App\Http\Requests;

class CompanyStudentController extends Controller
{
    //
	public function index($company_id) {
		if(Auth::user()->user_type != 'others' && !Auth::user()->hasRole('admin')){
            return Redirect::to('training_and_placement_cell');
        }
		$company = DB::table('Company')->where('company_id', '=', $company_id)->get();
		// $student = Student::with('compStud')->orderBy('name', 'asc')->get();
		$student = DB::table('Applied_For_Company')
						->join('Company', 'Applied_For_Company.company_id', '=', 'Company.company_id')
						->join('All_Student', 'Applied_For_Company.student_id', '=', 'All_Student.student_id')
						->select('Company.name as name1', 'All_Student.roll_no as roll_no', 'All_Student.name as name', 'All_Student.student_id as student_id')
						->groupBy(['Company.name', 'All_Student.name', 'All_Student.roll_no', 'All_Student.student_id'])
						->get();
		// echo ($student);
	    return view('training_and_placement_cell.list.companyStudent', compact(['company', 'student']));
	}

	public function store(Request2 $request) {

		$count = $request::input('dummy');
		$company_id = $request::input('company_id');
		foreach($request::input('student_id') as $stud) {
			
			
			if($request::input('group'.$stud) == "Selected") {
				
			
				// $update = ['status_of_placement', '1'];
				DB::table('Applied_For_Company')
						->where([['student_id', $stud], ['company_id', $company_id]])
						->update(['status_of_placement' => 1]);
			}
			elseif($request::input('group'.$stud) == "Not Selected") {

			
				// $update = ['status_of_placement', '0'];
				DB::table('Applied_For_Company')
						->where([['student_id', $stud], ['company_id', $company_id]])
						->update(['status_of_placement' => 0]);
			}
		}
		return Redirect::back()->withStatus('Form submitted!');
			
	}
}
