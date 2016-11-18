@extends('training_and_placement_cell.layout')

@section('content')
        
        <div class="main-container row">
          
  
            <div class="col s12 m4 offset-m4">
                <h4>Company Info</h4>
            </div>
            

             <a href="/training_and_placement_cell/tpo/page">
                <div class="col m1 offset-m3 link" style="background-color:#076392;">
                    <center><h5 style="color:white;"><i class="fa fa-home"></i></h5></center>
                </div>
            </a>
            
                          
           <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
              @foreach( $company as $comp )
                <div class="col s12"><h5 style="float:left;">{{ $comp->name }}</h5></div>
                
                  <div class="col s12">
                      <br>
                      
                          <div class="row">
                          <div class="col s4">
                              <strong>Company Type </strong>
                      </div>
                      <div class="col s8">
                      {{ $comp->company_type }}
                      </div>
                               <div class="col s4">
                              <strong>Eligibility Criteria</strong>
                      </div>
                     <div class="col s8">
                      {{ $comp->eligibility_criteria}}
                               </div>
                               
                      <div class="col s4">
                          <strong> Minimum Qualification</strong>
                      </div>
                              <div class="col s8">
                      {{ $comp->min_qualification }}
                      </div>
                    
                            
                      <div class="col s4">
                          <strong>Salary offered</strong>
                          </div>
                          <div class="col s8">
                           {{ $comp->package }}
                          </div>
                    
                      
                      
                      <div class="col s4">
                          <strong>Arrival Date</strong>
                          </div>
                          <div class="col s8">
                       {{ $comp->arrival_date }}
                          </div>
                </div>
                      <div class="row">
                          <div class="col s4">
                      <a>
                  
                              </a></div></div>
                      </div>

                  @endforeach

                  @foreach( $company as $comp )
                  <a href="/training_and_placement_cell/tpo/form/companyForm/{{$comp->company_id}}" class="waves-effect btn">Update</a>
                  @endforeach
                      
           </div>
           
            </div>
            
          @stop  
            
            
          