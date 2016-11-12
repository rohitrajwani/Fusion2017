<?php

namespace App\Http\Controllers\mess_management;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Redirect;
use DB;
use Auth;

$count=0;

class messcontroller extends Controller
{
	
	
	
	
	public function index(){
        if(Auth::user()->user_type=='student')
		{  
		       
	       $c = \DB::table('mess_registration')->where('student_id',Auth::user()->username)->pluck('mess_id');
		   
		  // return $c;
		   if(sizeof($c)!=0){
	       if($c[0] =="2"|| $c[0] == "1")
			   
		   return Redirect::to('mess_management/Student')->with('alert','Login Successful for '.Auth::user());}
		   else if(sizeof($c)==0)
			 return Redirect::to('mess_management/Register')->with('alert','Login Successful for '.Auth::user());
		}
	    else if(Auth::user()->user_type=='admin')
			//return Redirect::to('/dashboard')->with('alert','Login Successful for '.Auth::user());
			return Redirect::to('mess_management/Admin')->with('alert','Login Successful for '.Auth::user());
			else if(Auth::user()->user_type=='committee')
			//return Redirect::to('/dashboard')->with('alert','Login Successful for '.Auth::user());
			return Redirect::to('mess_management/Committee')->with('alert','Login Successful for '.Auth::user());
		else
			return Redirect::to('mess_management/Faculty')->with('alert','Login Successful for '.Auth::user());
    }
	
	public function giveorder(){
		return view('/mess_management/COrder');
	}
		
	
	
		public function leave(){
			return view('/mess_management/Leave');
		}
		
		public function sfeedback(){
		return view('/mess_management/SFeedback');
		
	}
	public function cfeedback(){
		return view('/mess_management/CFeedback');
		
	}
	
	
    public function leaveform(Request $req){
			\DB::table('mess_leave_application')->insert(['application_no' => Auth::user()->username, 'student_id' => Auth::user()->username,'from_date' => $req-> fdate, 'till_date'=> $req-> tdate,'reason' => $req->group1]);
			return back()-> with('alert-success','Record Succesfully added!');
			
		
	}
	public function register(Request $req){
			\DB::table('mess_registration')->insert(['student_id' => Auth::user()->username, 'mess_id' => $req->group1]);
			$c1=\DB::table('menu')->where('mess_id',1)->where('day',1)->get();
		$c2=\DB::table('menu')->where('mess_id',1)->where('day',2)->get();
		$c3=\DB::table('menu')->where('mess_id',1)->where('day',3)->get();
		$c4=\DB::table('menu')->where('mess_id',1)->where('day',4)->get();
		$c5=\DB::table('menu')->where('mess_id',1)->where('day',5)->get();
		$c6=\DB::table('menu')->where('mess_id',1)->where('day',6)->get();
		$c7=\DB::table('menu')->where('mess_id',1)->where('day',7)->get();
		$c8=\DB::table('menu')->where('mess_id',2)->where('day',1)->get();
		$c9=\DB::table('menu')->where('mess_id',2)->where('day',2)->get();
		$c10=\DB::table('menu')->where('mess_id',2)->where('day',3)->get();
		$c11=\DB::table('menu')->where('mess_id',2)->where('day',4)->get();
		$c12=\DB::table('menu')->where('mess_id',2)->where('day',5)->get();
		$c13=\DB::table('menu')->where('mess_id',2)->where('day',6)->get();
		$c14=\DB::table('menu')->where('mess_id',2)->where('day',7)->get();
		return view('/mess_management/Student',compact('c1','c2','c3','c4','c5','c6','c7','c8','c9','c10','c11','c12','c13','c14'));
			
			
		
	}
	public function sfeedbackform(Request $req){
			\DB::table('mess_feedback')->insert(['student_id' => Auth::user()->username,'cleanliness' => $req-> group1, 'service'=> $req-> group2,'behaviour' => $req->group3,'food_quality' => $req->group4,'timestamp' =>'2016-10-23 03:14:07.999999' ,'description' => $req->desc]);
			return back()-> with('alert-success','Record Succesfully added!');
	}
	public function cfeedbackform(Request $req){
			\DB::table('mess_feedback')->insert(['student_id' => Auth::user()->username,'cleanliness' => $req-> group1, 'service'=> $req-> group2,'behaviour' => $req->group3,'food_quality' => $req->group4,'timestamp' =>'2016-10-23 03:14:07.999999' ,'description' => $req->desc]);
			return back()-> with('alert-success','Record Succesfully added!');
	}
	public function corderform(Request $req){
			\DB::table('mess_order')->insert(['student_id' => Auth::user()->username,'breakfast' => $req-> breakfast, 'lunch'=> $req-> lunch,'dinner' => $req->dinner,'begin_date' => $req->from,'end_date' => $req->to]);
			return back()-> with('alert-success','Record Succesfully added!');
	}
	public function cvieworder(Request $req){
		$c=\DB::table('mess_order')->get();
		return view('/mess_management/Cvieworder',compact('c'));
	}
	public function svieworder(Request $req){
		$c=\DB::table('mess_order')->get();
		return view('/mess_management/Svieworder',compact('c'));
	}
	public function avieworder(Request $req){
		$c=\DB::table('mess_order')->get();
		return view('/mess_management/Avieworder',compact('c'));
	}
	public function viewleave(Request $req){
		$c=\DB::table('mess_leave_application')->get();
		return view('/mess_management/Viewleave',compact('c'));
	}
	public function sviewfeedback(Request $req){
		$c=\DB::table('mess_feedback')->get();
		return view('/mess_management/Sviewfeedback',compact('c'));
	}
	public function cviewfeedback(Request $req){
		$c=\DB::table('mess_feedback')->get();
		return view('/mess_management/Cviewfeedback',compact('c'));
	}
	public function aviewfeedback(Request $req){
		$c=\DB::table('mess_feedback')->select('student_id','description','cleanliness','service','behaviour','food_quality')->get();
		return view('/mess_management/Aviewfeedback',compact('c'));
	}
	
