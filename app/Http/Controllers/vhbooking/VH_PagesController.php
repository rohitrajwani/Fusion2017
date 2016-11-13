<?php

namespace App\Http\Controllers\vhbooking;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

//This are the classes imported for using functions of these classes

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Complaint;
use App\Student;
use App\Book;
use App\Room;
use App\bookRooms;
use Auth;
use Validator;

class VH_PagesController extends Controller
{
    public function portalCheck(){
        $user = Auth::user();        
        //return $user->user_type;
        if($user->user_type == 'student')
        {            
            return Redirect::to('vhbooking/stakeholder');                       
        }

        if($user->hasRole('vh_caretaker'))
        {            
            return Redirect::to('vhbooking/caretaker');                       
        }

        if($user->hasRole('vh_incharge'))
        {            
            return Redirect::to('vhbooking/incharge');                       
        }
        //return $student;
    }

    public function bookingHistory(){
        $user = Auth::user();
        //$stu = Student::where('student_id',$user->username)->get();
        $requests = Book::where('bookers_id',$user->username)->get();
        return view('stakeholder.bookingHistory',compact('requests'));
    }

    // function redirect to Stakeholder's home page
	public function stakeholder(){
		return view('stakeholder.stake_main');
	}

    // function redirect to VH caretaker's home page
	public function caretaker(){
		return view('caretaker.ct_main');
	}

    // function redirect to VH incharge's home page
	public function incharge(){
		return view('vhincharge.vh_main');
	}

    public function cancelRoom(){
        return view('stakeholder.cancelRoom');
    }

    //Function redirects to Rules and Regulations page on stakeholder's portal
	public function rules(){
		return view('stakeholder.rules');
	}

    //Function redirects to the Room Booking Form page on stakeholder's portal
    public function requestForm(){
    		return view('stakeholder.requestForm');
    }

    //Function redirects to File complaint form page on VH caretaker's portal
    public function complaintForm(){
    		return view('caretaker.complaintForm');
    }

    //Function fetches all the data from visitors_complaint table then redirects to Complaint staus page on Vh caretaker's portal
    public function complaintStatus(){
    		$complaints = Complaint::all();
    		return view('caretaker.ct_complaint',compact('complaints'));
    }

    //Function adds a new complaint to visitors_complaint table and redirects to Comlaint form page on Vh caretaker's portal
    public function addComplaint(Request $request){   

    		  $validator=validator::make($request->all(),[
                 'booking_id'=>'required|numeric',
                'description'=>'required'
                ]);

             if ($validator->fails()) {
                 return redirect()->back()->withInput()->withErrors($validator);
             }

            else
            $complaint = new Complaint;
            $complaint->booking_id = $request->booking_id;
            $complaint->description = $request->description;
            $complaint->save();
            return redirect('vhbooking/caretaker')->with('message','Complaint Added');
    }

    //Function fetches all the data from visitors_complaint table then redirects to respond_complaint page on Vh incharge's portal
    public function respond(){
    		$complaints = Complaint::orderBy('complaint_no','DESC')->get();
    		return view('vhincharge.respond_complaint',compact('complaints'));
    }

    //Function recieves complaint_id as a param fetches corresponding complaint from visitors_complaint table then redirects back
    public function addFine(Request $request,$complaint){    	
    		//$complaint =  $request->fineButton;
    		$comp = Complaint::find($complaint);      		  		
    		$comp->fine = $request->amount;
    		$id = $comp->booking_id;
    		$comp->save(); 
    		$booking = Book::find($id);
    		$booking->fine = $booking->fine + $request->amount;
    		$booking->save();
    		return back();
    }

   

    //Function fetches all the data from booking table then redirects to page which displays all booking requests on Vh caretaker's portal
    public function bookingRequest(){
    	$requests = Book::all();
    		return view('vhincharge.booking_request',compact('requests'));
    }

    public function bookingDetails(){
    	$requests = Book::all();
    		return view('caretaker.booking_details',compact('requests'));
    }

    public function roomDetailsVH(){
    	$rooms = Room::all();
    	return view('vhincharge.room_details_vh',compact('rooms'));
    }

    public function roomDetailsCT(){
    	$rooms = Room::all();
    	return view('caretaker.room_details_ct',compact('rooms'));
    }

    public function viewVH($reqID){
    	$booking = Book::find($reqID);
    	return view('vhincharge.viewDetails',compact('booking'));
    }

    public function viewCT($reqID){
    	$booking = Book::find($reqID);
    	return view('caretaker.view_details_ct',compact('booking'));
    }

    public function viewStake($reqID){
        $booking = Book::find($reqID);
        return view('stakeholder.view_details_stake',compact('booking'));
    }

    public function approve($id){
    	$booking = Book::find($id);
    	$booking->status = 1;
    	$booking->save();
    	return view('vhincharge.viewDetails',compact('booking'));
    }

    public function approveNot($id){
    	$booking = Book::find($id);
    	$booking->status = 2;
    	$booking->save();
    	return view('vhincharge.viewDetails',compact('booking'));
    }

    public function approvedRooms(){
    	$rooms = Book::where('status',1)->get();
    	return view('caretaker.approved_rooms',compact('rooms'));
    }

    public function assignRoom($id){    	
    	$room = Book::find($id);
    	return view('caretaker.assign_room',compact('room'));
    }

