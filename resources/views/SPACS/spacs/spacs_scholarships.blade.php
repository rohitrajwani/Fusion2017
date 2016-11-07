@extends('layout')
@section('content')
        <div class="main-container row">
            <h4 class="col s12 m8 offset-m2">Scholarship</h4><br><br><br><br><br>
                  
                    <?php $scholarship01=DB::table('medals_awards_scholarship')->where('title','MCM Scholarship')->max('end_date');
        $scholarship1=DB::table('medals_awards_scholarship')->where([['end_date',$scholarship01],['title','MCM Scholarship'],])->get();
           ?>
                    
                    <div class="col s12 offset-s4">
                        <div class="button-container col s12 m4">
                            <a href="#modal1" class="button modal-trigger ">
                                <img src="/images/scholarship.jpg" height="150" class="col s8 offset-s2">
                                <div class="divider col s12"></div>
                                <h5 class="col s12 ">{{$scholarship1[0]->title}}</h5>

                            </a>

                        </div>
                        
                          
                    </div>
                    <br><br><br><br><br><br>

                    <!-- Modal Trigger -->
  

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>{{$scholarship1[0]->title}}</h4>
      <p>{{$scholarship1[0]->description}}</p>
    </div>

    <?php   $now = Carbon\Carbon::now();
      $batch=$now->year;
      $batch1=$batch-1;
       $batch2=$batch-2;
        $batch3=$batch-3;
    
?>

     <div class="modal-footer">
  <a href="/SPACS/spacs_mcm_sort?batch_year= {{ $batch1 }}&id={{$scholarship1[0]->scholarship_id}}"  class=" modal-action modal-close waves-effect waves-green btn-flat">{{$batch1}}</a>
      <a href="/SPACS/spacs_mcm_sort?batch_year= {{ $batch2 }}&id={{$scholarship1[0]->scholarship_id}}"  class=" modal-action modal-close waves-effect waves-green btn-flat">{{$batch2}}</a>
      <a href="/SPACS/spacs_mcm_sort?batch_year= {{ $batch3 }}&id={{$scholarship1[0]->scholarship_id}}"  class=" modal-action modal-close waves-effect waves-green btn-flat">{{$batch3}}</a>
    </div>
  
   </div>
   <div class="button_container col s12 m12 offset-m2">
                        <br><br><br>                    
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/SPACS/spacs_scholarship_create" target="_blank" class="waves-effect btn">CREATE</a>
           <!--<a href="view_index.html"class="waves-effect btn">DELETE</a>-->
        </div>
    </div>

  <br><br><br><br><br><br><br><br><br><br>
  <br><br><br>

                    
              
            </div>
        </div>
        
   @stop