		public function placeorder(Request $req){
		$c=\DB::table('mess_order')->insert(['student_id' => Auth::user()->username,'breakfast' => $req->breakfast, 'lunch' => $req->lunch,'dinner' =>$req->dinner,'begin_date' => $req->from, 'end_date'=> $req->to]);;
		return back()-> with('alert-success','Record Succesfully added!');
	}
	
	public function login(Request $req){
		if($req->email=="talib@iiitdmj.ac.in" && $req->password=="XYZ")
		 return view('/mess_management/Admin');
	 if($req->email=="xyz@iiitdmj.ac.in" && $req->password=="XYZ")
		 return view('/mess_management/Committee');
	 if($req->email=="faculty@iiitdmj.ac.in" && $req->password=="XYZ")
		 return view('/mess_management/Faculty');
	 else
		 return view('/mess_management/Student');
	}
	public function billform(Request $req){
		$c=\DB::table('mess_bill')->insert(['student_id' => $req->roll, 'month' => $req->month,'amount' => $req->amount]);
			return back()-> with('alert-success','Record Succesfully added!');
	}
	public function sviewbill(Request $req){
		
		
		$c=\DB::table('mess_bill')->where('student_id',Auth::user()->username)->get();
		return view('/mess_management/Sviewbill',compact('c'));
}
public function cviewbill(Request $req){
		$c=\DB::table('mess_bill')->get();
		return view('/mess_management/Cviewbill',compact('c'));
}

