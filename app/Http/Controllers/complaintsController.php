<?php

namespace App\Http\Controllers;
use App\Http\Requests;

use App\Complaint;
use App\Role;
use App\Login;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\View;
use Illuminate\Http\Request;
use Auth;

class complaintsController extends Controller
{
	public function display(){
		$user=Auth::user();	
		$username=$user->username;    	
		$type=$user->user_type;			
		
		if($type=='student')
		{			
			$hallno=DB::table('student')->where('student_id',$username)->value('hall_no');
			
			$wardenid=DB::table('faculty_roles')->where('department',$hallno)->where('roles','warden')->value('faculty_id');
			$warden=DB::table('faculty')->where('faculty_id',$wardenid)->value('name');
			$wardenemail=DB::table('faculty')->where('faculty_id',$wardenid)->value('email');

			$awardenid=DB::table('faculty_roles')->where('department',$hallno)->where('roles','assistant warden')->value('faculty_id');
			$assistantwarden=DB::table('faculty')->where('faculty_id',$awardenid)->value('name');
			$awardenemail=DB::table('faculty')->where('faculty_id',$awardenid)->value('email');

			$cnt=DB::table('staff')->where('post','caretaker')->count();
			$caretaker=DB::table('staff')->where('post','caretaker')->pluck('name');
			$caretakeremail=DB::table('staff')->where('post','caretaker')->pluck('email');
			// $roleidw=Role::where('description','=',$hallno)->where('display_name','=','Warden')->value('id');
			// $facid=DB::table('role_user')->where('role_id',$roleidw)->value('user_id');
			// $facname=DB::table('faculty')->where('faculty_id',$facid)->value('name');

			// $roleidaw=Role::where('description','=',$hallno)->where('display_name','=','Assistant Warden')->value('id');
			// $facid=DB::table('role_user')->where('role_id',$roleidw)->value('user_id');
			// $afacname=DB::table('faculty')->where('faculty_id',$facid)->value('name');

			// $roleidc=Role::where('description','=',$hallno)->where('display_name','=','Caretaker')->pluck('id');						
			// $cnt=0;
			// foreach ($roleidc as $roleid) {
			// 	$staffids[$cnt]=DB::table('role_user')->where('role_id',$roleid)->value('user_id');
			// 	$cnt++;			
			// }
			// $count=0;
			// foreach ($staffids as $staffid) {
			// 	$carename[$count]=DB::table('staff')->where('staff_id',$staffid)->value('name');				
			// 	$count++;							
			// }											
			$complaints=Complaint::where('student_id','=',$username)->orderBy('complaint_id', 'desc')->get();	
			$pendingcomplaints=Complaint::where('status','=','unsolved')->where('student_id','=',$username)->count();
			$unsolvedcomplaints=Complaint::where('status','=','unsolved')->where('student_id','=',$username)->orderBy('complaint_id','desc')->get();
			$solvedcomplaints=Complaint::where('status','=','solved')->where('student_id','=',$username)->orderBy('complaint_id','desc')->get();				
			return view('hostelComplaints.student',compact('caretakeremail','wardenemail','awardenemail','complaints','cnt','pendingcomplaints','solvedcomplaints','unsolvedcomplaints','warden','assistantwarden','caretaker'));
		}

		if($type=='others')
		{		
			// $roles=DB::table('role_user')->where('user_id',$username)->get();			
			// foreach ($roles as $role) {
			// 	$sub=Role::where('id','=',$role->role_id)->where('name','=','caretaker')->value('description');				
			// }			
			/* if user is caretaker, he will be displayed all the complaints in descending order of date of complaint and also he will be shown pending and solved complaints and also the care-taker will be given an option to change the status of the complaint*/

			$sub=DB::table('staff')->where('staff_id',$username)->where('post','caretaker')->value('sub_department');			
			$name=DB::table('staff')->where('staff_id',$username)->where('post','caretaker')->value('name');
			$complaints=Complaint::where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
			$roomcomplaints=Complaint::where('category','=','room')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
			$washroomcomplaints=Complaint::where('category','=','wash room')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
			$readingroomcomplaints=Complaint::where('category','=','reading room')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
			$commonroomcomplaints=Complaint::where('category','=','common room')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
			$tvroomcomplaints=Complaint::where('category','=','tv room')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
			$othercomplaints=Complaint::where('category','=','others')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();								
			$pendingcomplaints=Complaint::where('status','=','unsolved')->where('hall_no','=',$sub)->count();			
			
		
			// $searchcomp=show();
			// return $searchcomp;
			return view('hostelComplaints.caretaker',compact('searchcomp','name','complaints','roomcomplaints','washroomcomplaints','readingroomcomplaints','commonroomcomplaints','othercomplaints','tvroomcomplaints','pendingcomplaints'));			
		}
		// else if($user->hasRole('warden')){

		// 	$roles=DB::table('role_user')->where('user_id',$username)->get();	

		// 	foreach ($roles as $role) {
		// 		$hallNo=Role::where('id','=',$role->role_id)->where('name','=','warden')->value('description');				
		// 	}					
		// 	$complaints=Complaint::where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
		// 	$roomcomplaints=Complaint::where('category','=','room')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
		// 	$washroomcomplaints=Complaint::where('category','=','washroom')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
		// 	$readingroomcomplaints=Complaint::where('category','=','readingroom')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
		// 	$commonroomcomplaints=Complaint::where('category','=','commonroom')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
		// 	$tvroomcomplaints=Complaint::where('category','=','tvroom')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
		// 	$othercomplaints=Complaint::where('category','=','others')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();					
		// 	$pendingcomplaints=Complaint::where('status','=','unsolved')->where('hall_no','=',$hallNo)->count();			
		// 	return view('hostelComplaints.warden',compact('complaints','roomcomplaints','washroomcomplaints','readingroomcomplaints','commonroomcomplaints','othercomplaints','tvroomcomplaints','pendingcomplaints'));			
		// }
		else if($type=='faculty'){
			$role=DB::table('faculty_roles')->value('roles');		
			$name=DB::table('faculty')->where('faculty_id',$username)->value('name');

			if($role=='warden'){

				/* if user is warden, he will be displayed all the complaints in descending order of date of complaint and also he will be shown pending and solved complaints and also the warden will be given an option to change the status of the complaint*/

				$hallNo=DB::table('faculty_roles')->where('roles',$role)->value('department');				
				
			}
			else if($role=='assistant warden')
			{
				/* if user is assisstant warden, he will be displayed all the complaints in descending order of date of complaint and also he will be shown pending and solved complaints and also the warden will be given an option to change the status of the complaint*/
				$hallNo=DB::table('faculty_roles')->where('roles',$role)->value('department');				
			}

			$complaints=Complaint::where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
			$roomcomplaints=Complaint::where('category','=','room')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
			$washroomcomplaints=Complaint::where('category','=','wash room')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
			$readingroomcomplaints=Complaint::where('category','=','reading room')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
			$commonroomcomplaints=Complaint::where('category','=','common room')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
			$tvroomcomplaints=Complaint::where('category','=','tv room')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();
			$othercomplaints=Complaint::where('category','=','others')->where('hall_no','=',$hallNo)->orderBy('complaint_id', 'desc')->get();					
			$pendingcomplaints=Complaint::where('status','=','unsolved')->where('hall_no','=',$hallNo)->count();			
			return view('hostelComplaints.warden',compact('name','complaints','roomcomplaints','washroomcomplaints','readingroomcomplaints','commonroomcomplaints','othercomplaints','tvroomcomplaints','pendingcomplaints'));			
		}
	}

