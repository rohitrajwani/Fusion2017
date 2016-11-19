<?php

namespace App\Http\Controllers\feedback_system;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use  App\question;

class HomeController extends Controller
{
    public function add(Request $request)   //admin insert page
    {
            $q = new question;
            $q->question_id=$request->question_id;
            $q->question= $request->question;
            $q->save();
            return redirect('/student_feedback/admin');
    }
    public function destroy(Request $request )  // admin delete page
    {  
        $x=DB::table('question_of_semester_feedback')->where('question_id','=', $request->question_id);
        $x->delete();
        return redirect('/student_feedback/admin');
    }
  

public function home1()
{

return view('student_feedback.home1');

    
}





    public function home($type1)  // home page
    {
        $id = Auth::user()->username;///assumed id to be taken by session.

        $course = DB::table('register_course')->where('student_id',$id)->pluck('course_id');
        $course_datails = DB::table('course')->whereIn('course_id',$course)->get();
        $fac = DB::table('course_taken_by')->whereIn('course_id',$course)->get();
        $name= DB::table('faculty')->get();
        	
            return view('student_feedback.home',[
            'course'=>$course_datails,'faculty'=>$fac,'name'=>$name,'id'=>$id,'type1'=>$type1
            ]);
    }


    public function feedback($cour,$facid,$id,$type1)  // feedback page
    {

        $semester=DB::table('semester_feedback')->get();
        $suggestion=DB::table('suggestions_by_students')->get();
        $questions=DB::table('question_of_semester_feedback')->get();
        return view('student_feedback.feedback',['semester'=>$semester,'suggestion'=>$suggestion,'questions'=>$questions,'cour'=>$cour,'facid'=>$facid,'id'=>$id,'type1'=>$type1]);
    }

   
    public function admin()  //admin page
    {

        return view('student_feedback.admin');
    }



public function sem()  //view page
   
    {
        return view('student_feedback.sem');


    }


public function view($type)  //view page
    {

         $faculty=DB::table('faculty')->get();

        return view('student_feedback.view',['faculty'=>$faculty,'type'=>$type]);


    }


  public function feedbackinsert(Request $req)  // feedback insert function
    {
        $num = 0;

        while ($num < $req['num']){
            DB::table('semester_feedback')->insert(['faculty_id'=>$req['facid'],'course_id'=>$req['cour'],'question_id'=>$num+1 ,'excellent'=>$req['group'.$num],'good'=>$req->id,'average'=>$req['type1'],'poor'=>0]);
            //echo ($num+1)." --> ".$req['group'.$num]."<br>";
            $num++;
        }

       DB::table('suggestions_by_students')->insert(['faculty_id'=>$req['facid'],'course_id'=>$req['cour'],'suggestion'=>$req['suggestion']]);
        
       $course = DB::table('course')->get();
        $fac = DB::table('course_taken_by')->get();
        $name= DB::table('faculty')->get();

        return view('student_feedback.home',[
            'course'=>$course,'faculty'=>$fac,'name'=>$name,'id'=>$req['id'],'type1'=>$req['type1']
            ]);

    }

  
    public function courses($fid,$type)  // course page
    {

        $cid = DB::table('course_taken_by')->where('faculty_id',$fid)->pluck('course_id');
       $course=DB::table('course')->whereIn('course_id',$cid)->get();


    return view('student_feedback.course',['course'=>$course, 'fid'=>$fid,'type'=>$type]);

    }

   
    public function review($cid) // review page
    {
      

        return view('student_feedback.review');
    }

    public function review1($fid,$cid,$type)  //review page
    {
        $questions = DB::table('question_of_semester_feedback')->get();
        $suggestion=DB::table('suggestions_by_students')->where('faculty_id',$fid)->where('course_id',$cid)->get();
        return view('student_feedback.review',['fid'=>$fid,'cid'=>$cid, 'questions'=>$questions,'suggestion'=>$suggestion,'type'=>$type]);

    }

}

 