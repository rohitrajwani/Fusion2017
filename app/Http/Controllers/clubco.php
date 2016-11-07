<?php

namespace App\Http\Controllers;
use Illuminate\View\Middleware\ShareErrorsFromSession; 
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class clubco extends Controller
{

     public function welcome(Request $request){
        $user=\Auth::user();
        
        if($user->hasRole('cilb_coco')){
                $user=\Auth::user()->username;
                $club=\DB::table('Gymkhana_Club_Cocoordinator')->where('coco_student_id', $user)->first();
                $budget= \DB::table('Gymkhana_Club_Coordinator')->where('club_name',$club->club_name)->first();
                $activity = \DB::table('Scheduled_Activity')->where('club_name',$club->club_name)->get();
                $members = \DB::table('Club_Members')
                                ->join('Student', 'Club_Members.student_id', '=', 'Student.student_id')
                                ->where('Club_Members.club_name',$club->club_name)
                                ->get();
                return view('cocoordinator.index', compact('club','activity','members','budget'));
        }
        else{
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
        }
    }

    public function updatewebsite( Request $request){
        $this->validate($request, ['newwebsite' => 'required|max:500']);
        $new_website = $request->input('newwebsite'); 
        $user=$request->session()->get('user');
        $club=\DB::table('Gymkhana_Club_Cocoordinator')->where('coco_student_id', $user)->first();
        \DB::table('Gymkhana_Club_Coordinator')
            ->where('club_name', $club->club_name)
            ->update(['description' => $new_website ,  'updated_at'=>\Carbon\Carbon::now()]);
        return redirect()->route('cocoordinator/welcome')->with('message', 'Successfull !!');
    }

    public function updateactivity( Request $request){
        $old_activity = $request->input('oldactivity'); 
        $new_activity = $request->input('newactivity'); 
        $this->validate($request, ['oldactivity' => 'required','newactivity' => 'required|unique:Scheduled_Activity,activity_name|max:100']);
        $user=$request->session()->get('user');
        \DB::table('Scheduled_Activity')
            ->where('activity_name', $old_activity)
            ->update(['activity_name' => $new_activity ,  'updated_at'=>\Carbon\Carbon::now()]);
        return redirect()->route('cocoordinator/welcome')->with('message', 'Successfull !!');
    }

    public function deleteactivity( Request $request){
        $old_activity = $request->input('oldactivity'); 
        $user=$request->session()->get('user');
        $this->validate($request, ['oldactivity' => 'required']);
        $club=\DB::table('Gymkhana_Club_Cocoordinator')->where('coco_student_id', $user)->first();
        \DB::table('Scheduled_Activity')
            ->where('activity_name', $old_activity)
            ->where('Scheduled_Activity.club_name',$club->club_name)
            ->delete();
        return redirect()->route('cocoordinator/welcome')->with('message', 'Successfull !!');
    }

    public function insertactivity( Request $request){
        $new_activity = $request->input('newactivity');
        $this->validate($request, ['newactivity' => 'required|unique:Scheduled_Activity,activity_name|max:100']); 
        $user=$request->session()->get('user');
        $club=\DB::table('Gymkhana_Club_Cocoordinator')->where('coco_student_id', $user)->first();
        \DB::table('Scheduled_Activity')
            ->insert(['activity_name' => $new_activity, 
                        'club_name' => $club->club_name , 
                        "created_at" =>  \Carbon\Carbon::now(),
                         "updated_at" => \Carbon\Carbon::now(),]);
        return redirect()->route('cocoordinator/welcome')->with('message', 'Successfull !!');
    }

    public function deletemember( Request $request){
        $old_member = $request->input('oldmember'); 
        $this->validate($request, ['oldmember' => 'required']);
        $user=$request->session()->get('user');
        $club=\DB::table('Gymkhana_Club_Cocoordinator')->where('coco_student_id', $user)->first();
        \DB::table('Club_Members')
            ->where('student_id', $old_member)
            ->where('Club_Members.club_name',$club->club_name)
            ->delete();
        return redirect()->route('cocoordinator/welcome')->with('message', 'Successfull !!');
    }

    public function insertmember( Request $request){
        $new_member = $request->input('newmember'); 
        $user=$request->session()->get('user');
        $club=\DB::table('Gymkhana_Club_Cocoordinator')->where('coco_student_id', $user)->first();
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
            return redirect()->route('cocoordinator/welcome')->with('message', 'Successfull !!'); 
        }
        return redirect()->route('cocoordinator/welcome')->with('message', 'Member Already Exist!!');
    }

}
