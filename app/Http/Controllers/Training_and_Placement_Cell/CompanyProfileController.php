<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use Illuminate\Http\Request;

use DB;
use App\Company;
use App\CompanyStudent;
use Auth;
use Request as Request5;
use Redirect;
use App\Http\Requests;

class CompanyProfileController extends Controller
{
    public function index($company_id) {
        if(Auth::user()->user_type != 'student'){
            return Redirect::to('training_and_placement_cell');
        }
        $student = DB::table('All_Student')->where('student_id', '=', Auth::user()->username)->get();
    	$students = DB::table('All_Student')->where('student_id', '=', Auth::user()->username)->pluck('student_id');
    	$students1 = DB::table('All_Student')->where('student_id', '=', Auth::user()->username)->pluck('branch');
    	$company = DB::table('Company')->where('company_id', '=', $company_id)->get();
    	$company1 = DB::table('Company')->where('company_id', '=', $company_id)->pluck('company_id');
    	$company2 = DB::table('Company')->where('company_id', '=', $company_id)->pluck('eligibility_criteria');
    	return view('training_and_placement_cell.profile.companyProfile', compact(['students', 'company', 'company1', 'students1', 'company2', 'student']));
    }

    public function store(Request5 $request) {
        
    	if($request::input('branch') == $request::input('eligibility')) {
    		CompanyStudent::create([
				'company_id' => $request::input('company_id'),
				'student_id' => $request::input('student_id')
    			]);
            return Redirect::to('/training_and_placement_cell/student')->with('alert', 'Applied Successfully!');
    	}
    	else {
    		return Redirect::to('/training_and_placement_cell/student')->with('alert', 'Not Eligible to Apply!');
    	}
    }
}
