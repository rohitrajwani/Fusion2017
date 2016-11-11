<?php

namespace App\Http\Controllers;
use \Illuminate\Http\Request;
use DB;
use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Routing\Controller;

use Zizaco\Entrust\Traits\EntrustRoleTrait;

use Auth;

class stock extends Controller{

	

	public function stockhome(){
		
		$un = Auth::user()->username;
    	 $ut = Auth::user()->user_type;
    	return view('home',['un'=>$un,'ut'=>$ut]);
    }
    public function newpage(){
    	$un = Auth::user()->username;
    	 $ut = Auth::user()->user_type;
    	 return view('new',['un'=>$un,'ut'=>$ut]);
    	
    }

	public function viewStock(){
$un = Auth::user()->username;
    	 $ut = Auth::user()->user_type;
    	 if ($ut != "student"){
			$stock = DB::table('inventory')->get();

		return view('view',['stock'=>$stock,'un'=>$un,'ut'=>$ut]);
	}
	else {
		return Redirect::to('/stockhome');
	}
	}

public function additem(Request $req){
$un = Auth::user()->username;
    	 $ut = Auth::user()->user_type;
    	 if ($ut != "others"){
			return Redirect::to('/stockhome');
    	 }
    	 else{
	$item_id = DB::table('inventory')->select('item_id')->get()->count();
	$query = DB::table('inventory')->insert(['item_id'=>$item_id+1,'item_name'=>$req['item_name'],'item_category'=>$req['item_cat'],'item_in_hand'=>$req['amount'],'item_description'=>$req['item_desc'],'supplier_id'=>$req['supplier'],'cost_price'=>$req['Cost'],'sale_price'=>$req['Cost'],'purchase_rate'=>$req['amount'],'items_consumed'=>$req['amount']]);
		return Redirect::to('/stockhome');
	}
	
	
}

public function existing(){
	$item = DB::table('inventory')->get();
$un = Auth::user()->username;
    	 $ut = Auth::user()->user_type;
	return view('existing',['item'=>$item,'error'=>'0','un'=>$un,'ut'=>$ut]);
}

public function addexist(Request $request){
$un = Auth::user()->username;
    	 $ut = Auth::user()->user_type;
	$quantity = DB::table('inventory')->select('item_in_hand')->where('item_id','=',$request['itemid'])->first()->item_in_hand;

	if ($request['group1'] == 'add'){
	$query = DB::table('inventory')->where('item_id','=',$request['itemid'])->update(['item_in_hand'=> $quantity + $request['quantity']]);
	}
	else {
		if ($request['quantity'] <= $quantity){
			$query = DB::table('inventory')->where('item_id','=',$request['itemid'])->update(['item_in_hand'=>$quantity - $request['quantity']]);
		}
		else {
			$item = DB::table('inventory')->get();
				return view('existing',['item'=>$item,'error'=>'1','un'=>$un,'ut'=>$ut]);
		}
	}
	return Redirect::to('/stockhome');
}


	public function reqhome(){
$un = Auth::user()->username;
    	 $ut = Auth::user()->user_type;
		$item = DB::table('inventory')->get();
		$prof = DB::table('faculty')->get();
		$inv = DB::table('inventory')->get();
		if($ut == "student"){
		return view('requests',['item'=>$item,'prof'=>$prof,'un'=>$un,'ut'=>$ut]);
		}
		else {
			return Redirect::to('/stockhome')->with('alert','You Cannot Request Items');
		}
	}

	public function addreq(Request $r){
		$un = Auth::user()->username;
    	 $ut = Auth::user()->user_type;
		$faculty = DB::table('faculty')->where('faculty_id','=',$r['req_to'])->first()->name;
		$reqid = DB::table('request')->select('req_id')->count();
		$query = DB::table('request')->insert(['req_id'=>$reqid+1,'user_id'=>$un,'req_to'=>$faculty,'item_id'=>$r['item_id'],'quantity'=>$r['item_amount'],'status'=>'Pending']);
		return Redirect::to('/stockhome');
	}

	public function chrhome(){
		$un = Auth::user()->username;
    	 $ut = Auth::user()->user_type;
		$req = DB::table('request')->get();
		$itemname = DB::table('inventory')->get();
		return view('/checkreq',['req'=>$req,'item'=>$itemname,'un'=>$un,'ut'=>$ut]);
	}

	public function status($req){
		$un = Auth::user()->username;
    	 $ut = Auth::user()->user_type;
		$pending = DB::table('request')->where('req_id','=',$req)->get()->first();
		$item_id = DB::table('request')->where('req_id','=',$req)->get()->first()->item_id;
		$itid = DB::table('inventory')->where('item_id','=',$item_id)->get()->first();
		return view('statcheck',['pending'=>$pending,'itid'=>$itid,'un'=>$un,'ut'=>$ut]);
	}

	public function statconf(Request $request){
		$un = Auth::user()->username;
    	 $ut = Auth::user()->user_type;
		DB::table('request')->where('req_id','=',$request['reqid'])->update(['status'=>$request['status']]);
		return Redirect::to('/stockhome');
	}

	

	 


}