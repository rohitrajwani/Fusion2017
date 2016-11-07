<?php

namespace App\Http\Controllers\PBI;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class ApplyController extends Controller
{
    

    public function apply()
    {
        return view('PBI.apply');

    }

   
    public function change()
    {
        return view('PBI.change');
    }


    public function index()
    {
      return view('/PBI/welcome_student');
    }



 public function welcome_faculty()
    {
        return view('/PBI/welcome_faculty');
    }


    public function welcome_chairman()
    {
        return view('PBI.welcome_chairman');
    }


    public function studentguidelines()
    {
       return view('PBI.guidelines');
    }

   

    public function chairmanguidelines()
    {
       return view('PBI.guidelineschairman');
    }


    public function facultyguidelines()
    {
       return view('PBI.guidelinesfaculty');
    }


     


     public function index5()
    {
       return view('PBI.reports');
    }




    public function index7()
    {
        return view('PBI.feedback');
    }

    public function feedbackchairman()
    {
        return view('PBI.feedbackchairman');
    }


    public function feedbackfaculty()
    {
        return view('PBI.feedbackfaculty');
    }

    public function topicupload()
    {
        return view('PBI.topic');
    }

    


    public function grades()
    {
        return view('PBI.grades');
    }



     public function marks()
    {
        return view('PBI.marks');
    }

 public function cse_committee()
    {
        return view('PBI.cse_committee');
    }
  public function ece_committee()
    {
        return view('PBI.ece_committee');
    }
    public function mech_committee()
    {
        return view('PBI.mech_committee');
    }
   


     /**public function pbi_topics()
    {
        $p = pbi::all();

        return view('pbi_topics', compact('p'));
    }

     
*/







  public function faculty_list()
    {
         $topics= \DB::table('faculty')
       ->join('pbi_topics','faculty.faculty_id','=','pbi_topics.faculty_id')
       ->select('faculty.*','pbi_topics.pbi_name')
       ->get();
        return view('/PBI/faculty_list', compact('topics'));
    }

    public function student_list()
    {
         $topics= \DB::table('pbi_status')
       ->join('all_student','pbi_status.student_id','=','all_student.student_id')
      
       ->select('all_student.*','pbi_status.pbi_name')
       ->get();
        return view('PBI.student_list', compact('topics'));
    }

    


    public function pbi_topics(Request $request)
    {
        
       $topics= \DB::table('pbi_topics')
       ->join('faculty','pbi_topics.faculty_id','=','faculty.faculty_id')
       ->select('pbi_topics.*','faculty.name')
       ->get();
        return view('PBI.pbi_topics', compact('topics'));
    
    }

   public function viewgrades_chair(Request $request)
    {
        
       $grades= \DB::table('grades')
       ->get();
        return view('PBI.viewgrades_chair', compact('grades'));
    
    }



/**public function viewtopic_of_faculty(Request $request)
    {
        
     /**  $report= \DB::table('pbi_reports')
       ->get();

        return view('PBI.viewreport', compact('report'));


           $topics= \DB::table('pbi_topics')
       ->join('faculty','pbi_topics.faculty_id','=','faculty.faculty_id')
       ->select('pbi_topics.*','faculty.name')
       ->where('faculty_id',Auth::user()->username)
       ->get();
        return view('PBI.apply1_1', compact('topics'));
    
    }*/


public function apply1()

{

return view('PBI.apply1');

}




/**public function apply1_1()
    {
         $topics= \DB::table('faculty')
       ->join('pbi_topics','faculty.faculty_id','=','pbi_topics.faculty_id')
       ->select('pbi_topics.pbi_name')
       ->get();
        return view('/PBI/apply1_1', compact('topics'));
    }
*/
    public function view_faculty_topic($k)
    {
         $topics= \DB::table('faculty')
       ->join('pbi_topics','faculty.faculty_id','=','pbi_topics.faculty_id')
       ->select('pbi_topics.pbi_name')
       ->where('faculty.name', $k)
       ->first();


        return view('/PBI/apply1_1', compact('topics'));
    }



public function viewreport(Request $request)
    {
        
        $row=\DB::table('faculty')
        ->where('faculty_id',Auth::user()->username)
        ->first();
        $name=$row->name;
        $report=\DB::table('pbi_reports')
        ->where('faculty_name',$name)
        ->get();

        return view('PBI.viewreport', compact('report'));
    
    }
    



    public function viewreport_chair(Request $request)
    {
        
       $report= \DB::table('pbi_reports')
       ->get();
        return view('PBI.viewreport_chair', compact('report'));
    
    }


    

    public function viewgrades(Request $request)
    {
        
       $grades= \DB::table('grades')
       ->get();
        return view('PBI.viewgrades', compact('grades'));
    
    }


    


    public function viewmarks(Request $request)
    {
        
       $marks= \DB::table('marks')
       ->get();
        return view('PBI.viewmarks', compact('marks'));
    
    }

    


    public function viewmarks_chair(Request $request)
    {
        
       $marks= \DB::table('marks')
       ->get();
        return view('PBI.viewmarks_chair', compact('marks'));
    
    }

