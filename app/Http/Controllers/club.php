<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Validation\Rule;
class club extends Controller
{
    
    public function welcome(Request $request){
        $user=\Auth::user();
        
        if($user->hasRole('club_co') ){
            $user=\Auth::user()->username;
            $club=\DB::table('Gymkhana_Club_Coordinator')->where('coordinator_student_id', $user)->first();
            $activity = \DB::table('Scheduled_Activity')->where('club_name',$club->club_name)->get();
            $members = \DB::table('Club_Members')
                            ->join('Student', 'Club_Members.student_id', '=', 'Student.student_id')
                            ->where('Club_Members.club_name',$club->club_name)
                            ->get();
            return view('coordinator.index', compact('club','activity','members'));
        }
        else{
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
        }
    }


    public function updatewebsite( Request $request){
        $this->validate($request, ['newwebsite' => 'required|max:500']);
    	$new_website = $request->input('newwebsite'); 
    	$user=\Auth::user()->username;
    	\DB::table('Gymkhana_Club_Coordinator')
            ->where('coordinator_student_id', $user)
            ->update(['description' => $new_website , 'updated_at'=>\Carbon\Carbon::now()]);
        return redirect()->route('coordinator/welcome')->with('message', 'Successfull !!');
    }

    public function updateactivity( Request $request){
    	$old_activity = $request->input('oldactivity'); 
    	$new_activity = $request->input('newactivity'); 
        $this->validate($request, ['oldactivity' => 'required','newactivity' => 'required|unique:Scheduled_Activity,activity_name|max:100']);
    	$user=\Auth::user()->username;
    	\DB::table('Scheduled_Activity')
            ->where('activity_name', $old_activity)
            ->update(['activity_name' => $new_activity , 'updated_at'=>\Carbon\Carbon::now()]);
        return redirect()->route('coordinator/welcome')->with('message', 'Successfull !!');
    }

    public function deleteactivity( Request $request){
    	$old_activity = $request->input('oldactivity'); 
         $this->validate($request, ['oldactivity' => 'required']);
    	$user=\Auth::user()->username;
        $club=\DB::table('Gymkhana_Club_Coordinator')->where('coordinator_student_id', $user)->first();
    	\DB::table('Scheduled_Activity')
            ->where('activity_name', $old_activity)
            ->where('Scheduled_Activity.club_name',$club->club_name)
            ->delete();
        return redirect()->route('coordinator/welcome')->with('message', 'Successfull !!');
    }

    public function insertactivity( Request $request){
    	$new_activity = $request->input('newactivity'); 
         $this->validate($request, ['newactivity' => 'required|unique:Scheduled_Activity,activity_name|max:100']);
    	$user=\Auth::user()->username;
    	$club=\DB::table('Gymkhana_Club_Coordinator')->where('coordinator_student_id', $user)->first();
    	\DB::table('Scheduled_Activity')
            ->insert(['activity_name' => $new_activity, 
            			'club_name' => $club->club_name , 
            			"created_at" =>  \Carbon\Carbon::now(),
           				 "updated_at" => \Carbon\Carbon::now(),]);
    	return redirect()->route('coordinator/welcome')->with('message', 'Successfull !!');
    }

    public function deletemember( Request $request){
    	$old_member = $request->input('oldmember'); 
        $this->validate($request, ['oldmember' => 'required']);
    	$user=\Auth::user()->username;
        $club=\DB::table('Gymkhana_Club_Coordinator')->where('coordinator_student_id', $user)->first();
    	\DB::table('Club_Members')
            ->where('student_id', $old_member)
            ->where('Club_Members.club_name',$club->club_name)
            ->delete();
        return redirect()->route('coordinator/welcome')->with('message', 'Successfull !!');
    }

    public function insertmember( Request $request){   	
        $user=\Auth::user()->username;
        $new_member = $request->input('newmember'); 
        $club=\DB::table('Gymkhana_Club_Coordinator')->where('coordinator_student_id', $user)->first();
        $this->validate($request, ['newmember' => 'required|exists:student,student_id|max:100']); 
        $c=\DB::table('Club_Members')
            ->where('club_name',$club->club_name)
            ->where('student_id',$new_member)
            ->count();
        if ($c == 0){
    	    \DB::table('Club_Members')
    	        ->insert(['student_id' => $new_member, 
    	            	'club_name' => $club->club_name , 
    	            	"created_at" =>  \Carbon\Carbon::now(),
    	           		"updated_at" => \Carbon\Carbon::now()]);
        	return redirect()->route('coordinator/welcome')->with('message', 'Successfull !!');
        }
	    return redirect()->route('coordinator/welcome')->with('message', 'Member Already Exist!!');
    }

}
