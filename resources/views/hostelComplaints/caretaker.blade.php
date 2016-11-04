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

</div>
<div class="fixed-action-btn horizontal">
  <a class="btn-floating btn-large" href="#top">UP
  </a>
  
</div>
<section id="room"></section>

</div>
<!--This is for complaints sorted in descending order based on date and time -->
<div class="main-container1 row">
  <div class="titlebar2">Pending Complaints: {{$pendingcomplaints}}</div>
  
  <div class="row">
   <form action ="Complaints" method="POST">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">     
    <div class="input-field col s10 ">
      <input id="search" type="text" class="validate" name="search">     
      <label for="search">Search by Student ID</label>
    </div>
    <div class="col s2">
      <button type="submit" class="waves-effect btn col s12">Search</button>
    </div>
  </form>
</div>

<div class="titlebar">Searched Complaints</div>
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
        <th>Update Status</th>
      </tr>
    </thead>
    <tbody>
     <!-- using for loop to display all the entries of database -->
     @foreach($searchcomp as $complaint)
     <tr>
      <col width="40px" />
      <td>{{$complaint->student_id}}</td>              
      <td>{{$complaint->room_no}}</td>
      <td>{{$complaint->complaint_id}}</td>
      <td>{{$complaint->category}}</td>
      <td>{{$complaint->sub_category}}</td>
      <td>{{$complaint->description}}</td>
      <td>{{$complaint->status}}</td>
      <td>{{$complaint->created_at}}</td>
      <td>{{$complaint->updated_at}}</td>
      <td><button data-target="modal{{$complaint->complaint_id}}" class="waves-effect btn update">Update</button>

        <div id="modal{{$complaint->complaint_id}}" class="modal row">
          <form action ="/hostelComplaints/{{$complaint->complaint_id}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="modal-content">
              <h4>Update Status</h4>

              <div class="input-field col s12">
                Is this complaint solved ?
              </div>

              <button name="status" value="Solved" type="submit" class="waves-effect btn col s2 offset-s5">Yes</button>
              <button name="status" value="Unsolved" type="submit" class="waves-effect btn col s2 offset-s5">No</button>

            </div>
          </form>
        </div>                
      </td>
    </tr>
    @endforeach  
  </tbody>
</table>

</div>

</div>

<div class="main-container1 row">
  <div class="titlebar">Latest Complaints</div>
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
          <th>Update Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($complaints as $complaint)
        <tr>
          <col width="40px" />
          <td>{{$complaint->student_id}}</td>              
          <td>{{$complaint->room_no}}</td>
          <td>{{$complaint->complaint_id}}</td>
          <td>{{$complaint->category}}</td>
          <td>{{$complaint->sub_category}}</td>
          <td>{{$complaint->description}}</td>
          <td>{{$complaint->status}}</td>
          <td>{{$complaint->created_at}}</td>
          <td>{{$complaint->updated_at}}</td>
          <td><button data-target="modal{{$complaint->complaint_id}}" class="waves-effect btn update">Update</button>

            <div id="modal{{$complaint->complaint_id}}" class="modal row">
              <form action ="/hostelComplaints/{{$complaint->complaint_id}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-content">
                  <h4>Update Status</h4>

                  <div class="input-field col s12">
                    Is this complaint solved ?
                  </div>

                  <button name="status" value="Solved" type="submit" class="waves-effect btn col s2 offset-s5">Yes</button>
                  <button name="status" value="Unsolved" type="submit" class="waves-effect btn col s2 offset-s5">No</button>

                </div>
              </form>
            </div>                
          </td>
        </tr>
        @endforeach  
      </tbody>
    </table>
  </div>
  <section id="room"></section>
</div>

