<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon;

class spacs_usermedalnameController extends Controller {
   public function user_medals(){
   		
   		
      return view('SPACS.user.user_medals');
 
   }
   public function mcm_form($scholarship_id,$student_id,Request $request){
    $now = Carbon\Carbon::now();
      $s_name=$request->s_name;
      $b_name=$request->b_name;
      $b_occupation=$request->occu_bro;
      $s_occupation=$request->occu_sis;
      $tot_an_inc_p=$request->tot_an_inc_p;
      $service_type=$request->service_type;
      $p_occupation=$request->poccupation;
      $firm_address=$request->firm_address;
      $nature_of_business=$request->nature_of_business;
      $registration_no=$request->registration_no;
      $tax_reg_no=$request->tax_reg_no;
      $m_occupation=$request->m_occ_address;
      DB::table('awards_applications')->insert([ 'sister_name'=>$b_name,'brother_name'=>$s_name,'p_occupation'=>$p_occupation, 'b_occupation'=>$b_occupation, 's_occupation'=>$s_occupation, 'service_type'=>$service_type, 'firm_name'=>$firm_address, 'firm_address'=>'', 'nature_of_business'=>$nature_of_business, 'registration_no'=>$registration_no, 'tax_reg_no'=>$tax_reg_no,'student_id'=>$student_id,'scholarship_id'=>$scholarship_id,'status'=>'Submitted','submitted_timestamp'=>$now,'tot_an_inc_p'=>$tot_an_inc_p]);

      
      return back();
 
   }
public function user_staffmember(){
         $staffnames=DB::table('staff')->where('department','Awards and Scholarships')->get();
         
      return view('SPACS.user.user_staffmember',compact('staffnames'));
   }
public function staff_view_form(){
         
         
      return view('SPACS.staff.staff_view_form');
   }

public function user_scholarship(){
   		$scholarship=DB::table('medals_awards_scholarship')->where('type','scholarship')->get();
   		
      return view('SPACS.user.user_scholarship',compact('scholarship'));
   }
public function spacs_not_fir_winners($student_id,$id){
      
 $now = Carbon\Carbon::now();
   DB::table('awards_applications')->insert([ 'p_occupation'=>'','sister_name'=>'' , 'brother_name'=>'', 'b_occupation'=>'', 's_occupation'=>'', 'service_type'=>'', 'firm_name'=>'', 'firm_address'=>'', 'nature_of_business'=>'null', 'registration_no'=>'', 'tax_reg_no'=>'','student_id'=>$student_id,'scholarship_id'=>$id,'status'=>'Finalised','submitted_timestamp'=>$now,'tot_an_inc_p'=>'0']);

      
              
      return back();
   }

public function spacs_not_sec_thir_winners($student_id,$id){
        
      
      $now = Carbon\Carbon::now();
   DB::table('awards_applications')->insert([ 'p_occupation'=>'','sister_name'=>'' , 'brother_name'=>'', 'b_occupation'=>'', 's_occupation'=>'', 'service_type'=>'', 'firm_name'=>'', 'firm_address'=>'', 'nature_of_business'=>'null', 'registration_no'=>'', 'tax_reg_no'=>'','student_id'=>$student_id,'scholarship_id'=>$id,'status'=>'Finalised','submitted_timestamp'=>$now,'tot_an_inc_p'=>'0']);

              
      return back();
   }
   public function user_winner_result(Request $request){

         $title=$request->title;
         $year=$request->year;
         $result=DB::table('awards_applications')->join('medals_awards_scholarship','medals_awards_scholarship.scholarship_id','=','awards_applications.scholarship_id','inner')->where([['title',$title],['status','Finalised'],])->whereYear('end_date',$year)->get();
         

      return view('SPACS.user.user_winner_show',compact('result','year'));
   }
   public function staff_verify($student_id,$scholarship_id,Request $request){

         $value1=$request->declare1;
         $value2=$request->declare2;
         $student=DB::table('student')->where('student_id',$student_id)->get();
         if($student[0]->category=='GEN'){
            if($value1=='declare1')
                {       DB::table('awards_applications')->where([['scholarship_id','=',$scholarship_id],['student_id','=',$student_id],])->update(array('status'=>'Verified'));}
             else
               {        DB::table('awards_applications')->where([['scholarship_id','=',$scholarship_id],['student_id','=',$student_id],])->update(array('status'=>'Not Verified'));}
         }
         elseif($student[0]->category=='OBC'||$student[0]->category=='SC'||$student[0]->category=='ST')
{
   if($value1=='declare1'&&$value2=='declare2')
                {         DB::table('awards_applications')->where([['scholarship_id','=',$scholarship_id],['student_id','=',$student_id],])->update(array('status'=>'Verified'));}
else
                {       DB::table('awards_applications')->where([['scholarship_id','=',$scholarship_id],['student_id','=',$student_id],])->update(array('status'=>'Not Verified'));}

}
        // $result2=DB::table('awards_applications')->join('medals_awards_scholarship','medals_awards_scholarship.scholarship_id','=','awards_applications.scholarship_id','inner')->whereYear('end_date',$year)->get();
         //$result=$result1->intersect($result2);
         

      return back();
   }

