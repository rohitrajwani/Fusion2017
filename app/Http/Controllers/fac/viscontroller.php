<?php

namespace App\Http\Controllers\fac;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\visits;
use App\Http\Controllers\Controller;

use Auth;

class viscontroller extends Controller
{
 
	public function v_store(Request $request)
    {
    	$a = new visits;
		$a->faculty_id= Auth::user()->username;
        $a->fv_country= $request->fv_country;
        $a->fv_purpose=$request->fv_purpose;
        $a->fv_place= $request->fv_place;
		 $a->fv_date= $request->fv_date;
        $a->save();
        return redirect('/fac');
    }
	
	public function destroy($id)
    {
    	$x = foreign_visits::find($id);    
		$x->delete();
        return redirect('/fac');
    }
}
