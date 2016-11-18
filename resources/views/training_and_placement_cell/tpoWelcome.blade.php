@extends('training_and_placement_cell.layout')

@section('content')


        
        <div class="main-container row">
            
            <div class="col s12 m6 offset-m3">
                <h4>Training and Placement Officer</h4>
            </div>

            <a href="/training_and_placement_cell/tpo/page">
                <div class="col m1 offset-m2 link" style="background-color:#076392;">
                    <center><h5 style="color:white;"><i class="fa fa-home"></i></h5></center>
                </div>
            </a>
            
            

            @if($alert = Session::get('alert'))
                <script type="text/javascript">alert("{{$alert}}");</script>
            @endif

            <div class="container col s11" style= "position:relative;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);margin-left:50px;padding-right:50px;margin-top:30px;padding-top:50px;padding-bottom:50px;margin-bottom:60px;">
           
                <div class="row">
                
                    
                    <div class="button-container col s12 m6">
    <a href="/training_and_placement_cell/tpo/studentList1" class="button col s8 offset-s2">
        <i class="fa fa-university"></i>
        <div class="divider col s12"></div>
        <h5 class="col s12">Student List</h5>
    </a>
                    </div>
            
                
                    <div class="button-container col s12 m6">
    <a href="/training_and_placement_cell/tpo/form/companyForm" class="button col s8 offset-s2">
       <i class="fa fa-pencil-square-o"></i>
        <div class="divider col s12"></div>
        <h5 class="col s12">Add Company </h5>
    </a>
                    </div>
                </div>
                <div class="row">
                    <div class="button-container col s12 m6">
    <a href="/training_and_placement_cell/tpo/companyList1" class="button col s8 offset-s2">
       <i class="fa fa-users"></i>
        <div class="divider col s12"></div>
        <h5 class="col s12">Company List</h5>
    </a>
                    </div>
               
                    <div class="button-container col s12 m6">
    <a href="/training_and_placement_cell/tpo/selectedStudent" class="button col s8 offset-s2">
       <i class="fa fa-check-square-o"></i>
        <div class="divider col s12"></div>
        <h5 class="col s12">Selected Students</h5>
    </a>
                    </div>
                
                
                </div></div>
                
          
      
      
           
            </div>
 @stop