   public function mcm_announce($scholarship_id,$student_id){


         
              DB::table('awards_applications')->where([['scholarship_id','=',$scholarship_id],['student_id','=',$student_id],])->update(array('status'=>'Finalised'));

      return back();
   }

   public function dir_gm_a($scholarship_id,$student_id){


         
              DB::table('awards_applications')->where([['scholarship_id','=',$scholarship_id],['student_id','=',$student_id],])->update(array('status'=>'Finalised'));

      return back();
   }
  public function dir_gm_m($scholarship_id,$student_id,Request $request){

            $marks=$request->marks;
         
              DB::table('awards_applications')->where([['scholarship_id','=',$scholarship_id],['student_id','=',$student_id],])->update(array('marks'=>$marks));

      return back();
   }

   public function acad_announce($scholarship_id,$student_id){


         
               $now = Carbon\Carbon::now();
      

       DB::table('awards_applications')->insert(['sister_name'=>'' , 'brother_name'=>'', 'p_occupation'=>'', 'b_occupation'=>'', 's_occupation'=>'', 'service_type'=>'', 'firm_name'=>'', 'firm_address'=>'', 'nature_of_business'=>'null', 'registration_no'=>'', 'tax_reg_no'=>'','student_id'=>$student_id,'scholarship_id'=>$scholarship_id,'status'=>'Finalised','submitted_timestamp'=>$now,'tot_an_inc_p'=>'0']);

      return back();
   }
 /*  public function mcm_form($scholarship_id,$student_id,Request request){


         
               $now = Carbon\Carbon::now();
      

       DB::table('awards_applications')->insert([ 'p_occupation'=>'', 'b_occupation'=>'', 's_occupation'=>'', 'service_type'=>'', 'firm_name'=>'', 'firm_address'=>'', 'nature_of_business'=>'null', 'registration_no'=>'', 'tax_reg_no'=>'','student_id'=>$student_id,'scholarship_id'=>$scholarship_id,'status'=>'Finalised','submitted_timestamp'=>$now,'tot_an_inc_p'=>'0']);

      return back();
   }*/
   public function chair_announce($scholarship_id,$student_id){


         
               $now = Carbon\Carbon::now();
      

       DB::table('awards_applications')->insert([ 'p_occupation'=>'','sister_name'=>'' , 'brother_name'=>'', 'b_occupation'=>'', 's_occupation'=>'', 'service_type'=>'', 'firm_name'=>'', 'firm_address'=>'', 'nature_of_business'=>'null', 'registration_no'=>'', 'tax_reg_no'=>'','student_id'=>$student_id,'scholarship_id'=>$scholarship_id,'status'=>'Finalised','submitted_timestamp'=>$now,'tot_an_inc_p'=>'0']);

      return back();
   }


   public function dir_gm_form($scholarship_id,$student_id,Request $request){
  $now = Carbon\Carbon::now();
       DB::table('awards_applications')->insert([ 'p_occupation'=>'','sister_name'=>'' , 'brother_name'=>'','b_occupation'=>'', 's_occupation'=>'', 'service_type'=>'', 'firm_name'=>'', 'firm_address'=>'', 'nature_of_business'=>'null', 'registration_no'=>'', 'tax_reg_no'=>'','student_id'=>$student_id,'scholarship_id'=>$scholarship_id,'status'=>'Submitted','submitted_timestamp'=>$now,'tot_an_inc_p'=>'0']);
 
      return back();
   }
     public function dm_prof_gm_form($scholarship_id,$student_id,Request $request){
  $now = Carbon\Carbon::now();
       DB::table('awards_applications')->insert([ 'p_occupation'=>'','sister_name'=>'' , 'brother_name'=>'','b_occupation'=>'', 's_occupation'=>'', 'service_type'=>'', 'firm_name'=>'', 'firm_address'=>'', 'nature_of_business'=>'null', 'registration_no'=>'', 'tax_reg_no'=>'','student_id'=>$student_id,'scholarship_id'=>$scholarship_id,'status'=>'Submitted','submitted_timestamp'=>$now,'tot_an_inc_p'=>'0']);
 
      return back();
   }
  public function iiitdmj_prof_form($scholarship_id,$student_id,Request $request){
  $now = Carbon\Carbon::now();
       DB::table('awards_applications')->insert([ 'p_occupation'=>'','sister_name'=>'' , 'brother_name'=>'','b_occupation'=>'', 's_occupation'=>'', 'service_type'=>'', 'firm_name'=>'', 'firm_address'=>'', 'nature_of_business'=>'null', 'registration_no'=>'', 'tax_reg_no'=>'','student_id'=>$student_id,'scholarship_id'=>$scholarship_id,'status'=>'Submitted','submitted_timestamp'=>$now,'tot_an_inc_p'=>'0']);
 
      return back();
   }

//------------------dir silver cultural-----------------------