	public function admin(request $req){
		$c1=\DB::table('menu')->where('mess_id',1)->where('day',1)->get();
		$c2=\DB::table('menu')->where('mess_id',1)->where('day',2)->get();
		$c3=\DB::table('menu')->where('mess_id',1)->where('day',3)->get();
		$c4=\DB::table('menu')->where('mess_id',1)->where('day',4)->get();
		$c5=\DB::table('menu')->where('mess_id',1)->where('day',5)->get();
		$c6=\DB::table('menu')->where('mess_id',1)->where('day',6)->get();
		$c7=\DB::table('menu')->where('mess_id',1)->where('day',7)->get();
		$c8=\DB::table('menu')->where('mess_id',2)->where('day',1)->get();
		$c9=\DB::table('menu')->where('mess_id',2)->where('day',2)->get();
		$c10=\DB::table('menu')->where('mess_id',2)->where('day',3)->get();
		$c11=\DB::table('menu')->where('mess_id',2)->where('day',4)->get();
		$c12=\DB::table('menu')->where('mess_id',2)->where('day',5)->get();
		$c13=\DB::table('menu')->where('mess_id',2)->where('day',6)->get();
		$c14=\DB::table('menu')->where('mess_id',2)->where('day',7)->get();
		return view('/mess_management/Admin',compact('c1','c2','c3','c4','c5','c6','c7','c8','c9','c10','c11','c12','c13','c14'));

}

public function committee1(Request $req){
			if($req->insert == 'Insert'){
			\DB::table('mess_committee')->insert(['mess_id' => 1, 'student_id' => $req->mem11,'member_name' => $req->name11]);
			\DB::table('role_user')->insert(['user_id' => $req->mem11,'role_id' => 70]);
			
			\DB::table('mess_committee')->insert(['mess_id' => 1, 'student_id' => $req->mem12,'member_name' => $req->name12]);
			\DB::table('role_user')->insert(['user_id' => $req->mem12,'role_id' => 70]);
			\DB::table('mess_committee')->insert(['mess_id' => 1, 'student_id' => $req->mem13,'member_name' => $req->name13]);
			\DB::table('role_user')->insert(['user_id' => $req->mem13,'role_id' => 70]);
			\DB::table('mess_committee')->insert(['mess_id' => 1, 'student_id' => $req->mem14,'member_name' => $req->name14]);
			\DB::table('role_user')->insert(['user_id' => $req->mem14,'role_id' => 70]);
			\DB::table('mess_committee')->insert(['mess_id' => 1, 'student_id' => $req->mem15,'member_name' => $req->name15]);
			\DB::table('role_user')->insert(['user_id' => $req->mem15,'role_id' => 70]);
			return back()-> with('alert-success','Record Succesfully added!');
			}
		else if($req->deleteall == 'Delete'){
		\DB::table('mess_committee')->delete();
		return back()-> with('alert-success','Record Succesfully added!');
		}
	}
	public function committee2(Request $req){
			\DB::table('mess_committee')->insert(['mess_id' => 2, 'student_id' => $req->mem11]);
			\DB::table('mess_committee')->insert(['mess_id' => 2, 'student_id' => $req->mem12]);
			\DB::table('mess_committee')->insert(['mess_id' => 2, 'student_id' => $req->mem13]);
			\DB::table('mess_committee')->insert(['mess_id' => 2, 'student_id' => $req->mem14]);
			\DB::table('mess_committee')->insert(['mess_id' => 2, 'student_id' => $req->mem15]);
			return back()-> with('alert-success','Record Succesfully added!');
			
		
	}
	public function reset(request $req){
		\DB::table('mess_registration')->delete();
		return back()-> with('alert-success','Record Succesfully added!');
	}
	
	public function updatemenu(Request $req){
			if($req->submit == 'Insert')
			{
				$c=\DB::table('menu')->insert(['mess_id' => $req->id, 'day' => $req->day , 'meal' => $req->meal , 'effective_from' => $req->eff , 'item_name' => $req->item]);
			return back()-> with('alert-success','Record Succesfully added!');
			
			}
			else if($req->submit == 'Update')
			{
				$c=\DB::table('menu')->where('day',$req->day)->where('mess_id',$req->id) ->where('meal',$req->meal)->update(['item_name' => $req->item]);
			return back()-> with('alert-success','Record Succesfully added!');
			}
			
		
	}
	
