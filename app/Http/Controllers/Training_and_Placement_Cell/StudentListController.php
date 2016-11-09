<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use Illuminate\Http\Request;

use DB;
use Auth;
use Request as Request1;

use App\Http\Requests;

class StudentListController extends Controller
{
    //

    public function show() {
        if(Auth::user()->user_type != 'others'){
            return Redirect::to('training_and_placement_cell');
        }
    	$students = DB::table('All_Student')->get();
    	return view ('training_and_placement_cell.list.studentList', compact('students'));
    }

    public function store(Request1 $request) {
        if(Auth::user()->user_type != 'others'){
            return Redirect::to('training_and_placement_cell');
        }
    	if(!(($request::input('batch') == 'Year') && ($request::input('branch') == 'Branch')) ) {
	    	$students = DB::table('All_Student')->where([['batch', $request::input('batch')], ['branch', $request::input('branch')]])->get();
	    	return view ('training_and_placement_cell.list.studentList', compact('students'));
    	}
    	elseif(($request::input('branch') == 'Branch') && ($request::input('batch') != 'Year')) {
	    	$students = DB::table('All_Student')->where(['batch', $request::input('batch')])->get();
	    	return view ('training_and_placement_cell.list.studentList', compact('students'));
	    
    	}
    	elseif(($request::input('batch') == 'Year') && !($request::input('branch') == 'Branch')) {
	    	$students = DB::table('All_Student')->where([['branch', $request::input('branch')]])->get();
	    	return view ('training_and_placement_cell.list.studentList', compact('students'));
    	}

        // return redirect->back();
    }
}
