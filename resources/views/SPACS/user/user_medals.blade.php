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
    <div class="modal-footer">
      
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
    <div class="modal-footer">
    <?php
    $now = Carbon\Carbon::now();
      $year=$now->year;
        $student=DB::table('student')->where('student_id',Auth::user()->username)->get();
      $batch=$student[0]->batch;
    ?>
    @if($year-$batch==4)
      <a href="/SPACS/user_dir_gm?id={{$medal2[0]->scholarship_id}}" target="_blank"  class=" modal-action modal-close waves-effect waves-green btn-flat">Apply</a>
      @endif
      @if($year-$batch!=4)
<a href="#"  class=" modal-action modal-close waves-effect waves-green btn-flat">Apply</a>
      
      @endif
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
      @if($year-$batch==4)
      <a href="/SPACS/user_dm_prof_gm?id={{$medal3[0]->scholarship_id}}" target="_blank"  class=" modal-action modal-close waves-effect waves-green btn-flat">Apply</a>
      @endif
      @if($year-$batch!=4)
<a href="#"  class=" modal-action modal-close waves-effect waves-green btn-flat">Apply</a>
      
      @endif
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
    @if($year-$batch==4)
      <a href="/SPACS/user_iiitdmj_prof?id={{$medal6[0]->scholarship_id}}" target="_blank" class=" modal-action modal-close waves-effect waves-green btn-flat">Apply</a>
    @endif
      @if($year-$batch!=4)
<a href="#"  class=" modal-action modal-close waves-effect waves-green btn-flat">Apply</a>
      
      @endif
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
      @if($year-$batch==4)
      <a href="/SPACS/user_dir_silver_games?id={{$medal7[0]->scholarship_id}}" target="_blank" class=" modal-action modal-close waves-effect waves-green btn-flat">Sports</a>
        @endif
        @if($year-$batch!=4)
<a href="#"  class=" modal-action modal-close waves-effect waves-green btn-flat">Apply</a>
      
      @endif
      @if($year-$batch==4)
      <a href="/SPACS/user_dir_silver_cultural?id={{$medal8[0]->scholarship_id}}" target="_blank" class=" modal-action modal-close waves-effect waves-green btn-flat">Cultural</a>
      @endif
      @if($year-$batch!=4)
<a href="#"  class=" modal-action modal-close waves-effect waves-green btn-flat">Apply</a>
      
      @endif
    </div>
  </div>
</div>
<br><br><br><br><br><br><br>
                    
               
            </div>
        </div>

@stop
