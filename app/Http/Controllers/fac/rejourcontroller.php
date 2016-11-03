<?php

namespace App\Http\Controllers\fac;

use App\Http\Controllers\Controller;
use Request;

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
         $file_name = $request::file('doc_file')->getClientOriginalName();
        $destination_path = 'documents';

        research_jour::create([
            'rjpath' => $request::input('document'),
            'author' => $request::input('author'),
            'faculty_id' =>Auth::user()->username,
            'title' => $request::input('title'),
            'journal_name' => $request::input('journal_name'),
            'j_publisher' => $request::input('j_publisher'),
             'pub_date' => $request::input('pub_date')
     
       
        ]);

        $request::file('doc_file')->move($destination_path, $file_name);

        return redirect()->back()->with('status', 'Successful');
		
		
    }
	
	public function destroy($id)
    {
    	$x = research_jour::find($id);    
		$x->delete();
        return redirect('/fac');
    }
}
