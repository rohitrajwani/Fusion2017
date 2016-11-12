<?php
 
namespace App\Http\Controllers\Bus_management;

use App\Notification;
use Illuminate\Http\Request;
 
use App\Http\Requests;
use DB;
class AdminController extends Controller
{
    public function reset()
    {
    	$capacity = 30;
    	DB::table('Bus')->update(['capacity'=>$capacity]);
    	$feed = DB::table('Bus_Feedback')->get();
    	return view('pages.admin',['feed'=>$feed]);
    }

    public function fdelete()
    {
    	DB::table('Bus_Feedback')->delete();
    	$feed = DB::table('Bus_Feedback')->get();
    	return view('pages.admin',['feed'=>$feed]);
    }

    public function admin()
    {
    	$feed = DB::table('Bus_Feedback')->get();
    	return view('pages.admin',['feed'=>$feed]);
    }

    public function addsp()
    {
        $feed = DB::table('Bus_Feedback')->get();
        return view('pages.addsp',compact('feed'));
    }

    public function delsp()
    {
        $bus = DB::table('Bus')->get();
        return view('pages.delsp',['bus'=>$bus]);
    }

    public function adddd(Request $req)
    {

        DB::table('Bus')->insert(['bus_id'=>$req['bus_id'],'status'=>$req['status'],'capacity'=>$req['capacity'],'ticket_price'=>$req['ticket_price']]);
        DB::table('Bus_Schedule')->insert(['timestamp'=>$req['timing'],'source'=>$req['source'],'destination'=>$req['destination'],'bus_id'=>$req['bus_id']]);

        $feed = DB::table('Bus_Feedback')->get();

        return view('pages.admin',compact('feed'));
    }

    public function delete(Request $req)
    {
        DB::table('Bus')->where('bus_id','=',$req['bus_id'])->delete();
        DB::table('Bus_Schedule')->where('bus_id','=',$req['bus_id'])->delete();
        $feed = DB::table('Bus_Feedback')->get();
        return view('pages.admin',compact('feed'));
    }

    public function post_not(Request $req)
    {
        $a = new Notification;
        $a->user_id = '1';
        $a->user_type = 'Admin';
        $a->notification = $req->notification; 
        $a->save();
        return back();
    }

    public function logout(){
        Auth::logout();

        return Redirect::to('/');
    }
}
  