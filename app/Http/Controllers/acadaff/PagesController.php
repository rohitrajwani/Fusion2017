<?php

namespace App\Http\Controllers\acadaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function home(){
        $people=['sing','is','king'];
        return view('welcome',compact('people'));
    }
    
    public function about(){
        return view('pages.about');
    }
}
