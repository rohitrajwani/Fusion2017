@extends('training_and_placement_cell.layout')

@section('content')
        
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
          {!! Form::open(array('route' => 'company_store', 'class' => 'form')) !!}
  
            <div class="col s12 m4 offset-m4">
                <h4>Company Info</h4>
            </div>
            
              <div style="display:none;">
                  {!! Form::text('student_id', $students[0], 
                      array('id' => 'student_id', 
                            'class'=>'validate')) !!}
                </div>

                <div style="display:none;">
                  {!! Form::text('branch', $students1[0], 
                      array('id' => 'branch', 
                            'class'=>'validate')) !!}
                </div>

                <div style="display:none;">
                  {!! Form::text('company_id', $company1[0], 
                      array('id' => 'company_id', 
                            'class'=>'validate')) !!}
                </div>

                <div style="display:none;">
                  {!! Form::text('eligibility', $company2[0], 
                      array('id' => 'eligibility', 
                            'class'=>'validate')) !!}
                </div>
            
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
                  {!! Form::submit('Apply', 
                    array('class'=>'waves-effect btn')) !!}
                              </a></div></div>
                      </div>

                  @endforeach
                      
           </div>
            </div>
            {!! Form::close() !!}
            
          @stop  
            
            
          