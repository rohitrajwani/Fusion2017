<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use Illuminate\View\Middleware\ShareErrorsFromSession; 
use Illuminate\Http\Request;

use App\Http\Requests;

class rolecheck extends Controller
{
    public function start( Request $request){
    	$input = $request->input('roleis');  
    	if($input=='student') {
    		$user=\Auth::user(); 
            if(\Auth::user()->user_type == 'student'){
    			return redirect()->route('student/welcome')->with('message', 'Authtication Successfull !! Welcome ');
    		} 	
    		else{
               return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    		}
    	}

    	else if($input=='faculty') {
    		$user=\Auth::user(); 
            if(\Auth::user()->user_type == 'faculty'){
    			return redirect()->route('faculty/welcome')->with('message', 'Authtication Successfull !! Welcome ');
    		 }
    		 else {
                //return $user;
               return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    		}
    	}
    	else if($input=='dean') {
    		$user=\Auth::user(); 
            if($user->hasRole('dean_s')){
    			return redirect()->route('deanstudent/welcome')->with('message', 'Authtication Successfull !! Welcome ');
    		}else {
                return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    		}
    	}
    	else if($input=='election') {
    		$user=\Auth::user(); 
            if($user->hasRole('elec_comm')){
    			return redirect()->route('election/welcome')->with('message', 'Authtication Successfull !! Welcome '); 
    		}
            else {
    			return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
    		}
    	}

        if($input=='technical') {
            $user=\Auth::user(); 
            if($user->hasRole('tech_convenor')){
                return redirect()->route('councilconvener/welcomet')->with('message', 'Authtication Successfull !! Welcome ');
                
            }
            else {
                return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
            }           
        }

        if($input=='cultural') {
            $user=\Auth::user(); 
            if($user->hasRole('cult_convenor')){
                return redirect()->route('councilconvener/welcomec')->with('message', 'Authtication Successfull !! Welcome ');
                
            }
            else {
                return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
            }           
        }

        if($input=='sports') {
            $user=\Auth::user(); 
            if($user->hasRole('sport_convenor')){
                return redirect()->route('councilconvener/welcomes')->with('message', 'Authtication Successfull !! Welcome ');
                
            }
            else {
                return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
            }           
        }

        if($input=='convener') {
            $user=\Auth::user(); 
            if($user->hasRole('sen_convenor')){
                return redirect()->route('convener/welcome')->with('message', 'Authtication Successfull !! Welcome ');
                
            }
            else {
                return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
            }           
        }

    	else if($input=='co') {
            $user=\Auth::user(); 
            if($user->hasRole('club_co')){
                return redirect()->route('coordinator/welcome')->with('message', 'Authtication Successfull !! Welcome ');
                
            }
            else {
                return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
            }
            
            
        }

        else if($input=='coco' ) {
            $user=\Auth::user(); 
            if($user->hasRole('cilb_coco')){
                return redirect()->route('cocoordinator/welcome')->with('message', 'Authtication Successfull !! Welcome ');
                
            }
            else {
                return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
            }           
        }
        else{
            return redirect()->route('studentgymkhana/')->with('message', 'Authetication Failed !! You are not authorized to do so');
        }

    }
}
