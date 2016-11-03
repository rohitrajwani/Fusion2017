<?php

namespace App\Http\Controllers\fac;

use Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use DB;
use Auth;

class faculty extends Controller
{
    //
     public function store(Request $request) {
        $file_name = $request::file('doc_file')->getClientOriginalName();
    	$destination_path = 'upload_img';

        faculty::create([
    		'photo_url' => $request::input('photo_url'),
    		/*'course_id' => $request::input('dummy')*/
    	]);

        $request::file('doc_file')->move($destination_path, $file_name);

    	return redirect()->back()->with('status', 'Successful');

    
	}

	public function update(Request $request){
		$name = $request::input('name');
		$sex = $request::input('sex');
		$add = $request::input('address');
		$email = $request::input('email');
		$dep = $request::input('department');
		$mob = $request::input('mobile_no');
		$DOB = $request::input('DOB');
		$bgroup = $request::input('blood_group');
		$aemail = $request::input('alternate_email');
		$desig = $request::input('designation');
		$abt_me = $request::input('about_me');
		$sdate = $request::input('start_date');
		$edate = $request::input('end_date');

		DB::table('Faculty')->where('faculty_id', Auth::user()->username)->update(["name"=>$name, "sex"=>$sex, "address"=>$add, "email"=>$email,"department"=>$dep,"mobile_no"=>$mob,"DOB"=>$DOB,"blood_group"=>$bgroup,"alternate_email"=>$aemail,"designation"=>$desig,"about_me"=>$abt_me,"start_date"=>$sdate,"end_date"=>$edate]);
		return redirect('/fac');
	}
}
