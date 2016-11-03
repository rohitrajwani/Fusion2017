@extends('layout')

@section('title')
  Handle Requests
@stop

@section('content')
<nav class="mynav">
    <div class="nav-wrapper">
      <ul>
      <li><a href="/time_table_management/view_tt">View Time Table</a></li>
      <li><a href="/time_table_management/scheduleanextraclass">Book a Slot</a></li>
      <li><a href="/time_table_management/creatett">Create Time Table</a></li>
      <li><a href="/time_table_management/viewallrequests">Handle Requests</a></li>
      </ul>
    </div>
  </nav>
<table class="bordered highlight centered"> 
<thead>
 <tr> 
 <th>Booked By</th>
 <th>Booked On</th> 
 <th>Booked For</th> 
 <th>Start Time</th>
 <th>End Time</th>
 <th>Strength</th>
 <th>Course Code</th> 
  <th>Room Alotted</th> 
  <th>Action</th>
 </tr> 
 </thead>
  <tbody>
  @foreach($requests as $request)
      <tr>
      <td>{{ $request->requester_id }}</td>
      <td>{{ $request->created_at }}</td>
      <td>{{ $request->date }}</td>
      <td>{{ $request->start_time }}</td>
      <td>{{ $request->end_time }}</td>
      <td>{{$request->expected_no_of_students }}</td>
      <td>{{ $request->purpose }}</td>
      
      <td>
        <select name='room_alotted' id='room_alotted{{$request->req_id}}'>
          <option value="Choose Room" disabled selected>Choose Room</option>
          <option value="">Reject</option>
        </select>
      </td>

      <td><input type="button" id="btn{{$request->req_id}}" class="request waves-effect btn" value="Submit">
      </td>
    </tr>
  @endforeach
    </tbody> 
    </table> 
    <script>
      $(document).ready(function(){
          @foreach($requests as $request)
            var stime = "{{ $request->start_time}}";
            var etime = "{{ $request->end_time }}";
            var date = "{{ $request->date }}";

            var data = "stime=" + stime + "&etime="+ etime +"&date=" + date;
            $.ajax({
              url:"/time_table_management/get_slots",
              type:"GET",
              data:data,
              success:function(data){
                for(var i=0; i<data.length; i++){
                  $('#room_alotted{{$request->req_id}}').append("<option value='"+ data[i] +"'>"+ data[i] +"</option>");
                }

                $('#room_alotted{{$request->req_id}}').trigger('contentChanged');
              }
            })

            $('#room_alotted{{$request->req_id}}').on('contentChanged', function() {
              $(this).material_select();
            });
          @endforeach
      });

      $(".request").click(function(){
        var rid = $(this).attr('id');
        var req_id = rid.slice(3);
        
        var data = "room_id=" + $("#room_alotted"+req_id).val() + "&req_id=" + req_id;
          
        $.ajax({
          url:"/time_table_management/db_update",
          type:"GET",
          data:data,
          success:function(data){
            location.reload();
          }
        })
      });
    </script>
  @stop
