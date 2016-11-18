<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Claim;
use App\TA;
use App\Ta_feedback;
session_start();
class SupervisorController extends Controller
{
    public function show_claims(){
    	return view('ta.show_claims');//show assistantship Claims.
    }

    public function mnl_batch_assgn(){
    	return view('ta.mnl_batch_assgn');//manual batch assignment
    }

    public function save_batches(Request $request){
    	$post = $request->all();
        $id = $post['id'];//id of the faculty
        $course = \DB::table('Course_Taken_By')->where('faculty_id',$id)->pluck('course_id');//courses taken by faculty
        $ta = TA::whereIn('course_id',$course)->get();//tas under the faculty
    
        foreach($ta as $row){
        	
            if($post[$row->student_id]=='')
            {
                //echo count($ta);
                return redirect()->back()->withErrors(array('error','Select batches for all TA\'s'));//return error if studentid is left empty
            }
            else{
                TA::where('course_id', $row->course_id)->where('student_id',$row->student_id)
                    ->update(['batch' => $post[$row->student_id]]);//update  batch information of the student
            }
        }
        
        return redirect('TA/show_batches');
    }

    public function forward_claim(Request $request){//forward claims -- (post method)
    	$post = $request->all();

        $id = $post['faculty_id'];//get the faculty id
        $course = \DB::table('Course_Taken_By')->where('faculty_id',$id)->pluck('course_id');//get the courses under the faculty
        $tas = TA::whereIn('course_id',$course)->pluck('student_id');//get the students in the courses taken by the faculty
        $claims = Claim::whereIn('student_id',$tas)->where('status','0')->orderBy('month')->get();//get the claims with status 0
    	
    	foreach($claims as $row){

    		$stipend = $row->stipend - (($row->stipend * $post[$row->student_id.'stipend_penalty'])/100);
    		$i=1;
    		Claim::where('student_id',$row->student_id)
    				->where('month', $row->month)
    				->update(['ta_sup_comment' => $post[$row->student_id.'comment']  , 'status' => $i , 'stipend' => $stipend] );//updating the status along with updated stipend and ta comment
    		
       	}
        
        return redirect('TA/show_claims');
    }

    public function show_batches(){
        return view('ta.show_batches');//show the assigned batches of the ta's
    }

    public function feedback(){
       // echo "<script>console.log(".$_SESSION['faculty'].")</script>";
/*        if((isset($_SESSION['student_ta'])||isset($_SESSION['student_not_ta'])||isset($_SESSION['hod'])))
            {
                
            }
        else
        {

            $_SESSION['faculty'] = 1;
        }
            */
        return view('ta.feedback');//display the feedback form
    }

    public function save_feedback(Request $request){//save feedback 
        $post = $request->all();

        $v = \Validator::make($request->all(),
                             [
                                'id' =>'required',
                                 'descp' => 'required',
                                 'rating' => 'required',
                             ]);//validator for required fields
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());//return with errors
        }
        else{
            $feed = Ta_feedback::where('student_id',$post['id'])->get();
            if(count($feed)>0){
                return redirect()->back()->withErrors(array('id'=>'Feedback Already exists!'));//if feedback already exists
            }
            $f = new Ta_feedback;//create a model object
            $f->student_id = $post['id'];//id of the TA
            $f->description = $post['descp'];
            $f->rating = $post['rating'];

            if($f->save())//save feedback
            {
                    $success='Feedback Saved Successfully';
                    return redirect('TA/blade')->withErrors(array('f' => $success));
            }
            else
                return redirect()->back()->withErrors(array('id'=>'Record Could not be saved'));
        }
    }
    
}
