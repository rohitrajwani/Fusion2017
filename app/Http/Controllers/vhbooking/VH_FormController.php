<?php

namespace App\Http\Controllers\vhbooking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Book;
use Auth;
use Validator;

class VH_FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('stakeholder.requestForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

          $validator=validator::make($request->all(),[

                'nam'=>'required|max:40',
                'nation'=>'required',
                'add'=>'required',
                'org'=>'required',
                'visit'=>'required',
                'no'=>'required|numeric',
                'mail'=>'required|email',
                'persons'=>'required|numeric',
                'category'=>'required',
                'rooms'=>'required',
                'bill'=>'required',
                'food'=>'required',
                'arrival_time'=>'required',
                'arrival_date'=>'required|date|after:tomorrow',
                'dep_date'=>'required|date|after:arrival_date',
                'dep_time'=>'required'
                 
                ]);

             if ($validator->fails()) {
                 return redirect()->back()->withInput()->withErrors($validator);
             }

            else
       

                 $booking = new Book;
                 $booking->bookers_id = $user->username;
                 $booking->name = $request->nam;
                 $booking->nationality = $request->nation;
                 $booking->organization = $request->org;
                 $booking->purpose_of_visit = $request->visit;
                 $booking->address = $request->add;
                 $booking->phone_no = $request->no;
                 $booking->email_id = $request->mail;
                 $booking->no_of_persons = $request->persons;
                 $booking->category = $request->category;
                 $booking->no_of_rooms = $request->rooms;
                 $booking->bill_settle_by = $request->bill;          
                 $booking->food = $request->food;
                 $booking->arrival_time = $request->arrival_time;
                 $booking->arrival_date = $request->arrival_date;
                 $booking->departure_date = $request->dep_date;
                 $booking->departure_time = $request->dep_time;          
                 $booking->save();
         
            //redirect
           return redirect('vhbooking/stakeholder')->with('message','Form Submitted Successfully!');

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
