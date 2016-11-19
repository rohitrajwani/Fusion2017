<?php

namespace App\Http\Controllers\fac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\achievements;

use Auth;
class achcontroller extends Controller
{
 
	public function ach_store(Request $request)
    {
    	$a = new achievements;
		$a->faculty_id= Auth::user()->username;
        $a->achievement= $request->achievement;
        $a->a_details=$request->a_details;
        $a->dated= $request->dated;
        $a->save();
        return redirect('/fac');
    }
	
	public function destroy($id)
    {
    	$x = achievements::find($id);    
		$x->delete();
        return redirect('/fac');
    }
}
