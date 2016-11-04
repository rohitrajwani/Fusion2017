@extends('layout')

@section('content')

<!-- The segment below contains the main buttons used in the page-->
<div class="main-container row">
  <div class="border2 col s12">
    <nav>
      <div class="titlebar3">
        {{$name}}
      </div>
    </nav>

    <div class="container row section">
     <span class="fa" style="font-size:8px">
      <div class="button-container col s2 ">

        <a href="#room" class="button col s12 ">

          <i class="fa fa-home" align="center"></i>
          <div class="divider col s12"></div>
          <h6 class="col s12" text-align="center" >Room </h6>
        </a>                                                                                                
      </div>

      <div class="button-container col s2 l2 ">
        <a href="#washroom" class="button col s12 l12 ">
          <i class="fa fa-sign-out"></i>
          <div class="divider col s12 l12"></div>
          <h6 class="col s12 l12">Washroom </h6>
        </a>
      </div>

      <div class="button-container col s2 ">
        <a href="#tvroom" class="button col s12 ">
          <i class="fa fa-tv"></i>
          <div class="divider col s12"></div>
          <h6 class="col s12">TV Room </h6>
        </a>
      </div>
      <div class="button-container col s2">
        <a href="#readingroom" class="button col s12 ">
          <i class="fa fa-book"></i>
          <div class="divider col s12"></div>
          <h6 class="col s12">Reading Room </h6>
        </a>
      </div>

      <div class="button-container col s2">
        <a href="#commonroom" class="button col s12">
          <i class="fa fa-user"></i>
          <div class="divider col s12"></div>
          <h6 class="col s12">Common Room </h6>
        </a> 
      </div>

      <div class="button-container col s2">
        <a href="#others" class="button col s12">
          <i class="fa fa-arrow-right"></i>
          <div class="divider col s12"></div>
          <h6 class="col s12">Others</h6>
        </a>
      </div>
    </span>
  </div>
  <div class="fixed-action-btn horizontal">
  <a class="btn-floating btn-large red" href="#top">UP
  </a>
  
</div>

</div>
<div class="fixed-action-btn horizontal">
  <a class="btn-floating btn-large red" href="#top">UP
  </a>
  
</div>
</div>
<!--This is for complaints sorted in descending order based on date and time -->
<div class="main-container1 row">
  <div class="titlebar2">Pending Complaints: {{$pendingcomplaints}}</div>
  <div class="titlebar">Latest Complaints</div>
  <div class="border3">
    <table class="bordered highlight" text-align="center"> 
      <thead>
        <tr>
          <th>Student ID</th>
          <th>Room No.</th>             
          <th>Complaint Id</th>
          <th>Category</th>
          <th>Sub-Category</th>
          <th>Description</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Updated At</th>
          
        </tr>
      </thead>
      <tbody>
       <!-- using for loop to display all the entries of database -->
       @foreach($complaints as $complaint)
       <tr>
        <col width="20px" />
        <td>{{$complaint->student_id}}</td>              
        <td>{{$complaint->room_no}}</td>
        <td>{{$complaint->complaint_id}}</td>
        <td>{{$complaint->category}}</td>
        <td>{{$complaint->sub_category}}</td>
        <td>{{$complaint->description}}</td>
        <td>{{$complaint->status}}</td>
        <td>{{$complaint->created_at}}</td>
        <td>{{$complaint->updated_at}}</td>        
      </tr>
      @endforeach  
    </tbody>
  </table>
  
</div>
<section id="room"></section>
</div>

<div class="main-container2 row">
  <div class="titlebar">Room Complaints</div>
  <div class="border4">
    <table class="bordered highlight" text-align="center"> 
      <thead>
        <tr>
          <th>Student ID</th>
          <th>Room No.</th>
          <th>Complaint Id</th>
          <th>Category</th>
          <th>Sub-Category</th>
          <th>Description</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Updated At</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach($roomcomplaints as $complaint)
        <tr>
          <col width="20px" />
          <td>{{$complaint->student_id}}</td>              
          <td>{{$complaint->room_no}}</td>
          <td>{{$complaint->complaint_id}}</td>
          <td>{{$complaint->category}}</td>
          <td>{{$complaint->sub_category}}</td>
          <td>{{$complaint->description}}</td>
          <td>{{$complaint->status}}</td>
          <td>{{$complaint->created_at}}</td>
          <td>{{$complaint->updated_at}}</td>          
        </tr>
        @endforeach  
      </tbody>
    </table>
  </div>
  <section id="washroom"></section>
</div>

<!-- This segment will display all the complaints of category WashRoom-->
<div class="main-container2 row">
  <div class="titlebar">Washroom Complaints</div>
  <div class="border4">
    <table class="bordered highlight" text-align="center"> 
      <thead>
        <tr>
          <th>Student ID</th>
          <th>Room No.</th>
          <th>Complaint Id</th>
          <th>Category</th>
          <th>Sub-Category</th>
          <th>Description</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Updated At</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach($washroomcomplaints as $complaint)
        <tr>
          <col width="20px" />
          <td>{{$complaint->student_id}}</td>              
          <td>{{$complaint->room_no}}</td>
          <td>{{$complaint->complaint_id}}</td>
          <td>{{$complaint->category}}</td>
          <td>{{$complaint->sub_category}}</td>
          <td>{{$complaint->description}}</td>
          <td>{{$complaint->status}}</td>
          <td>{{$complaint->created_at}}</td>
          <td>{{$complaint->updated_at}}</td>          
        </tr>
        @endforeach  
      </tbody>
    </table>
  </div>
  <section id="tvroom"></section>
