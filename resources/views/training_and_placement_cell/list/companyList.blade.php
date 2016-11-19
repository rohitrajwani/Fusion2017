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
                <h4>Company list</h4>
            </div>
            
            
      
      		@foreach( $company as $comp )
           <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s4"><h5 style="float:left;">{{ $comp->name }}</h5></div>
                  <div class="col s4">
                      <span style="font-size:20px;margin-top:20px;">{{ $comp->arrival_date }}</span>
                     
                </div>
                <div class="col s4">
                     <a href="/training_and_placement_cell/student/profile/company/{{ $comp->company_id }}" class="waves-effect btn">View Profile</a>
                     
                </div>
          </div>
            @endforeach
          
            </div>

@stop