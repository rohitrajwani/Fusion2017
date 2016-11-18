<?php

namespace App\Http\Controllers\cc;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Cc_complaint;

use App\Http\Controllers\Controller;
class UpdateStaffController extends Controller
{
    

public function updateStaff(Request $request)

{


								$all=  Cc_complaint::all();
								$faculty = Cc_complaint::where('user_type','faculty')->get();	
								$staff = Cc_complaint::where('user_type','staff')->get();
								$student = Cc_complaint::where('user_type','student')->get();	
	$complaint_id = $request->input('hid_complaint_id');
	$status = $request->input('status');

$cc_complaintS = Cc_complaint::find($complaint_id)->where('user_type','staff');

$cc_complaintS->status = $status;

$cc_complaintS->save();

return view('cc/layout/admin_header',compact(['all','faculty','staff','student']));
}

    }
