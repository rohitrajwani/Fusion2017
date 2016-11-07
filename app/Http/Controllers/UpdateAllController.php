<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Cc_complaint;

use App\Http\Controllers\Controller;

use App\Http\RedirectResponse;


use Illuminate\Support\Facades\Redirect;



class UpdateAllController extends Controller
{
    
public function updateAll(Request $request)

{
								$all=  Cc_complaint::all();
								$faculty = Cc_complaint::where('user_type','faculty')->get();	
								$staff = Cc_complaint::where('user_type','staff')->get();
								$student = Cc_complaint::where('user_type','student')->get();

	$complaint_id = $request->input('hid_complaint_id');
	$status = $request->input('status');

$cc_complaint = Cc_complaint::where('complaint_id',$complaint_id)->update(['status' => $status]);

if($cc_complaint)
{
echo "<script type='text/javascript'>alert('Complaint Updateded Successfully !!!!');</script>";

//return Redirect::route('cc\layout\admin_header',compact(['all','faculty','staff','student']));

//return redirect()->action('PagesController@index');

//return view('cc\layout\admin_header',compact(['all','faculty','staff','student']));
					return Redirect::to('/cc-complaint');

}
else{
echo "<script type='text/javascript'>alert('Complaint Not Updateded Successfully !!!! Please Try Again');</script>";
//return view('cc\layout\admin_header',compact(['all','faculty','staff','student']));
					return Redirect::to('/cc-complaint');

}
//$cc_complaint->status = $status;

//$cc_complaint->save();



	/*$status = $request->input('status');
	DB::table('cc_complaint')
            ->where('complaint_id',$complaint_id)
            ->update(['status' => $status]);

					$all = DB::table('cc_complaint')->get();
							$faculty = DB::table('cc_complaint')->where('user_type','=','faculty')->get();
							$staff = DB::table('cc_complaint')->where('user_type','=','staff')->get();
							$student = DB::table('cc_complaint')->where('user_type','=','student')->get();
							return view('cc\layout\admin_header',compact(['all','faculty','staff','student']));*/

}
}