   public function spacscom_dir_silver_cultural_docs(){
      return view('SPACS.spacscom_dir_silver_cultural.spacscom_dir_silver_cultural_docs');
   }

   public function spacscom_dir_silver_cultural_form(){
      return view('SPACS.spacscom_dir_silver_cultural.spacscom_dir_silver_cultural_form');
   }
 
//----------------------dir gold medal--------------------------------
    public function spacscom_dir_gm_docs(){
      return view('SPACS.spacscom_dir_gm.spacscom_dir_gm_docs');
   }
    public function spacscom_dir_gm_form(){
      return view('SPACS.spacscom_dir_gm.spacscom_dir_gm_form');
   }

//---------------------silver games------------------------
     public function spacscom_dir_silver_games_docs(){
      return view('SPACS.spacscom_dir_silver_games.spacs_dir_silver_games_docs');
   }
    public function spacscom_dir_silver_games_form(){
      return view('SPACS.spacscom_dir_silver_games.spacs_dir_silver_games_form');
   }
//--------------------dm proficiency gold medal-----------------------
     public function spacscom_dm_prof_gm_docs(){
      return view('SPACS.spacscom_dm_prof_gm.spacscom_dm_prof_gm_docs');
   }
    public function spacscom_dm_prof_gm_form(){
      return view('SPACS.spacscom_dm_prof_gm.spacscom_dm_prof_gm_form');
   }

//-------------------------iiitdmj proficiency medal----------------


    public function spacscom_iiitdmj_prof_docs(){
      return view('SPACS.spacscom_iiitdmj_prof.spacscom_iiitdmj_prof_docs');
   }
  
   public function spacscom_iiitdmj_prof_form(){
      return view('SPACS.spacscom_iiitdmj_prof.spacscom_iiitdmj_prof_form');
   }




   
   public function spacs_create_sch(Request $request){
        $title=$request->title;
        $type=$request->type;
        $desc=$request->description;
        $s_d=$request->startdate;
        $e_d=$request->enddate;

        if($type=='medal'){
          if($title=='Chairman Gold medal'){
            $id1='CGM';
          }
          elseif($title=='Director Gold Medal'){
            $id1='DGM';
          }
          elseif($title=='D&M Proficiency Gold Medal'){
            $id1='DMPGM';
          }
          elseif($title=='Notional Prizes and Certificate of Merit'){
            $id1='NPCM';
          }
          elseif($title=='Academic Proficiency Prizes'){
            $id1='APP';
          }
          elseif($title=='IIITDMJ Proficiency Prizes'){
            $id1='IDMJPP';
          }
          elseif($title=='Directors Silver Cultural Medal'){
            $id1='DSCM';
          }
          else{
            $id1='DSGM';
          }
        $sid=$id1.''.$e_d;
        DB::table('medals_awards_scholarship')->insert(['scholarship_id'=>$sid,'type'=>'medal','title'=>$title,'description'=>$desc,'start_date'=>$s_d,'end_date'=>$e_d]);
      }
      else{
        if($title=='MCM Scholarship'){
            $id1='MCM';
          }
          $sid=$id1.''.$e_d;
 DB::table('medals_awards_scholarship')->insert(['scholarship_id'=>$sid,'type'=>'scholarship','title'=>$title,'description'=>$desc,'start_date'=>$s_d,'end_date'=>$e_d]);
      
      }

      return back();
   }
   
   
 public function user_summarycurrent(){

      return view('SPACS.user.user_summarycurrent');
   }

