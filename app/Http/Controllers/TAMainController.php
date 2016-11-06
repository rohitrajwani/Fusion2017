<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Claim;
session_start();
class TAMainController extends Controller
{
    public function index()
    {
        return view('ta.TAmain');
    }
    
    public function viewclaims(){//view claims
        return view('ta.claims');
    }
    
    public function claimform(){//display the claim form
        return view('ta.claimform');
    }
    public function mail(){
        return view('ta.mail');
                }

    public function sendmail(Request $request){
        $post = $request->all();
        $headers = 'From: '.$post['from']."\r\n";
        $recp = $post['recp'];
        $to = $recp[0];
        for($i=1;$i<count($recp);$i++){
            $to .= ", ";
            $to .= $recp[$i];
        }
        //mail($to,$post['subject'],$post['body'],$headers); Needs to be set up and tested later by the integration team
        return redirect()->back();
    }

    
    public function addclaim(Request $request){//add claim form request to the database
        $post = $request->all();
        $v = \Validator::make($request->all(),
                             [
                                'month' =>'required',
                                 'acc_no' => 'required',
                                 'applicability' => 'required',
                             ]);//Validator for required fields.
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());//return with errors
        }
        else
        {
            $prev = Claim::where('student_id',$post['id'])->where('month',$post['month'])->get();//previous claims of the same month
            if(count($prev)>=1){//if there exists
                return redirect()->back()->withErrors(array('month'=>'Already applied for seleted month!'));
            }
            else{//else
                $claim = new Claim;
                
                $claim->student_id = $post['id'];
                $claim->month = $post['month'];
                $claim->bank_acc_no = $post['acc_no'];
                $claim->applicability = $post['applicability'];
                $claim->status = '0';
                $claim->ta_sup_comment = '';

                //calculating stipend on the basis of attendance.
                $attendance = \DB::table('Ta_Attendance')->where('student_id',$post['id'])->whereMonth('date','=',$post['month']);
                $present = $attendance->where('attendance_status','1')->get();
                if(count($attendance->get())==0)//if no attendance record is found.
                    return redirect()->back()->withErrors(array('month'=>'No Attendance Record Found!'));
                else
                    $claim->stipend = round($post['stipend']*count($present)/count($attendance->get()));//calcuated stipend proportionately according to attendance
                
                
                if($claim->save())
                    return redirect('TA/claims');
                else{
                    return redirect()->back()->withErrors(array('month'=>'Record could not be saved'));
                }
            }
        }
    }
    
    
}
