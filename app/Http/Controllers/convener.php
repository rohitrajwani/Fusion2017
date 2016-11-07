<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class convener extends Controller
{   
    public function welcome(Request $request){
        $user=\Auth::user();
        $senate=\DB::table('Senate_Member')->where([
                ['student_id', $user],
                ['responsibility', '=', 'convener']])->first();
        if($user->hasRole('sen_convenor') ){
            $members=\DB::table('Senate_Member')->get();
            $meetings=\DB::table('Senate_Meeting')->get();
            return view('convener.index', compact('members','meetings'));
        }
        else {
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
        }     
    }

    public function deletesenate( Request $request){
        $old_member = $request->input('oldmember'); 
        $this->validate($request, ['oldmember' => 'required']);
        \DB::table('Senate_Member')
            ->where('student_id', $old_member)
            ->delete();
        return redirect()->route('convener/welcome')->with('message', 'Successfull !!');
        
    }

    public function insertsenate( Request $request){
        $new_member = $request->input('newmember'); 
        $new_role = $request->input('role');
        $user=\Auth::user()->username;
        $this->validate($request, ['newmember' => 'required|exists:student,student_id|max:100']); 
        $c=\DB::table('Senate_Member')
                ->where('student_id',$new_member)
                ->count();
        if ( $c == 0 ){
            \DB::table('Senate_Member')
                ->insert(['student_id' => $new_member, 
                            'responsibility' => $new_role , 
                            "created_at" =>  \Carbon\Carbon::now(),
                             "updated_at" => \Carbon\Carbon::now(),]);
            return redirect()->route('convener/welcome')->with('message', 'Successfull !!');
        }
        return redirect()->route('convener/welcome')->with('message', 'Member Already Exist !!');   
    }

    public function insertminutes( Request $request){
        $new_minute = $request->input('newminute'); 
        $new_agenda = $request->input('newagenda');
        $new_time = $request->input('time');
        $user=\Auth::user()->username;
        $this->validate($request, ['newminute' => 'required|url|max:100','newagenda' => 'required|url|max:100',
                                    'time' => 'required|date|after:2010-01-01|before:2030-12-30|max:20']); 
        
        \DB::table('Senate_Meeting')
                ->insert(['agenda' => $new_agenda, 
                            'minutes' => $new_minute , 
                            'timestamp' => $new_time , 
                            "created_at" =>  \Carbon\Carbon::now(),
                             "updated_at" => \Carbon\Carbon::now(),]);
            
        return redirect()->route('convener/welcome')->with('message', 'Successfull !!');
        
            
          
    }

}
