<?php

namespace App\Http\Controllers\healthcentre;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Staff;

use App\Doctor;

use App\Tt_detail;

use App\Appointment_doctor;

use App\Patient_record;

use Auth;

use Session;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointment = Appointment_doctor::orderBy('day','desc')->get();
        return view('health-centre.appointment.index')->withAppointment($appointment);
    }
    public function next(){
      $appointment = Appointment_doctor::orderBy('day','desc')->get();
      return view('health-centre.appointment.next')->withAppointment($appointment);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
      // dd($request);
      $this->validate($request,array(
        'staff_id' => 'required'
      ));
      $id = $request->staff_id;
      $staff_id = Staff::find($id);
      // $tt_detail = Tt_detail::where('staff_id', $staff_id)->get();
      return view('health-centre.appointment.create')->withStaff($staff_id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,array(
          'days' => 'required',
          'slot' => 'required'
        ));

        $appointment_doctor = new Appointment_doctor;
        $appointment_doctor->user_id = Auth::user()->username;
        $appointment_doctor->user_type = "student";
        $appointment_doctor->day = $request->days;
        $appointment_doctor->slot = $request->slot;
        $appointment_doctor->doctor_id = $request->doctor_id;

        $appointment_doctor->save();
        $request->Session()->flash('success','The Appointment was successfully save!');
        return redirect()->route('appointment.show',$appointment_doctor->appointment_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $appointment = Appointment_doctor::find($id);
      $prescribe = Patient_record::where('appointment_id',$id)->get();
      return view('health-centre.appointment.show')->withAppointment($appointment)->withPrescribe($prescribe);
      // $doctorname = Staff::select('name')->where('staff_id',$id)->get();
      // $tt_detail = Tt_detail::where('staff_id', $id)->get();
      // return view('appointment.create')->withTt_detail($tt_detail)->withDoctorname($doctorname)->withId($id);
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
     * Upday the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upday(Request $request, $id)
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
      $appointment = Appointment_doctor::find($id);
      $appointment->delete();

      Session()->flash('success','The Appointment was successfully deleted!');

      return redirect()->route('health-centre.appointment.index',$appointment->id);
    }
}
