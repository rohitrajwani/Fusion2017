<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Cc_complaint;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;

class CreateController extends Controller
{
    
public function insert(Request $request)
{

$users = Cc_complaint::where('user_id', session('user_id'));
//dd('$users');
	$cc_complaint=new Cc_complaint;

	
		$cc_complaint->category= $request->input('category');
		$cc_complaint->sub_category = $request->input('sub_category');
		$cc_complaint->cc_no= $request->input('cc_no');
		$cc_complaint->pc_no= $request->input('pc_no');
		$cc_complaint->user_id= $request->input('user_id');
		$cc_complaint->user_type= $request->input('user_type');
		$cc_complaint->status= $request->input('status');

		if($cc_complaint->save())
		{
			//$success=1;

			session(['success_type'=>1]);
			//return view('cc\layout\header',compact('users'))->with('alert-success','Registered Successfully!!');
					return Redirect::to('/cc-complaint');
			//return view('cc\layout\header',compact('users'));
		}
		else {
			//$success=0;
			session(['success_type' =>0]);
				echo "<script type='text/javascript'>alert('Complaint Registered UnSuccessfully !!!! Please Try Again');</script>";
			//return view('cc\layout\header',compact('users'))->with('alert-success','Registered UnSuccessfully!!');
			return view('cc\layout\header',compact('users'));
		}
	

		}
}
