<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Claim;
use App\TA;

session_start();
class AdminController extends Controller
{
    //
    public function approve_claims(){//show the ta's claims forwarded by the corresponding TA supervisors.
    	return view('ta.approve_claims');
    }


    public function approve(Request $request){//approve claims of the TA's
    	$post = $request->all();
    	$claims = $post['claims'];
    	
    	foreach($claims as $row){
    		Claim::where('student_id',$row)->update(['status' =>'2']);//update the status of the Claims
    	}
    	

    	return redirect('TA/approve_claims');
    }

    public function view_feedback(){
            return view('ta.view_feedback1');
    }

    public function finalize(){
        $id = $_SESSION['id'];//Assuming the ID of the Admin or HOD
        $fac = \DB::table('Faculty')->where('faculty_id',$id)->first();
        $dept = $fac->department;//Depatment of the HOD
        $c = \DB::table('Course')->where('department',$dept)->pluck('course_id');//courses under the department headed by the HOD/Admin.
        
        $details = \DB::table('Applied_For_TA')->whereIn('course_id',$c)->get();
        $courses_obj = \DB::table('Applied_For_TA')->whereIn('course_id',$c)->groupby('course_id')->pluck('course_id');//Courses applied for
        $tas_obj = \DB::table('Applied_For_TA')->whereIn('course_id',$c)->groupby('student_id')->pluck('student_id');//Students those have applied to the courses in the department
        $courses = array();
        foreach ($courses_obj as $row) {
            array_push($courses, $row);
        }


        $tas = array();
        foreach ($tas_obj as $row) {
            array_push($tas, $row);
        }

        //prepare variables for MAX FLOW ALGORITHM
        $length = 1+count($tas)+count($courses)+1;//source + no of courses + no of tas + sink
        $sink = $length - 1;//last node is the sink
        $source = 0;//first node is the source
        $ta_offset = 1;
        $course_offset = 1+count($tas);
        

        $capacity = array();$cost = array();
        $capacity[0][0] = 0;$cost[0] = array_fill(0,$length,0);
        for($i=1;$i<1+count($tas);$i++)
            $capacity[0][$i] = 1;
        for(;$i<$length;$i++)
            $capacity[0][$i] = 0;
        
        for($i=1;$i<$length;$i++){
            $capacity[$i] = array_fill(0,$length,0);
            $cost[$i] = array_fill(0,$length,0);
        }

        foreach($details as $row){
            $t_index = $ta_offset + array_search($row->student_id, $tas);
            $c_index = $course_offset + array_search($row->course_id, $courses);
            $capacity[$t_index][$c_index] = 1;  
            $cost[$t_index][$c_index] = $row->preference_no;
        }

        $course_openings = \DB::table('Ta_Post_Openings')->whereIn('course_id',$courses)->get();
        foreach ($course_openings as $row) {
            $c_index = $course_offset + array_search($row->course_id, $courses);
            $capacity[$c_index][$length-1] = $row->no_of_openings;
        }

        $flow = new MinCostMaxFlow();
        $result = $flow->getMaxFlow($capacity,$cost,$source,$sink,$length);//applying the MAX FLOW algorithm for constraint resolution.

        \DB::table('Ta_Post_Openings')->whereIn('course_id',$courses)->update(['no_of_openings'=>'0']);
        for($i=$ta_offset;$i<$course_offset;$i++){
            for($j=$course_offset;$j<$length-1;$j++){
                if($result[$i][$j]>0){
                    //echo $tas[$i-$ta_offset]." --> ".$courses[$j-$course_offset]."<br>";
                    $ta_new = new TA;
                    $ta_new->student_id = $tas[$i-$ta_offset];
                    $ta_new->course_id = $courses[$j-$course_offset];
                    $ta_new->batch = 1;
                    $ta_new->default_stipend = 16000;

                    if(!$ta_new->save())
                        echo "Records Could not be saved!";
                    break;
                }
            }
        }

        return redirect('TA/show-tas');
    }

    public function show_tas(){//show the selected ta's for the courses in the department
        return view('ta.show_tas');
    }
}


//Class for MAX FLOW MIN COST Algorithm.    
Class MinCostMaxFlow {
    public $found = "";
    public $cap = ""; public $flow = ""; public $cost = ""; public $dad = ""; public $dist = ""; public $pip = "";      
    public $INF = 10000000000;

    
    function getMaxFlow($cap1, $cost1, $source, $sink, $N) {
        $this->cap = $cap1;
        $this->cost = $cost1;
    
        $this->found = array_fill(0,$N,0);;//new SplFixedArray($N);
        $this->flow = array_fill(0,$N,0);;//new SplFixedArray($N);
        for($i=0;$i<$N;$i++){
            $this->flow[$i] = array_fill(0,$N,0);//new SplFixedArray($N);
            for($j=0 ;$j<$N;$j++)
                $this->flow[$i][$j] = 0;
        }
        $this->dist = array_fill(0,$N+1,0);//new SplFixedArray($N+1);
        $this->dad = array_fill(0,$N,0);//new SplFixedArray($N);
        $this->pip = array_fill(0,$N,0);//new SplFixedArray($N);
        $totflow = 0;
        $totcost = 0;

        while( $this->search($source, $sink, $N) >0 ) {
            $amt = 1000000000;
            for ($x = $sink; $x != $source; $x = $this->dad[$x])
                $amt = min($amt, $this->flow[$x][$this->dad[$x]] != 0 ? $this->flow[$x][$this->dad[$x]] : $this->cap[$this->dad[$x]][$x] - $this->flow[$this->dad[$x]][$x]);
            
            for ($x = $sink; $x != $source; $x = $this->dad[$x]) {
            
                if ($this->flow[$x][$this->dad[$x]] != 0) {
                    $this->flow[$x][$this->dad[$x]] -= $amt;
                    $totcost -= $amt * $this->cost[$x][$this->dad[$x]];
                }
                else {
                    $this->flow[$this->dad[$x]][$x] += $amt;
                    $totcost += $amt * $this->cost[$this->dad[$x]][$x];
                }
                
            }
            $totflow += $amt;

        }
        
        return $this->flow;
    }
    
    function search($source, $sink, $N) {
        for($i=0;$i<$N;$i++)
            $this->found[$i] = 0;
        for($i=0;$i <= $N;$i++)
            $this->dist[$i] = 1000000000;//$INF;
        
        $this->dist[$source] = 0;

        while ($source != $N) {
            $best = $N;
            $this->found[$source] = 1;
            for ($k = 0; $k < $N; $k++) {
                
                if ($this->found[$k]==1)
                    continue;
                
                if ($this->flow[$k][$source] != 0) {
                    $val = $this->dist[$source] + $this->pip[$source] - $this->pip[$k] - $this->cost[$k][$source];
                
                    if ($this->dist[$k] > $val) {
                        $this->dist[$k] = $val;
                        $this->dad[$k] = $source;
                    }
                }
                
                if ($this->flow[$source][$k] < $this->cap[$source][$k]) {
                    $val = $this->dist[$source] + $this->pip[$source] - $this->pip[$k] + $this->cost[$source][$k];
                    if ($this->dist[$k] > $val) {
                        $this->dist[$k] = $val;
                        $this->dad[$k] = $source;
                    }
                }
                
                if ($this->dist[$k] < $this->dist[$best]) $best = $k;
                
            }
            
            $source = $best;
        }
        for ($k = 0; $k < $N; $k++)
            $this->pip[$k] = min($this->pip[$k] + $this->dist[$k], 1000000000);
        
        return $this->found[$sink];
    }
    
}
