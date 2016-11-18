<?php

namespace App\Http\Controllers\healthcentre;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Doctor;

use App\Staff;

use App\Http\Controllers\Controller;

use App\Appointment_Doctor;

use Auth;

class PageController extends Controller
{
    public function getIndex(){
      $staff = Staff::all();
      if(Auth::user()->user_type === 'student' || Auth::user()->user_type === 'faculty'){
      return view('health-centre.pages.welcome')->with('staff',$staff);
    }
    elseif(Auth::user()->user_type === 'others'){
      $id = Auth::user()->username;
      $staff = Staff::find($id);
      $appointment = Appointment_Doctor::where('doctor_id', $id)->get();
      return view('health-centre.doctor_profile.index')->withStaff($staff)->withAppointment($appointment);
      }
    }
    public function getGallery(){
      return view('health-centre.pages.gallery');
    }
}
