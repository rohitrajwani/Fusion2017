@extends('layout')

@section('placement_content')
        
        <div class="main-container row">
        <nav class="mynav">
          <div class="nav-wrapper">
                <a href="/training_and_placement_cell/student" class="brand-logo" style="padding-left:10px;">Placement Cell</a>
            <ul style="float:right;">
                <li><a href="/training_and_placement_cell/student">Home</a></li>
                <li><a href="/training_and_placement_cell/form/studentForm/student">Student Form</a></li>
                <li><a href="/training_and_placement_cell/student/companyList">Companies</a></li>
                <li><a href="/training_and_placement_cell/profile/student/student">Profile</a></li>
                <li><a href="/training_and_placement_cell/student/selectedStudent">Selection Status</a></li>
            </ul>
          </div>
        </nav>
            <div class="col s12 m4 offset-m4">
                <h4>Selected Students</h4>
            </div>
            

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