 public function user_summaryprevious(){

      return view('SPACS.user.user_summaryprevious');
         
        
   }
   public function dir_sil_gam_form($scholarship_id,$student_id,Request $request){
     $now = Carbon\Carbon::now();
       DB::table('awards_applications')->insert([ 'p_occupation'=>'','sister_name'=>'' , 'brother_name'=>'','b_occupation'=>'', 's_occupation'=>'', 'service_type'=>'', 'firm_name'=>'', 'firm_address'=>'', 'nature_of_business'=>'null', 'registration_no'=>'', 'tax_reg_no'=>'','student_id'=>$student_id,'scholarship_id'=>$scholarship_id,'status'=>'Submitted','submitted_timestamp'=>$now,'tot_an_inc_p'=>'0']);
 
      return back();


     }

   public function dir_sil_cul_form($scholarship_id,$student_id,Request $request){


           $now = Carbon\Carbon::now();
       DB::table('awards_applications')->insert([ 'p_occupation'=>'','sister_name'=>'' , 'brother_name'=>'','b_occupation'=>'', 's_occupation'=>'', 'service_type'=>'', 'firm_name'=>'', 'firm_address'=>'', 'nature_of_business'=>'null', 'registration_no'=>'', 'tax_reg_no'=>'','student_id'=>$student_id,'scholarship_id'=>$scholarship_id,'status'=>'Submitted','submitted_timestamp'=>$now,'tot_an_inc_p'=>'0']);
 
      return back();

     }


public function spacs_mcm_sort(){
     return view('SPACS.spacs.spacs_mcm_sort');
   }
public function spacs_scholarships(){
         $scholarship=DB::table('medals_awards_scholarship')->where('type','scholarship')->get();
         
      return view('SPACS.spacs.spacs_scholarships',compact('scholarship'));
   } 

public function spacs_view_chairman(){
         $max_CPI=DB::table('student')->where('semester','8')->max('cpi');
         $ch_winner=DB::table('student')->where([['cpi',$max_CPI],['semester','8'],])->get();
           
      return view('SPACS.spacs.spacs_chairman_gm',compact('ch_winner'));
   }

///---------------------------Academic Proficiency------------------------

public function spacs_view_academic(){
         $max_cse_CPI=DB::table('student')->where([['semester','8'],['branch','cse'],])->max('cpi');
         $max_ece_CPI=DB::table('student')->where([['semester','8'],['branch','ece'],])->max('cpi');
         $max_me_CPI=DB::table('student')->where([['semester','8'],['branch','me'],])->max('cpi');
         $ac_winner_cse=DB::table('student')->where([['cpi',$max_cse_CPI],['semester','8'],])->get();
         $ac_winner_ece=DB::table('student')->where([['cpi',$max_ece_CPI],['semester','8'],])->get();
         $ac_winner_me=DB::table('student')->where([['cpi',$max_me_CPI],['semester','8'],])->get();
      return view('SPACS.spacs.spacs_academic',compact(['ac_winner_cse'],['ac_winner_ece'],['ac_winner_me']));
   }
///---------------------------Notional----------------------- 

public function spacs_view_notional_first(){

         $no_winner=DB::table('medals_awards_scholarship')->where('type','medal')->get();
         
      return view('SPACS.spacs.spacs_notional_first',compact('no_winner'));
   }

   public function spacs_view_notional_second_third(){

         $no_winner=DB::table('medals_awards_scholarship')->where('type','medal')->get();
         
      return view('SPACS.spacs.spacs_notional_second_third',compact('no_winner'));
   }

   public function spacscom_dir_gm_results(){
   		
   		
      return view('SPACS.spacscom_dir_gm.spacscom_dir_gm_results');
   }
    public function spacscom_dir_silver_cultural_results(){
   		
   		
      return view('SPACS.spacscom_dir_silver_cultural.spacscom_dir_silver_cultural_results');
   }
    public function spacs_dir_silver_games_results(){
   		
   		
      return view('SPACS.spacscom_dir_silver_games.spacs_dir_silver_games_results');
   }
    public function spacscom_dm_prof_gm_results(){
   		
   		
      return view('SPACS.spacscom_dm_prof_gm.spacscom_dm_prof_gm_results');
   }
    public function spacscom_iiitdmj_prof_results(){
   		
   		
      return view('SPACS.spacscom_iiitdmj_prof.spacscom_iiitdmj_prof_results');
   }
   public function user_spacs(){
   		$spacsnames=DB::table('faculty')->where('department','spacs')->get();
   		
      return view('SPACS.user.user_spacs',compact('spacsnames'));
   }

public function user_staff(){
   		$staffnames=DB::table('staff')->where('department','Awards and Scholarships')->get();
   		
      return view('SPACS.user.user_staffmember',compact('staffnames'));
   }
}