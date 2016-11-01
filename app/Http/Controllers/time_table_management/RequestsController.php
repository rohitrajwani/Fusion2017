<?php

namespace App\Http\Controllers\time_table_management;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Room_booking_request;
use App\Http\Controllers\Controller;
use Auth;
use Resources\Views;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('scheduleanextraclass');
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
    public function store(Request $request){
        if(Auth::user()->user_type != 'faculty' && !Auth::user()->hasRole('admin')){
            return Redirect::to('time_table_management');
        }

        $schedule = new Room_booking_request;
        
        $this->validate($request, [
            'bookingdate' => 'required|date',
            'StartTime' => 'required',
            'EndTime' => 'required',
            'CourseCode' => 'required|string'
        ]);

        $username = Auth::user()->username;
        $schedule->room_id=$username;

        $schedule->requester_id=$username;
        $schedule->requester_type="faculty";
        $schedule->status=0;
        $schedule->purpose=$request->CourseCode;
        $schedule->expected_no_of_students=$request->Strength;
        $schedule->date=$request->bookingdate;
        $schedule->start_time=$request->StartTime;
        $schedule->end_time=$request->EndTime;
        
        $schedule->save();
       
	return back()->with('alert', 'Successfully Created!');
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
        //admin function for updating(approving or rejecting) a particular request
        $approve = new Room_booking_request;
        //validation of data
        $this->validate($request, [
        ]); 
        
        $dummy = "dummy_class";
        
        $room = $approve->room_id;
        if($room == ''){
            $approve->room_id = $dummy;
            $approve->status = 2; 
        }
        else {
            $approve->status = 1;
        }

        $approve->save();
        return redirect()->back();
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
