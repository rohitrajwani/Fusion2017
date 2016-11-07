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

            return Redirect::to('/main')->with('alert','Login Successful for '.Auth::user());
		
			/*Route::get('/', function () {
				return view('index');
					});
					*/

		
		
        } else {        
            return Redirect::to('/')->with('alert','Login Error!! Please check your Credentials');

        }
	}
	
	public function logout(){
		Auth::logout();

		return Redirect::to('/');
	}
	
	public function signup(Request $data){

		$user = new \App\User;

		$user->username = $data->username;
		$user->user_type = $data->type;
		$user->password = \Hash::make($data->password);

		$user->save();

		return back()->with('alert','Signup Successful, login to continue!!');

	}

	

	
	
}