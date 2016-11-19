<?php

namespace App\Http\Controllers\fac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\patents;
use Auth;
class patcontroller extends Controller
{
 
	public function p_store(Request $request)
    {
    	$p = new patents;
		$p->faculty_id= Auth::user()->username;
        $p->p_no= $request->p_no;
        $p->pt_title=$request->pt_title;
        $p->earnings= $request->earnings;
		$p->pt_status=$request->pt_status;
		$p->pt_year=$request->pt_year;
        $p->save();
        return redirect('/fac');
    }
	
	public function destroy($id)
    {
    	$x = patents::find($id);    
		$x->delete();
        return redirect('/fac');
    }
}