	public function committee(){
		
		$c1=\DB::table('menu')->where('mess_id',1)->where('day',1)->get();
		$c2=\DB::table('menu')->where('mess_id',1)->where('day',2)->get();
		$c3=\DB::table('menu')->where('mess_id',1)->where('day',3)->get();
		$c4=\DB::table('menu')->where('mess_id',1)->where('day',4)->get();
		$c5=\DB::table('menu')->where('mess_id',1)->where('day',5)->get();
		$c6=\DB::table('menu')->where('mess_id',1)->where('day',6)->get();
		$c7=\DB::table('menu')->where('mess_id',1)->where('day',7)->get();
		$c8=\DB::table('menu')->where('mess_id',2)->where('day',1)->get();
		$c9=\DB::table('menu')->where('mess_id',2)->where('day',2)->get();
		$c10=\DB::table('menu')->where('mess_id',2)->where('day',3)->get();
		$c11=\DB::table('menu')->where('mess_id',2)->where('day',4)->get();
		$c12=\DB::table('menu')->where('mess_id',2)->where('day',5)->get();
		$c13=\DB::table('menu')->where('mess_id',2)->where('day',6)->get();
		$c14=\DB::table('menu')->where('mess_id',2)->where('day',7)->get();
		return view('/mess_management/Committee',compact('c1','c2','c3','c4','c5','c6','c7','c8','c9','c10','c11','c12','c13','c14'));
	}
	public function student(){
		
		$c1=\DB::table('menu')->where('mess_id',1)->where('day',1)->get();
		$c2=\DB::table('menu')->where('mess_id',1)->where('day',2)->get();
		$c3=\DB::table('menu')->where('mess_id',1)->where('day',3)->get();
		$c4=\DB::table('menu')->where('mess_id',1)->where('day',4)->get();
		$c5=\DB::table('menu')->where('mess_id',1)->where('day',5)->get();
		$c6=\DB::table('menu')->where('mess_id',1)->where('day',6)->get();
		$c7=\DB::table('menu')->where('mess_id',1)->where('day',7)->get();
		$c8=\DB::table('menu')->where('mess_id',2)->where('day',1)->get();
		$c9=\DB::table('menu')->where('mess_id',2)->where('day',2)->get();
		$c10=\DB::table('menu')->where('mess_id',2)->where('day',3)->get();
		$c11=\DB::table('menu')->where('mess_id',2)->where('day',4)->get();
		$c12=\DB::table('menu')->where('mess_id',2)->where('day',5)->get();
		$c13=\DB::table('menu')->where('mess_id',2)->where('day',6)->get();
		$c14=\DB::table('menu')->where('mess_id',2)->where('day',7)->get();
		return view('/mess_management/Student',compact('c1','c2','c3','c4','c5','c6','c7','c8','c9','c10','c11','c12','c13','c14'));
	}
	
	public function faculty(){
		
		$c1=\DB::table('menu')->where('mess_id',1)->where('day',1)->get();
		$c2=\DB::table('menu')->where('mess_id',1)->where('day',2)->get();
		$c3=\DB::table('menu')->where('mess_id',1)->where('day',3)->get();
		$c4=\DB::table('menu')->where('mess_id',1)->where('day',4)->get();
		$c5=\DB::table('menu')->where('mess_id',1)->where('day',5)->get();
		$c6=\DB::table('menu')->where('mess_id',1)->where('day',6)->get();
		$c7=\DB::table('menu')->where('mess_id',1)->where('day',7)->get();
		$c8=\DB::table('menu')->where('mess_id',2)->where('day',1)->get();
		$c9=\DB::table('menu')->where('mess_id',2)->where('day',2)->get();
		$c10=\DB::table('menu')->where('mess_id',2)->where('day',3)->get();
		$c11=\DB::table('menu')->where('mess_id',2)->where('day',4)->get();
		$c12=\DB::table('menu')->where('mess_id',2)->where('day',5)->get();
		$c13=\DB::table('menu')->where('mess_id',2)->where('day',6)->get();
		$c14=\DB::table('menu')->where('mess_id',2)->where('day',7)->get();
		return view('/mess_management/Faculty',compact('c1','c2','c3','c4','c5','c6','c7','c8','c9','c10','c11','c12','c13','c14'));
	}
}






