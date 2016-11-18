<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Routing\Controller;

use Zizaco\Entrust\Traits\EntrustRoleTrait;

use Auth;

class counsellingcontroller extends Controller
{
   public function main(){
		return view('/cou/index');
	}

	


	public function attachRole($role){

		$user = \App\users::where('username',Auth::user()->username)->first();

        $admin = \App\Role::where('name','=',$role)->get()->first();

		$user->attachRole($admin);

        return back()->with('role-attached','Role Successfully attached to '.Auth::user()->username);
	}
	
	//=========================counselling controllers===================================
	
	public function form(Request $req)
	{
		\DB::table('application_assistant_coordinator')->insert(['student_id' => $req->username, 'cpi' => $req->cpi]);
		
        return back()->with('alert-success','Record Successfully Added!!');
	}
	//student guide form
	
	public function stu_guide_form(Request $req)
	{
	\DB::table('application_student_guide')->insert(['name' => $req->name, 'student_id' => $req->stuid, 'cpi' => $req->cpi,'branch' => $req->branch, 'reason' => $req->reason]);	
	    
		return back()->with('alert-success','Record Successfully Added!!');
	}
	
	//assistant coordinator form
	
	public function asst_coor_form(Request $req)
	{
	\DB::table('application_assistant_coordinator')->insert(['name' => $req->name, 'student_id' => $req->stuid, 'cpi' => $req->cpi,'branch' => $req->branch, 'reason' => $req->reason]);	
	    
		return back()->with('alert-success','Record Successfully Added!!');
	}
	
	//study material post

	public function studymaterial(Request $req)
	{
	\DB::table('study_material')->insert(['student_id' => Auth::user()->username, 'course_id' => $req->coursecode, 'description' => $req->description,'url' => $req->url]);	
	
        
		return back()->with('alert-success','Record Successfully Added!!');
	}
	
	
		
	
	// study material
	public function studyymaterial(Request $req)
	{
		 
		$c = \DB::table('study_material')->get();
		return view('/cou/downloads',compact('c'));
	}
	
	//problem portal
	public function problemmportal(Request $req)
	{
		 
		$c = \DB::table('public_post')->get();
		$d = \DB::table('answers')->get();
		return view('/cou/problemportal',compact('c','d'));
	}
	//answer submission
	
	public function answers(Request $req,$cc)
	{
		
	\DB::table('answers')->insert(['pid' => $cc, 'des_ans' => $req->ans, 'student_id' =>  Auth::user()->username ]);
	return back()->with('alert-success','Record Successfully Added!!');
	}
	
	
	//--------------------post public problem--------------
	
	public function problem(Request $req)
	{
	\DB::table('public_post')->insert(['student_id' => Auth::user()->username, 'description' => $req->description,]);	
	//, 'updated_at' => new DateTime, 'created_at' => new DateTime
        
		return back()->with('alert-success','Record Successfully Added!!');
	}
	
	//---------------------Student guides list--------------
	public function stuguide(Request $req)
	{
		 
		$c = \DB::table('student_guide')->get();

		$d = \DB::table('student_guide_assign')->get();
		return view('/cou/show_sg',compact('c','d'));
	}
	//------------------assistant coordinator list---------------
	public function assistcoord(Request $req)
	{
		 
		$c = \DB::table('assistant_coordinator')->get();
		$d = \DB::table('assistant_coordinator_assign')->get();
		return view('/cou/show_assist',compact('c','d'));
	}
	//----------------------------assistant_coordinator application_assistant_coordinator---------
	public function assistcoordapp(Request $req)
	{
		$c = \DB::table('application_assistant_coordinator')->get();
		return view('/cou/ac_applications',compact('c'));
	}
	//-------------------------------stu_guide_application---------------
	public function stuguideapp(Request $req)
	{
		 
		$c = \DB::table('application_student_guide')->get();
		return view('/cou/sg_applications',compact('c'));
	}
	
	//private portal
	public function privateportal(Request $req)
	{
		$sg_count = \DB::table('student_guide')->where('stuguide_id','=', Auth::user()->username)->count();
		$as_count = \DB::table('assistant_coordinator')->where('assist_id','=', Auth::user()->username)->count();
		
		$c = \DB::table('private_post')->get();
		$d = \DB::table('private_ans')->get();
	
		return view('/cou/privatediscussion',compact('c','d','sg_count','as_count'));
	}
	//faculty admin access portal
	public function adminportal(Request $req)
	{
		
		//if (Auth::user()->user_type == 'faculty'){
			return view('/cou/faculty');
		//}
		//else{        
          //  return Redirect::to('/main')->with('alert-if-faculty','Sorry!! you can not access this link');
		//}
	}
	
	
	//--------------------post private problem--------------
	
	public function privatequestion(Request $req)
	{
		$g = \DB::table('student_guide_assign')->where('student_id','=', Auth::user()->username)->first();
		$a = \DB::table('assistant_coordinator_assign')->where('stuguide_id', $g->stuguide_id )->first();
		
		\DB::table('private_post')->insert(['student_id' => Auth::user()->username, 'question' => $req->description, 'sg_id' => $g->stuguide_id, 'ac_id' => $a->assist_id,]);	
		
		return back()->with('alert-success','Record Successfully Added!!');
	}
	
	//-------------------------------private answer--------------------
	
	public function privateanswer(Request $req,$cc)
		{
		
		\DB::table('private_ans')->insert(['pid' => $cc, 'answer_desc' => $req->ans, 'student_id' =>  Auth::user()->username ]);
		return back()->with('alert-success','Record Successfully Added!!');
		}
}
