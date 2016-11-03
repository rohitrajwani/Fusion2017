<?php

namespace App\Http\Controllers\event_organizing_Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\event_organizing_Models\Room_booking_request;

use DB;

class AjaxCallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $capacity = $request->ecapacity;
        
        $timerange=$request->timeranges;
        $timearray=explode(" ", $timerange);
        $stime = $timearray[0];
        $etime = $timearray[1];
        
        if($stime>=13)
        {
            $stime = $stime.":30";
        }
        else{
            $stime = $stime.":00";   
        }
        if($etime>=13)
        {
            $etime = $etime.":30";
        }
        else{
            $etime = $etime.":00";   
        }

        $rdate = strtotime($request->edate);
        $rday = date('l', $rdate);
        // echo $rdate.' '.$stime.' '.$etime.' '.$rday;
        $class_rooms = DB::table('Class_Rooms')->where('strength','>=' , $capacity)->get();

        $booked_rooms_on_day = DB::table('Classroom_Slots')->where('day', $rday)->get();
        $booked_requests = Room_Booking_Request::where('date', $rdate)->get();

        $clash_rooms = array();

        foreach($booked_requests as $booked_request){
            $ftime = $booked_request->start_time;
            $to_time = $booked_request->end_time;

            $booked_room = $booked_request->room_id;

            if($ftime >= $stime && $ftime < $etime){
                $clash_rooms[] = $booked_room;
            }

            if($to_time > $stime && $to_time <= $etime){
                $clash_rooms[] = $booked_room;
            }

            if($ftime <= $stime && $to_time >= $etime){
                $clash_rooms[] = $booked_room;
            }

            if($ftime >= $stime && $to_time <= $etime){
                $clash_rooms[] = $booked_room;
            }
        }        

        foreach($booked_rooms_on_day as $booked_room_on_day){
            $ftime = $booked_room_on_day->from_time;
            $to_time = $booked_room_on_day->to_time;

            $booked_room = $booked_room_on_day->room_id;

            if($ftime >= $stime && $ftime < $etime){
                $clash_rooms[] = $booked_room;
            }

            if($to_time > $stime && $to_time <= $etime){
                $clash_rooms[] = $booked_room;
            }

            if($ftime <= $stime && $to_time >= $etime){
                $clash_rooms[] = $booked_room;
            }

            if($ftime >= $stime && $to_time <= $etime){
                $clash_rooms[] = $booked_room;
            }
        }

        $available_rooms = array();

        for($i=0; $i<count($class_rooms); $i++){
            $flag = 1;
            for($j=0; $j<count($clash_rooms); $j++){
                if($class_rooms[$i]->room_id == $clash_rooms[$j]){
                    $flag = 0;
                    break;
                }
            }

            if($flag==1){
                $available_rooms[] = $class_rooms[$i]->room_id;
            }
        }

        return response()->json($available_rooms, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
