<?php

namespace App\Http\Controllers\event_organizing_Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\event_organizing_Models\Academic_Event;

use App\event_organizing_Models\Non_Academic_Event;

use App\event_organizing_Models\Review;

use Auth;

use DB;

use Zizaco\Entrust\Traits\EntrustRoleTrait;

class EventController extends Controller
{

	public function index(){
		if(Auth::user()->hasRole('faculty') || Auth::user()->hasRole('Acad_staff'))
		{
			return redirect('/event_organizing/acad');
		}
		if(Auth::user()->hasRole('ug_student'))
		{
			return \Redirect::action('event_organizing_Controllers\EventController@clubpages');
		}
	}

	public function acad(Request $request)
	{
		
		if(Auth::user()->hasRole('ug_student'))
		{
			return \Redirect::action('event_organizing_Controllers\EventController@clubpages');
		}

		$past_events = Academic_Event::where('end_timestamp','<',date("Y-m-d H:i:s"))->get();
		$present_events = Academic_Event::where([['start_timestamp','<=',date("Y-m-d H:i:s")],['end_timestamp','>=',date("Y-m-d H:i:s")]])->get();
		$future_events = Academic_Event::where('start_timestamp','>',date("Y-m-d H:i:s"))->get();

		if($request->session()->has('event_created_status')){
		  $event_created=$request->session()->pull('event_created_status');
		  return view('event_organizing.academics')->with('event_created',$event_created)->with('past_events',$past_events)->with('present_events',$present_events)->with('future_events',$future_events);
		}

		return view('event_organizing.academics')->with('event_created',0)->with('past_events',$past_events)->with('present_events',$present_events)->with('future_events',$future_events);
	}

	public function club(Request $request,$clubname)
	{
		if(Auth::user()->hasRole('faculty') || Auth::user()->hasRole('Acad_staff'))
		{
			return redirect('/event_organizing/acad');
		}
		

		$past_events = Non_Academic_Event::where([['end_timestamp','<',date("Y-m-d H:i:s")],['club_name',$clubname]])->get();
		$present_events = Non_Academic_Event::where([['start_timestamp','<=',date("Y-m-d H:i:s")],['end_timestamp','>=',date("Y-m-d H:i:s")],['club_name',$clubname]])->get();
		$future_events = Non_Academic_Event::where([['start_timestamp','>',date("Y-m-d H:i:s")],['club_name',$clubname]])->get();
		$reviews=Review::all();

		$clubco = DB::table('Gymkhana_Club_Coordinator')->where('club_name',$clubname)->first();

		$clubcoco = DB::table('Gymkhana_Club_Cocoordinator')->where('club_name',$clubname)->first();

		$clubmemberslist = DB::table('Club_Members')->join('student','Club_Members.student_id','=','student.student_id')->where('club_name',$clubname)->get();

		if($request->session()->has('event_created_status')){
		  $event_created=$request->session()->pull('event_created_status');
		  return view('event_organizing.clubs')->with('event_created',$event_created)->with('past_events',$past_events)->with('present_events',$present_events)->with('future_events',$future_events)->with('clubco',$clubco->coordinator_student_id)->with('clubcoco',$clubcoco->coco_student_id)->with('clubname',$clubname)->with('reviews',$reviews)->with('clubmemberslist',$clubmemberslist);
		}

		return view('event_organizing.clubs')->with('event_created',0)->with('past_events',$past_events)->with('present_events',$present_events)->with('future_events',$future_events)->with('clubco',$clubco->coordinator_student_id)->with('clubcoco',$clubcoco->coco_student_id)->with('clubname',$clubname)->with('reviews',$reviews)->with('clubmemberslist',$clubmemberslist);
	}

	public function clubmembers($clubname)
	{
		if(Auth::user()->hasRole('faculty') || Auth::user()->hasRole('Acad_staff'))
		{
			return redirect('/event_organizing/acad');
		}

		$past_events = Non_Academic_Event::where([['end_timestamp','<',date("Y-m-d H:i:s")],['club_name',$clubname]])->get();
		$present_events = Non_Academic_Event::where([['start_timestamp','<=',date("Y-m-d H:i:s")],['end_timestamp','>=',date("Y-m-d H:i:s")],['club_name',$clubname]])->get();
		$future_events = Non_Academic_Event::where([['start_timestamp','>',date("Y-m-d H:i:s")],['club_name',$clubname]])->get();

		$clubco=DB::table('Gymkhana_Club_Coordinator')->where('club_name',$clubname)->first();

		$clubcoco=DB::table('Gymkhana_Club_Cocoordinator')->where('club_name',$clubname)->first();

		$clubmemberslist = DB::table('Club_Members')->join('student','Club_Members.student_id','=','student.student_id')->where('club_name',$clubname)->get();


		$reviews=Review::all();

		$user_reviewed=Review::where('student_id' , Auth::user()->username)->get();
		
		return view('event_organizing.clubmember')->with('event_created',0)->with('past_events',$past_events)->with('present_events',$present_events)->with('future_events',$future_events)->with('clubco',$clubco->coordinator_student_id)->with('clubcoco',$clubcoco->coco_student_id)->with('clubname',$clubname)->with('reviews',$reviews)->with('user_reviewed',$user_reviewed)->with('clubmemberslist',$clubmemberslist);

	}

	public function review(Request $request,$clubname,$id){
		 $review=new Review;
		 $review->event_id = $id;
		 $review->student_id = Auth::user()->username;
		 $review->description = $request->edescription;
		 $review->save();
    
      return redirect('/event_organizing/clubmember/'.$clubname);
    }

    public function clubpages()
	{
		if(Auth::user()->hasRole('faculty') || Auth::user()->hasRole('Acad_staff'))
		{
			return redirect('/event_organizing/acad');
		}

		if(Auth::user()->hasRole('club_co'))
		{
			$adminclub=DB::table('Gymkhana_Club_Coordinator')->where('coordinator_student_id', Auth::user()->username)->first();
		}
		
		else if(Auth::user()->hasRole('club_coco'))
		{
			$adminclub=DB::table('Gymkhana_Club_Cocoordinator')->where('coco_student_id' , Auth::user()->username)->first();
		}
		else{
			$adminclub="";
		}

		if(Auth::user()->hasRole('ug_student'))
		{
			$clubspart=DB::table('Club_Members')->where('student_id', Auth::user()->username)->get();
		}
		if($adminclub!="")
			return view('event_organizing.clubpages')->with('adminclub',$adminclub->club_name)->with('clubsparts',$clubspart);
		else
		return view('event_organizing.clubpages')->with('adminclub',$adminclub)->with('clubsparts',$clubspart);

	}


}