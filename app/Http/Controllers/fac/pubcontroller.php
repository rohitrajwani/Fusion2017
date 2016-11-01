<?php

namespace App\Http\Controllers\fac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\publications;
//add model here
use Auth;
class pubcontroller extends Controller
{
	//change here
	public function pu_store(Request $request)
    {
    	$pu = new publications;
		$pu->faculty_id= Auth::user()->username;
        $pu->pub_title= $request->pub_title;
        $pu->pub_publisher=$request->pub_publisher;
		$pu->pub_copublisher=$request->pub_copublisher;
        $pu->pub_year= $request->pub_year;
        $pu->save();
        return redirect('/fac');
    }
	//
	public function destroy($id)
    {
    	$x = publications::find($id);  //and here   
		$x->delete();
        return redirect('/fac');
    }
}
