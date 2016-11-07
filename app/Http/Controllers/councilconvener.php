<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class councilconvener extends Controller
{
    
    public function welcomet(Request $request){
        $user=\Auth::user();
        $faculty=\DB::table('Faculty_Roles')->where([
                    ['faculty_id', $user],
                    ['roles', '=', 'Technical Council Convener']
                ])->first();
        if($user->hasRole('tech_convenor')){  
            $user=\Auth::user()->username;
            $input='Technical';    
            $club=\DB::table('Gymkhana_Club_Coordinator')->where('type', $input)->get();
            return view('councilconvener.index', compact('club','input'));
        }
        return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    }
 

    public function welcomec(Request $request){
        $user=\Auth::user();
        $faculty=\DB::table('Faculty_Roles')->where([
                    ['faculty_id', $user],
                    ['roles', '=', 'Cultural Council Convener']
                ])->first();
        if($user->hasRole('cult_convenor') ){   
            $user=\Auth::user()->username;
            $input='Cultural';     
            $club=\DB::table('Gymkhana_Club_Coordinator')->where('type', $input)->get();
            return view('councilconvener.index', compact('club','input'));
        }
        else{
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
        }

    }

    public function welcomes(Request $request){
        $user=\Auth::user();
        $faculty=\DB::table('Faculty_Roles')->where([
                    ['faculty_id', $user],
                    ['roles', '=', 'Sports Council Convener']
                ])->first();
        if($user->hasRole('sport_convenor') ){  
            $user=\Auth::user()->username;
            $input='Sports';       
            $club=\DB::table('Gymkhana_Club_Coordinator')->where('type', $input)->get();
            return view('councilconvener.index', compact('club','input'));
        }
        else{
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
        }

    }


    public function updatebudget( Request $request){
        $new_budget = $request->input('newbudget'); 
        $clubname = $request->input('clubname'); 
        $this->validate($request, ['newbudget' => 'required|integer|max:1000000|min:0','clubname' => 'required']);
        $c=\DB::table('Gymkhana_Club_Coordinator')
            ->where('club_name', $clubname)
            ->first();
        $user=\Auth::user()->username;
        \DB::table('Gymkhana_Club_Coordinator')
            ->where('club_name', $clubname)
            ->update(['budget' => $new_budget, 'updated_at'=>\Carbon\Carbon::now()]);
        $input=$c->type;
        if($input == 'Technical'){
            return redirect()->route('councilconvener/welcomet')->with('message', 'Successfull !!');
        }
        elseif ($input == 'Cultural'){
            return redirect()->route('councilconvener/welcomec')->with('message', 'Successfull !!');
        }
        else{
            return redirect()->route('councilconvener/welcomes')->with('message', 'Successfull !!');
        }
        
    }

    public function insertclub( Request $request){
        $new_club_name = $request->input('newclubname'); 
        $new_club_co = $request->input('newclubco'); 
        $new_club_coco = $request->input('newclubcoco'); 
        $new_type = $request->input('newtype');
        $user=\Auth::user()->username;
        $this->validate($request, ['newclubname' => 'required|max:100',
                                'newclubco' => 'required|exists:student,student_id|max:100',
                                'newclubcoco' => 'required|exists:student,student_id|max:100',
                                'newtype' => 'required'
                                ]); 
        $u=\DB::table('Gymkhana_Club_Coordinator')->where('coordinator_student_id', $new_club_co)->count();
        $v=\DB::table('Gymkhana_Club_Cocoordinator')->where('coco_student_id', $new_club_coco)->count();
        if( $u==0 && $v ==0  ){
            \DB::table('Gymkhana_Club_Coordinator')
                ->insert(['coordinator_student_id' => $new_club_co, 
                            'club_name' => $new_club_name , 
                            'type' => $new_type,
                            'budget' => 0 ,
                            "created_at" =>  \Carbon\Carbon::now(),
                             "updated_at" => \Carbon\Carbon::now(),]);
             \DB::table('Gymkhana_Club_Cocoordinator')
                ->insert(['coco_student_id' => $new_club_coco, 
                            'club_name' => $new_club_name , 
                            "created_at" =>  \Carbon\Carbon::now(),
                             "updated_at" => \Carbon\Carbon::now(),]);
            \DB::table('Club_Members')
                ->insert(['student_id' => $new_club_coco, 
                            'club_name' => $new_club_name , 
                            "created_at" =>  \Carbon\Carbon::now(),
                             "updated_at" => \Carbon\Carbon::now(),]);
            \DB::table('Club_Members')
                ->insert(['student_id' => $new_club_co, 
                            'club_name' => $new_club_name , 
                            "created_at" =>  \Carbon\Carbon::now(),
                             "updated_at" => \Carbon\Carbon::now(),]);
             \DB::table('role_user')
                ->insert([ 'user_id' => $new_club_co, 'role_id' => 51]) ;  
            \DB::table('role_user')
                ->insert([ 'user_id' => $new_club_coco, 'role_id' => 52]) ;  

            $input=$new_type;
            if($input == 'Technical'){
                return redirect()->route('councilconvener/welcomet')->with('message', 'Successfull !!');
            }
            elseif ($input == 'Cultural'){
                return redirect()->route('councilconvener/welcomec')->with('message', 'Successfull !!');
            }
            else{
                return redirect()->route('councilconvener/welcomes')->with('message', 'Successfull !!');
            }
        }
        else {
            $input=$new_type;
            if($input == 'Technical'){
                return redirect()->route('councilconvener/welcomet')->with('message', 'Either Coordinator or Co-coordinator already have same responsiblity!!');
            }
            elseif ($input == 'Cultural'){
                return redirect()->route('councilconvener/welcomec')->with('message', 'Either Coordinator or Co-coordinator already have same responsiblity!!');
            }
            else{
                return redirect()->route('councilconvener/welcomes')->with('message', 'Either Coordinator or Co-coordinator already have same responsiblity!!');
            }
        }  

    }
        
    public function deleteclub( Request $request){
        $club_name = $request->input('clubname'); 
        $type = $request->input('type');
        $this->validate($request, ['clubname' => 'required','type' => 'required']);
        $user=\Auth::user()->username;
        $co=\DB::table('Gymkhana_Club_Coordinator')
                ->where('club_name', $club_name)
                ->first();   
        $co= $co->coordinator_student_id;  
        $coco=\DB::table('Gymkhana_Club_Cocoordinator')
                ->where('club_name', $club_name)
                ->first();     
        $coco= $coco->coco_student_id;     
        \DB::table('Gymkhana_Club_Coordinator')
                ->where('club_name', $club_name)
                ->where('type',$type)
                ->delete();

        \DB::table('role_user')
                ->where('user_id', $co)
                ->where('role_id', 51)
                ->delete();
        \DB::table('role_user')
                ->where('user_id', $co)
                ->where('role_id', 52)
                ->delete();
         
        $s=\DB::table('Gymkhana_Club_Coordinator')
                ->where('club_name', $club_name)
                ->where('type',$type)
                ->count();    
        if($s==0){
            \DB::table('Gymkhana_Club_Cocoordinator')
                ->where('club_name', $club_name)
                ->delete();
            \DB::table('Club_Members')
                ->where('club_name', $club_name)
                ->delete();

            

            $club=\DB::table('Gymkhana_Club_Coordinator')->where('type', $type)->get();
            $input=$type;
            if($input == 'Technical'){
                return redirect()->route('councilconvener/welcomet')->with('message', 'Successfull !!');
            }
            elseif ($input == 'Cultural'){
                return redirect()->route('councilconvener/welcomec')->with('message', 'Successfull !!');
            }
            else{
                return redirect()->route('councilconvener/welcomes')->with('message', 'Successfull !!');
            }
        }
        $club=\DB::table('Gymkhana_Club_Coordinator')->where('type', $type)->get();
        $input=$type;
            if($input == 'Technical'){
                return redirect()->route('councilconvener/welcomet')->with('message', 'Unsuccessfull Due to Some Reason ');
            }
            elseif ($input == 'Cultural'){
                return redirect()->route('councilconvener/welcomec')->with('message', 'Unsuccessfull Due to Some Reason');
            }
            else{
                return redirect()->route('councilconvener/welcomes')->with('message', 'Unsuccessfull Due to Some Reason');
            }
        
    }

    public function updateco( Request $request){
        $club_name = $request->input('clubname'); 
        $new_co = $request->input('newco');
        $type = $request->input('type');
        $this->validate($request, ['clubname' => 'required',
                                'newco' => 'required|exists:student,student_id|max:100',
                                'type' => 'required'
                                ]); 
        $user=\Auth::user()->username;
        $co=\DB::table('Gymkhana_Club_Coordinator')
                ->where('club_name', $club_name)->first();
        $coc= $co->coordinator_student_id; 
        \DB::table('role_user')
                ->where('user_id', $coc)
                ->where('role_id', 51)
                ->update(['user_id',$new_co]);
        $u=\DB::table('Gymkhana_Club_Coordinator')
                ->where('coordinator_student_id', $new_co)
                ->count();
        $t=\DB::table('Gymkhana_Club_Cocoordinator')
                ->where('coco_student_id', $new_co)
                ->count();
        $v=\DB::table('Senate_Member')
                ->where('student_id', $new_co)
                ->count();
        if($u==0 && $t==0 && $v<2 ){
            \DB::table('Club_Members')
                ->where('student_id', $co->coordinator_student_id)
                ->update(['student_id' => $new_co]);
            \DB::table('Gymkhana_Club_Coordinator')
                ->where('club_name', $club_name)
                ->update(['coordinator_student_id' => $new_co]);  
            $club=\DB::table('Gymkhana_Club_Coordinator')->where('type', $type)->get();
            $input=$type;
            if($input == 'Technical'){
                return redirect()->route('councilconvener/welcomet')->with('message', 'Successfull !!');
            }
            elseif ($input == 'Cultural'){
                return redirect()->route('councilconvener/welcomec')->with('message', 'Successfull !!');
            }
            else{
                return redirect()->route('councilconvener/welcomes')->with('message', 'Successfull !!');
            }
                  
        }
        $club=\DB::table('Gymkhana_Club_Coordinator')->where('type', $type)->get();
        $input=$type;
            if($input == 'Technical'){
                return redirect()->route('councilconvener/welcomet')->with('message', 'Already Hold Maximum Number of Position');
            }
            elseif ($input == 'Cultural'){
                return redirect()->route('councilconvener/welcomec')->with('message', 'Already Hold Maximum Number of Position');
            }
            else{
                return redirect()->route('councilconvener/welcomes')->with('message', 'Already Hold Maximum Number of Position');
            }
        
        
    }

    public function updatecoco( Request $request){
        $club_name = $request->input('clubname'); 
        $new_co = $request->input('newco');
        $type = $request->input('type');
        $this->validate($request, ['clubname' => 'required',
                                'newco' => 'required|exists:student,student_id|max:100',
                                'type' => 'required'
                                ]); 
        $user=\Auth::user()->username;
        $coco=\DB::table('Gymkhana_Club_Cocoordinator')
                ->where('club_name', $club_name)->first();
        $coc= $co->coco_student_id; 
        \DB::table('role_user')
                ->where('user_id', $coc)
                ->where('role_id', 52)
                ->update(['user_id',$new_co]);
        $u=\DB::table('Gymkhana_Club_Cocoordinator')
                ->where('coco_student_id', $new_co)
                ->count();
        $t=\DB::table('Gymkhana_Club_Coordinator')
                ->where('coordinator_student_id', $new_co)
                ->count();
        $v=\DB::table('Senate_Member')
                ->where('student_id', $new_co)
                ->count();
        if($u<2 && $t==0 && $v<2 ){
            \DB::table('Club_Members')
                ->where('student_id', $coco->coco_student_id)
                ->update(['student_id' => $new_co]);
            \DB::table('Gymkhana_Club_Cocoordinator')
                ->where('club_name', $club_name)
                ->update(['coco_student_id' => $new_co]);
            $club=\DB::table('Gymkhana_Club_Coordinator')->where('type', $type)->get();
            $input=$type;
            if($input == 'Technical'){
                return redirect()->route('councilconvener/welcomet')->with('message', 'Successfull !!');
            }
            elseif ($input == 'Cultural'){
                return redirect()->route('councilconvener/welcomec')->with('message', 'Successfull !!');
            }
            else{
                return redirect()->route('councilconvener/welcomes')->with('message', 'Successfull !!');
            }
        }
        $club=\DB::table('Gymkhana_Club_Coordinator')->where('type', $type)->get();
        $input=$type;
            if($input == 'Technical'){
                return redirect()->route('councilconvener/welcomet')->with('message', 'Already Hold Maximum Number of Position');
            }
            elseif ($input == 'Cultural'){
                return redirect()->route('councilconvener/welcomec')->with('message', 'Already Hold Maximum Number of Position');
            }
            else{
                return redirect()->route('councilconvener/welcomes')->with('message', 'Already Hold Maximum Number of Position');
            }
        
    }

    

}
