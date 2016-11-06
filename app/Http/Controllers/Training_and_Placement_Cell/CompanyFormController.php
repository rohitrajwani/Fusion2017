<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use Auth;
use Request as Request3;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use App\Company;

use App\Http\Requests;

class CompanyFormController extends Controller
{
    //
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function create()
    {
        // $company = DB::table('Company')->where('company_id', '=', $company_id)->pluck('company_id');
        if(Auth::user()->user_type != 'others' && !Auth::user()->hasRole('admin')){
            return Redirect::to('training_and_placement_cell');
        }

        return view('training_and_placement_cell.form.companyForm');
    }

    public function store(Request3 $request, Request $request1) {
        
        $this->validate($request1, [
            'comID'=>'required',
            'comname'=>'required|max:20',
            'minqual'=>'required|numeric',
            'eligibility'=>'required|max:100',
            'ctype'=>'required|max:20',
            'sal'=>'required|numeric',
            'arrival'=>'required|date|after:tomorrow'
            ]);

        $user = Company::where('company_id', '=', $request::input('comID'))->get();
        if ($user) {
           DB::table('Company')->where('company_id', '=', $request::input('comID'))->delete();
        }
        
    	Company::create([
            'company_id' => $request::input('comID'),
    		'name' => $request::input('comname'),
    		'min_qualification' => $request::input('minqual'),
    		'eligibility_criteria' => $request::input('eligibility'),
    		'company_type' => $request::input('ctype'),
    		'package' => $request::input('sal'),
    		'arrival_date' => $request::input('arrival')
    		]);
        return redirect('/training_and_placement_cell')->with('message', 'Form Submitted Successfully!');
    }

    public function create1($company_id)
    {
        // $company = DB::table('Company')->where('company_id', '=', $company_id)->pluck('company_id');
        if(Auth::user()->user_type != 'others' && !Auth::user()->hasRole('admin')){
            return Redirect::to('training_and_placement_cell');
        }
        $company = DB::table('Company')->where('company_id', '=', $company_id)->pluck('company_id');
        return view('training_and_placement_cell.form.companyFormUpdate', compact('company'));
    }

    public function store1(Request3 $request, Request $request1) {
        
        $this->validate($request1, [
            'comID'=>'required',
            'comname'=>'required|max:20',
            'minqual'=>'required|numeric',
            'eligibility'=>'required|max:100',
            'ctype'=>'required|max:20',
            'sal'=>'required|numeric',
            'arrival'=>'required|date|after:tomorrow'
            ]);

        $user = Company::where('company_id', '=', $request::input('comID'))->get();
        if ($user) {
           DB::table('Company')->where('company_id', '=', $request::input('comID'))->delete();
        }
        
        Company::create([
            'company_id' => $request::input('comID'),
            'name' => $request::input('comname'),
            'min_qualification' => $request::input('minqual'),
            'eligibility_criteria' => $request::input('eligibility'),
            'company_type' => $request::input('ctype'),
            'package' => $request::input('sal'),
            'arrival_date' => $request::input('arrival')
            ]);
        return redirect('/training_and_placement_cell/tpo/page')->with('alert', 'Form Submitted Successfully!');
    }
}
