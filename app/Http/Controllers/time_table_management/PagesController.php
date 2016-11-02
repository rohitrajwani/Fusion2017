<?php

namespace App\Http\Controllers\time_table_management;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Classroom_Slots;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;

class PagesController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function scheduleanextraclass(){
        if(Auth::user()->user_type != 'faculty' && !Auth::user()->hasRole('admin')){
            return Redirect::to('time_table_management');
        }

    	$stat = 0;
    		//return view('scheduleanextraclass',compact('status'));
    	return view('time_table_management/scheduleanextraclass', compact('stat'));
    }

    public function index(){
        if(Auth::user()->hasRole('admin')){
            return view('/time_table_management/adminindex');
        }
        else if(Auth::user()->user_type == 'faculty'){
            return view('/time_table_management/facultyindex');
        }
        else{
            return Redirect::to('/time_table_management/view_tt');
        }
    }
 
    public function viewmyrequests(){
        if(Auth::user()->user_type != 'faculty'){
            return Redirect::to('time_table_management');
        }

        $user_id = Auth::user()->username;
    	$requests = DB::table('Room_Booking_Request')->where('requester_id',$user_id)->get();
    	foreach($requests as $request){
	    	$created_at = $request->created_at;
    		$for_date = $request->date;
    		$start_time = $request->start_time;
    		$end_time = $request->end_time;
    		$purpose = $request->purpose;
    		$stat = $request->status;
    		$room_id = $request->room_id;

    	if($request->status == '0'){
      		$request->status = "Not Approved";
      		$request->room_id = 'N/A';
    	}
    	else if($request->status == '1')
      		$request->status = "Approved";

    	else if($request->status == '2'){
      		$request->status = "Rejected";
      		$request->room_id = 'N/A';
    	}
    	}
    	return view('time_table_management/viewmyrequests',compact('requests'));
    }
    
    public function viewallrequests(){
        if(!Auth::user()->hasRole('admin')){
            return Redirect::to('time_table_management');
        }

    	$requests = DB::table('Room_Booking_Request')->where('status', 0)->get();

    	return view('time_table_management/viewallrequests',compact('requests'));
    }

    public function creatett(){
        if(!Auth::user()->hasRole('admin')){
            return Redirect::to('time_table_management');
        }

        return view('time_table_management/creatett');
    }

    public function create_tt(){
        if(!Auth::user()->hasRole('admin')){
            return Redirect::to('time_table_management');
        }

        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
        $from_times = array('09:00:00', '10:00:00', '11:00:00', '12:00:00', ' ', '02:30:00', '03:30:00', '04:30:00');
        $to_times = array('09:55:00', '10:55:00', '11:55:00', '12:55:00', ' ', '03:25:00', '04:25:00', '05:25:00');

        $room_ids = array();
        $course_ids = array();

        for($i=0; $i<15; $i++){
            $room_ids[] = $_GET['room'.$i];
        }

        for($i=0; $i<15; $i++){
            for($j=2; $j<10; $j++){
                if($j!=6)
                    $course_ids[$i][$j] = $_GET['course'.$i.$j];
            }
        }

        for($i=0; $i<15; $i++){
            for($j=2; $j<10; $j++){
                $db = new Classroom_Slots;
                if($j!=6){
                    $to_time = $to_times[$j-2];
                    $f = 0;
                    if(!empty($course_ids[$i][$j])){
                        if($j<9){
                            if(($j+1)!=6 && strcmp($course_ids[$i][$j], $course_ids[$i][$j+1])==0){
                                if(($j+2)!=6 && ($j+2!=10) && strcmp($course_ids[$i][$j+1], $course_ids[$i][$j+2])==0){
                                    $to_time = $to_times[$j];
                                    $f = 2;
                                }
                                else{
                                    $to_time = $to_times[$j-1];
                                    $f = 1;
                                }
                            }
                            else{
                                $to_time = $to_times[$j-2];
                            }
                        }

                        $db->room_id = $room_ids[$i];
                        $db->course_id = $course_ids[$i][$j];
                        $db->day = $days[$i/3];
                        $db->from_time = $from_times[$j-2];
                        $db->to_time = $to_time;

                        $db->save();

                        $j+=$f;
                    }
                }                
            }
        }
        
        return redirect()->back()->with('alert', 'Successfully Created!');
    }

    public function modify_tt(){
	if(!(empty($_GET['cid']) || empty($_GET['rid']) || empty($_GET['ftime']) || empty($_GET['etime']))){
		$cid = $_GET['cid'];
		$rid = $_GET['rid'];
		$ftime = $_GET['ftime'];
		$etime = $_GET['etime'];

		if($cid && $rid && $ftime && $etime){
			DB::table('Classroom_Slots')->where('room_id', $rid)->where('course_id', $cid)->where('from_time', $ftime)->where('to_time', $etime)->delete();
		}
	}
	
	return view('time_table_management/modify_tt');
    }

    public function view_tt(){
	   return view ('time_table_management/view_tt');
    }
}