<div class="main-container1 row">
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
          <th>Update Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($roomcomplaints as $complaint)
        <tr>
          <col width="40px" />
          <td>{{$complaint->student_id}}</td>              
          <td>{{$complaint->room_no}}</td>
          <td>{{$complaint->complaint_id}}</td>
          <td>{{$complaint->category}}</td>
          <td>{{$complaint->sub_category}}</td>
          <td>{{$complaint->description}}</td>
          <td>{{$complaint->status}}</td>
          <td>{{$complaint->created_at}}</td>
          <td>{{$complaint->updated_at}}</td>
          <td><button data-target="modal{{$complaint->complaint_id}}" class="waves-effect btn update">Update</button>

            <div id="modal{{$complaint->complaint_id}}" class="modal row">
              <form action ="/hostelComplaints/{{$complaint->complaint_id}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-content">
                  <h4>Update Status</h4>

                  <div class="input-field col s12">
                    Is this complaint solved ?
                  </div>

                  <button name="status" value="Solved" type="submit" class="waves-effect btn col s2 offset-s5">Yes</button>
                  <button name="status" value="Unsolved" type="submit" class="waves-effect btn col s2 offset-s5">No</button>

                </div>
              </form>
            </div>                
          </td>
        </tr>
        @endforeach  
      </tbody>
    </table>
  </div>
  <section id="washroom"></section>
</div>