	public function store(){
		$user=Auth::user();	
		$username=$user->username;    	
		$complaints=new Complaint();
		$complaints->student_id=$username;
		$complaints->hall_no=DB::table('student')->where('student_id',$username)->value('hall_no');
		$complaints->room_no=DB::table('student')->where('student_id',$username)->value('room_no');
		$complaints->category = Input::get("category");
		$complaints->sub_category = Input::get("sub_category");
		$complaints->description = Input::get("description");

		$complaints->save();

		return Redirect::to('/hostelComplaints')->with('alert','Complaint Registered Successfully');
	}

	public function update($complaint, Request $request){
		$comp=Complaint::find($complaint);		
		$comp->status=$request->status;
		$comp->save();
		return back();
	}
	public function show(Request $request){
		$user=Auth::user();	
		$username=$user->username;    	
		$type=$user->user_type;			
		$stuid=$request->search;	
		
		// $stuid=$request->search;
		$sub=DB::table('staff')->where('staff_id',$username)->where('post','caretaker')->value('sub_department');			
		$name=DB::table('staff')->where('staff_id',$username)->where('post','caretaker')->value('name');
		$complaints=Complaint::where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
		$roomcomplaints=Complaint::where('category','=','room')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
		$washroomcomplaints=Complaint::where('category','=','wash room')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
		$readingroomcomplaints=Complaint::where('category','=','reading room')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
		$commonroomcomplaints=Complaint::where('category','=','common room')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
		$tvroomcomplaints=Complaint::where('category','=','tv room')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();
		$othercomplaints=Complaint::where('category','=','others')->where('hall_no','=',$sub)->orderBy('complaint_id', 'desc')->get();								
		$pendingcomplaints=Complaint::where('status','=','unsolved')->where('hall_no','=',$sub)->count();			

		$searchcomp=Complaint::where('student_id','=',$stuid)->get();		
			// $searchcomp=show();

		return view('hostelComplaints.caretaker',compact('searchcomp','name','complaints','roomcomplaints','washroomcomplaints','readingroomcomplaints','commonroomcomplaints','othercomplaints','tvroomcomplaints','pendingcomplaints'));							
	}
}
