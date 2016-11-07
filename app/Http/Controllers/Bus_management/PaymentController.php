<?php

namespace App\Http\Controllers\Bus_management;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use DB;
class PaymentController extends Controller
{
    public function payment(Request $request)
    {

    	DB::table('Bus_Booking')->insert(['bus_id'=>$request['group1'],'user_id'=>Auth::user()->username,'user_type'=>Auth::user()->user_type]);
    	$capacity = DB::table('Bus')->where('bus_id','=',$request['group1'])->select('capacity')->first()->capacity;
    	DB::table('Bus')->where('bus_id','=',$request['group1'])->update(['capacity'=>$capacity-1]);
    	$receipt = DB::table('Bus_Booking')->orderBy('booking_id','desc')->first();

    	return view('pages.payment',['receipt'=>$receipt]);
    }

    public function logout(){
		Auth::logout();

		return Redirect::to('/');
	}
}
  