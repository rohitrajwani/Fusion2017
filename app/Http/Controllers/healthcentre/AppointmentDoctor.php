<?php

namespace App\Http\Controllers\healthcentre;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;

use App\Appointment_Doctor;

use App\Patient_record;

use App\Staff;

use Auth;

class AppointmentDoctor extends Controller
{
    public function next(){
      $id = Auth::user()->username;
      $staff = Staff::find($id);
      $appointment = Appointment_Doctor::where('doctor_id', $id)->get();
      return view('health-centre.appointmentdoctor.next')->withStaff($staff)->withAppointment($appointment);
    }
    public function previous(){
      $id = Auth::user()->username;
      $staff = Staff::find($id);
      $appointment = Appointment_Doctor::where('doctor_id', $id)->get();
      return view('health-centre.appointmentdoctor.previous')->withStaff($staff)->withAppointment($appointment);
    }
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
      //validate the data
      $this->validate($request,array(
      'disease'=>'required|max:255',
      'number_days' => 'required'
      ));
      //store in data base
      $record_patient = new Patient_record;
      $record_patient->appointment_id=$request->appointment_id;
      $record_patient->disease=$request->disease;
      $record_patient->number_days=$request->number_days;
      $record_patient->tablet=$request->tablet;
      $record_patient->no=$request->no;
      $record_patient->save();

      // $record_patient->tablet()->sync($request->tablet);
      // $record_patient->no()->sync($request->no);

      $request->Session()->flash('success','Prescribed Successfully!');

      // return redirect()->route('',$record_patient->appointment_id);
      $id = Auth::user()->username;
      $staff = Staff::find($id);
      $appointment = Appointment_Doctor::where('doctor_id', $id)->get();
      return view('health-centre.doctor_profile.index')->withStaff($staff)->withAppointment($appointment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $student_id = Appointment_doctor::where('appointment_id',$id)->value('user_id');
      $student = Student::where('student_id',$student_id)->get();
      $prescribe = Patient_record::where('appointment_id',$id)->get();
      return view('health-centre.appointmentdoctor.single')->withId($id)->withStudent($student)->withPrescribe($prescribe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //used it for Prescription
    public function edit($id)
    {
      $appointment_id = $id;
      $doctor_id = Appointment_Doctor::where('appointment_id',$id)->get();
      $user = Appointment_Doctor::where('appointment_id',$id)->value('user_id');
      // $user = $doctor_id->user_id;
      $user_id = Student::where('student_id',$user)->get();
      $appointment = Appointment_Doctor::where('doctor_id', $id)->get();
      return view('health-centre.appointmentdoctor.prescribe')->withAppointment_id($appointment_id)->withDoctor_id($doctor_id)->withUser_id($user_id);
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
