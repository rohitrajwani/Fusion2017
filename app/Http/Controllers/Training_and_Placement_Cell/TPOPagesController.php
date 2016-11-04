<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

class TPOPagesController extends Controller
{
    //
    public function tpo() {
    	return view('training_and_placement_cell.tpoWelcome');
    }
}
