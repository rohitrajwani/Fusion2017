<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FacultyController extends Controller
{
    
	public function welcome(Request $request){
		$user=\Auth::user(); 
    	if(\Auth::user()->user_type == 'faculty' ){
            $user=\Auth::user()->username;
    		$name = \DB::table('Faculty')->where('faculty_id', $user)->value('name');
			$notification = \DB::table('Notification')
							->orderBy('created_at','desc')
							->get();
            $clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			return view('student.welcome',compact('name','notification','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so ');
    	}
    }
 
 	public function project(Request $request){
 		$user=$request->session()->get('user');
    	$s=\DB::table('Faculty')->where('faculty_id', $user)->first();
    	if(\Auth::user()->user_type == 'faculty' ){
            $user=\Auth::user()->username;
    		$name = \DB::table('Faculty')->where('faculty_id', $user)->value('name');
			$project = \DB::table('Project_by_Gymkhana')->get();
		    $clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			return view('student.project',compact('name','project','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
    }

	public function senate(Request $request){
		$user=$request->session()->get('user');
    	$s=\DB::table('Faculty')->where('faculty_id', $user)->first();
    	if(\Auth::user()->user_type == 'faculty' ){
            $user=\Auth::user()->username;
    		$name = \DB::table('Faculty')->where('faculty_id', $user)->value('name');
    		$senate = \DB::table('Senate_Member')
	            ->join('Student', 'Senate_Member.student_id', '=', 'Student.student_id')
				->get();
			$meetings = \DB::table('Senate_Meeting')->get();
            $clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			return view('student.senate', compact('name','senate','meetings','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
    }

	public function committees(Request $request){
		$user=$request->session()->get('user');
    	$s=\DB::table('Faculty')->where('faculty_id', $user)->first();
    	if(\Auth::user()->user_type == 'faculty' ){
            $user=\Auth::user()->username;
    		$name = \DB::table('Faculty')->where('faculty_id', $user)->value('name');
    		$committees = \DB::table('Student_Committee')->get();
            $member = \DB::table('Student_Committee_Members')->get();
            $clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			return view('student.committees',compact('committees','member','name','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
    }


	public function guideline(Request $request){
		$user=$request->session()->get('user');
    	$s=\DB::table('Faculty')->where('faculty_id', $user)->first();
    	if(\Auth::user()->user_type == 'faculty' ){
            $user=\Auth::user()->username;
    		$name = \DB::table('Faculty')->where('faculty_id', $user)->value('name');
            $clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			return view('student.guideline',compact('name','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
    }

	public function club($club,Request $request){
		$user=$request->session()->get('user');
    	$s=\DB::table('Faculty')->where('faculty_id', $user)->first();
    	if(\Auth::user()->user_type == 'faculty' ){
            $user=\Auth::user()->username;
    		$name = \DB::table('Faculty')->where('faculty_id', $user)->value('name');
			$members = \DB::table('Club_Members')
	            ->join('Student', 'Club_Members.student_id', '=', 'Student.student_id')
				->where('Club_Members.club_name', $club)
				->get();
			$coordinators = \DB::table('Student')
	            ->join('Gymkhana_Club_Coordinator', 'Student.student_id', '=', 'Gymkhana_Club_Coordinator.coordinator_student_id')
				->where('Gymkhana_Club_Coordinator.club_name', $club)
				->get();
			$cocoordinators = \DB::table('Student')
	            ->join('Gymkhana_Club_Cocoordinator', 'Student.student_id', '=', 'Gymkhana_Club_Cocoordinator.coco_student_id')
				->where('Gymkhana_Club_Cocoordinator.club_name', $club)
				->get();		
			$activities = \DB::table('Scheduled_Activity')
					->where('Scheduled_Activity.club_name', $club)
					->get();				
            $clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			return view('student.club',compact('activities','members','coordinators','cocoordinators','club','name','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
    }

    public function election(Request $request){
    	$user=$request->session()->get('user');
    	$s=\DB::table('Faculty')->where('faculty_id', $user)->first();
    	if(\Auth::user()->user_type == 'faculty' ){
            $user=\Auth::user()->username;
    		$name = \DB::table('Faculty')->where('faculty_id', $user)->value('name');
            $clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			return view('student.noelection',compact('name','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
	}
}
