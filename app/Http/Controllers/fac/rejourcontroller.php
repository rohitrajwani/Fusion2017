<?php

namespace App\Http\Controllers\fac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\research_jour;
use Input;
use Validator;
use Redirect;
use Session;

use Auth;
class rejourcontroller extends Controller
{
 
	public function rj_store(Request $request)
    {
    	$rj = new research_jour;
		$rj->faculty_id= Auth::user()->username;
        $rj->author= $request->author;
		$rj->title= $request->title;
		$rj->journal_name= $request->journal_name;
        $rj->j_publisher=$request->j_publisher;
        $rj->pub_date= $request->pub_date;
		
        $rj->save();
        return redirect('/fac');
		
		
    }
	
	public function destroy($id)
    {
    	$x = research_jour::find($id);    
		$x->delete();
        return redirect('/fac');
    }
}
