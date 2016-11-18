<?php

namespace App\Http\Controllers\cc;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Cc_complaint;

use App\Http\Controllers\Controller;

use Auth;
class PagesController extends Controller
{

	//$id=525;s
	
    public function index(){
    
    		   	  //Temporary solution for Authentication
    		      //session(['user_category' => 'cc_admin']);
    				
    		      $value = Auth::user()->hasRole('cc_admin');
						if($value)	//session()->get
							{	
								$all=  Cc_complaint::all();
								$faculty = Cc_complaint::where('user_type','faculty')->get();	
								$staff = Cc_complaint::where('user_type','staff')->get();
								$student = Cc_complaint::where('user_type','student')->get();
								return view('cc/layout/admin_header',compact('all','faculty','staff','student'));
							/*$all = DB::table('cc_complaint')->get();
							$faculty = DB::table('cc_complaint')->where('user_type','=','faculty')->get();
							$staff = DB::table('cc_complaint')->where('user_type','=','staff')->get();
							$student = DB::table('cc_complaint')->where('user_type','=','student')->get();*/
								//dd($student);
						
							//return view('cc\layout\admin_header',['all'=>$all,'faculty'=>$faculty,'staff'=>$staff,'student'=>$student]);

							//return view('cc.layout.admin_header');
							}
						else {
						    	session(['user_id' => Auth::user()->username]);
						    	$type = \DB::table('login')->where('username',Auth::user()->username)->first()->user_type;
						    	session(['user_type' => $type]);
						    	$user_id=session('user_id',0);
								$users =  Cc_complaint::where('user_id',session('user_id'))->get();
							//$users = DB::table('cc_complaint')->where('user_id','=',525)->get();

							//$users = DB::select('select * from cc_complaint where user_id=');

							//return view('cc.layout.header',compact('users'));
								//dd($users);
								return view('cc/layout/header',compact('users'));
    					}
    					
	}


}


