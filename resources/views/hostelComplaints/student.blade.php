@extends('layout')

@section('content')

<!-- The segment below contains the main buttons used in the page-->
@if($alert = Session::get('alert'))
<script type="text/javascript">alert("{{$alert}}");</script>
@endif

<div class="main-container row">

  <div class="border2 col s12">
    <!-- Modal Trigger -->
    <div class="titlebar1">

     <button data-target="modal1" class="waves-effect btn-flat modal-trigger">Add Complaints</button>
   </div>
   <!-- Modal Structure -->
   <div id="modal1" class="modal row">
    <form action ="hostelComplaints" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="modal-content">
        <h4>Complaint Form</h4>

        <!-- <div class="file-field input-field">
          <div class="btn">
            <span>File</span>
            <input type="file">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div> -->    
        <div class="row">
          <div class="input-field col s6">
            <select name="category" required>
              <option value="" disabled selected>Category</option>
              <option value="Room">Room</option>
              <option value="Wash Room">Washroom</option>
              <option value="Reading Room">Reading Room</option>
              <option value="Common Room">Common Room</option>
              <option value="TV Room">TV Room</option>
              <option value="Others">Others</option>
            </select>
          </div>

          <div class="input-field col s6">
            <select name ="sub_category" required>
              <option value="" disabled selected>Subcategory</option>
              <option value="Electrical">Electrical</option>
              <option value="Plumbing">Plumbing</option>
              <option value="Carpentary">Carpentary</option>
              <option value="Janitor">Janitor</option>
              <option value="Others">Others</option>
            </select>
          </div>        
        </div>
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" required name="description"></textarea>
          <label for="description">Description</label>
        </div>            
        <button type="submit" class="waves-effect btn col s2 offset-s5">Submit</button>

      </div>

    </form>
  </div>

</div>
<div class="border2 col s12">      
  <div class="container row section">
   <span class="fa" style="font-size:8px">

    <div class="button-container col s3">
      <a href="#mycom" class="button col s12 ">
        <i class="fa fa-home" align="center"></i>
        <div class="divider col s12"></div>
        <h6 class="col s12" text-align="center" >My Complaints </h6>
      </a>                                                                                                
    </div>

    <div class="button-container col s3">
      <a href="#unsolve" class="button col s12 l12 ">
        <i class="fa fa-sign-out"></i>
        <div class="divider col s12 l12"></div>
        <h6 class="col s12 l12">Unsolved Complaints: {{$pendingcomplaints}}</h6>
      </a>
    </div>

    <div class="button-container col s3">
      <a href="#rules" class="button col s12 ">
        <i class="fa fa-tv"></i>
        <div class="divider col s12"></div>
        <h6 class="col s12">Rules and Regulations</h6>
      </a>
    </div>
    <div class="button-container col s3">
      <a href="#modall2" class="button col s12 incharge-trigger">
        <i class="fa fa-book"></i>
        <div class="divider col s12"></div>
        <h6 class="col s12">Incharge</h6>
      </a>
    </div>           
  </span>
</div>
</div>
<div class="fixed-action-btn horizontal">
  <a class="btn-floating btn-large red" href="#top">UP
  </a>