    public function assign($id,Request $request){

        //return $request;

        $available[] = NULL;
        $x = 0; 
        $flag = 0;
        $roo = Book::find($id);
        $booked = Book::where( function ($q) use($roo) {
                                      $q->where( function ($query) use($roo) {
                                            $query->where('arrival_date','<=',$roo->arrival_date)
                                                  ->where('departure_date','>=',$roo->arrival_date)
                                                  ->Where('departure_date','<=',$roo->departure_date);
                                           })
                                        ->orWhere( function ($query) use($roo) {
                                            $query->where('arrival_date','>=',$roo->arrival_date)
                                                  ->where('arrival_date','<=',$roo->departure_date)
                                                  ->Where('departure_date','>=',$roo->departure_date);
                                        });
                                    })              
                                ->where('room_no','!=','Not Assigned')
                                ->where('status','=',1)->get(['id']);

        $bookRooms = bookRooms::all();

        foreach($booked as $book) {
              foreach($bookRooms as $bookRoom) {
                 if($book->id == $bookRoom->booking_id) { 
                      $available[$x] = $bookRoom->room_no;
                      $x++;
                 } 
            }
        }

        foreach($available as $avails) {
            foreach($request->Room as $room) {
                if($room == $avails)
                    $flag++;
            }
        }

        $flag1 = 0;
        $count =sizeof($request);
        $r = Room::all();

        foreach($request->Room as $room) {
            foreach($r as $ro) {
                if($ro->room_no == $room)
                    $flag1++;
                    break;
            }
        }
        if($flag1!=$count) $flag++;        

        if($flag==0) {
            foreach($request->Room as $room)
            {               
                $bookRooms = new bookRooms;
                $bookRooms->booking_id = $id;
                $bookRooms->room_no = $room;
                $bookRooms->save();
            }             

            $room = Book::find($id);
            $room->room_no = 'Assigned';
            $room->save();

            //$room1 = Room::where('room_no',$request->Room)->update(["availability" => 0]);

        	$rooms = Book::where('status',1)->get();
        	return view('caretaker.approved_rooms',compact('rooms'));
        }

        if($flag!=0){
            return redirect('/vhbooking/approvedRooms')->with('alert','Wrong Input');
        }

    }

    public function change($id){        
        $room = Room::find($id);
        if($room->checked_in == '0') Room::where('room_no',$room->room_no)->update(["checked_in" => 1]);
        if($room->checked_in == '1') $room->checked_in = 0;
        $room->save();
        $rooms = Room::all();
        return Redirect::to('/vhbooking/roomDetailsCT');
    }

    public function availabilityCT(Request $request){        

    $available[] = NULL;
    $x = 0;
    $booked = Book::where( function ($q) use($request) {
                                      $q->where( function ($query) use($request) {
                                            $query->where('arrival_date','<=',$request->from)
                                                  ->where('departure_date','>=',$request->from)
                                                  ->Where('departure_date','<=',$request->to);
                                           })
                                        ->orWhere( function ($query) use($request) {
                                            $query->where('arrival_date','>=',$request->from)
                                                  ->where('arrival_date','<=',$request->to)
                                                  ->Where('departure_date','>=',$request->to);
                                        });
                                    })              
                                ->where('room_no','!=','Not Assigned')
                                ->where('status','=',1)->get(['id']);
    //return $booked;

    $bookRooms = bookRooms::all();

    foreach($booked as $book) {
          foreach($bookRooms as $bookRoom) {
             if($book->id == $bookRoom->booking_id) { 
                  $room1 = Room::where('room_no',$bookRoom->room_no)->update(["availability" => 0]);
                  $available[$x] = $bookRoom->room_no;
                  $x++;
             } 
        }
    }
             //return $available;
        return back()->with('data',$available);
    }

    public function availabilityVH(Request $request){        

    $available[] = NULL;
    $x = 0;
    $booked = Book::where( function ($q) use($request) {
                                      $q->where( function ($query) use($request) {
                                            $query->where('arrival_date','<=',$request->from)
                                                  ->where('departure_date','>=',$request->from)
                                                  ->Where('departure_date','<=',$request->to);
                                           })
                                        ->orWhere( function ($query) use($request) {
                                            $query->where('arrival_date','>=',$request->from)
                                                  ->where('arrival_date','<=',$request->to)
                                                  ->Where('departure_date','>=',$request->to);
                                        });
                                    })              
                                ->where('room_no','!=','Not Assigned')
                                ->where('status','=',1)->get(['id']);
    //return $booked;

    $bookRooms = bookRooms::all();

    foreach($booked as $book) {
          foreach($bookRooms as $bookRoom) {
             if($book->id == $bookRoom->booking_id) { 
                  $room1 = Room::where('room_no',$bookRoom->room_no)->update(["availability" => 0]);
                  $available[$x] = $bookRoom->room_no;
                  $x++;
             } 
        }
    }
             //return $available;
        return back()->with('data',$available);
    }

   public function cancel(Request $request){     
        $room = Book::find($request->booking_id)->delete();
        $bookRoom = bookRooms::where('booking_id',$request->booking_id)->delete();
        return view('caretaker.assign_room',compact('room'));
    }


    // public function change($complaint_no){    	
    // 	$room = Room::find($complaint_no);
    // 	if($room->checked_in == 0) $room->checked_in = 1; 
    // 	else $room->checked_in = 0;
    // 	if($room->availability == 0) $room->availability = 1; 
    // 	else $room->availability = 0;
    // 	$room->save();
    // 	return back();
    // }
}
