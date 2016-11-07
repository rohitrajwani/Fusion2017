<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
 
	public function welcome(Request $request){
		$user=\Auth::user();
    	$s=\DB::table('Student')->where('student_id', $user)->first();
    	if(\Auth::user()->user_type == 'student'){
    		$user=\Auth::user()->username;
    		$name = \DB::table('Student')->where('student_id', $user)->value('name');
			$notification = \DB::table('Notification')
						->orderBy('created_at','desc')
						->get();
			$clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			return view('student.welcome',compact('name','notification','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
	}
 
	public function project(Request $request){
		$user=\Auth::user();
    	$s=\DB::table('Student')->where('student_id', $user)->first();
    	if(\Auth::user()->user_type == 'student'){
    		$user=\Auth::user()->username;
    		$name = \DB::table('Student')->where('student_id', $user)->value('name');
			$project = \DB::table('Project_by_Gymkhana')->get();
			$clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			return view('Student.project',compact('name','project','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
    }

	public function senate(Request $request){
		$user=\Auth::user();
    	$s=\DB::table('Student')->where('student_id', $user)->first();
    	if(\Auth::user()->user_type == 'student'){
    		$user=\Auth::user()->username;
    		$name = \DB::table('Student')->where('student_id', $user)->value('name');
			$senate = \DB::table('Senate_Member')
	            ->join('Student', 'Senate_Member.student_id', '=', 'Student.student_id')
				->get();
			$clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			$meetings = \DB::table('Senate_Meeting')->get();
			return view('student.senate', compact('name','senate','meetings','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
    }

	public function committees(Request $request){
		$user=\Auth::user();
    	$s=\DB::table('Student')->where('student_id', $user)->first();
    	if(\Auth::user()->user_type == 'student'){
    		$user=\Auth::user()->username;
    		$name = \DB::table('Student')->where('student_id', $user)->value('name');
			$committees = \DB::table('Student_Committee')->get();
			$member = \DB::table('student')
	            ->join('student_committee_members', 'student.student_id', '=', 'student_committee_members.student_id')
				->get();
			$clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			return view('student.committees',compact('committees','name','member','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
   }

	public function guideline(Request $request){
		$user=\Auth::user();
    	$s=\DB::table('Student')->where('student_id', $user)->first();
    	if(\Auth::user()->user_type == 'student'){
    		$user=\Auth::user()->username;
    		$name = \DB::table('Student')->where('student_id', $user)->value('name');
    		$clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
			return view('student.guideline',compact('name','clubs'));
    	}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
	}

	public function club($club,Request $request){
		$user=\Auth::user();
    	$s=\DB::table('Student')->where('student_id', $user)->first();
    	if(\Auth::user()->user_type == 'student'){
    		$user=\Auth::user()->username;
    		$name = \DB::table('Student')->where('student_id', $user)->value('name');
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
    	$user=\Auth::user();
    	
    	if(\Auth::user()->user_type == 'student'){
    		$user=\Auth::user()->username;
    		$s=\DB::table('Student')->where('student_id', $user)->first();
    		$name = \DB::table('Student')->where('student_id', $user)->value('name');
			$today = \Carbon\Carbon::today();
			$tonominate = \DB::table('Senate_Election')
							->where('batch',$s->batch)
							->where('nomination_last_date', '>=', $today)
							->get();
			$p = \DB::table('Senate_Election')
							->where('voting_last_date', '>=', $today)
							->get();
		
				foreach($p as $p1)
				{
				    $t[] = (array) $p1->election_name;
				}
			    $tovote = \DB::table('Senate_Election_Nominees')
			    				->where('batch',$s->batch)
			    				->where('branch',$s->branch)
			    				->where('approval',1)
								->whereIn('election_name', $t)
								->get();
				$forstatus = \DB::table('Senate_Election_Nominees')
			    				->where('nominee_id',$s->student_id)
								->get();
				$clubs = \DB::table('Gymkhana_Club_Coordinator')->get();
				$name = \DB::table('Student')->where('student_id', $user)->value('name');			
				return view('Student.election',compact('tonominate','tovote','forstatus','name','clubs'));
			
		}
    	else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    	}
    }


    public function nominate(Request $request){
    		$election_name = $request->input('election_name'); 
    		$cpi = $request->input('cpi'); 
		    $today = \Carbon\Carbon::today();
		 	$user=\Auth::user()->username;		 	
		 	$s=\DB::table('Student')->where('student_id', $user)->first();

		 	$count=\DB::table('Senate_Election_Nominees')
		 				-> where('election_name',$election_name)
		 				-> where('nominee_id', $user)
		 				->count();
		 	if($count==0){
			 	\DB::table('Senate_Election_Nominees')
	            	->insert(['election_name' => $election_name, 
	            			'nominee_id' => $user, 
	            			'votes' => 0,
	            			'branch' => $s->branch,
	            			'batch' => $s->batch,
	            			'approval' => 0,
	            			'cpi' => $cpi,
	                        "created_at" =>  \Carbon\Carbon::now(),
	                         "updated_at" => \Carbon\Carbon::now(),]);

            	return redirect()->route('student/election')->with('message', 'Successfull !!');
			}
			else
				return redirect()->route('student/election')->with('message', 'Already Nominated for the election !! You can see your approval status below.');

    }

    public function vote(Request $request){    		
			$election_name = $request->input('election_name'); 
    		$nominee_id = $request->input('nominee_id'); 
		    $today = \Carbon\Carbon::today();
		 	$user=\Auth::user()->username;		 	
		 	$s=\DB::table('Student')->where('student_id', $user)->first();

		 	$a=\DB::table('Senate_Election_Nominees')
		 				-> where('election_name',$election_name)
		 				-> where('nominee_id', $nominee_id)
		 				->first();

		 	if(!empty ( $a)){ // nominee exists
		 		$c=\DB::table('Senate_Election_Votes')
		 				-> where('election_name',$election_name)
		 				-> where('voter_id', $user)
		 				->count();
			 	if( $c ==1 ){  // already voted			 		
	            	return redirect()->route('student/election')->with('message', 'You already Voted for this election!!');
			 	}
			 	else{
			 		\DB::table('Senate_Election_Votes')
	            		->insert(['election_name' => $election_name, 
	            			'nominee_id' => $nominee_id, 
	            			'voter_id' => $user,
	                        "created_at" =>  \Carbon\Carbon::now(),
	                         "updated_at" => \Carbon\Carbon::now(),]);

				   \DB::table('Senate_Election_Nominees')
			            ->where('election_name', $election_name)
			            ->where('nominee_id', $nominee_id)
			            ->update(['votes' => $a->votes + 1,'updated_at'=>\Carbon\Carbon::now()]);         	

			 		return redirect()->route('student/election')->with('message', 'Successfull !!');
			 	}

            	
			}
			else
				return redirect()->route('student/election')->with('message', 'No such Nominee Exist for this election');

    }

}
