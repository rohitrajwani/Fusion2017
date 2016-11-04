<?php

namespace App\Http\Controllers\fac;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Experience;

use Auth;
class expcontroller extends Controller
{
   
    public function addexperience(Request $request)
    {
		
    	$exp = new Experience;
		$exp->faculty_id= Auth::user()->username;
        $exp->details= $request->details;
        $exp->save();
        return redirect('/fac');
    }
	
	
	public function destroy($id)
    {
    	$x = Experience::find($id);    
		$x->delete();
        return redirect('/fac');
    }
}
