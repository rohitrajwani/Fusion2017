<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

use Auth;


class leaveControllerFaculty extends Controller
{
    public function homeFaculty()//Home Page for Faculty
    {
        $un = Auth::user()->username;
        $facdet = DB::table('faculty')->where('faculty_id','=',$un)->first();
        $leavedet = DB::table('balance_leaves')->where('user_id','=',$un)->first();

        return view('ELMS.homePageFaculty',['facdet'=>$facdet,'leavedet'=>$leavedet]);
    }

    public function apply()//Leave Application Form for Faculty or Staff
    {
        $un = Auth::user()->username;
        $facdet = DB::table('faculty')->where('faculty_id','=',$un)->first();
        $leavedet = DB::table('balance_leaves')->where('user_id','=',$un)->first();

        return view('ELMS.leaveApplication',['facdet'=>$facdet,'leavedet'=>$leavedet]);
    }

    public function insert(Request $r)
    {
        $un = Auth::user();
        $app = DB::table('employee_leave')->orderBy('app_id','desc')->first();

        $facdet = \DB::table('faculty')->where('faculty_id','=',$un->username)->first();
        $leavedet = \DB::table('balance_leaves')->where('user_id','=',$un->username)->first();

        $appNo = 0;
        if($app != NULL)
            $appNo = $app->app_id;
        $appNo = $appNo + 1;

        $f = strtotime($r['from']);
        $t = strtotime($r['to']);

        if($r['leave_type'] == NULL)
            return Redirect::to('/ELMS/leaveApplicationFaculty')->with('alert','Please mention the leave type!');

        $dateNow = new \DateTime('today');
        if($f < strtotime($dateNow->format('Y-m-d')))
            return Redirect::to('/ELMS/leaveApplicationFaculty')->with('alert','You cannot apply leave for past dates!');
        if($f>=$t)
            return Redirect::to('/ELMS/leaveApplicationFaculty')->with('alert','Invalid Date Fields');
        if($r['leave_type'] == 'maternity' AND $facdet->sex == 'male')
            return Redirect::to('/ELMS/leaveApplicationFaculty')->with('alert','You cannot apply for Maternity Leave');
        if($r['leave_type'] == 'paternity' AND $facdet->sex == 'femal')
            return Redirect::to('/ELMS/leaveApplicationFaculty')->with('alert','You cannot apply for Paternity Leave');

        $balance = \DB::table('balance_leaves')->where('user_id','=',$un->username)->first();

        
        $stp = $r['leave_type'];
        $diff = ($t-$f+86400)/86400;
        switch($stp)
        {
            case 'casual': if($diff > $balance->casual)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;
            case 'special_casual': if($diff > $balance->special_casual)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;
            case 'half_pay': if($diff > $balance->half_pay)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;
            case 'commuted': if($diff > $balance->commuted)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;
            case 'earned': if($diff > $balance->earned)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;
            case 'maternity': if($diff > $balance->maternity)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;
            case 'paternity': if($diff > $balance->paternity)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;

            case 'sabbatical': if($diff > $balance->sabbatical)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;
            case 'leave_not_due': if($diff > $balance->leave_not_due)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;
            case 'restricted_holiday': if($diff > $balance->restricted_holiday)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;
            case 'foreign_service_short': if($diff > $balance->foreign_service_short)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;
            case 'foreign_service_long': if($diff > $balance->foreign_service_long)
                            return Redirect::to('/ELMS/leaveApplicationFacultyLGO')->with('alert','Leave Limit exceeded');
                            break;
        }
        
        $lgo = \DB::table('leave_granting_officer')->where('user_id','=',$un->username)->first();

        if($r['leave_type'] == 'casual' OR $r['leave_type'] == 'restricted_holiday')
            \DB::table('employee_leave')->insert(['user_id'=>$un->username,'user_type'=>$un->user_type,'app_id'=>$appNo,'status'=>0,'leave_type'=>$r['leave_type'],'from'=>$r['from'],'to'=>$r['to'],'purpose'=>$r['purpose'],'leave_granting_officer'=>$lgo->lgo_id,'comments'=>'No comments','created_at'=>new \DateTime(),'updated_at'=>new \DateTime()]);
        else
            \DB::table('employee_leave')->insert(['user_id'=>$un->username,'user_type'=>$un->user_type,'app_id'=>$appNo,'status'=>0,'leave_type'=>$r['leave_type'],'from'=>$r['from'],'to'=>$r['to'],'purpose'=>$r['purpose'],'leave_granting_officer'=>'s3','comments'=>'No comments','created_at'=>new \DateTime(),'updated_at'=>new \DateTime()]);
        
        $ldet=DB::table('employee_leave')->where('user_id','=',$un->username)->orderBy('app_id','desc')->first();

        return view('ELMS.currentLeaveStatusFaculty',['facdet'=>$facdet,'leavedet'=>$ldet]);
    }

    public function status()
    {
        $un = Auth::user();
        $ldet=DB::table('employee_leave')->where('user_id','=',$un->username)->orderBy('app_id','desc')->first();
        $facdet = DB::table('faculty')->where('faculty_id','=',$un->username)->first();
        return view('ELMS.currentLeaveStatusFaculty',['facdet'=>$facdet,'leavedet'=>$ldet]);
    }

    public function history()
    {
        $un = Auth::user();
        $leavedet = DB::table('employee_leave')->where([['user_id','=',$un->username],['status','=',1]])->get();

        return view('ELMS.leaveHistoryFaculty',['leavedet'=>$leavedet]);
    }
}
