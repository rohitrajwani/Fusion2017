<?php

namespace App\Http\Controllers\Bus_management;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class BookController extends Controller
{
    public function booknow()
    {
    	$schedule = DB::table('Bus_Schedule')->get();
        $fare = DB::table('Bus')->get();
        return view('bus_management.booknow',['schedule'=>$schedule,'fare'=>$fare]);
    }

    public function logout(){
		Auth::logout();

		return Redirect::to('/');
	}
}
 