<?php

namespace App\Http\Controllers\Training_and_Placement_Cell;

use Illuminate\Routing\Controller as Controller;

use App\StudentResume;
use App\StudentEducation;
use App\StudentAchievement;
use App\StudentCourses;
use App\StudentCertifications;
use App\StudentInterest;
use App\StudentInternships;
use App\StudentPatents;
use App\StudentProjects;
use App\StudentPublications;
use App\StudentResponsibility;
use App\StudentSkills;
use App\StudentTraining;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use DB;
use Auth;
use Request as Request8;
use Illuminate\Http\Request;

use App\Http\Requests;

class StudentFormController extends Controller
{
    //
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function create(){
        if(Auth::user()->user_type != 'student'){
            return Redirect::to('training_and_placement_cell');
        }
        $students = DB::table('All_Student')->where('student_id', '=', Auth::user()->username)->pluck('student_id');
        $student = DB::table('All_Student')->where('student_id', '=', Auth::user()->username)->get();
        return view('training_and_placement_cell.form.studentForm', compact('students', 'student'));
    }

    public function store(Request $request1, Request8 $request)
    {
    	// $request::input('objective');
        $validator = validator::make($request1->all(), [
            'objective'=>'required|max:255'
        ]);
        $validator1 = validator::make($request1->all(),[
            for($a = 1; $a <= $counter; $a++)
                'qualification'.$a=>'required',
                'institute'.$a=>'required',
                'performance'.$a=>'required|numeric',
                'year'.$a=>'required|numeric|max:4'
            
        ]);

        if($validator->fails() || $validator1->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        // foreach($this->request->get('qualification') as $key => $val)
        //  {
        //    $rules['qualification'.$key] = 'required';
        //  }

        else {
            $user = StudentEducation::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Education')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentAchievement::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Achievement')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentCertifications::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Cert')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentCourses::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Courses')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentInterest::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Interest')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentInternships::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Internship')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentPatents::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Patent')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentProjects::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Projects')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentPublications::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Publications')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentResponsibility::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Pos_Of_Resp')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentResume::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Objective')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentSkills::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Skills')->where('student_id', '=', Auth::user()->username)->delete();
            }

            $user = StudentTraining::where('student_id', '=', Auth::user()->username)->get();
            if ($user) {
               DB::table('St_Training')->where('student_id', '=', Auth::user()->username)->delete();
            }

            StudentResume::create([
                'objective' => $request::input('objective'),
                'student_id' => Auth::user()->username
                ]);

            // return Redirect::to('/');
            $counter = $request::input('dummy');
            for($a = 1; $a <= $counter; $a++){
                if($request::input('year'.$a)) {
                    StudentEducation::create([
                        'year' => $request::input('year'.$a),
                        'qualification' => $request::input('qualification'.$a),
                        'institute' => $request::input('institute'.$a),
                        'performance' => $request::input('performance'.$a),
                        'student_id' => Auth::user()->username
                        ]);
                }
                    
            }

            $counter1 = $request::input('dummy1');
            for($b = 1; $b <= $counter1; $b++){
                if($request::input('projName'.$b)) {
                    StudentProjects::create([
                        'name' => $request::input('projName'.$b),
                        'url' => $request::input('projUrl'.$b),
                        'year' => $request::input('projYear'.$b),
                        'description' => $request::input('projDesc'.$b),
                        'student_id' => Auth::user()->username
                        ]);
                }
                    
            }
            
            $counter2 = $request::input('dummy2');
            for($c = 1; $c <= $counter2; $c++){ 
                if($request::input('cname'.$c)) {
                   StudentCertifications::create([
                        'cert' => $request::input('cname'.$c),
                        'auth' => $request::input('cauth'.$c),
                        'licen' => $request::input('lno'.$c),
                        'year' => $request::input('cYear'.$c),
                        'url' => $request::input('curl'.$c),
                        'student_id' => Auth::user()->username
                        ]); 
                }
                    
            }
            
            $counter3 = $request::input('dummy3');
            for($d = 1; $d <= $counter3; $d++){
                if($request::input('orgname'.$d)) {
                    StudentResponsibility::create([
                        'org' => $request::input('orgname'.$d),
                        'role' => $request::input('role'.$d),
                        'year' => $request::input('resYear'.$d),
                        'student_id' => Auth::user()->username
                        ]);
                }
                    
            }
            
            $counter4 = $request::input('dummy4');
            for($e = 1; $e <= $counter4; $e++){
                if($request::input('coname'.$e)) {
                    StudentCourses::create([
                        'course' => $request::input('coname'.$e),
                        'auth' => $request::input('coauth'.$e),
                        'student_id' => Auth::user()->username
                        ]);
                }
                    
            }
            
            $counter5 = $request::input('dummy5');
            for($f = 1; $f <= $counter5; $f++){
                if($request::input('profile'.$f)) {
                    StudentInternships::create([
                        'profile' => $request::input('profile'.$f),
                        'org' => $request::input('org'.$f),
                        'location' => $request::input('loc'.$f),
                        'start_date' => $request::input('stdate'.$f),
                        'end_date' => $request::input('enddate'.$f),
                        'description' => $request::input('indesc'.$f),
                        'student_id' => Auth::user()->username
                        ]);
                }
                    
            }
            
            $counter6 = $request::input('dummy6');
            for($g = 1; $g <= $counter6; $g++){
                if($request::input('tname'.$g)) {
                    StudentTraining::create([
                        'training_name' => $request::input('tname'.$g),
                        'org' => $request::input('torg'.$g),
                        'location' => $request::input('tloc'.$g),
                        'start_date' => $request::input('tstdate'.$g),
                        'end_date' => $request::input('tenddate'.$g),
                        'description' => $request::input('tdesc'.$g),
                        'student_id' => Auth::user()->username
                        ]);
                }
                    
            }
            
            $counter7 = $request::input('dummy7');
            for($h = 1; $h <= $counter7; $h++){
                if($request::input('title'.$h)) {
                    StudentPublications::create([
                        'title' => $request::input('title'.$h),
                        'public' => $request::input('publisher'.$h),
                        'date' => $request::input('pdate'.$h),
                        'url' => $request::input('purl'.$h),
                        'description' => $request::input('pdesc'.$h),
                        'student_id' => Auth::user()->username
                        ]);
                }
                    
            }
            
            $counter8 = $request::input('dummy8');
            for($i = 1; $i <= $counter8; $i++){
                if($request::input('pOffice'.$i)) {
                    StudentPatents::create([
                        'patent_office' => $request::input('pOffice'.$i),
                        'application_no' => $request::input('ptname'.$i),
                        'title' => $request::input('ptitle'.$i),
                        'issue_date' => $request::input('isdate'.$i),
                        'inventors' => $request::input('inventors'.$i),
                        'pat_url' => $request::input('pturl'.$i),
                        'description' => $request::input('ptdesc'.$i),
                        'student_id' => Auth::user()->username
                        ]);
                }
                    
            }
            
            $counter9 = $request::input('dummy9');
            for($j = 1; $j <= $counter9; $j++){
                if($request::input('acorgname'.$j)) {
                    StudentAchievement::create([
                        'org' => $request::input('acorgname'.$j),
                        'event_name' => $request::input('acevname'.$j),
                        'year' => $request::input('acevYear'.$j),
                        'result' => $request::input('acres'.$j),
                        'student_id' => Auth::user()->username
                        ]);
                }
                    
            }
            
            $counter10 = $request::input('dummy10');
            for($k = 1; $k <= $counter10; $k++){
                if($request::input('interest'.$k)) {
                    StudentInterest::create([
                        'interest' => $request::input('interest'.$k),
                        'student_id' => Auth::user()->username
                        ]);
                }
                    
            }
            
            $counter11 = $request::input('dummy11');
            for($l = 1; $l <= $counter11; $l++){
                if($request::input('skills'.$l)) {
                    StudentSkills::create([
                        'skill' => $request::input('skills'.$l),
                        'student_id' => Auth::user()->username
                        ]);
                }
                    
            }
        }
        
        return redirect('/training_and_placement_cell')->with('message', 'Form Submitted Successfully!');
    }
}
