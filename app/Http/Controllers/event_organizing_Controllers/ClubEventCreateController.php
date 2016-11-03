<?php

namespace App\Http\Controllers\event_organizing_Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\event_organizing_Models\Non_Academic_Event;

use App\event_organizing_Models\Room_booking_request;

use App\Http\Requests;

use DB;

class ClubEventCreateController extends Controller
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

		$create = new Non_Academic_Event;
		$times= date('H:i:s');
		$timerange=$request->timeranges;
        $timearray=explode(" ", $timerange);
        $stime = $timearray[0];
        $endtime = $timearray[1];
        
        if($stime>=13)
        {
            $stime = $stime.":30";
        }
        else{
            $stime = $stime.":00";   
        }
        if($endtime>=13)
        {
            $endtime = $endtime.":30";
        }
        else{
            $endtime = $endtime.":00";   
        }
		$create->event_name = $request->ename;
		$create->description = $request->edescription;
		// $create->result = "1. AABC, 2. asdsa";
		$create->club_name = "PC";
		$create->capacity = $request->ecapacity;
		$create->room_id = $request->foundrooms;
		$create->start_timestamp = ($request->edate.' '. $stime);
		$create->end_timestamp = ($request->edate.' '. $endtime);
		$create->save();

		$book = new Room_booking_request;
		$book->room_id= $request->foundrooms;
		$book->requester_id="12";
		$book->requester_type="Club";
		$book->status="1";
		$book->purpose = $request->edescription;
		$book->expected_no_of_students = $request->ecapacity;
		$book->date = $request->edate;
		$book->start_time = $stime;
		$book->end_time = $endtime;
		$book->save();


		$event_created=$request->session()->flash('event_created_status',1);
		return \Redirect::action('event_organizing_Controllers\EventController@club');
	}

	public function update(Request $request, $id)
    {
        $this->validate($request, [
		'eresults' => 'bail|required|max:255',]);
        $event_results = Non_Academic_Event::find($id);
		$event_results->result = $request->eresults;
		$event_results->save();
		return \Redirect::action('event_organizing_Controllers\EventController@club');
    }

	public function destroy($id)
	{
		$events=Non_Academic_Event::where('event_id',$id)->first();

		$eventsdate=date('Y-m-d',strtotime($events->start_timestamp));
		$eventstime=date('H:i:s',strtotime($events->start_timestamp));
		$eventetime=date('H:i:s',strtotime($events->end_timestamp));

		$booked_requests = Room_Booking_Request::where([['date', $eventsdate],['start_time', $eventstime],['end_time', $eventetime],['status','1']])->first();
		Room_booking_request::destroy($id);
		Non_Academic_Event::destroy($id);
		return \Redirect::action('event_organizing_Controllers\EventController@club');
	}
}
