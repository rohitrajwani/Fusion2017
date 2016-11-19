<?php

namespace App\Http\Controllers\fac;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\lectures;
use App\Http\Requests;

use Auth;
class leccontroller extends Controller
{
    //
public function l_store(Request $request)
    {
    	$a = new lectures ;
		$a->faculty_id= Auth::user()->username;
        $a->l_title= $request->l_title;
        $a->l_place=$request->l_place;
        //$a->t_supervisors=$request->t_supervisors;
        $a->l_year= $request->l_year;
        $a->save();
        return redirect('/fac');
    }
	
	public function destroy($id)
    {
    	$x = lectures::find($id);    
		$x->delete();
        return redirect('/fac');
    }
	}
