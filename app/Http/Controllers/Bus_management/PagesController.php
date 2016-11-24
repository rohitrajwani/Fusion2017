<?php 

namespace App\Http\Controllers\Bus_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\bus_feedback;    
use DB;

class PagesController extends Controller
{
    public function schedule()
    {
        $schedule = DB::table('Bus_Schedule')->get();
        $fare = DB::table('Bus')->get();
        $not = DB::table('Notification')->get();
        return view('bus_management.schedule',['schedule'=>$schedule,'fare'=>$fare,'not'=>$not]);
    }

    public function feed_store(Request $request)
    {
    	$a = new bus_feedback;
		/*$a->feedback_id= 1111;*/
        $a->description= $request->description;
        
        $a->save();

        return back();

    }
	
}
