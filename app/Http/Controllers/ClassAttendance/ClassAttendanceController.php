<?php

namespace App\Http\Controllers\ClassAttendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;
use Redirect;

class ClassAttendanceController extends Controller{
	public function index(){
		if(Auth::user()->user_type=='student')
			return Redirect::to('/CAMS/student')->with('alert','Login Successful for '.Auth::user()->username);
		if(Auth::user()->user_type=='faculty')
			return Redirect::to('/CAMS/faculty')->with('alert','Login Successful for '.Auth::user()->username); 
		else
		{
			return Redirect::to('/dashboard')->with('alert','Page not found for user type: '.Auth::user()->user_type);
		}
	}
}