@extends('layout')

@section('title')
  Handle Requests
@stop

@section('content')
<nav class="mynav">
    <div class="nav-wrapper">
      <ul>
      <li><a href="/time_table_management">Back to Dashboard</a></li>
      <li><a href="/time_table_management/view_tt">View Time Table</a></li>
      <li><a href="/time_table_management/scheduleanextraclass">Schedule an Extra Class</a></li>
      <li><a href="/time_table_management/creatett">Create Time Table</a></li>

      @if(Auth::user()->user_type=='faculty')
	<li><a href="/time_table_management/viewmyrequests">View My Requests</a></li>
      @endif
      </ul>
    </div>
  </nav>

@if($fac_mode)
<input name="filters" type="radio" id="all"/>
<label for="all">All</label>

<input name="filters" type="radio" id="app" />
<label for="app">Approved</label>

<input name="filters" type="radio" id="rej" />
<label for="rej">Rejected</label>
@endif

<table class="bordered highlight centered"> 
<thead>
 <tr> 
 @if(!$fac_mode)
  <th>Booked By</th>
 @endif
 <th>Booked On</th> 
 <th>Booked For</th> 
 <th>Start Time</th>
 <th>End Time</th>
 <th>Course Code</th> 
 <th>Type</th>
 <th>Strength</th>
 @if($fac_mode)
 <th>Status</th>
 @endif
 <th>Room Alotted</th> 
 @if(!$fac_mode)
 <th>Action</th>
 @endif
 </tr> 
 </thead>
  <tbody>
  @foreach($requests as $request)
      <tr>
      @if(!$fac_mode)
      <td>{{ $request->requester_id }}</td>
      @endif
      <td>{{ $request->created_at }}</td>
      <td>{{ $request->date }}</td>
      <td>{{ $request->start_time }}</td>
      <td>{{ $request->end_time }}</td>
      <td id="purpose{{$request->req_id}}"></td>
      <td id="type{{$request->req_id}}"></td>
      <td>{{$request->expected_no_of_students }}</td>
      @if(!$fac_mode)
      <td>
        <select name='room_alotted' id='room_alotted{{$request->req_id}}'>
          <option value="Choose Room" disabled selected>Choose Room</option>
          <option value="">Reject</option>
        </select>
      </td>

      <td><input type="button" id="btn{{$request->req_id}}" class="request waves-effect btn" value="Submit" disabled>
      </td>
      @endif

      @if($fac_mode)
      <td>{{ $request->status }}</td>
      <td>{{ $request->room_id }}</td>
      @endif
      

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
            });

            $('#room_alotted{{$request->req_id}}').on('contentChanged', function() {
              $(this).material_select();
            });
	   
      	    var purp = "{{$request->purpose}}", type = "";
      	    if(purp[purp.length - 1] === 'E'){
      	 	   type = "Extra Class";
      	    }
                  else if (purp[purp.length-1] === 'Q'){
      		    type = "Quiz";
      	    }

	    if(type==='Extra Class' || type==='Quiz')
	    	purp = purp.slice(0, purp.length-1);

            $('#purpose{{$request->req_id}}').html(purp);
            $('#type{{$request->req_id}}').html(type);
	    	    
          @endforeach

          @foreach($requests as $request)
            var purp = "{{$request->purpose}}", type = "";
                  if(purp[purp.length - 1] === 'E'){
                type = "Extra Class";
                  }
                  else if (purp[purp.length-1] === 'Q'){
                  type = "Quiz";
                  }

                  purp = purp.slice(0, purp.length-1);

                  $('#purpose{{$request->req_id}}').html(purp);
                  $('#type{{$request->req_id}}').html(type);

          @endforeach


          var loc = window.location.search;
          
          if(loc){
            var loc_d = loc.split('?');
            var search_term = loc_d[1];

            if(search_term){
              var filter = search_term.split('=')[0];

              $('#'+filter).attr('checked', true);
            }
            else{
              $('#all').attr('checked', true);
            }
          }
          else{
            $('#all').attr('checked', true);
          }
      });

      $('input:radio').on('change', function(){
        var type = $(this).attr('id');
        var data;

        if(type==='all'){
          window.location = '/time_table_management/viewmyrequests';
        }

        else if(type==='app')
          window.location = '/time_table_management/viewmyrequests?app=1';

        else
          window.location = '/time_table_management/viewmyrequests?rej=1';
      });

      $('select[id^="room_alotted"]').on('change', function(){
        var rid = $(this).attr("id");
        
        rid = rid.slice(12);

        $("#btn"+rid).attr('disabled', false);
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
