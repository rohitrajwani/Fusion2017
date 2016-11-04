<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class PDFController extends Controller
{
    //
    public function index() {
    	if(Auth::user()->user_type != 'others' || Auth::user()->user_type != 'student'){
    		return view('training_and_placement_cell.index');
    	}
    }
}
