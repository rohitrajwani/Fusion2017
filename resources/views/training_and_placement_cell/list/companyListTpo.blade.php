@extends('layout')

@section('placement_content')

	<div class="main-container row">
            <div class="col s12 m4 offset-m4">
                <h4>Company list</h4>
            </div>
            
           
             <a href="/training_and_placement_cell/tpo/page">
                <div class="col m1 offset-m3 link" style="background-color:#076392;">
                    <center><h5 style="color:white;"><i class="fa fa-home"></i></h5></center>
                </div>
            </a>
             
      
      		@foreach( $company as $comp )
           <div class="container col s10" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);;margin-left:75px;">
           
                <div class="col s3"><h5 style="float:left;">{{ $comp->name }}</h5></div>
                  <div class="col s3">
                      <span style="font-size:20px;margin-top:20px;">{{ $comp->arrival_date }}</span>
                     
                </div>
                <div class="col s3">
                     <a href="/training_and_placement_cell/tpo/profile/company1/{{ $comp->company_id }}" class="waves-effect btn">Profile</a>
                     
                </div>

                <div class="col s3">
                     <a href="/training_and_placement_cell/tpo/companyStudent/{{ $comp->company_id }}" class="waves-effect btn">Applicants</a>
                     
                </div>
          </div>
            @endforeach
          
            </div>

@stop