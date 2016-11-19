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
use Request;
use App\Room_booking_request;

class PagesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function scheduleanextraclass(){
        if(Auth::user()->user_type != 'faculty' && !Auth::user()->hasRole('admin')){
            return Redirect::to('time_table_management');
        }

    	$stat = 0;

	$fac_courses = '';
	if(Auth::user()->user_type=='faculty'){
		$fac_courses = DB::table('faculty_takes_course')->get()->where('faculty_id', Auth::user()->username);
	}

    	return view('time_table_management/scheduleanextraclass', compact('stat', 'fac_courses'));
    }

	public function schedule(){
		if(Auth::user()->user_type!= 'faculty' && !Auth::user()->hasRole('admin')){
        	    return Redirect::to('time_table_management');
 	       	}

		$course = $_GET['CourseCode'];
		$date = $_GET['bookingdate'];
		$stime = $_GET['StartTime'];
		$etime = $_GET['EndTime'];
		$ts = strtotime($date);
		$day = date('l', $ts);

		$sd = DB::table('course')->where('course_id', $course)->get()->first();

		$sd_courses='';
		
		$sd_courses = DB::table('course')->get()->where('sem', $sd->sem)->where('programme', $sd->programme);

		$clash = 0;
		foreach($sd_courses as $sdc){
			$cls = DB::table('classroom_slots')->get()->where('course_id', $sdc->course_id)->where('day', $day);
			
			foreach($cls as $cl){
				$ftime = $cl->from_time;
			    	$to_time = $cl->to_time;

				    if($ftime >= $stime && $ftime < $etime){
					$clash = -1;
				    }

				    if($to_time > $stime && $to_time <= $etime){
					$clash = -1;
				    }

				    if($ftime <= $stime && $to_time >= $etime){
					$clash = -1;
				    }

				    if($ftime >= $stime && $to_time <= $etime){
					$clash = -1;
				    }
			}

			if($clash!=-1){
				$rqs = DB::table('room_booking_request')->get()->where('purpose', $sdc->course_id.'Q')->where('purpose', $sdc->course_id.'E')->where('status', '1')->where('date', $date);
				    
				foreach($rqs as $cl){
					$ftime = $cl->from_time;
                                	$to_time = $cl->to_time;

				    if($ftime >= $stime && $ftime < $etime){
                                        $clash = -1;
                                    }

                                    if($to_time > $stime && $to_time <= $etime){
                                        $clash = -1;
                                    }

                                    if($ftime <= $stime && $to_time >= $etime){
                                        $clash = -1;
                                    }

                                    if($ftime >= $stime && $to_time <= $etime){
                                        $clash = -1;
                                    }
				}
			}
		}

		if($clash == -1){
			return back()->with('alert', 'This slot cannot be accepted. Please choose another one.');
		}

		$t = '';

		if($_GET['req_type']=='Q')
			$t = 'Q';

		else if($_GET['req_type']=='EC')
			$t = 'E';

		$schedule = new Room_booking_request;

		$username = Auth::user()->username;
		$schedule->room_id=' ';

		$schedule->requester_id=$username;
		$schedule->requester_type="faculty";
		$schedule->status=0;
		$schedule->purpose=$_GET['CourseCode'].$t;
		$schedule->expected_no_of_students=$_GET['Strength'];
		$schedule->date=$_GET['bookingdate'];
		$schedule->start_time=$_GET['StartTime'];
		$schedule->end_time=$_GET['EndTime'];

		$schedule->save();

		return back()->with('alert', 'Successfully Created!');		

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

    	$app = '';
    	$rej = '';
    	$status = '-1';

    	if(!empty($_GET['app']))
    		$app = $_GET['app'];

    	if(!empty($_GET['rej']))
    		$rej = $_GET['rej'];

    	if($app!='' && $rej=='')
    		$status = '1';

    	if($app=='' && $rej!='')
    		$status = '2';

    	$requests = '';
    	if($status=='-1')
    	    	$requests = DB::table('room_booking_request')->where('requester_id',$user_id)->get();

    	else{
    		$requests = DB::table('room_booking_request')->where('requester_id', $user_id)->where('status', $status)->get();
    	}

    	foreach($requests as $request){
    		$stat = $request->status;
    		$room_id = $request->room_id;

    		if($request->status == '0'){
    			$request->status = "In Progress";
    			$request->room_id = 'N/A';
    		}
    		else if($request->status == '1')
    			$request->status = "Approved";

    		else if($request->status == '2'){
    			$request->status = "Rejected";
    			$request->room_id = 'N/A';
    		}
    	}
        
	    $fac_mode = 1;
        return view('time_table_management/viewallrequests',compact('requests', 'fac_mode'));
    }
    
    public function viewallrequests(){
        if(!Auth::user()->hasRole('admin')){
            return Redirect::to('time_table_management');
        }

	    DB::table('room_booking_request')->where('date','<', date('Y-m-d'))->delete();

    	$requests = DB::table('room_booking_request')->where('status', 0)->get();

        $fac_mode = 0;
    	return view('time_table_management/viewallrequests',compact('requests', 'fac_mode'));
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
			DB::table('classroom_slots')->where('room_id', $rid)->where('course_id', $cid)->where('from_time', $ftime)->where('to_time', $etime)->delete();
		}
	}
	
	return view('time_table_management/modify_tt');
    }

    public function view_tt(){
	   $info = array();
	   $user = Auth::user()->username;

	   if(Auth::user()->user_type=='student'){
		$stu = DB::table('student')->where('student_id', $user)->get()->first();

		$info['sem'] = $stu->semester;
		$info['dep'] = $stu->branch;
		$info['prog'] = $stu->programme;
		
	   }

	   if(Auth::user()->user_type=='faculty'){
		$info['fcode'] = $user;
           }

	   return view ('time_table_management/view_tt', compact('info'));
    }

    public function extra_classes(){
        $user_id = Auth::user()->username;
        $courses = DB::table('register_course')->select('course_id')->where('student_id',$user_id)->get();
        $all_extra_classes = DB::table('room_booking_request')->where('status', 1)->where('purpose', 'LIKE', '%E')->get();
        $extra_classes = array();
        foreach ($courses as $course) {
            foreach ($all_extra_classes as $extra) {
                $c1 = $course->course_id;
                $e1 = $extra->purpose;
                if ($c1 == substr($e1,0,count($e1)-2)) {
                    $extra_classes[] = $extra;
                }
            }
        }

    return view('time_table_management/extra_classes', compact('extra_classes'));
    }

    public function quizzes(){
	$user_id = Auth::user()->username;
        $courses = DB::table('register_course')->select('course_id')->where('student_id',$user_id)->get();
        $all_extra_classes = DB::table('room_booking_request')->where('status', 1)->where('purpose', 'LIKE', '%Q')->get();
        $extra_classes = array();
        foreach ($courses as $course) {
            foreach ($all_extra_classes as $extra) {
                $c1 = $course->course_id;
                $e1 = $extra->purpose;
                if ($c1 == substr($e1,0,count($e1)-2)) {
                    $extra_classes[] = $extra;
                }
            }
        }

    return view('time_table_management/extra_classes', compact('extra_classes'));

    }
}

