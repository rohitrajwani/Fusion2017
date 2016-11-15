<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Routing\Controller;

use Zizaco\Entrust\Traits\EntrustRoleTrait;

use Auth;

use Carbon\Carbon;

use DB;

class registerController extends Controller
{
    
	public function studentRegister(Request $request)
	{	
		$user=Auth::user();
		$username = $user->username;
		
		return view('SRS.student_register',['username'=>$username]);			
	}
	public function courseRegister()
	{
		$user=Auth::user();
		$username = $user->username;
				$semm = DB::table('student')->where('student_id',$username)->select('semester')->first();

		$courses = DB::table('course')->join('student','student.semester','=','course.sem')->get();
		return view('SRS.course_register',['username'=>$username,'sem'=>$semm, 'courses' => $courses]);
echo $student;
	}
	public function courseUpdate()
	{

		return view('SRS.course_update');

	}

	public function submitf(Request $request){

		$user=Auth::user();
		$student_id = $user->username;
		$avatar=$request->input('avatar');
		$roll=$request->input('roll');
		$email=$request->input('email');
		$name=$request->input('name');
		$dob=$request->input('dob');
		$f_name=$request->input('f_name');
		$m_name=$request->input('m_name');
		$p_add=$request->input('p_add');
		$htown=$request->input('htown');
		$state=$request->input('state');
		$c_address=$request->input('c_add');
		$sex=$request->input('cat');
		$cat=$request->input('catgr');
		$bg=$request->input('bg');
		$h_id=$request->input('h_id');
		$g_name=$request->input('g_name');
		$s_phone=$request->input('s_phone');
		$f_phone=$request->input('f_phone');
		$g_phone=$request->input('g_phone');
		$batch=$request->input('batch');
		$prg=$request->input('dept');
		$branch=$request->input('branch');
		$sem=$request->input('sem');
		$cpi=$request->input('cpi');
		$room=$request->input('room');
		$hall=$request->input('hall');
		$f_email=$request->input('f_email');
		$allb=$request->input('alla');
		$created_at = Carbon::now();
		$updated_at = Carbon::now();

		$flag=DB::table('student')->where('student_id',$student_id)->count();
		 if($flag==0) 
			 {


			DB::table('student')->insert(
						['student_id' => $student_id, 'avatar' => $avatar , 'roll_no' => $roll,'email'=>$email,'name'=>$name,'DOB'=>$dob,'fathers_name'=>$f_name,'mothers_name'=>$m_name,'permanent_address'=>$p_add,'hometown'=>$htown,'state'=>$state,'correspondence_address'=>$c_address,'sex'=>$sex,'category'=>$cat,'blood_group'=>$bg,'health_insurance_id'=>$h_id,'guardian'=>$g_name,'student_phone_no'=>$s_phone,'fathers_phone_no'=>$f_phone,'guardian_phone_no'=>$g_phone,'batch'=>$batch,'programme'=>$prg,'branch'=>$branch,'semester'=>$sem,'cpi'=>$cpi,'room_no'=>$room,'hall_no'=>$hall,'fathers_email_id'=>$f_email,'allah_account_no'=>$allb,'created_at'=>$created_at,'updated_at'=>$updated_at]);
		$message = 'Record successfully submitted';
			  return Redirect::to('/SRS/student_home')->with('alert',$message);

			}
				else
			 {
				 return redirect()->back()->with('alert', 'you are already a registered student');
			 }


	}
	
	public function viewCourse()
	{
	
		$user = Auth::user();
		$username = $user->username;
		$courses = DB::table('course')->join('student','student.semester','=','course.sem')->where('student.student_id',$username)->get();
		return view('SRS.view_course', [ 'courses' => $courses ]);
	}

}

