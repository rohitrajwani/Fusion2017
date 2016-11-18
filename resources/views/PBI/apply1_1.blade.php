@extends('layout')
@section('main_content')
            


            @if($alert = Session::get('alert'))
            <script type="text/javascript">alert("{{$alert}}");</script>
        @endif



            <h5 class="col s12 m4 offset-m4">PROJECT BASED INTERNSHIP</h5>
            <div class="container col s12 ">
               
                    
                
                <div class="section col s12">

                    <div class="col s12 m12">
                        <!-- Dropdown Structure -->
                        
                        <nav class="mynav">
                          <div class="nav-wrapper">
                            <ul>
                               <li><a href='/PBI/Home'>Home</a></li>
                    <li><a href="/PBI/pbi_topics">PBI Topics</a></li>
                   <li><a href="/PBI/viewgrades">View Grades</a>
            <li><a href="/PBI/studentguidelines">Guidelines</a></li>
                    <li><a href="/PBI/reports">Submit Report</a></li>
                   <li><a href="/PBI/view_marks">View Marks</a>
                    <li><a href="/PBI/viewschedule">View Schedule</a>
           <li><a href="/PBI/feedback">Feedback</a></li>
                    
                    
                            
                            </ul>
                          </div>
                        </nav> 
                    </div>
        
        <div class="main-container row">
            <h4 class="col s12 m6 offset-m3">APPLICATION FORM</h4>
            <div class="container" style="width:90%">
      <div class="row">
        <div class="input-field col s12">
         <form action="/PBI/apply_pbi" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token()}}">

         
         <!-- <input id="email" type="text" class="validate" name="name1">
          <label for="email">Name</label>
        </div>
      </div>






     
<!-- <p>Select your branch<br>
    <input name="group1" type="radio" id="test1" />
    <label for="test1">E.C.E.</label>
</p>
<p>
    <input name="group1" type="radio" id="test2" />
    <label for="test2">C.S.E.</label>
</p>
<p>
    <input name="group1" type="radio" id="test4" />
    <label for="test4">M.E.</label>
</p> 
 <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="rollno">
          <label for="email">Roll No.</label>
        </div>
      </div>
 <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="branch">
          <label for="email">Branch</label>
        </div>
      </div> -->
      
      
      
    <!--  <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="faculty">
          <label for="email">Faculty in charge</label>
        </div>
      </div>-->


      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate"  name="pbitopic">
          <label for="email">Select Topic you want to Pursue in PBI:</label>
           <table>
                    
                  <td>Select Topic you want to Pursue in PBI:</td>


                <!--<td><p><input name="pbitopic" type="radio" value="1" id="rb31" />
                 <label for="rb31"></label></p></td>-->


                    <tr><th>Topics</th><th>
                    @foreach ($topics as $t)


                <tr>
                   
                    <td>{{$t->pbi_name}}
                        </td>
                    
                      
                    </tr>
                        @endforeach
                    </table>
        </div>
      </div>
   <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate" name="type">
          <label for="email">Type</label>
        </div>
      </div>
 <div class="row">
    <div class="input-field col s12">
      <textarea id="textarea1" class="materialize-textarea" name="mentor"></textarea>
      <label for="first_name">Mentor Info(If External):</label>
</div>
    </div>
    
    <div class="row">

    <div class="col s12 m3">


       <button type="submit" class="waves-effect btn col" name="submit"> SUBMIT</button>
    </div>

  
    </form>
  </div>
  @stop