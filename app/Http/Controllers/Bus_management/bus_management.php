<?php

namespace App\Http\Controllers\Bus_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class bus_management extends Controller
{
    public function index(){
    	if(Auth::user()->user_type == 'faculty'){
			$faculty = DB::table('faculty')->where('name','=',Auth::user()->username)->first();
			return view('bus_management.home',['faculty'=>$faculty]);
		}
		else if(Auth::user()->user_type == 'student'){
			$student = DB::table('student')->where('name','=',Auth::user()->username)->first();
			return view('bus_management.home',['student'=>$student]);
		}
		else if(Auth::user()->user_type == 'administrator'){
				$feed = DB::table('Bus_Feedback')->get();
    		return view('bus_management.admin',['feed'=>$feed]);

    	}
    }
}
