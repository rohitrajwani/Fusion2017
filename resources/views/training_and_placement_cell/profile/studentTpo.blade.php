@extends('training_and_placement_cell.layout')

@section('content')
  <div class="main-container row">
            
            <div class="col s12 m4 offset-m4">
                <h4>Student Info</h4>
            </div>
            
            
             <a href="/training_and_placement_cell/tpo/page">
                <div class="col m1 offset-m3 link" style="background-color:#076392;">
                    <center><h5 style="color:white;"><i class="fa fa-home"></i></h5></center>
                </div>
            </a>
            
            
            <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
            @foreach ($student as $stud)
                  <div class="col s12">
                
                        <h5 style="float:left;">
                              {{ $stud->name }}
                        </h5>
                  </div>
                  <div class="col s12">
                        <ul>
                              <li>{{ $stud->branch }}</li>
                              <li>PDPM Indian Institute of Information Technology, Desgign and Manufacturing Jabalpur</li>
                              <li>{{ $stud->email }}</li>
                        </ul>
                  </div>
           @endforeach
          </div>
      
      
           <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Objective</h5></div>
                
                  <div class="col s8">
                  @foreach ($objective as $obj)
                   {{ $obj->objective }}  
                   <br> 
                  @endforeach        
           </div>
           
          </div>
                
               <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Area of interests</h5></div>
                  <div class="col s8">
                  @foreach( $interest as $interest )
                      <div class="row">
                        <div class="col s6">
                          {{ $interest->interest }}
                        </div>
                      </div>
                  @endforeach
           </div>
          </div>
            
            <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Education</h5></div>
                  <div class="col s8">
                        @foreach($education as $edu)
                       <div class="row">
                       
                          <div class="col s12">
                              <strong>{{ $edu->institute }}</strong>
                      </div>
                      <div class="col s12">
                      {{ $edu->year }}
                      </div>
                      <div class="col s12">
                      {{ $edu->qualification }}
                      </div>
                      <div class="col s12">
                      {{ $edu->performance }}
                      </div>
                      
                      </div>
                      @endforeach
                          
                
                             
            </div>
        </div>
            
        
       
            
            
           <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Skills</h5></div>
                  <div class="col s8">
                    @foreach( $skills as $skills )
                      <div class="row">
                        <div class="col s6">
                          {{ $skills->skill }}
                        </div>
                      </div>
                  @endforeach
           </div>
          
            
        
        </div>
            
            
            
            <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Projects</h5></div>
                  <div class="col s8">
                        @foreach( $projects as $proj )
                             <div class="row">
                          <div class="col s12">
                              <strong>{{ $proj->name }}</strong>
                      </div>
                      <div class="col s12">
                      {{ $proj->year }}
                      </div>
                      <div class="col s12">
                      {{ $proj->description }}
                      </div>
                      <div class="col s12">
                      {{ $proj->url }}
                      </div>
                      </div>
                      @endforeach
                      
           </div>
          
            
        
        </div>
            
            
            
           <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Certifications</h5></div>
                  <div class="col s8">
                        @foreach( $certif as $cert )
                           <div class="row">
                          <div class="col s12">
                              <strong>{{ $cert->cert }}</strong>
                      </div>
                      <div class="col s12">
                      {{ $cert->auth }}
                      </div>
                      <div class="col s12">
                      {{ $cert->licen }}
                      </div>
                      <div class="col s12">
                      {{ $cert->url }}
                      </div>
                        <div class="col s12">
                      {{ $cert->year }}
                      </div>
                      </div>
                        @endforeach
           </div>
          
            
        
        </div>
            
            
           <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Positions of Responsibilities</h5></div>
                  <div class="col s8">
                        @foreach ($respo as $res)
                            <div class="row">
                          <div class="col s12">
                              <strong>{{ $res->org }}</strong>
                      </div>
                      <div class="col s12">
                      {{ $res->role }}
                      </div>
                      <div class="col s12">
                      {{ $res->year }}
                      </div>
                      
                      </div>
                      @endforeach
                      
           </div>
          
            
        
        </div>
            
            
            
            <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Courses</h5></div>
                  <div class="col s8">
                        @foreach ( $courses as $cour )
                            <div class="row">
                          <div class="col s12"><strong>{{ $cour->course }}</strong>
                      </div>
                      <div class="col s12">
                      {{ $cour->auth }}
                      </div>
                      
                      </div>
                      @endforeach
                      
           </div>
          </div>
     <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Internships</h5></div>
                  <div class="col s8">
                        @foreach ( $intern as $int )
                          <div class="row">
                          <div class="col s12">
                              <strong>{{ $int->profile }}</strong>
                      </div>
                      <div class="col s12">
                      {{ $int->org }}
                      </div>
                      <div class="col s12">
                      {{ $int->location }}
                      </div>
                        <div class="col s12"> 
                      {{ $int->start_date }} to {{ $int->end_date }}
                      </div>
                      
                       <div class="col s12">
                     <p>{{ $int->description }}</p>
                      </div>
                      </div>
                      @endforeach
           </div>
          </div>
 <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Training</h5></div>
                  <div class="col s8">
                        @foreach ( $train as $train )
                          <div class="row">
                          <div class="col s12">
                              <strong>{{ $train->training_name }}</strong>
                      </div>
                      <div class="col s12">
                      {{ $train->org }}
                      </div>
                      <div class="col s12">
                      {{ $train->location }}
                      </div>
                        <div class="col s12">
                      {{ $train->start_date }} to {{ $train->end_date }}
                      </div>
                     
                       <div class="col s12">
                           <p>{{ $train->description }}</p>
                      </div>
                      </div>
                      @endforeach
           </div>
          </div>
<div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Patent</h5></div>
                  <div class="col s8">
                        @foreach ( $patent as $pat )
                           <div class="row">
                          <div class="col s12">
                              <strong>{{ $pat->title }}</strong>
                      </div>
                      <div class="col s12">
                      {{ $pat->patent_office }}
                      </div>
                      <div class="col s12">
                      {{ $pat->application_no }}
                      </div>
                        <div class="col s12">
                      {{ $pat->issue_date }}
                      </div>
                      <div class="col s12">
                      {{ $pat->inventors }}
                      </div>
                      <div class="col s12">
                      {{ $pat->pat_url }}
                      </div>
                       <div class="col s12">
                           <p>{{ $pat->description }}</p>
                      </div>
                      </div>
                      @endforeach
           </div>
            </div>
            <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Publication</h5></div>
                  <div class="col s8">
                        @foreach ( $public as $pub )
                           <div class="row">
                          <div class="col s12">
                              <strong>{{ $pub->title }}</strong>
                      </div>
                      <div class="col s12">
                      {{ $pub->public }} 
                      </div>
                      <div class="col s12">
                       {{ $pub->date }}
                      </div>
                              <div class="col s12">
                      {{ $pub->url }}
                      </div>
                       <div class="col s12">
                           <p>{{ $pub->description }}</p>
                      </div>
                      </div>
                      @endforeach
           </div>
            </div>
             <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">Acheivements</h5></div>
                  <div class="col s8">
                        @foreach ( $achieve as $ach)
                           <div class="row">
                          <div class="col s12">
                              <strong>{{ $ach->event_name }}</strong>
                      </div>
                      <div class="col s12">
                      {{ $ach->org }}
                      </div>
                      <div class="col s12">
                      {{ $ach->year }}
                      </div>
                              <div class="col s12">
                      {{ $ach->result }}
                      </div>
                    
                      </div>
                      @endforeach
           </div>
           
            </div>

            
            
            </div>

            
@stop