</div>

<!-- This segment will display all the complaints of category TV Room -->
<div class="main-container2 row">
  <div class="titlebar">TV Room Complaints</div>
  <div class="border4">
    <table class="bordered highlight" text-align="center"> 
      <thead>
        <tr>
          <th>Student ID</th>
          <th>Room No.</th>
          <th>Complaint Id</th>
          <th>Category</th>
          <th>Sub-Category</th>
          <th>Description</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Updated At</th>
          
        </tr>
      </thead>
      <tbody>
        <!-- using for loop to display all the entries of database -->
        @foreach($tvroomcomplaints as $complaint)
        <tr>
          <col width="20px" />
          <td>{{$complaint->student_id}}</td>              
          <td>{{$complaint->room_no}}</td>
          <td>{{$complaint->complaint_id}}</td>
          <td>{{$complaint->category}}</td>
          <td>{{$complaint->sub_category}}</td>
          <td>{{$complaint->description}}</td>
          <td>{{$complaint->status}}</td>
          <td>{{$complaint->created_at}}</td>
          <td>{{$complaint->updated_at}}</td>          
        </tr>
        @endforeach  
      </tbody>
    </table>
  </div>
  <section id="readingroom"></section>
</div>

<!-- This segment will display all the complaints of category Reading Room -->
<div class="main-container2 row">
  <div class="titlebar">Reading Room Complaints</div>
  <div class="border4">
    <table class="bordered highlight" text-align="center"> 
      <thead>
        <tr>
          <th>Student ID</th>
          <th>Room No.</th>
          <th>Complaint Id</th>
          <th>Category</th>
          <th>Sub-Category</th>
          <th>Description</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Updated At</th>
          
        </tr>
      </thead>
      <tbody>
       <!-- using for loop to display all the entries of database -->
       @foreach($readingroomcomplaints as $complaint)
       <tr>
        <col width="20px" />
        <td>{{$complaint->student_id}}</td>              
        <td>{{$complaint->room_no}}</td>
        <td>{{$complaint->complaint_id}}</td>
        <td>{{$complaint->category}}</td>
        <td>{{$complaint->sub_category}}</td>
        <td>{{$complaint->description}}</td>
        <td>{{$complaint->status}}</td>
        <td>{{$complaint->created_at}}</td>
        <td>{{$complaint->updated_at}}</td>          
      </tr>
      @endforeach  
    </tbody>
  </table>
</div>
<section id="commonroom"></section>
</div>

<!-- This segment will display all the complaints of category Common Room -->
<div class="main-container2 row">
  <div class="titlebar" >Common Room Complaints</div>
  <div class="border4">
    <table class="bordered highlight" text-align="center"> 
      <thead>
        <tr>
          <th>Student ID</th>
          <th>Room No.</th>
          <th>Complaint Id</th>
          <th>Category</th>
          <th>Sub-Category</th>
          <th>Description</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Updated At</th>
          
        </tr>
      </thead>
      <tbody>
       <!-- using for loop to display all the entries of database -->
       @foreach($commonroomcomplaints as $complaint)
       <tr>
        <col width="20px" />
        <td>{{$complaint->student_id}}</td>              
        <td>{{$complaint->room_no}}</td>
        <td>{{$complaint->complaint_id}}</td>
        <td>{{$complaint->category}}</td>
        <td>{{$complaint->sub_category}}</td>
        <td>{{$complaint->description}}</td>
        <td>{{$complaint->status}}</td>
        <td>{{$complaint->created_at}}</td>
        <td>{{$complaint->updated_at}}</td>        
      </tr>
      @endforeach  
    </tbody>
  </table>
</div>
<section id="others"></section>
</div>



<!- This segment will display all the complaints of category 'Others'-->
<div class="main-container2 row">
  <div class="titlebar">Other Complaints</div>
  <div class="border4">
    <table class="bordered highlight" text-align="center"> 
      <thead>
        <tr>
          <th>Student ID</th>
          <th>Room No.</th>
          <th>Complaint Id</th>
          <th>Category</th>
          <th>Sub-Category</th>
          <th>Description</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Updated At</th>
          
        </tr>
      </thead>
      <tbody>
       <!-- using for loop to display all the entries of database -->
       @foreach($othercomplaints as $complaint)
       <tr>
        <col width="20px" />
        <td>{{$complaint->student_id}}</td>              
        <td>{{$complaint->room_no}}</td>
        <td>{{$complaint->complaint_id}}</td>
        <td>{{$complaint->category}}</td>
        <td>{{$complaint->sub_category}}</td>
        <td>{{$complaint->description}}</td>
        <td>{{$complaint->status}}</td>
        <td>{{$complaint->created_at}}</td>
        <td>{{$complaint->updated_at}}</td>          
      </tr>
      @endforeach  
    </tbody>
  </table>
</div>
</div>


<script>
$(document).ready(function() {
  $('select').material_select();
  
});
</script>

@stop