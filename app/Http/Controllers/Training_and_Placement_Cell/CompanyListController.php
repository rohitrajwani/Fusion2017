<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Http\Requests;

class CompanyListController extends Controller
{
    //
    
    public function show() {
        if(Auth::user()->user_type != 'student'){
            return Redirect::to('training_and_placement_cell');
        }
    	$company = DB::table('Company')->get();
    	$students = DB::table('All_Student')->where('student_id', '=', Auth::user()->username)->pluck('student_id');
        $student = DB::table('All_Student')->where('student_id', '=', Auth::user()->username)->get();
    	return view ('training_and_placement_cell.list.companyList', compact(['company', 'students', 'student']));
    }

    public function showTpo() {
        if(Auth::user()->user_type != 'others'){
            return Redirect::to('training_and_placement_cell');
        }
    	$company = DB::table('Company')->get();
    	return view ('training_and_placement_cell.list.companyListTpo', compact(['company']));
    }
}
