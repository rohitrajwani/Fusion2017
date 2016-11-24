<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller;
use Zizaco\Entrust\Traits\EntrustRoleTrait;
use Auth;
use DB;
use App\Student;
use App\Faculty;
use App\Staff;;
class dashboardController extends Controller
{
    
	public function login_check(){
		$userdata = array(
                'username' => Input::get('login_username'),
                'password' => Input::get('login_password')
        );
        // attempt to do the login
        if (Auth::attempt($userdata)) {
            $user = \App\User::where('username','=',$userdata['username'])->get()->first();
            Auth::login($user);
            return Redirect::to('/dashboard');

        } else {        
            return Redirect::to('/')->with('alert','Login Error!! Please check your Credentials');
        }
	}
	public function signup(Request $data){
		$user = new \App\User;
		$user->username = $data->username;
		$user->user_type = $data->type;
		$user->password = \Hash::make($data->password);
		$user->save();
		return back()->with('alert','Signup Successful, login to continue!!');
	}
	public function adminPanel(){
		return view('admin');
	}
	public function dashboard(){
		if(Auth::user()->user_type == 'admin'){
			return Redirect::to('/adminPanel');
		}
		else{
			if(Auth::user()->status == 0 OR Auth::user()->status == 1)
				return view('signup');
			else if(Auth::user()->status == 2)
				return view('dashboard');
		}
	}
	public function student_signup(Request $data){
		$student = new Student;
		$student->student_id = Auth::user()->username;
		$student->roll_no = $data->roll_no;
		$student->name = $data->name;
		$student->DOB = $data->dob;
		$student->email = $data->email;
		$student->fathers_name = $data->f_name;
		$student->mothers_name = $data->m_name;
		$student->permanent_address = $data->p_add;
		$student->hometown = $data->hometown;
		$student->state = $data->state;
		$student->correspondence_address = $data->c_add;
		$student->sex = $data->sex;
		$student->category = $data->category;
		$student->blood_group = $data->blood_group;
		$student->guardian = $data->g_name;
		$student->student_phone_no = $data->ph_no;
		$student->fathers_phone_no = $data->fph_no;
		$student->guardian_phone_no = $data->gph_no;
		$student->batch = $data->batch;
		$student->programme = $data->programme;
		$student->branch = $data->branch;
		$student->fathers_email_id = $data->f_mail;
		$student->semester = 1;
		$student->avatar = '/uploads/avatar';
		$student->cpi = 10.0;
		$student->room_no = 'D-302';
		$student->hall_no = 'Hall4';
		$student->save();
		DB::table('login')->where('username','=',Auth::user()->username)->update(['status' => 1]);
		return back();
	}
	public function faculty_signup(Request $data){
		$faculty = new Faculty;
		$faculty->faculty_id = Auth::user()->username;
		$faculty->name = $data->name;
		$faculty->DOB = $data->dob;
		$faculty->email = $data->email;
		$faculty->address = $data->p_add;
		$faculty->sex = $data->sex;
		$faculty->blood_group = $data->blood_group;
		$faculty->mobile_no = $data->ph_no;
		$faculty->alternate_email = $data->alt_mail;
		$faculty->department = $data->department;
		$faculty->designation = $data->designation;
		$faculty->about_me = $data->about;
		$faculty->save();
		DB::table('login')->where('username','=',Auth::user()->username)->update(['status' => 1]);
		return back();
	}
	public function staff_signup(Request $data){
		$staff = new Staff;
		$staff->staff_id = Auth::user()->username;
		$staff->name = $data->name;
		$staff->email = $data->email;
		$staff->address = $data->p_add;
		$staff->sex = $data->sex;
		// $staff->mobile_no = $data->ph_no;
		$staff->department = $data->department;
		$staff->sub_department = $data->sub_department;
		$staff->post = "Staff";
		$staff->save();
		DB::table('login')->where('username','=',Auth::user()->username)->update(['status' => 1]);
		return back();
	}
	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}
	public function attachRole($role){
		$user = \App\users::where('username',Auth::user()->username)->first();
        $admin = \App\Role::where('name','=',$role)->get()->first();
		$user->attachRole($admin);
        return back()->with('role-attached','Role Successfully attached to '.Auth::user()->username);
	}
	public function verifyUsers(){
		$students = DB::table('student')->join('login', 'student.student_id', '=', 'login.username')->where('login.status',1)->select('student.*', 'login.status')->get();
		$faculties = DB::table('faculty')->join('login', 'faculty.faculty_id', '=', 'login.username')->where('login.status',1)->select('faculty.*', 'login.status')->get();
		$staffs = DB::table('staff')->join('login', 'staff.staff_id', '=', 'login.username')->where('login.status',1)->select('staff.*', 'login.status')->get();
		return view('admin_verify',compact('students','faculties','staffs'));
	}
	public function approveStudents(Request $data){
		foreach($data->approved_students as $user){
			DB::table('login')->where('username',$user)->update(['status' => 2]);
		}
		return back();
	}
	public function approveFaculties(Request $data){
		foreach($data->approved_faculties as $user){
			DB::table('login')->where('username',$user)->update(['status' => 2]);
		}
		return back();
	}
	public function approveStaff(Request $data){
		foreach($data->approved_staffs as $user){
			DB::table('login')->where('username',$user)->update(['status' => 2]);
		}
		return back();
	}
}