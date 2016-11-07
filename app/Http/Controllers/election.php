<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Validation\Rule;
class election extends Controller
{
    
    public function welcome(Request $request){
        $user=\Auth::user();
        $s=\DB::table('Faculty_Roles')->where([
                ['faculty_id', $user],
                ['roles', '=', 'Election Coordinator']
                ])
                ->first();
        if($user->hasRole('elec_comm')){
            //$request->session()->put('last_attempt', 'true');
            $user=\Auth::user()->username;
            $status="true";
            $election = \DB::table('Senate_Election')->orderBy('election_name', 'desc')->get();
            $nominee = \DB::table('Senate_Election_Nominees')->orderBy('election_name', 'desc')->get();
            $vote = \DB::table('Senate_Election_Votes')->get();
            return view('election.index', compact('election','nominee','vote'));
        }
        else{
            $status="false";
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
        }
    }

    public function createelection( Request $request){
        $election_name = $request->input('election_name'); 
        $batch = $request->input('batch'); 
        $nomination_last_date = $request->input('nomination_last_date');
        $voting_last_date = $request->input('voting_last_date');
         $this->validate($request, ['election_name' => 'required|unique:Senate_Election,election_name|max:100',
                                    'batch' => 'required',
                                    'nomination_last_date' => 'required|date|after:today',
                                    'voting_last_date'=>'required|date|after:nomination_last_date'
                                ]);
          
        $user=\Auth::user()->username;
        
        \DB::table('Senate_Election')
            ->insert(['election_name' => $election_name, 'batch' => $batch, 
                        'nomination_last_date' => $nomination_last_date , 
                        'voting_last_date' => $voting_last_date , 
                        "created_at" =>  \Carbon\Carbon::now(),
                         "updated_at" => \Carbon\Carbon::now(),]);
       return redirect()->route('election/welcome')->with('message', 'Successfull !!');
    }

    public function updateelection( Request $request){
         $this->validate($request, ['election_name' => 'required',
                                    'nomination_last_date' => 'required|date|after:today',
                                    'voting_last_date'=>'required|date|after:nomination_last_date'
                                ]);
    	$election_name = $request->input('election_name'); 
        $nomination_last_date = $request->input('nomination_last_date');
        $voting_last_date = $request->input('voting_last_date');
    	 $user=\Auth::user()->username;
    	\DB::table('Senate_Election')
            ->where('election_name', $election_name)
            ->update(['nomination_last_date' => $nomination_last_date,'voting_last_date' => $voting_last_date,'updated_at'=>\Carbon\Carbon::now()]);
       
       return redirect()->route('election/welcome')->with('message', 'Successfull !!');
        
    }

   

    public function deleteelection( Request $request){
        $this->validate($request, ['election_name' => 'required']);
        $election_name = $request->input('election_name'); 
    	 $user=\Auth::user()->username;
       	\DB::table('Senate_Election')
            ->where('election_name', $election_name)
            ->delete();
        \DB::table('Senate_Election_Nominees')
            ->where('election_name', $election_name)
            ->delete();
        \DB::table('Senate_Election_Votes')
            ->where('election_name', $election_name)
            ->delete();
        return redirect()->route('election/welcome')->with('message', 'Successfull !!');
    }

    
     public function approvenomination( Request $request){
        $election_name = $request->input('election_name'); 
         $nominee_id = $request->input('nominee_id');
        $approval = $request->input('approval');
        $this->validate($request, ['election_name' => 'required', 'approval' => 'required',
                            'nominee_id' => 'required'
                                ]);
        
        
       
         $user=\Auth::user()->username;
        \DB::table('Senate_Election_Nominees')
            ->where('election_name', $election_name)
            ->where('nominee_id', $nominee_id)
            ->update(['approval' => $approval,'updated_at'=>\Carbon\Carbon::now()]);

       $flag=\DB::table('Senate_Election_Nominees')
            ->where('election_name', $election_name)
            ->where('nominee_id', $nominee_id)
            ->where('approval',$approval)
            ->count();
        if($flag >0)
            {
                return redirect()->route('election/welcome')->with('message', 'Successfull !!');
            }
        else
                return redirect()->route('election/welcome')->with('message', 'Unsuccessfull !! Nominee not in particular Election');
    }


    public function deletenominee( Request $request){
        $election_name = $request->input('election_name'); 
         $nominee_id = $request->input('nominee_id');
        
        $this->validate($request, ['election_name' => 'required', 
                            'nominee_id' => 'required'
                                ]);
        
        
       
         $user=\Auth::user()->username;
        \DB::table('Senate_Election_Nominees')
            ->where('election_name', $election_name)
            ->where('nominee_id', $nominee_id)
            ->delete();

       $flag=\DB::table('Senate_Election_Nominees')
            ->where('election_name', $election_name)
            ->where('nominee_id', $nominee_id)
            ->count();

        if($flag == 0)
            {
                return redirect()->route('election/welcome')->with('message', 'Either Nominee Deleted Succesfully OR Nominee not exist for the Election name');
            }
        else
                return redirect()->route('election/welcome')->with('message', 'Unsuccesfull');
    }
    

}
