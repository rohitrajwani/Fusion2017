<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class bus_management extends Controller
{
    public function index(){
    	if(Auth::user()->user_type == 'faculty'){
			$faculty = DB::table('faculty')->where('name','=',Auth::user()->username)->first();
			return view('pages.home',['faculty'=>$faculty]);
		}
		else if(Auth::user()->user_type == 'student'){
			$student = DB::table('student')->where('name','=',Auth::user()->username)->first();
			return view('pages.home',['student'=>$student]);
		}
		else if(Auth::user()->user_type == 'administrator'){
				$feed = DB::table('Bus_Feedback')->get();
    		return view('pages.admin',['feed'=>$feed]);

    	}
    }
}
