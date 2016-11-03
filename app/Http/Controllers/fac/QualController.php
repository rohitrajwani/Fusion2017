<?php

namespace App\Http\Controllers\fac;
use App\Faculty;
use App\qual;
use App\Experience;
use App\achievements;
use App\research_proj;
use App\research_jour;
use App\consult;
use App\patents;
use App\publications;
use App\thesis; 
use App\lectures;
use App\visits; #1

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Auth;

class QualController extends Controller
{
    public function index()
    {
    	//$qualifications = \DB::table('qual')->get();
    	$Faculty = Faculty::get()->where('faculty_id', '=', Auth::user()->username);
		$qualifications = qual::get()->where('faculty_id', '=', Auth::user()->username);
        $experiences= Experience::get()->where('faculty_id', '=', Auth::user()->username);
		$achievements= achievements::get()->where('faculty_id', '=', Auth::user()->username);
		$research_proj= research_proj::get()->where('faculty_id', '=', Auth::user()->username);
		$research_jour= research_jour::get()->where('faculty_id', '=', Auth::user()->username);
		$cons_projs= consult::get()->where('faculty_id', '=', Auth::user()->username);
		$patents= patents::get()->where('faculty_id', '=', Auth::user()->username);
		$publications= publications::get()->where('faculty_id', '=', Auth::user()->username); #2
        $thesis= thesis::get()->where('faculty_id', '=', Auth::user()->username);
		$lectures= lectures::get()->where('faculty_id', '=', Auth::user()->username);
		$visits= visits::get()->where('faculty_id', '=', Auth::user()->username);
    	return view('facul.index', compact('Faculty','qualifications','experiences','achievements','research_proj','research_jour','cons_projs','patents','publications','thesis','lectures','visits')); #3


    }
	
    public function store(Request $request)
    {
    	$qu = new qual;
		$qu->faculty_id=Auth::user()->username;
        $qu->course= $request->course;
        $qu->institute=$request->institute;
        $qu->year= $request->year;
        $qu->cgpa= $request->cgpa;
        $qu->save();
        return redirect('/fac');
    }
	
	
	public function destroy($id)
    {
    	$x = qual::find($id);    
		$x->delete();
        return redirect('/fac');
    }
	
	public function update($id, Request $request)
    {
		//DB::table('Faculty')
		
		
        return redirect('/fac');

    }
}



