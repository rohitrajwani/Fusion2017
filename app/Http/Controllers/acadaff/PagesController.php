<?php

namespace App\Http\Controllers\acadaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function about(){
        return view('acadaff/pages.about');
    }
}
