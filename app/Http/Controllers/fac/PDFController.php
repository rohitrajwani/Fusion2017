<?php

namespace App\Http\Controllers\fac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use PDF;
use App\Customer;
use App\qual;
use App\Experience;
use App\Faculty;
use App\achievements;
use App\research_proj;
use App\research_jour;
use App\thesis;
use App\publications;
use App\patents;
use App\lectures;
use App\visits;
use App\consult;

use Auth;
class PDFController extends Controller
{
    public function getPDF(){
    	$skills=qual::get()->where('faculty_id', '=', Auth::user()->username);
    	$customers=Faculty::get()->where('faculty_id', '=', Auth::user()->username);
    	$exps=Experience::get()->where('faculty_id', '=', Auth::user()->username);
		$ach=achievements::get()->where('faculty_id', '=', Auth::user()->username);
		$rpro=research_proj::get()->where('faculty_id', '=', Auth::user()->username);
		$rjor=research_jour::get()->where('faculty_id', '=', Auth::user()->username);
		$con=consult::get()->where('faculty_id', '=', Auth::user()->username);
		$pat=patents::get()->where('faculty_id', '=', Auth::user()->username);
		$pub=publications::get()->where('faculty_id', '=', Auth::user()->username);
		$thes=thesis::get()->where('faculty_id', '=', Auth::user()->username);
		$lec=lectures::get()->where('faculty_id', '=', Auth::user()->username);
		$vis=visits::get()->where('faculty_id', '=', Auth::user()->username);
		
		
    	#$pdf=PDF::loadView('pdf.emp',['customers'=>$customers],['skills'=>$skills]);
    	$pdf=PDF::loadView('pdf.emp',compact('customers','skills','exps','ach','rpro','rjor','con','pat','pub','thes','lec','vis'));
    	return $pdf->stream('emp.pdf');
    }
}
