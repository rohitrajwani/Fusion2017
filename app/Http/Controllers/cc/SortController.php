<?php

namespace App\Http\Controllers\cc;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Cc_complaint;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;


class SortController extends Controller
{
    
		

public function  sort(Request $request)

{
	//$complaint_id = $request->input('hid_complaint_id');
	$order = $request->input('order');
					

							if($order==0){

									$all=  Cc_complaint::all();
								$faculty = Cc_complaint::where('user_type','faculty')->get();	
								$staff = Cc_complaint::where('user_type','staff')->get();
								$student = Cc_complaint::where('user_type','student')->get();


							/*$all = DB::table('cc_complaint')->get();
							$faculty = DB::table('cc_complaint')->where('user_type','=','faculty')->get();
							$staff = DB::table('cc_complaint')->where('user_type','=','staff')->get();
							$student = DB::table('cc_complaint')->where('user_type','=','student')->get();*/

									return view('cc/layout/admin_header',compact(['all','faculty','staff','student']));
												//return Redirect::to('/');

								}
							if($order==1){
								$all=  Cc_complaint::orderBy('created_at', 'asc')->get();
								$faculty = Cc_complaint::where('user_type','faculty')->orderBy('created_at', 'asc')->get();	
								$staff = Cc_complaint::where('user_type','staff')->orderBy('created_at', 'asc')->get();
								$student = Cc_complaint::where('user_type','student')->orderBy('created_at', 'asc')->get();

							/*$all = DB::table('cc_complaint')->orderBy('created_at','ASC')->get();
							$faculty = DB::table('cc_complaint')->where('user_type','=','faculty')->orderBy('created_at','ASC')->get();
							$staff = DB::table('cc_complaint')->where('user_type','=','staff')->orderBy('created_at','ASC')->get();
							$student = DB::table('cc_complaint')->where('user_type','=','student')->orderBy('created_at','ASC')->get();*/

									return view('cc/layout/admin_header',compact(['all','faculty','staff','student']));
												//return Redirect::to('/');


							}
							if($order==2){
								$all=  Cc_complaint::orderBy('created_at', 'desc')->get();
								$faculty = Cc_complaint::where('user_type','faculty')->orderBy('created_at', 'desc')->get();	
								$staff = Cc_complaint::where('user_type','staff')->orderBy('created_at', 'desc')->get();
								$student = Cc_complaint::where('user_type','student')->orderBy('created_at','desc')->get();

							/*$all = DB::table('cc_complaint')->orderBy('created_at','DESC')->get();
							$faculty = DB::table('cc_complaint')->where('user_type','=','faculty')->orderBy('created_at','DESC')->get();
							$staff = DB::table('cc_complaint')->where('user_type','=','staff')->orderBy('created_at','DESC')->get();
							$student = DB::table('cc_complaint')->where('user_type','=','student')->orderBy('created_at','DESC')->get();*/

								return view('cc/layout/admin_header',compact(['all','faculty','staff','student']));
														//return Redirect::to('/');

							}
}


}
