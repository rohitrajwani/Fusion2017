<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Customer;
use App\Ta_Attendance;
use App\ranjeet;
use App\ta_applied;
use App\Applied_For_TA;
use App\Ta_Post_Openings;
use Auth;
use Illuminate\Support\Facades\Input;
session_start();

class CardsController extends Controller
{

    public function index()
    {
        
        $id = Auth::user()->username;//'H1';//assumed id retrieved from the session. This id will be passed throughout the module.
        $_SESSION['id']=$id;
        $check_student=DB::table('Student')->where('student_id',$id)->where('programme','M.TECH')->get();//check if the id belongs to a PG Student
        $check_faculty=DB::table('Faculty')->where('faculty_id',$id)->get();//check if the id belongs to a Faculty
        $faculty_name = ['NA'];

        if(count($check_student)==1){//if the id belongs to a TA

            $ta_of_course=DB::table('Ta')->where('student_id',$id)->pluck('course_id');//retrive the details of the Student from Ta table
            if(count($ta_of_course)>0)//if the PG student is a Ta
            {   
                $ta_of_faculty=DB::table('Course_Taken_By')->whereIn('course_id',$ta_of_course)->pluck('faculty_id');

                $faculty_name=DB::table('faculty')->where('faculty_id',$ta_of_faculty[0])->pluck('name');
                $_SESSION['student_ta']=1;
                unset($_SESSION['hod']);
                unset($_SESSION['student_not_ta']);
                unset($_SESSION['faculty']);
                return view('ta.page',compact('check_student','faculty_name'));
            }
            else{//if not a TA
                $_SESSION['student_not_ta']=1;
                unset($_SESSION['hod']);
                unset($_SESSION['student_ta']);
                unset($_SESSION['faculty']);
                
                return view('ta.page',compact('check_student','faculty_name'));
            }
        }
        elseif(count($check_faculty)==1 && $check_faculty->first()->designation=='HOD'){//if the id is of a faculty and has his designation as HOD
            $dept = $check_faculty->first()->department;//department of the HOD
            $_SESSION['hod']=1;$_SESSION['faculty']=1;
            //unset($_SESSION['faculty']);
            unset($_SESSION['student_ta']);
            unset($_SESSION['student_not_ta']);
            $courses = DB::table('Course')->where('department',$dept)->pluck('course_id');//pluck the courses under the department
            $as1 = DB::table('Ta')->whereIn('course_id',$courses)->pluck('student_id');//get the tas under the department's courses
            $tas1 = DB::table('Student')->whereIn('student_id',$as1)->get();//get the datails of the ta
       
            return view('ta.admin',compact('check_faculty','tas1'));
        }
        elseif (count($check_faculty)==1)//if the id belongs to a normal faculty
        {
            $_SESSION['faculty']=1;
            unset($_SESSION['hod']);
            unset($_SESSION['student_ta']);
            unset($_SESSION['student_not_ta']);
            $course1 = \DB::table('Course_Taken_By')->where('faculty_id',$id)->pluck('course_id');//curse taken by faculty
            $as1 = DB::table('Ta')->whereIn('course_id',$course1)->pluck('student_id');//tas in the courses under the faculty
            $tas1 = DB::table('Student')->whereIn('student_id',$as1)->get();//get ta details from students table
       
            return view('ta.faculty',compact('check_faculty','tas1'));
        }
        else
        {
            return redirect('/')->with('alert','You are not allowed to view this page!!');
        }
    }   


    
    public function about()
    {
        return view('ta.faculty');
    }



    public function timetable()
    {
        return view('ta.timetable');
    }



