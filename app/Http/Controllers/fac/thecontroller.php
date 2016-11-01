<?php

namespace App\Http\Controllers\fac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\thesis;
use Auth;

class thecontroller extends Controller
{
    //
    public function t_store(Request $request)
    {
    	$a = new thesis ;
		$a->faculty_id= Auth::user()->username;
        $a->t_title= $request->t_title;
        $a->stu1_name=$request->stu1_name;
        $a->t_supervisors=$request->t_supervisors;
        $a->t_year= $request->t_year;
        $a->save();
        return redirect('/fac');
    }
	
	public function destroy($id)
    {
    	$x = thesis::find($id);    
		$x->delete();
        return redirect('/fac');
    }
}
