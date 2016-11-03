<?php

namespace App\Http\Controllers\event_organizing_Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\event_organizing_Models\Academic_Event;

use App\event_organizing_Models\Room_booking_request;

use App\Http\Requests;

class EventCreateController extends Controller
{
	public function store(Request $request)
	{
		$this->validate($request, [
		'ename' => 'bail|required|max:255',
		'edescription' => 'bail|required',
		'ecapacity' =>'bail|numeric',
		'timeranges' => 'bail|required',
		'foundrooms' => 'bail|required',
		]);

		$create = new Academic_Event;
		$times= date('H:i:s');
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
		$create->event_name = $request->ename;
		$create->description = $request->edescription;
		$create->capacity = $request->ecapacity;
		$create->start_timestamp = ($request->edate.' '. $stime);
		$create->end_timestamp = ($request->edate.' '. $etime);
		$create->room_id = $request->foundrooms;
		$create->booked_by = 'Admin';
		$create->save();

		$book = new Room_booking_request;
		$book->room_id= $request->foundrooms;
		$book->requester_id="124";
		$book->requester_type="Faculty";
		$book->status="1";
		$book->purpose = $request->edescription;
		$book->expected_no_of_students = $request->ecapacity;
		$book->date = $request->edate;
		$book->start_time = $stime;
		$book->end_time = $etime;
		$book->save();


		$event_created=$request->session()->flash('event_created_status',1);
		return \Redirect::action('event_organizing_Controllers\EventController@acad');
	}

	public function update(Request $request, $id)
    {
        //
    }

	public function destroy($id)
	{
		$events=Academic_Event::where('event_id',$id)->first();

		$eventsdate=date('Y-m-d',strtotime($events->start_timestamp));
		$eventstime=date('H:i:s',strtotime($events->start_timestamp));
		$eventetime=date('H:i:s',strtotime($events->end_timestamp));

		$booked_requests = Room_Booking_Request::where([['date', $eventsdate],['start_time', $eventstime],['end_time', $eventetime],['status','1']])->first();

		Room_booking_request::destroy($booked_requests->req_id);
		Academic_Event::destroy($id);
		return \Redirect::action('event_organizing_Controllers\EventController@acad');
	}
}
