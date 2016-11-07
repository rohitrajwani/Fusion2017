<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Auth;

class leaveController extends Controller
{
    
    public function display()
    {
        $user = Auth::user();

        if($user->user_type == 'staff')
        {
            $Staff = \DB::table('staff')->where('staff_id','=',$user->username)->get()->first();
            $designation = $Staff->post;

            if($designation == 'registrar' OR $designation == 'assistant registrar' OR $designation == 'director')
            {
                return Redirect::to('/ELMS/homeStaffLGO')->with('alert','Login Successful for '.Auth::user());
                // return 'Login for Staff LGO';
            }
            else
            {
                return Redirect::to('/ELMS/homeStaff')->with('alert','Login Successful for '.Auth::user());
                // return 'Login for staff';
            }
        }
        else if($user->user_type == 'faculty')
        {
            $Faculty = \DB::table('faculty')->where('faculty_id','=',$user->username)->get()->first();
            $designation = $Faculty->designation;

            if($designation == 'hod')
            {
                return Redirect::to('/ELMS/homeFacultyLGO')->with('alert','Login Successful for '.Auth::user());
                // return 'Login for Faculty LGO';
            }
            else
            {
                return Redirect::to('/ELMS/homeFaculty')->with('alert','Login Successful for '.Auth::user());
                // return 'Login for Faculty';
            }
        }            
    }

    public function history($app_id)
    {
        $userId1 = Auth::user()->username;
        $userId = \DB::table('employee_leave')->where('app_id','=',$app_id)->first();
        $leavedet = \DB::table('employee_leave')->where('user_id','=',$userId->user_id)->get();
        
        $tuple1 = \DB::table('staff')->where('staff_id','=',$userId->user_id)->first();
        $tuple2 = \DB::table('faculty')->where('faculty_id','=',$userId->user_id)->first();
        if($tuple1 != NULL)
            return view('pages.showHistoryStaff',['leavedet'=>$leavedet]);
        else if($tuple2 != NULL && $userId1 == 's3')
            return view('pages.showHistoryStaff',['leavedet'=>$leavedet]);
        else if($tuple2 != NULL )
            return view('pages.showHistoryFaculty',['leavedet'=>$leavedet]);
    }
}
