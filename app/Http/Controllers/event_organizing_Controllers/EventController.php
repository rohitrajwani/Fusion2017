<?php

namespace App\Http\Controllers\event_organizing_Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\event_organizing_Models\Academic_Event;

use App\event_organizing_Models\Non_Academic_Event;

use App\event_organizing_Models\Review;

class EventController extends Controller
{
	public function acad(Request $request)
	{
		
		$past_events = Academic_Event::where('end_timestamp','<',date("Y-m-d H:i:s"))->get();
		$present_events = Academic_Event::where([['start_timestamp','<=',date("Y-m-d H:i:s")],['end_timestamp','>=',date("Y-m-d H:i:s")]])->get();
		$future_events = Academic_Event::where('start_timestamp','>',date("Y-m-d H:i:s"))->get();

		if($request->session()->has('event_created_status')){
		  $event_created=$request->session()->pull('event_created_status');
		  return view('event_organizing.academics')->with('event_created',$event_created)->with('past_events',$past_events)->with('present_events',$present_events)->with('future_events',$future_events);
		}

		return view('event_organizing.academics')->with('event_created',0)->with('past_events',$past_events)->with('present_events',$present_events)->with('future_events',$future_events);
	}

	public function club(Request $request)
	{
		$past_events = Non_Academic_Event::where('end_timestamp','<',date("Y-m-d H:i:s"))->get();
		$present_events = Non_Academic_Event::where([['start_timestamp','<=',date("Y-m-d H:i:s")],['end_timestamp','>=',date("Y-m-d H:i:s")]])->get();
		$future_events = Non_Academic_Event::where('start_timestamp','>',date("Y-m-d H:i:s"))->get();

		if($request->session()->has('event_created_status')){
		  $event_created=$request->session()->pull('event_created_status');
		  return view('event_organizing.clubs')->with('event_created',$event_created)->with('past_events',$past_events)->with('present_events',$present_events)->with('future_events',$future_events);
		}

		return view('event_organizing.clubs')->with('event_created',0)->with('past_events',$past_events)->with('present_events',$present_events)->with('future_events',$future_events);
	}

	public function club_members()
	{
		$past_events = Non_Academic_Event::where('end_timestamp','<',date("Y-m-d H:i:s"))->get();
		$present_events = Non_Academic_Event::where([['start_timestamp','<=',date("Y-m-d H:i:s")],['end_timestamp','>=',date("Y-m-d H:i:s")]])->get();
		$future_events = Non_Academic_Event::where('start_timestamp','>',date("Y-m-d H:i:s"))->get();
		
		return view('event_organizing.clubmember')->with('event_created',0)->with('past_events',$past_events)->with('present_events',$present_events)->with('future_events',$future_events);

	}

	public function review(Request $request,$id){
		 $review=new Review;
		 $review->event_id = $id;
		 $review->student_id = "10";
		 $review->description = $request->edescription;
		 $review->save();
		
		 
    
      return \Redirect::action('event_organizing_Controllers\EventController@club_members');
    }


}