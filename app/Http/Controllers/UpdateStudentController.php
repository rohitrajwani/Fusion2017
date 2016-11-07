<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Cc_complaint;

use App\Http\Controllers\Controller;

class UpdateStudentController extends Controller
{
    

public function updateStudent(Request $request)

{

								$all=  Cc_complaint::all();
								$faculty = Cc_complaint::where('user_type','faculty')->get();	
								$staff = Cc_complaint::where('user_type','staff')->get();
								$student = Cc_complaint::where('user_type','student')->get();


	$complaint_id = $request->input('hid_complaint_id');
	$status = $request->input('status');

$cc_complaintST =  Cc_complaint::find($complaint_id)->where('user_type','student');

$cc_complaintST->status = $status;

$cc_complaintST->save();

return view('cc\layout\admin_header',compact(['all','faculty','staff','student']));
}

    
}
