<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DeanStudentController extends Controller
{
    public function welcome( Request $request){
        $user=\Auth::user();
        $s=\DB::table('Faculty_Roles')
                ->where('faculty_id', $user)
                ->where('roles', '=', 'dean student')
                ->first();
        if($user->hasRole('dean_s')){
            $project = \DB::table('Project_by_Gymkhana')->get();
            $committees = \DB::table('Student_Committee') -> get();
            $notification = \DB::table('Notification')
                ->orderBy('created_at','desc')
                ->get();
            return view('deanstudent.welcome', compact('project','committees','notification'));           
        }
        else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
        }        
    }

     public function insertproject( Request $request){
        $old_project = $request->input('oldproject'); 
        $new_project = $request->input('newproject');
        $description = $request->input('description');
        $proposal_date = $request->input('proposaldate');
        $proposed_by = $request->input('by');
        $this->validate($request, ['newproject' => 'required|unique:Project_by_Gymkhana,project_name|max:100', 
                                    'description' => 'required|max:100', 
                                    'proposaldate' => 'required|date|before:today',
                                     'by' => 'required|max:100']);
        $user=\Auth::user()->username;       
        \DB::table('Project_by_Gymkhana')
            ->insert(['project_name' => $new_project, 
                        'project_description' => $description, 
                        'date_of_proposal' => $proposal_date, 
                        'proposed_by' => $proposed_by, 
                        "created_at" =>  \Carbon\Carbon::now(),
                         "updated_at" => \Carbon\Carbon::now(),]);
        return redirect()->route('deanstudent/welcome')->with('message', 'Successfull !!');
    }
    

    public function deleteproject( Request $request){

        $old_project = $request->input('oldproject'); 
        $this->validate($request, ['oldproject' => 'required']);
        \DB::table('Project_by_Gymkhana')
            ->where('project_name', $old_project)
            ->delete();
        return redirect()->route('deanstudent/welcome')->with('message', 'Successfull !!');
    }
  

    public function insertcommittee( Request $request){
        $new_committee = $request->input('newcommittee');
        $user=\Auth::user()->username;
        $description=$request->input('description');        
        $budget=$request->input('budget');
        $this->validate($request, ['newcommittee' => 'required|unique:Student_Committee,committee_name|max:100', 
                                    'description' => 'required|max:100',
                                    'budget'=>'required|integer|max:10000000|min:0']);

        \DB::table('Student_Committee')
            ->insert(['committee_name' => $new_committee, 
                        'description' => $description, 
                        'budget' => $budget, 
                        "created_at" =>  \Carbon\Carbon::now(),
                         "updated_at" => \Carbon\Carbon::now()]);
        return redirect()->route('deanstudent/welcome')->with('message', 'Successfull !!');
        
    }
    

    public function deletecommittee( Request $request){
        $old_committee = $request->input('oldcommittee'); 
        $this->validate($request, ['oldcommittee' => 'required']);       
        \DB::table('Student_Committee')
            ->where('committee_name', $old_committee)
            ->delete();
        \DB::table('Student_Committee_Members')
            ->where('committee_name', $old_committee)
            ->delete();
        return redirect()->route('deanstudent/welcome')->with('message', 'Successfull !!');
    }



    public function insertcommitteemember( Request $request){
        $student_id = $request->input('studentid');
        $committee_name = $request->input('committeename');
        $this->validate($request, ['studentid' => 'required|exists:student,student_id',
                                     'committeename' => 'required']);
        
        \DB::table('Student_Committee_Members')
            ->insert(['student_id' => $student_id,
                        'committee_name'=> $committee_name, 
                        "created_at" =>  \Carbon\Carbon::now(),
                         "updated_at" => \Carbon\Carbon::now(),]);
        return redirect()->route('deanstudent/welcome')->with('message', 'Successfull !!');
        
    }


    public function insertnotification( Request $request){
        $new_notification = $request->input('newnotification');
        $this->validate($request, ['newnotification' => 'required|max:1000']);
        
        $user=\Auth::user()->username;
        
        \DB::table('Notification')
            ->insert(['user_id' => $user, 
                        'user_type' => "faculty", 
                        'notification' => $new_notification, 
                        "created_at" =>  \Carbon\Carbon::now(),
                         "updated_at" => \Carbon\Carbon::now(),]);
        return redirect()->route('deanstudent/welcome')->with('message', 'Successfull !!');
    }
      


    
    public function deletenotification( Request $request){
        $old_notification = $request->input('oldnotification'); 
        $this->validate($request, ['oldnotification' => 'required']);
        
        \DB::table('Notification')
            ->where('notification', $old_notification)
            ->delete();
        return redirect()->route('deanstudent/welcome')->with('message', 'Successfull !!');
    }

}
