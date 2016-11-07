<?php 

namespace App\Http\Controllers\Bus_management;

use Illuminate\Http\Request;
 
use App\Http\Requests;

use DB;

use App\feedback;    


class PagesController extends Controller
{
    public function schedule()
    {
        $schedule = DB::table('Bus_Schedule')->get();
        $fare = DB::table('Bus')->get();
        $not = DB::table('Notification')->get();
        return view('pages.schedule',['schedule'=>$schedule,'fare'=>$fare,'not'=>$not]);
    }

    public function feed_store(Request $request)
    {
    	$a = new feedback;
		/*$a->feedback_id= 1111;*/
        $a->description= $request->description;
        
        $a->save();

        return back();

    }
	
}