<!-- This segment will display all the complaints of category WashRoom-->
<div class="main-container1 row">
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
          <th>Update Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($washroomcomplaints as $complaint)
        <tr>
          <col width="40px" />
          <td>{{$complaint->student_id}}</td>              
          <td>{{$complaint->room_no}}</td>
          <td>{{$complaint->complaint_id}}</td>
          <td>{{$complaint->category}}</td>
          <td>{{$complaint->sub_category}}</td>
          <td>{{$complaint->description}}</td>
          <td>{{$complaint->status}}</td>
          <td>{{$complaint->created_at}}</td>
          <td>{{$complaint->updated_at}}</td>
          <td><button data-target="modal{{$complaint->complaint_id}}" class="waves-effect btn update">Update</button>

            <div id="modal{{$complaint->complaint_id}}" class="modal row">
              <form action ="/hostelComplaints/{{$complaint->complaint_id}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-content">
                  <h4>Update Status</h4>

                  <div class="input-field col s12">
                    Is this complaint solved ?
                  </div>

                  <button name="status" value="Solved" type="submit" class="waves-effect btn col s2 offset-s5">Yes</button>
                  <button name="status" value="Unsolved" type="submit" class="waves-effect btn col s2 offset-s5">No</button>

                </div>
              </form>
            </div>                
          </td>
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
          <th>Update Status</th>
        </tr>
      </thead>
      <tbody>
        <!-- using for loop to display all the entries of database -->
        @foreach($tvroomcomplaints as $complaint)
        <tr>
          <col width="40px" />
          <td>{{$complaint->student_id}}</td>              
          <td>{{$complaint->room_no}}</td>
          <td>{{$complaint->complaint_id}}</td>
          <td>{{$complaint->category}}</td>
          <td>{{$complaint->sub_category}}</td>
          <td>{{$complaint->description}}</td>
          <td>{{$complaint->status}}</td>
          <td>{{$complaint->created_at}}</td>
          <td>{{$complaint->updated_at}}</td>
          <td><button data-target="modal{{$complaint->complaint_id}}" class="waves-effect btn update">Update</button>

            <div id="modal{{$complaint->complaint_id}}" class="modal row">
              <form action ="/hostelComplaints/{{$complaint->complaint_id}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-content">
                  <h4>Update Status</h4>

                  <div class="input-field col s12">
                    Is this complaint solved ?                        
                  </div>

                  <button name="status" value="Solved" type="submit" class="waves-effect btn col s2 offset-s5">Yes</button>
                  <button name="status" value="Unsolved" type="submit" class="waves-effect btn col s2 offset-s5">No</button>

                </div>
              </form>
            </div>                
          </td>
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
          <th>Update Status</th>
        </tr>
      </thead>
      <tbody>
       <!-- using for loop to display all the entries of database -->
       @foreach($readingroomcomplaints as $complaint)
       <tr>
        <col width="40px" />
        <td>{{$complaint->student_id}}</td>              
        <td>{{$complaint->room_no}}</td>
        <td>{{$complaint->complaint_id}}</td>
        <td>{{$complaint->category}}</td>
        <td>{{$complaint->sub_category}}</td>
        <td>{{$complaint->description}}</td>
        <td>{{$complaint->status}}</td>
        <td>{{$complaint->created_at}}</td>
        <td>{{$complaint->updated_at}}</td>
        <td><button data-target="modal{{$complaint->complaint_id}}" class="waves-effect btn update">Update</button>

          <div id="modal{{$complaint->complaint_id}}" class="modal row">
            <form action ="/hostelComplaints/{{$complaint->complaint_id}}/complaints" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="modal-content">
                <h4>Update Status</h4>

                <div class="input-field col s12">
                  Is this complaint solved ?                        
                </div>

                <button name="status" value="Solved" type="submit" class="waves-effect btn col s2 offset-s5">Yes</button>
                <button name="status" value="Unsolved" type="submit" class="waves-effect btn col s2 offset-s5">No</button>

              </div>
            </form>
          </div>                
        </td>
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
          <th>Update Status</th>
        </tr>
      </thead>
      <tbody>
       <!-- using for loop to display all the entries of database -->
       @foreach($commonroomcomplaints as $complaint)
       <tr>
        <col width="40px" />
        <td>{{$complaint->student_id}}</td>              
        <td>{{$complaint->room_no}}</td>
        <td>{{$complaint->complaint_id}}</td>
        <td>{{$complaint->category}}</td>
        <td>{{$complaint->sub_category}}</td>
        <td>{{$complaint->description}}</td>
        <td>{{$complaint->status}}</td>
        <td>{{$complaint->created_at}}</td>
        <td>{{$complaint->updated_at}}</td>
        <td><button data-target="modal{{$complaint->complaint_id}}" class="waves-effect btn update">Update</button>

          <div id="modal{{$complaint->complaint_id}}" class="modal row">
            <form action ="/hostelComplaints/{{$complaint->complaint_id}}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="modal-content">
                <h4>Update Status</h4>

                <div class="input-field col s12">
                  Is this complaint solved ?                        
                </div>

                <button name="status" value="Solved" type="submit" class="waves-effect btn col s2 offset-s5">Yes</button>
                <button name="status" value="Unsolved" type="submit" class="waves-effect btn col s2 offset-s5">No</button>

              </div>
            </form>
          </div>                
        </td>
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
          <th>Update Status</th>
        </tr>
      </thead>
      <tbody>
       <!-- using for loop to display all the entries of database -->
       @foreach($othercomplaints as $complaint)
       <tr>
        <col width="40px" />
        <td>{{$complaint->student_id}}</td>              
        <td>{{$complaint->room_no}}</td>
        <td>{{$complaint->complaint_id}}</td>
        <td>{{$complaint->category}}</td>
        <td>{{$complaint->sub_category}}</td>
        <td>{{$complaint->description}}</td>
        <td>{{$complaint->status}}</td>
        <td>{{$complaint->created_at}}</td>
        <td>{{$complaint->updated_at}}</td>
        <td><button data-target="modal{{$complaint->complaint_id}}" class="waves-effect btn update">Update</button>

          <div id="modal{{$complaint->complaint_id}}" class="modal row">
            <form action ="/hostelComplaints/{{$complaint->complaint_id}}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="modal-content">
                <h4>Update Status</h4>

                <div class="input-field col s12">
                  Is this complaint solved ?                        
                </div>

                <button name="status" value="Solved" type="submit" class="waves-effect btn col s2 offset-s5">Yes</button>
                <button name="status" value="Unsolved" type="submit" class="waves-effect btn col s2 offset-s5">No</button>

              </div>
            </form>
          </div>                
        </td>
      </tr>
      @endforeach  
    </tbody>
  </table>
</div>
</div>

<script>
<section id="home"></section>


<script>
$(document).ready(function() {
  $('select').material_select();
  $('.update').leanModal();
  $('.modal-trigger').leanModal();
});
$('#unsolved').click(function() {
  $('#modal{{$complaint->complaint_id}}').modal('hide');
});
</script>

@stop