    public function taapplication()
    {

        $id=$_SESSION['id'];

        $taapplyfor = DB::table('Applied_For_TA')->where('student_id',$id)->orderby('preference_no')->get();//already aplied courses
        
        $aa=[''];
        foreach ($taapplyfor as $key){
            array_push($aa, $key->course_id);
        }


        $DEPT=DB::table('Student')->where('student_id',$id)->first()->branch;
        $course=DB::table('Course')->where('department',$DEPT)->pluck('course_id');
        

        $taopening=DB::table('Ta_Post_Openings')->whereIn('course_id',$course)->whereNotIn('course_id', $aa)->get();//ccourses for which he can apply --- time may clash

        $reg_courses = DB::table('Register_Course')->where('student_id',$id)->pluck('course_id');//registered courses by the PG student
        /*print_r($taopening);*/
        $busy_time1 = DB::table('Classroom_Slots')->whereIn('course_id',$reg_courses)->get();//Scheduled classes of the PG Student
        //print_r($busy_time1);
        $courses_free = [''];
        foreach($taopening as $row){
            //echo $row->course_id;
            $duty_time = DB::table('Classroom_Slots')->where('course_id',$row->course_id)->first();
            $flag=0;
           
            foreach($busy_time1 as $busy_time){
                if($busy_time->day != $duty_time->day){
                    continue;
                }
                if($duty_time->to_time >= $busy_time->from_time && $duty_time->from_time <= $busy_time->to_time){
                    $flag=1;break;
                }
                elseif($duty_time->to_time >= $busy_time->from_time && $duty_time->to_time <= $busy_time->to_time){
                    $flag=1;break;
                }
                elseif($busy_time->from_time >= $duty_time->from_time && $busy_time->from_time <= $duty_time->to_time){
                    $flag=1;break;
                }
                elseif($busy_time->to_time >= $duty_time->from_time && $busy_time->to_time <= $duty_time->to_time){
                    $flag=1;break;
                }
            }

            if($flag==0){
                array_push($courses_free,$row->course_id);
            }
        }
        $taopening = DB::table('Ta_Post_Openings')->whereIn('course_id',$courses_free)->get();
        //print_r($taopening);
       return view('ta.taapplyfor', compact('taapplyfor' ,'taopening'));


    }
    



    public function attendance()
    {

        $id=$_SESSION['id'];
        $course = \DB::table('Course_Taken_By')->where('faculty_id',$id)->pluck('course_id');
        //print_r($course);
        $as = DB::table('Ta')->whereIn('course_id',$course)->pluck('student_id');
        $tas=DB::table('Student')->whereIn('student_id',$as)->get();

        return view('ta.attendance',['tas'=>$tas]);
    
    }




    public function attendance_student()
    {
        $id=$_SESSION['id'];
        $Ta_Attendance_student = DB::table('Ta_Attendance')->where('student_id',$id)->get();
        return view('ta.attendance_student',['Ta_Attendance_student' => $Ta_Attendance_student]);
    
    }






    public function store_tapplication(Request $request)
    {
        $id=$_SESSION['id'];
        $user=new Applied_For_TA;
        $user->course_id=Input::get('course_id');

        $data=DB::table('Applied_For_TA')->where('student_id',$id)->pluck('preference_no');
        $n=count($data);

        //checking fro input validation
        if (Input::get('preference_no')=='')
        {
            
            $error ='Please enter the preference no!';
            return redirect()->back()->withErrors(array('f' => $error));

        }

        //checking for preference number validation
        for($i=0;$i<$n;$i++)
        {
            if ($data[$i]==Input::get('preference_no'))
            {
             
                $error ='You cannot enter the same preference no for two courses!';
                return redirect()->back()->withErrors(array('f' => $error));

            }
        }
    
        //entering prerfernce number out of bound

        $taapplyfor = DB::table('Applied_For_TA')->where('student_id',$id)->get();
        
        $aa=[''];
        foreach ($taapplyfor as $key )
         {

            array_push($aa, $key->course_id);
            
         }



        $DEPT=DB::table('Student')->where('student_id',$id)->first()->branch;
        $course=DB::table('Course')->where('department',$DEPT)->pluck('course_id');
        

        $taopening=DB::table('Ta_Post_Openings')->whereIn('course_id',$course)->get();
        
        if(Input::get('preference_no')<0 || count($taopening)<Input::get('preference_no'))
        {
                 $error ='Preference number Out of Bound!';
                 return redirect()->back()->withErrors(array('f' => $error));
        }


        $user->student_id=$id;
        $user->preference_no=Input::get('preference_no');

        
        $user->save();
        $error ='You Have Successfully Applied For Ta Post';
        return redirect()->back()->withErrors(array('g' => $error));  
    }



