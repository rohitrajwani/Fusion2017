<?php

namespace App\Http\Controllers\ClassAttendance;

use App\Http\Controllers\Controller as Controller1;
use DB;

use App\Http\Requests;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Routing\Controller;

use Zizaco\Entrust\Traits\EntrustRoleTrait;

use Carbon\Carbon;

use Auth;

class LeaveFormController extends Controller1
{
    	
	public function fill_leaveform(Request $request,$coursename)
	{
		$student_id=$request->session()->get('student_id');		
		$student = \DB::table('student')->where('student_id',$student_id)->first();
		return view('CAMS.fill_leave_form',['student' => $student,'coursename' => $coursename]);
	}
	public function store_leaveform(Request $request,$coursename)
	{		
			$s = 1;
			$Fdate = $request->input('_fromdate');
			$Tdate = $request->input('_tilldate');
			

			$student_id=$request->session()->get('student_id');		
			if(!empty($Fdate)&&!empty($Tdate)) {
			
			DB::table('student_leave_application')->insert(
						['leave_no' => rand(10,1000000000),
						'student_id' => $student_id, 'subject' => $coursename , 'from_date' =>  Date($Fdate),
						'status' => $s,'till_date' =>  Date($Tdate)]
					);



			return Redirect::to('/CAMS/student#course')->with('alert','Your form has been succesfully submitted');
		  }
		  else {
			  return redirect()->back();
		  }
	}
}
