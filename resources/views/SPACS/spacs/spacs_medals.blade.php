@extends('layout')
@section('content')
 <div class="main-container row">
          <h4 class="col s12 m8 offset-m2">Medals</h4>

        <br><br><br><br><br>
        <?php $medal01=DB::table('medals_awards_scholarship')->where('title','Chairman Gold Medal')->max('end_date');
        $medal1=DB::table('medals_awards_scholarship')->where([['end_date',$medal01],['title','Chairman Gold Medal'],])->get();
           ?>
<div class="col s12 m12" >
        <!-- Trigger/Open The Modal -->
<a id="myBtn" class="button button2 col s3 modal-trigger" style="min-height: 70px" href="#modal1">{{$medal1[0]->title}}</a>
 <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>{{$medal1[0]->title}}</h4>
      <p>{{$medal1[0]->description}}</p><br>
     
    </div>
    <?php $now = Carbon\Carbon::now();
      $batch=$now->year;
      $batch1=$batch-1;
       $batch2=$batch-2;
        $batch3=$batch-3;
    ?>
      <div class="modal-footer">
      <a href="/SPACS/spacs_chairman_gm?id={{$medal1[0]->scholarship_id}}" target="_blank"  class=" modal-action modal-close waves-effect waves-green btn-flat">VIEW</a>
    </div>
  
  </div>
  <?php $medal02=DB::table('medals_awards_scholarship')->where('title','Director Gold Medal')->max('end_date');
        $medal2=DB::table('medals_awards_scholarship')->where([['end_date',$medal02],['title','Director Gold Medal'],])->get();
           ?>