    //STORING ATTENDANCE  BY FACULTY

  public function attendance_store_faculty(Request $request)
    {
     $id=$_SESSION['id'];
     $course1 = \DB::table('Course_Taken_By')->where('faculty_id',$id)->pluck('course_id');
     $as1 = DB::table('Ta')->whereIn('course_id',$course1)->pluck('student_id');
     $tas1=DB::table('Student')->whereIn('student_id',$as1)->get();

     //print_r($tas1);

     $date1=(Input::get('attendance_mark'));
     $alreadymarked=DB::table('Ta_Attendance')->where('date',$date1)->where('student_id',$tas1[0]->student_id)->get();
     if(count($alreadymarked)>0)
     {
        $error='Attendace Already Marked';
        return redirect()->back()->withErrors(array('f' => $error));
     }

     foreach($tas1 as $key)
     {

        $use=new Ta_Attendance;
        $use->student_id=$key->student_id;
        
        $use->date=$date1;

        $use->attendance_status =Input::get($key->roll_no);
        $use->save();
         

     }
     $success='Attendace Has Been Marked Successfully';
     return redirect('TA/blade')->withErrors(array('f' => $success));

    }

//RETURNING VIEW TO THE POST OPENING

    public function post_opening()
    {
        $id=$_SESSION['id'];
        $dept=DB::table('Faculty')->where('faculty_id',$id)->pluck('department');
        $course=DB::table('course')->whereIn('department',$dept)->get();
        $courseid=DB::table('course')->where('department',$dept)->pluck('course_id');//courses of the department
        $already_applied = DB::table('Ta_Post_Openings')->whereIn('course_id',$courseid)->pluck('course_id');//courses for which openings already created
        $course = DB::table('course')->whereIn('department',$dept)->whereNotIn('course_id',$already_applied)->where('programme','B.TECH')
        ->get();
        
        if(count($course)==0){
            $aa = ['All Posts Are Already Created'];
        }
        $no=[];

        foreach($course as $c)
        {

            $n=DB::table('Register_Course')->where('course_id',$c->course_id)->pluck('student_id');
            $p=DB::table('Student')->whereIn('student_id',$n)->where('programme','B.TECH')->get();
            array_push($no, count($p));//no of students registered in each course in the department.
       
        }
      

            return view('ta.post_opening',compact('course','already_applied','no','aa'));
    }


//STORING TA POST OPENING BY HOD
      public function store_post_opening(Request $request)
      {
        
        $id=$_SESSION['id'];
        $dept=DB::table('Faculty')->where('faculty_id',$id)->pluck('department');
        $course=DB::table('course')->where('department',$dept)->get();


        foreach ($course as $key) 
        {
            $co=$key->course_id.'opening';
            $bat=$key->course_id.'Batches';
            $user=new Ta_Post_Openings;
            $flag=0;
            if((Input::get($co)==''))
            {
                $flag=1;
                $error="You have enter opening for all fields";
            }

            if(Input::get($co)<0)
            {
                $flag=1;
                $error="Enter Only Positive Number";
            }

            if((Input::get($bat)==''))
            {
                $flag=1;
                $error="You have enter Batches for all fields";
            }

            if(Input::get($bat)<0)
            {
                $flag=1;
                $error="Enter Only Positive Number";
            }
                if($flag==0){
                $user->no_of_openings=Input::get($co);
                $user->no_of_batches=(Input::get($bat));
                $user->course_id=$key->course_id;
                $user->save();
            }
            

        }
        $success='Post Has Been Created Successfully';
        return redirect('TA/blade')->withErrors(array('f' => $success));;

      }

      public function attendance_view()
      {
        $id=$_SESSION['id'];
        $course1 = \DB::table('Course_Taken_By')->where('faculty_id',$id)->pluck('course_id');
        $as1 = DB::table('Ta')->whereIn('course_id',$course1)->pluck('student_id');
        $tas1=DB::table('Student')->whereIn('student_id',$as1)->get();
        //print_r($tas1);
        return view('ta.attendance_view',compact('tas1'));
      }
}

