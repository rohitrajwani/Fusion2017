<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
class HomePageController extends Controller
{
    
	public function studentHome(Request $request)
	{
		$user=Auth::user();
		$username = $user->username;
		$request->session()->put('student_id',$username);
		$flag = DB::table('student')->where('student_id',$username)->count();
		if($flag==0)
		{
			return view('SRS.student_register',['username'=>$username]);
		}
		else
			return view('SRS.student_home',['username'=>$username]);
	
}
}
