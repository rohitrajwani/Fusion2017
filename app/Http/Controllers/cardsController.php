<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\laravel;
use App\bonafide;
use App\leave;
use App\branch_change;
use App\cec;
use App\seminar_committee;
use App\supervisor;
use App\seminar_report;
use Auth;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class cardsController extends Controller
{
    public function index(){
        $user = Auth::user()->username;
        if(Auth::user()->hasRole('ug_student')){
            return redirect('/acadaff/ug_student')->with('id',$user);
        }
        if(Auth::user()->hasRole('pg_student')){
            return redirect('/acadaff/students')->with('id',$user);
        }
        if(Auth::user()->hasRole('faculty')){
            return redirect('/acadaff/faculty')->with('id',$user);
        }
        if(Auth::user()->hasRole('hod_cse')){
            return redirect('/acadaff/admin')->with('id',$user);
        }
        if(Auth::user()->hasRole('Acad_staff')){
            return redirect('/acadaff/academic')->with('id',$user);
        }
        else{
            return redirect('/');
        }
    }
    
    public function first(){
        return view('students');
    }
    
    public function branch_change(Request $request)
    {
        $v = Validator::make($request->all(), [
            'Name' => 'required',
            'student_id' => 'required',
            'current_branch' => 'required',
            'expected_branch' => 'required',
            //'currrent_cpi' => 'required',
            'category' => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            $post = $request->all();
            $user= new branch_change;
            $user->status=0;
            //$user->name = $post["name"];
            $user->student_id = $post["student_id"];
            $user->current_branch=$post["current_branch"];
            $user->expected_branch=$post["expected_branch"];
            $user->current_cpi=$post["current_cpi"];
            $user->category=$post["category"];

            //$user->date=$post["date"];
            $user->save();
            
            
            if(Auth::user()->hasRole('pg_student'))
             return redirect('acadaff/students');
            else
                return redirect('acadaff/ug_student');
            
        }
    }
    public function cec(Request $request)
    {
        $v = Validator::make($request->all(), [
            'Name' => 'required',
            'student_id' => 'required',
           // 'date' => 'required',
            'title' => 'required',
            'cm1' => 'required',
            'cm2' => 'required',
            'cm3' => 'required',
            'cm4' => 'required',
            'cm5' => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
            //return redirect()->alert()->success('You have been logged out.', 'Good bye!');
        }
        else
        {
        
        $post = $request->all();
        $user= new cec;
        //$user->name = $post["name"];
        $user->student_id = $post["student_id"];
        $user->title = $post["title"];
        $user->approved_by=0;
        $user->cm1 = $post["cm1"];
        $user->cm2 = $post["cm2"];
        $user->cm3 = $post["cm3"];
        $user->cm4 = $post["cm4"];
        $user->cm5 = $post["cm5"];
        
        
       // $user->purpose=$post["purpose"];
        //$user->date=$post["date"];
        $user->save();
         return redirect('acadaff/students');
        }
    }
    public function ug()
    {
        return view('ug_student');
    }
     public function seminar_committee(Request $request)
    {
        $v = Validator::make($request->all(), [
            'Name' => 'required',
            'student_id' => 'required',
            'date' => 'required',
            'title' => 'required',
            'pcm1' => 'required',
            'pcm2' => 'required',
            'pcm3' => 'required',
            'pcm4' => 'required',
            'pcm5' => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
            //return redirect()->alert()->success('You have been logged out.', 'Good bye!');
        }
        else
        { 

            $post = $request->all();
            $user= new seminar_committee;
            //$user->name = $post["name"];
            $user->student_id = $post["student_id"];
            $user->title = $post["title"];
            $user->approved=0;
            $user->pcm1 = $post["pcm1"];
            $user->pcm2 = $post["pcm2"];
            $user->pcm3 = $post["pcm3"];
            $user->pcm4 = $post["pcm4"];
            $user->pcm5 = $post["pcm5"];


           // $user->purpose=$post["purpose"];
            //$user->date=$post["date"];
            $user->save();
            return redirect('acadaff/students');
        }
    }
    
    
     public function seminar_report(Request $request)
    {
        $v = Validator::make($request->all(), [
            'Name' => 'required',
            'student_id' => 'required',
            'date_of_seminar' => 'required',
            'discipline' => 'required',
            'theme' => 'required',
            'contribution' => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
            //return redirect()->alert()->success('You have been logged out.', 'Good bye!');
        }
        else
        {

            $post = $request->all();
            $user= new seminar_report;
            //$user->name = $post["name"];
            $user->student_id = $post["student_id"];
            //$user->discipline = $post["discipline"];
            $user->approved=0;
            $user->theme = $post["theme"];
            $user->contribution = $post["contribution"];


           // $user->purpose=$post["purpose"];
            //$user->date=$post["date"];
            $user->save();
             return redirect('acadaff/students');
        }
    }
    public function supervisor(Request $request)
    {
        
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'student_id' => 'required',
            'discipline' => 'required',
            'faculty_id' => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
           
        }
        else
        {
            $post = $request->all();
            $user= new supervisor;
            $user->status=0;
            //$user->name = $post["name"];
            $user->student_id = $post["student_id"];
           // $user->discipline = $post["discipline"];
            //$user->
            $user->faculty_id = $post["faculty_id"];
          //  $user->pcm5 = $post["pcm5"];


           // $user->purpose=$post["purpose"];
            //$user->date=$post["date"];
            $user->save();
            return redirect('acadaff/students');
        }
    }
    
    public function bonafide(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'student_id' => 'required',
            'purpose' => 'required',
            'date' => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
            //return redirect()->alert()->success('You have been logged out.', 'Good bye!');
        }
        else
        {
            $post = $request->all();
            $user= new bonafide;
            //$user->name = $post["name"];
            $user->student_id = $post["student_id"];
            $user->purpose=$post["purpose"];
            $user->status=0;
            //$user->date=$post["date"];
            $user->save();

            if(Auth::user()->hasRole('pg_student'))
             return redirect('acadaff/students');
            else
                return redirect('acadaff/ug_student');
        }
    }
    public function leave(Request $request)
    {
        $v = Validator::make($request->all(), [
            'Name' => 'required',
            'student_id' => 'required',
            'purpose' => 'required',
            'from_date' => 'required',
            'till_date' => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
            //return redirect()->alert()->success('You have been logged out.', 'Good bye!');
        }
        else
        {
        $post = $request->all();
        $user= new leave;
$user->status=0;
            //$user->name = $post["name"];
        $user->student_id = $post["student_id"];
        $user->from_date=$post["from_date"];
        $user->till_date=$post["till_date"];
        $user->subject = $post["student_id"];
        //=$post["from_date"];
        
        //$user->date=$post["date"];
        $user->save();
            
            if(Auth::user()->hasRole('pg_student'))
             return redirect('acadaff/students');
            else
                return redirect('acadaff/ug_student');
    }
}

    public function academic(){
        return view('academic');
    }
   
    public function bonafidenext(Request $request){
        
        $post=$request->all();
        $bonarequest = \DB::table('bonafide')->get();
        
        foreach($bonarequest as $user){
            if($post['bona'.$user->student_id.$user->receipt_no]==1){
                \DB::table('bonafide')->where('student_id',$user->student_id)->where('receipt_no',$user->receipt_no)
                    ->update(['status'=>'1']);
            }
            else{
                \DB::table('bonafide')->where('student_id',$user->student_id)->where('receipt_no',$user->receipt_no)
                    ->update(['status'=>'-1']);
            }
        }
        
        return redirect('acadaff/academic');
    }
    
    
     public function leavenext(Request $request){
        
        $post=$request->all();
        $leaverequest = \DB::table('student_leave_application')->get();
        
        foreach($leaverequest as $user){
            if($post['leave'.$user->student_id.$user->leave_no]==1){
                \DB::table('student_leave_application')->where('student_id',$user->student_id)->where('leave_no',$user->leave_no)
                    ->update(['status'=>'1']);
            }
            else{
                \DB::table('student_leave_application')->where('student_id',$user->student_id)->where('leave_no',$user->leave_no)
                    ->update(['status'=>'-1']);
            }
        }
        
        return redirect('acadaff/academic');
    }
    
       public function seminarnext(Request $request){
        
        $post=$request->all();
        $seminarrequest = \DB::table('seminar_committee')->get();
        foreach($seminarrequest as $user){
            if($post['seminar'.$user->student_id]==1){
                \DB::table('seminar_committee')->where('student_id',$user->student_id)->update(['approved'=>'1']);
            }
            else{
                \DB::table('seminar_committee')->update(['approved'=>'-1']);
            }
        }
        
        return redirect('acadaff/faculty');
    }
    
         public function cenext(Request $request){
        
        $post=$request->all();
        $cerequest = \DB::table('ce_committee')->get();
        
        foreach($cerequest as $user){
            if($post['ce'.$user->student_id]==1){
                \DB::table('ce_committee')->where('student_id',$user->student_id)->update(['approved_by'=>'1']);
            }
            else{
                \DB::table('ce_committee')->where('student_id',$user->student_id)->update(['approved_by'=>'-1']);
            }
        }
        
        return redirect('acadaff/faculty');
    }
     public function supervisornext(Request $request){
        
        $post=$request->all();
        $supervisorrequest = \DB::table('supervisor')->get();
        
        foreach($supervisorrequest as $user){
            if($post['supervisor'.$user->student_id]==1){
                \DB::table('supervisor')->where('student_id',$user->student_id)->update(['status'=>'1']);
            }
            else{
                \DB::table('supervisor')->where('student_id',$user->student_id)->update(['status'=>'-1']);
            }
        
        return redirect('acadaff/faculty');
                     }
    }
    
     public function s(Request $request){
        
        $post=$request->all();
        $semirr = \DB::table('seminar_report')->get();
        
        foreach($semirr as $user){
            if($post['semirr'.$user->student_id]==1){
                \DB::table('seminar_report')->where('student_id',$user->student_id)->update(['approved'=>'1']);
            }
            else{
                \DB::table('seminar_report')->where('student_id',$user->student_id)->update(['approved'=>'-1']);
            }
        
        return redirect('acadaff/faculty');
                     }
    }
                     
                     
   
    
    
    public function branch_next(Request $request){
        
        $post=$request->all();
        $branch_next = \DB::table('branch_change')->get();
        
        foreach($branch_next as $user){
            if($post[$user->student_id]==1){
                \DB::table('branch_change')->where('student_id',$user->student_id)->update(['status'=>'1']);
            }
            else{
                \DB::table('branch_change')->where('student_id',$user->student_id)->update(['status'=>'-1']);
            }
        }
        
        return redirect('acadaff/academic');
    }
   
   
     public function show(){
         
       
        return view('student_show');
    }
    public function faculty(){
        return view('faculty');
    }
    public function submission(){
        return view('student_show');
    }
    public function submission2(){
        return view('ug_student_show');
    }
    public function seminarnext2(Request $request){
        
        $post=$request->all();
        $seminarrequest = \DB::table('seminar_committee')->get();
        foreach($seminarrequest as $user){
            if($post['seminar'.$user->student_id]==1){
                \DB::table('seminar_committee')->where('student_id',$user->student_id)->update(['approved'=>'2']);
            }
            else{
                \DB::table('seminar_committee')->update(['approved'=>'-1']);
            }
        }
        
        return redirect('acadaff/admin');
    }
    public function cenext2(Request $request){
        
        $post=$request->all();
        $cerequest = \DB::table('ce_committee')->get();
        
        foreach($cerequest as $user){
            if($post['ce'.$user->student_id]==1){
                \DB::table('ce_committee')->where('student_id',$user->student_id)->update(['approved_by'=>'2']);
            }
            else{
                \DB::table('ce_committee')->where('student_id',$user->student_id)->update(['approved_by'=>'-1']);
            }
        }
        
        return redirect('acadaff/admin');
    }
    
    public function s2(Request $request){
        
        $post=$request->all();
        $semirr = \DB::table('seminar_report')->get();
        
        foreach($semirr as $user){
            if($post['semirr'.$user->student_id]==1){
                \DB::table('seminar_report')->where('student_id',$user->student_id)->update(['approved'=>'2']);
            }
            else{
                \DB::table('seminar_report')->where('student_id',$user->student_id)->update(['approved'=>'-1']);
            }
        
        return redirect('acadaff/admin');
                     }
    }
    
    public function supervisornext2(Request $request)
     {
        
        $post=$request->all();
        $supervisorrequest = \DB::table('supervisor')->get();
        
        foreach($supervisorrequest as $user){
            if($post['supervisor'.$user->student_id]==1){
                \DB::table('supervisor')->where('student_id',$user->student_id)->update(['status'=>'2']);
            }
            else{
                \DB::table('supervisor')->where('student_id',$user->student_id)->update(['status'=>'-1']);
            }
        
        return redirect('acadaff/admin');
                     }
    }
    public function admin()
    {
        return view('admin');
    }
    
}