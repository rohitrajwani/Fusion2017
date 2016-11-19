@extends('layout')

@section('placement_content')
        
        <div class="main-container row">
            <div class="col s12 m4 offset-m4">
                <h4>Selected Students</h4>
            </div>
          
          
             <a href="/training_and_placement_cell/tpo/page">
                <div class="col m1 offset-m3 link" style="background-color:#076392;">
                    <center><h5 style="color:white;"><i class="fa fa-home"></i></h5></center>
                </div>
            </a>
            

          <div class="container col s12" >
            @foreach($company as $comp)
                <ul class="collapsible popout" data-collapsible="accordion">
                 <li>
                  <div class="collapsible-header">{{ $comp->name }}</div>
                  <div class="collapsible-body container">
                          

                               <div class="row">

                                    <div class="col s4"><h5 style="float:left;">{{ $comp->name }}</h5></div>
                                     <div class="col s8"><h5>Placed Students</h5>
                                      
                                         <div class="row" style="overflow:scroll; height:300px;padding:20px;">
                                          @foreach( $student as $stud )
                                                  @if( $stud->name1 == $comp->name )
                                              <div class="col s12" >
                                                
                                                    <div class="row">
                                                        <div class="col s3">
                                                          {{ $stud->roll_no }} 
                                                        </div>
                                                        <div class="col s6">
                                                          {{ $stud->name }} 
                                                        </div>
                                                        <div class="col s3">
                                                        {{ $stud->branch }}
                                                        </div>
                                                     </div>
                                                    </div>
                                                  @endif
                                                @endforeach
                                         </div>
                                       </div>
                                </div>
           
                    </div>
                </li>                  
              </ul>
              @endforeach
            </div>
            
          </div>
        
       <script>
                 $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
</script>
          @stop
     
      