<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use Illuminate\Http\Request;
use Auth;
use Request as Request3;
use DB;
use App\Company;
use Redirect;
use App\Http\Requests;

class CompanyFormController extends Controller
{
    //
    public function create()
    {
        // $company = DB::table('Company')->where('company_id', '=', $company_id)->pluck('company_id');
        if(Auth::user()->user_type != 'others' && !Auth::user()->hasRole('admin')){
            return Redirect::to('training_and_placement_cell');
        }

        return view('training_and_placement_cell.form.companyForm');
    }

    public function store(Request3 $request) {
        if(Auth::user()->user_type != 'others' && !Auth::user()->hasRole('admin')){
            return Redirect::to('training_and_placement_cell');
        }
        
    	Company::create([
    		'name' => $request::input('comname'),
    		'min_qualification' => $request::input('minqual'),
    		'eligibility_criteria' => $request::input('eligibility'),
    		'company_type' => $request::input('ctype'),
    		'package' => $request::input('sal'),
    		'arrival_date' => $request::input('appdead'),
    		'company_id' => $request::input('comID')
    		]);
        return Redirect::back()->withStatus('Form submitted!');
    }
}
