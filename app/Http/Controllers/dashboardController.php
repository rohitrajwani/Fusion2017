<?php

namespace App\Http\Controllers;

use App\Http\Requests;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Routing\Controller;

use Zizaco\Entrust\Traits\EntrustRoleTrait;

use Auth;
use DB;
class dashboardController extends Controller
{
    
	public function login_check(){

		$userdata = array(
                'username' => Input::get('login_username'),
                'password' => Input::get('login_password')
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {

            $user = \App\User::where('username','=',$userdata['username'])->first();
			
            Auth::login(Auth::user());
            if(Auth::user()->user_type=='student')
			{  
		       
		       $c = \DB::table('mess_registration')->where('student_id',Auth::user()->username)->pluck('mess_id');
			   
			  // return $c;
			   if(sizeof($c)!=0){
		       if($c[0] =="2"|| $c[0] == "1")
				   
			   return Redirect::to('mess_management/Student')->with('alert','Login Successful for '.Auth::user());}
			   else if(sizeof($c)==0)
				 return Redirect::to('mess_management/Register')->with('alert','Login Successful for '.Auth::user());
			}
		    else if(Auth::user()->user_type=='admin')
				//return Redirect::to('/dashboard')->with('alert','Login Successful for '.Auth::user());
				return Redirect::to('mess_management/Admin')->with('alert','Login Successful for '.Auth::user());
				else if(Auth::user()->user_type=='committee')
				//return Redirect::to('/dashboard')->with('alert','Login Successful for '.Auth::user());
				return Redirect::to('mess_management/Committee')->with('alert','Login Successful for '.Auth::user());
			else
				return Redirect::to('mess_management/Faculty')->with('alert','Login Successful for '.Auth::user());

        } else {        
            return Redirect::to('/')->with('alert','Login Error!! Please check your Credentials');

        }
	}

	public function signup(Request $data){

		$user = new \App\User;

		$user->username = $data->username;
		$user->user_type = $data->type;
		$user->password = \Hash::make($data->password);

		$user->save();

		return back()->with('alert','Signup Successful, login to continue!!');

	}

	public function dashboard(){
		/*if(Auth::user()->hasRole('mess_admin')){
			return view('mess_management/Admin');
		}
		if(Auth::user()->hasRole('mess_Committee')){
			return view('mess_management/Committee');*/
			return view('/dashboard');
		}
	

	public function logout(){
		Auth::logout();
        
		return Redirect::to('/');
	}


	public function attachRole($role){

		$user = \App\users::where('username',Auth::user()->username)->first();

        $admin = \App\Role::where('name','=',$role)->get()->first();

		$user->attachRole($admin);

        return back()->with('role-attached','Role Successfully attached to '.Auth::user()->username);
	}

}