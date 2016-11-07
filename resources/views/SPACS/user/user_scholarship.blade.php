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
                                <img src="/images/scholarship.jpg" height="150"class="col s8 offset-s2">
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
      <p>{{$scholarship1[0]->description}}<br><p><b>START DATE:</b> {{$scholarship1[0]->start_date}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>END DATE:</b> {{$scholarship1[0]->end_date}}</p>
    </div>
    <div class="modal-footer">
      <a href="/SPACS/user_mcmform?id={{$scholarship1[0]->scholarship_id}}" target="_blank" class=" modal-action modal-close waves-effect waves-green btn-flat">Apply</a>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br><br>
  <br><br><br>

                    
                    
              
            </div>
        </div>
        
@stop