<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Routing\Controller;

use Zizaco\Entrust\Traits\EntrustRoleTrait;

use Auth;

class dashboardController extends Controller
{
    
	public function login_check(){

		$userdata = array(
                'username' => Input::get('login_username'),
                'password' => Input::get('login_password')
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {

            $user = \App\User::where('username','=',$userdata['username'])->get()->first();
            Auth::login($user);
            if(Auth::user()->user_type=="student"){

            return view('SPACS.user.user_home');
            }
            
            else{

            return Redirect::to('/dashboard')->with('alert','Login Successful for '.Auth::user());
            }	



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

		if(Auth::user()->hasRole('spacs_convener')){
			return view('SPACS.spacs.spacs_home');
		}

		if(Auth::user()->hasRole('spacscom_dir_gm')){
			return view('SPACS.spacscom_dir_gm.spacscom_dir_gm_home');
		}
		if(Auth::user()->hasRole('spacscom_dir_sc')){
			return view('SPACS.spacscom_dir_silver_cultural.spacscom_dir_silver_cultural_home');
		}
		if(Auth::user()->hasRole('spacscom_dir_sg')){
			return view('SPACS.spacscom_dir_silver_games.spacs_dir_silver_games_home');
		}
		if(Auth::user()->hasRole('spacscom_dm_gm')){
			return view('SPACS.spacscom_dm_prof_gm.spacscom_dm_prof_gm_home');
		}
		if(Auth::user()->hasRole('spacscom_iiitdmj_prof')){
			return view('SPACS.spacscom_iiitdmj_prof.spacscom_iiitdmj_prof_home');
		}
		
		if(Auth::user()->hasRole('awards_staff')){
			return view('SPACS.staff.staff_home');
		}
		

		
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