<a id="myBtn" class="button button2 col s3 offset-s1 modal-trigger" style="min-height: 70px" href="#modal2">{{$medal2[0]->title}}</a>
 <!-- Modal Structure -->
  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>{{$medal2[0]->title}}</h4>
      <p>{{$medal2[0]->description}}<br><p><b>START DATE:</b> {{$medal2[0]->start_date}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>END DATE:</b> {{$medal2[0]->end_date}}</p>
    </div>
    <div class="modal-footer"><a href="/SPACS/spacscom_dir_gm_results?id={{$medal2[0]->scholarship_id}}" target="_blank"  class=" modal-action modal-close waves-effect waves-green btn-flat">VIEW</a>
    </div>
  </div>
<?php $medal03=DB::table('medals_awards_scholarship')->where('title','D&M Proficiency Gold Medal ')->max('end_date');
        $medal3=DB::table('medals_awards_scholarship')->where([['end_date',$medal03],['title','D&M Proficiency Gold Medal '],])->get();
           ?>

<a id="myBtn" class="button button2 col s3 offset-s1 modal-trigger" style="min-height: 70px" href="#modal3">{{$medal3[0]->title}}</a>
 <!-- Modal Structure -->
  <div id="modal3" class="modal">
    <div class="modal-content">
      <h4>{{$medal3[0]->title}}</h4>
      <p>{{$medal3[0]->description}}<br><p><b>START DATE:</b> {{$medal3[0]->start_date}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>END DATE:</b> {{$medal3[0]->end_date}}</p>
    </div>
    <div class="modal-footer">
    <a href="/SPACS/spacscom_dm_prof_gm_results?id={{$medal3[0]->scholarship_id}}" target="_blank"  class=" modal-action modal-close waves-effect waves-green btn-flat">VIEW</a>
    </div>
  </div>
</div>


<br><br><br><br><br><br>
<?php $medal04=DB::table('medals_awards_scholarship')->where('title','Notional Prizes and Certificate of Merit')->max('end_date');
        $medal4=DB::table('medals_awards_scholarship')->where([['end_date',$medal04],['title','Notional Prizes and Certificate of Merit'],])->get();
           ?>


<div class="col s12 m12">
<a id="myBtn" class="button button2 col s5 offset-s3 modal-trigger" style="min-height: 70px" href="#modal4">{{$medal4[0]->title}}</a>
 <!-- Modal Structure -->
  <div id="modal4" class="modal">
    <div class="modal-content">
      <h4>{{$medal4[0]->title}}</h4>
      <p>{{$medal4[0]->description}}<br>
    </div>
    <div class="modal-footer">
 
     <a href="/SPACS/spacs_notional_first?batch_year= {{ $batch1 }}&id={{$medal4[0]->scholarship_id}}"  class=" modal-action modal-close waves-effect waves-green btn-flat">{{$batch1}}</a>
      <a href="/SPACS/spacs_notional_second_third?batch_year= {{ $batch2 }}&id={{$medal4[0]->scholarship_id}}"  class=" modal-action modal-close waves-effect waves-green btn-flat">{{$batch2}}</a>
      <a href="/SPACS/spacs_notional_second_third?batch_year= {{ $batch3 }}&id={{$medal4[0]->scholarship_id}}"  class=" modal-action modal-close waves-effect waves-green btn-flat">{{$batch3}}</a>
    </div>
  </div>
</div>
<br><br><br><br><br><br>

<?php $medal05=DB::table('medals_awards_scholarship')->where('title','Academic Proficiency Prizes')->max('end_date');
        $medal5=DB::table('medals_awards_scholarship')->where([['end_date',$medal05],['title','Academic Proficiency Prizes'],])->get();
           ?>


<div class="col s12 m12">
<a id="myBtn" class="button button2 col s3 modal-trigger" style="min-height: 70px" href="#modal5">{{$medal5[0]->title}}</a>
 <!-- Modal Structure -->
  <div id="modal5" class="modal">
    <div class="modal-content">
      <h4>{{$medal5[0]->title}}</h4>
      <p>{{$medal5[0]->description}}<br></div>
    <div class="modal-footer">
<a href="/SPACS/spacs_academic?id={{$medal5[0]->scholarship_id}}" target="_blank"  class=" modal-action modal-close waves-effect waves-green btn-flat">VIEW</a>     
    </div>
  </div>
<?php $medal06=DB::table('medals_awards_scholarship')->where('title','IIITDMJ Proficiency Prizes')->max('end_date');
        $medal6=DB::table('medals_awards_scholarship')->where([['end_date',$medal06],['title','IIITDMJ Proficiency Prizes'],])->get();
           ?>

        
<a id="myBtn" class="button button2 col s3 offset-s1 modal-trigger" style="min-height: 70px" href="#modal6">{{$medal6[0]->title}}</a>
 <!-- Modal Structure -->
  <div id="modal6" class="modal">
    <div class="modal-content">
      <h4>{{$medal6[0]->title}}</h4>
      <p>{{$medal6[0]->description}}<br><p><b>START DATE:</b> {{$medal6[0]->start_date}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>END DATE:</b> {{$medal6[0]->end_date}}</p>
    </div>
    <div class="modal-footer">
           <a href="/SPACS/spacscom_iiitdmj_prof_results?id={{$medal6[0]->scholarship_id}}" target="_blank" class=" modal-action modal-close waves-effect waves-green btn-flat">VIEW</a>
     </div>
  </div>
  <?php $medal07=DB::table('medals_awards_scholarship')->where('title','Directors Silver Cultural Medal')->max('end_date');
        $medal7=DB::table('medals_awards_scholarship')->where([['end_date',$medal07],['title','Directors Silver Cultural Medal'],])->get();
           ?>
 <?php $medal08=DB::table('medals_awards_scholarship')->where('title','Directors Silver Games Medal')->max('end_date');
        $medal8=DB::table('medals_awards_scholarship')->where([['end_date',$medal08],['title','Directors Silver Games Medal'],])->get();
           ?>


<a id="myBtn" class="button button2 col s3 offset-s1 modal-trigger" style="min-height: 70px"  href="#modal7">Directors Silver Medal</a>
 <!-- Modal Structure -->
  <div id="modal7" class="modal">
    <div class="modal-content">
      <h4>Directors Silver Medal</h4>
      <p>{{$medal7[0]->description}} <br><p><b>START DATE:</b> {{$medal7[0]->start_date}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>END DATE:</b> {{$medal7[0]->end_date}}</p>
    </div>
    <div class="modal-footer">
            <a href="/SPACS/spacs_dir_silver_games_results?id={{$medal7[0]->scholarship_id}}" target="_blank" class=" modal-action modal-close waves-effect waves-green btn-flat">Sports</a>
      <a href="/SPACS/spacscom_dir_silver_cultural_results?id={{$medal8[0]->scholarship_id}}" target="_blank" class=" modal-action modal-close waves-effect waves-green btn-flat">Cultural</a>

    </div>
  </div>
</div>
<br><br>


       
   <div class="button_container col s12 m12 offset-m2">
                        <br>             
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/SPACS/spacs_medal_create" target="_blank" class="waves-effect btn">CREATE</a>
           <!--<a href="view_index.html"class="waves-effect btn">DELETE</a>-->
        </div>
  
</div>

@stop




        


                    
   
     