     public function view_requests(Request $request)
    {
       $row=\DB::table('faculty')->where('faculty_id',Auth::user()->username)
       ->first();
       $name=$row->name;

       $grades = \DB::table('pbi_status')
       ->where('faculty_name',$name)
       ->get();
        return view('/PBI/view_requests', compact('grades'));
    
    }
    





public function changepbi(Request $req)
   {
            \DB::table('change_pbi')->insert(['application_date' => $req->date,'name' => $req->name,'student_id' => $req->rollno, 'branch' => $req->group1, 'old_pbi_name'=> $req->oldpbi,'old_type' => $req->oldtype,'reasons' => $req->reasons,'new_pbi_name' => $req->newpbi,'new_type' => $req->newtype,'new_mentor_info' => $req->newmentor]);
              return Redirect::to('/PBI/change')->with('alert','Record Succesfully submitted!');

   
   }

    public function apply_pbi(Request $req)
   {
            
             

          \DB::table('pbi_status')->insert(['student_id'=>Auth::user()->username,'faculty_name'=> $req-> faculty,'pbi_name' => $req->pbitopic,'type' => $req->type,'mentor_info' => $req->mentor]);
           return Redirect::to('/PBI/apply')->with('alert','Record Succesfully added!');
     /** if($a==TRUE)
           {
            return back()-> with('alert-success','Record Succesfully added!');
          }

          else
          {
             
             return Redirect::to('/PBI/apply')->with('Oops!','Looks like you have already applied!');

          }*/
           
   
   }



public function submit_topic(Request $req)
   {
            \DB::table('pbi_topics')->insert(['faculty_id' =>Auth::user()->username ,'pbi_name' => $req->pbi_topic,'pbi_description' => 
              $req->des]);
            return Redirect::to('/PBI/uploadtopic1')->with('alert','Successfully Submitted');

   
   }





    public function feedbackform(Request $req)
   {
            \DB::table('feedback')->insert(['firstname' => $req->first, 'lastname' => $req->last,'roll_no' => $req-> rollno, 'branch'=>$req->group1, 'pbiname' => $req->pbiname,'feedback' => $req->feedback,'rating' =>$req->rating
]);
              return Redirect::to('/PBI/feedback')->with('alert','Successfully Submitted');

   
   }
 



        



public function upload_report(Request $req)
   {

            $files = $req->file('reports');

           // $path1 = public_path().'/uploads/marks';

            $files->move(public_path().'/uploads/uploadreport/',$files->getClientOriginalName());

            \DB::table('pbi_reports')->insert(['student_id' =>Auth::user()->username,'faculty_name' => $req->faculty_name,'type' => $req->type,'path' =>$req->report]);
            return Redirect::to('/PBI/reports')->with('alert','Successfully Uploaded');
}

  

          
public function uploadmarks(Request $req)
   {

            $files = $req->file('marks');

           // $path1 = public_path().'/uploads/marks';

            $files->move(public_path().'/uploads/marks',$files->getClientOriginalName());

            \DB::table('marks')->insert(['branch' => $req->branch,'type' => $req->type,'path' =>$req->marksheet]);
              return Redirect::to('/PBI/marks')->with('alert','Successfully Uploaded');
}




   public function uploadgrades(Request $req)
   {

            $files = $req->file('grades');

           // $path2 = public_path().'/uploads/grades';

            $files->move(public_path().'/uploads/grades',$files->getClientOriginalName());
     \DB::table('grades')->insert(['type' => $req->type,'path' =>$req->gradesheet]);
           /**$grades = DB::table('grades')->get();
            foreach($grades as $grade){
              $grade->path = $grade->path.'/'.$req->file_name.'txt';
            }*/
             return Redirect::to('/PBI/grades')->with('alert','Successfully Uploaded');
   
 }







public function uploadschedule(Request $req)
   {

            $files = $req->file('schedules');

           // $path = public_path().'/uploads/uploadreport';

            $files->move(public_path().'/uploads/schedule',$files->getClientOriginalName());
         \DB::table('schedule')->insert(['branch' => $req->branch,'path' => $req->schedule]);
      return Redirect::to('/PBI/schedule')->with('alert','Successfully Uploaded');

   
}


public function viewschedule(Request $request)
    {
        
       $schedule= \DB::table('schedule')
       ->get();
      //$file = $request->file('path');
        return view('PBI.viewschedule', compact('schedule'));
    
    }




   public function details($k)
    {

        $topic = \DB::table('pbi_status')->where('student_id',$k)->first();
    
   
    $faculty_name = $topic->faculty_name;
     $pbi_name = $topic->pbi_name;
    $type = $topic->type;
    $mentor_info = $topic->mentor_info;
    
  return view('/PBI/grant', ['student_id' => $k,'faculty_name' => $faculty_name, 'pbi_name' => $pbi_name,'type' => $type,'mentor_info' => $mentor_info]);
    
   
    }




public function accept($k)
    {

            
            \DB::table('pbi_status')
            ->where('student_id', $k)
            ->update(['pbi_status' => "YES"]);
              return Redirect::to('/PBI/view_requests')->with('alert','Form Accepted');

}


public function decline($k)
    {

            
            \DB::table('pbi_status')
            ->where('student_id', $k)
            ->update(['pbi_status' => "NO"]);
          return Redirect::to('/PBI/view_requests')->with('alert','Succesfully Declined!Please Go back to view more forms');
}



public function schedule()


    {

 return view('PBI.schedule');          
          

}


}