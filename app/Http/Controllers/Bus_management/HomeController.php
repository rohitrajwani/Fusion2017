<?php

namespace App\Http\Controllers\Bus_management;

use Illuminate\Http\Request;

use App\Http\Requests;


class HomeController extends Controller
{
    public function home()
    {
    	return view('bus_management.home');
    }

    public function logout(){
		Auth::logout();

		return Redirect::to('/');
	}
}

 