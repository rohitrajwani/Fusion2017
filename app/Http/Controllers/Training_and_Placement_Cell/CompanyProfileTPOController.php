<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class CompanyProfileTPOController extends Controller
{
    //
    public function index($company_id) {
    	if(Auth::user()->user_type != 'others'){
            return Redirect::to('training_and_placement_cell');
        }
    	$company = DB::table('Company')->where('company_id', '=', $company_id)->get();

    	return view('training_and_placement_cell.profile.companyProfileTpo', compact('company'));
    }
}