</div>
</div>
<div id="modall2" class="modal bottom-sheet">
  <div class="modal-content">
    <h4>Incharge</h4>
    <p>
      <ul class="collection">        
        <li class="collection-item avatar">
          <img src="{{URL::asset('/a.jpg')}}" alt="abstergo"><b>Warden:</b> {{$warden}}          {{$wardenemail}}</li>
          <li class="collection-item avatar">
            <img src="{{URL::asset('/a.jpg')}}" alt="abstergo"><b>Assistant Warden:</b> {{$assistantwarden}}        {{$awardenemail}}</li>
            <?php
            for ($i = 0; $i < $cnt; $i++)
            {
              echo "<li class=\"collection-item avatar\">
              <img src=\"a.jpg\" alt=\"abstergo\">
              <b>Caretaker:</b>"  .$caretaker[$i] ."         ".  $caretakeremail[$i] ."</li>";
            }
        // <li class="collection-item"><b>Caretaker:</b> $caretaker[$i]   $caretakeremail[$i]</li>
            ?>
          </ul>
        </p>
      </div>
    </div> 

    <div class="main-container1 row">
      <div class="titlebar">Recently Solved Complaints</div>
      <div class="border4">          

        <table class="bordered highlight fixed" text-align="center">         
          <thead>
            <tr>
              <th>Complaint Id</th>
              <th>Category</th>
              <th>Sub-Category</th>        
              <th>Description</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Comments</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach($solvedcomplaints as $complaint)
            
            <tr>      
              <col width="80px" />
              <td>{{$complaint->complaint_id}}</td>
              <td>{{$complaint->category}}</td>
              <td>{{$complaint->sub_category}}</td>
              <td>{{$complaint->description}}</td>
              <td>{{$complaint->status}}</td>
              <td>{{$complaint->created_at}}</td>
              <td>{{$complaint->updated_at}}</td>
              <td><a href="#modal{{$complaint->complaint_id}}" class="btn-floating btn-large waves-effect waves-light red view">
                <i class="fa fa-comment"></i>
              </a>

              <!-- <div id="modall{{$complaint->complaint_id}}" class="modal">
                <div class="modal-content">
                  <img src="a.jpg" alt="complaint_img">
                </div>
              </div> -->

              <div id="modal{{$complaint->complaint_id}}" class="modal">
                <form action ="/hostelComplaints/{{$complaint->complaint_id}}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="modal-content">
                    <h4>Comments</h4>

                    <div class="input-field col s12">
                      Are you satisfied by the complaint?
                    </div>

                    <div class="input-field col s12 ">
                      <input id="comments" type="text" class="validate" name="comments">     
                      <label for="comments">Comments (Optional)</label>
                    </div>

                    <!-- <div class="file-field input-field">
                      <div class="btn col">
                        <span>File</span>
                        <input type="file">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                  -->
                  <!-- <div class="row"> -->
                    <button name="status" value="Solved" type="submit" class="waves-effect btn col s4 push-s2">Yes</button>
                    <button name="status" value="Unsolved" type="submit" class="waves-effect btn col s4 push-s2">No</button>
                  <!-- </div> -->

                </div>
              </form>
            </div>    
          </td>          
        </tr>

        @endforeach  
      </tbody>
    </table>
    <section id="unsolve"></section>
  </div>      
</div>



<div class="main-container1 row">  
 <div class="titlebar">Unsolved Complaints</div>
 <div class="border4">          

  <table class="bordered highlight" text-align="center"> 
    <thead>
      <tr>
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

      @foreach($unsolvedcomplaints as $complaint)

      <tr>      
        <col width="150px" />
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
  <section id="mycom"></section>
</div>
</div>



<div class="main-container1 row">
 <div class="titlebar">My Complaints</div>
 <div class="border4">          

  <table class="bordered highlight" text-align="center"> 
    <thead>
      <tr>
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

      @foreach($complaints as $complaint)

      <tr>      
        <col width="150px" />
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

<section id="rules"></section>

<div class="main-container1 row">
  <div class="titlebar">Rules and Reglations</div>
  <div class="border4">          

    <p>
      <ul class="collection">
        <li class="collection-item">Students are warned against using any derogatory or abusive language while describing their compalints.</li>
        <li class="collection-item">Student should wait for atleast a week before recomplaining in case an action has not been taken on your compalint. </li>
        <li class="collection-item">Student are rquested to not make fake complaints or else they will be fined.</li>
        <li class="collection-item">Students shall not contact caretaker or warden unless the complaint is about a really serious issue. </li>
      </ul>
    </p>
  </div>
</div>
<script>
$(document).ready(function() {
  $('select').material_select();
  $('.modal-trigger').leanModal();
  $('.incharge-trigger').leanModal();
  $('.view').leanModal();
});
$('#unsolved').click(function() {
  $('#modal{{$complaint->complaint_id}}').modal('hide');
});
</script>                

@stop
