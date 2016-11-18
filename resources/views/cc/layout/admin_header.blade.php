@extends('cc.layout.layout')
@section('admin_header')
@push('css')
<style>

      body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      }

      main {
      flex: 1 0 auto;
      }


</style>

    <link rel="stylesheet" href="cc/asset/css/font.css">
    <link rel="stylesheet" href="cc/asset/css/style.css">
    <!--<link rel="stylesheet" href="cc/asset/css/newcss_style.css">-->
@endpush

<!--Tabs-->
      <ul class="tabs" id="nav_tab">
            <li class="tab col s3"><a class="active" href="#all">ALL</a></li>
            <li class="tab col s3"><a  href="#faculty">Faculty</a></li>
            <li class="tab col s3"><a  href="#staff">Staff</a></li>
            <li class="tab col s3 "><a href="#student">Student</a></li>
         
      </ul>


<!--Form For Sorting Option-->
 <form  id="update_form" action="/cc-complaint/sort" method="post" enctype="multipart/form-data" >

<div class="row-right">
<div class="col s2 offset-s10 m2 offset-m1o l3 offset-l9">
            <ul >
                  <li style="display: inline;">
                    <div class="input-field col s6">
                        <select  style="  margin-top: 8px;margin-right: 20px;height: 35px;width: 50px;line-height: 1; float: right;" name="order" id="order"  required/>
                                <option value="0" disabled selected>Date</option>
                                <option value="1">Ascending</option>
                                <option value="2">Descending</option>
                        </select>
                        <label>Sort In</label>
                    </div>
                  </li>

                  <li style="display: inline;">
                          <button type="submit" name="submit" value="go" class= "btn-small waves-effect waves-green btn-flat #1565c0 blue darken-3 white-text" style="
                          margin-top: 8px;
                          margin-right: 20px;  
                          height: 35px;
                          width: 50px;
                          line-height: 1;
                          float: right;
                          border: 2px solid lightgray;
                          border-radius: 0px;
                          background-color: rgba(0,0,0,0);
                         text-align: center;
                          ">Go</button>
                  </li>
            </ul>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
      </div>
      </div>
</form>


      <div class="container"> 


          <!--Home page start for all Registered complaints-->
<div  id="all">


    <h5 class="#424242-text center-align"><b> All Registered Complaints </b></h5>

    <table class="centered  highlight responsive-table">
            <thead>
            <tr>
                <th data-field="id">No.</th>
                <th data-field="date">DATE</th>
                <th data-field="from">FROM</th>
                <th data-field="category">CATEGORY</th>
              
                <!--<th data-field="status">Status</th>-->
                
                  <th data-field="status">STATUS</th>
                  <th data-field="edit" align="center">VIEW</th>

            </tr>
            </thead>
            <tbody>
             <tr>
                    <?php $i=1; ?>
                    
                    @foreach($all as $all_data)
                     <td><?php echo $i++ ; ?></td>

                     <td>{{ $all_data->created_at}}</td>

                     <td>{{ $all_data->user_type}}</td>

                    <td>{{ $all_data->category}}</td>

                     <td>
                              @if($all_data->status==1)
                                  <h6 class="green-text">Accepted</h6>
                              @else
                                  <h6 class="blue-text">In Progress </h6>
                              @endif       
                              </td>

                     
                          
               
               <td>
                       <button data-target="modal{{$all_data->complaint_id}}" class="btn modal-trigger">Show</button>
                 <!-- Modal Structure -->
                  <div id="modal{{$all_data->complaint_id}}" class="modal modal-fixed-footer">
                    <div class="modal-content">
                    <h5 class="#424242-text center-align"><b>Complain Details </b></h5>
                              <table class="centered bordered   responsive-table">
                                    <tbody>
                                    <tr>
                                        <td><b>Category</b></td>
                                        <td>{{$all_data->category}}</td>
                                     </tr>

                                     <tr>
                                          <td><b>Sub Category</b></td>
                                          <td>{{$all_data->sub_category}}</td>
                                     </tr>
                                     
                                     <tr>
                                      <td><b>CC No</b></td>
                                        <td>
                                        @if($all_data->cc_no==0)
                                              {{'Other'}}
                                            @else
                                          {{$all_data->cc_no}}
                                         @endif
                                        </td>
                                     </tr>

                                      <tr>
                                        <td><b>PC No</b></td>
                                        <td>{{$all_data->pc_no}}</td>
                                      </tr>

                                      <tr>
                                        <td><b>Registered</b></td>
                                        <td>{{$all_data->created_at}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Last Update</b></td>
                                        <td>{{$all_data->updated_at}}</td>
                                      </tr>
                                  

                                    </tbody>
                                    </table>
                    </div>
                    <div class="modal-footer">
                          <form  id="update_form" action="/cc-complaint/updateAll" method="post" enctype="multipart/form-data" >
                              <div class="row">
                                    <div class="input-field col s12 l6  ">
                                                            
                                                          <p>
                                                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                           <input class="with-gap " name="status" type="radio" id="sucess{{$all_data->complaint_id}}"  value="1" checked />
                                                          <label for="sucess{{$all_data->complaint_id}}" style="margin bottom:20px;">Accepted</label>
                                                          <input class="with-gap "  name="status" type="radio" id="wait{{$all_data->complaint_id}}" value="0"/>
                                                          <label for="wait{{$all_data->complaint_id}}" style="margin bottom:20px;">Not Now</label>
                                                          <input type="hidden" name="hid_complaint_id" value="{{$all_data->complaint_id}}">
                                                          </p>

                              </div>
                            <div class="input-field col s12 l1 offset-l1 ">
                                                        <button type="submit" name="submit" value="submit" class= "modal-action modal-close waves-effect waves-green btn-flat #1565c0 blue darken-3 white-text" style="height: 35px;margin top: 10px;">Submit</button>
                            </div>
                            </div>
                       </form> 
                    </div>
                </div>
              </td>
    </tr>
    @endforeach
    </tbody>
    </table>


         
 </div>
            

     <!--Categotized By Faculty-->
     <div  id="faculty">

                        <h5 class="#424242-text center-align"><b> Faculty Registered Complaints </b></h5>

                        <table class=" centered highlight responsive-table">
                                <thead>
                                <tr>
                                <th data-field="id">No.</th>
                                <th data-field="date">DATE</th>
                                
                                <th data-field="category">CATEGORY</th>
                                  <!--<th data-field="status">Status</th>-->
                                    <th data-field="status">STATUS</th>
                                <th data-field="edit" >VIEW</th>

                                </tr>
                                </thead>
                                <tbody>
                        <tr>
                              <?php $i=1; ?>
                              @foreach($faculty as $faculty_data)
                               <td><?php echo $i++ ; ?></td>

                               <td>{{ $faculty_data->created_at}}</td>
                               
                                <td>{{ $faculty_data->category}}</td>  
                              
                                <td>
                              @if($faculty_data->status==1)
                                  <h6 class="green-text">Accepted</h6>
                              @else
                                  <h6 class="blue-text">In Progress </h6>
                              @endif       
                              </td>

                     
                         
                         <td>
                                 <button data-target="fac_modal{{$faculty_data->complaint_id}}" class="btn modal-trigger">Show</button>
                           <!-- Modal Structure -->
                            <div id="fac_modal{{$faculty_data->complaint_id}}" class="modal modal-fixed-footer">
                              <div class="modal-content">
                              <h5 class="#424242-text center-align"><b>Complain Details </b></h5>
                                  <table class="centered bordered  responsive-table">
                                        <tbody>
                                        <tr>
                                        <td><b>Category</b></td>
                                         <td>{{$faculty_data->category}}</td>
                                         </tr>
                                         <tr>
                                        <td><b>Sub Category</b></td>
                                         <td>{{$faculty_data->sub_category}}</td>
                                         </tr>
                                         <tr>
                                        <td><b>CC No</b></td>
                                         <td>{{$faculty_data->cc_no}}</td>
                                         </tr>

                                          <tr>
                                          <td><b>PC No</b></td>
                                           <td>{{$faculty_data->pc_no}}</td>
                                          </tr>
                                                <tr>
                                        <td><b>Registered</b></td>
                                        <td>{{$faculty_data->created_at}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Last Update</b></td>
                                        <td>{{$faculty_data->updated_at}}</td>
                                      </tr>
                                      

                                        </tbody>
                                        </table>
                              </div>

                                   <div class="modal-footer">
                          <form  id="update_form" action="/cc-complaint/updateAll" method="post" enctype="multipart/form-data" >
                              <div class="row">
                                    <div class="input-field col s12 l6  ">
                                                            
                                                          <p>
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                           <input class="with-gap " name="status" type="radio" id="fsucess{{$faculty_data->complaint_id}}"  value="1" checked />
                                                          <label for="fsucess{{$faculty_data->complaint_id}}" style="margin bottom:20px;">Accepted</label>
                                                          <input class="with-gap "  name="status" type="radio" id="fwait{{$faculty_data->complaint_id}}" value="0"/>
                                                          <label for="fwait{{$faculty_data->complaint_id}}" style="margin bottom:20px;">Not Now</label>
                                                          <input type="hidden" name="hid_complaint_id" value="{{$faculty_data->complaint_id}}">
                                                          </p>

                              </div>
                            <div class="input-field col s12 l1 offset-l1 ">
                                                        <button type="submit" name="submit" value="submit" class= "modal-action modal-close waves-effect waves-green btn-flat #1565c0 blue darken-3 white-text" style="height: 35px;margin top: 10px;">Submit</button>
                            </div>
                            </div>
                       </form> 
                    </div


                          </div>
                      </td>
                 </tr>
           @endforeach
                        </tbody>
                        </table>
 </div>


    <!--Categorized  By Staff-->
 <div  id="staff">

                      <h5 class="#424242-text center-align"><b> Staff Registered Complaints </b></h5>

                      <table class=" centered highlight responsive-table">
                              <thead>
                              <tr>
                              <th data-field="id">No.</th>
                              <th data-field="date">DATE</th>
                              
                              <th data-field="category">CATEGORY</th>
                               <!--<th data-field="status">Status</th>-->
                               <th data-field="status">STATUS</th>
                              <th data-field="edit">VIEW</th>

                              </tr>
                              </thead>
                              <tbody>
                      <tr>
                            <?php $i=1; ?>
                            @foreach($staff as $staff_data)
                             <td><?php echo $i++ ; ?></td>

                             <td>{{ $staff_data->created_at}}</td>

                           

                             
                              <td>{{ $staff_data->category}}</td> 

                               <td>
                              @if($staff_data->status==1)
                                  <h6 class="green-text">Accepted</h6>
                              @else
                                  <h6 class="blue-text">In Progress </h6>
                              @endif       
                              </td>

                     
                           
                       
                       <td>
                               <button data-target="smodal{{$staff_data->complaint_id}}" class="btn modal-trigger">Show</button>
                         <!-- Modal Structure -->
                          <div id="smodal{{$staff_data->complaint_id}}" class="modal modal-fixed-footer">
                            <div class="modal-content">
                            <h5 class="#424242-text center-align"><b>Complain Details </b></h5>
                                <table class="centered bordered   responsive-table">
                                      <tbody>
                                      <tr>
                                      <td><b>Category</b></td>
                                       <td>{{$staff_data->category}}</td>
                                       </tr>
                                       <tr>
                                      <td><b>Sub Category</b></td>
                                       <td>{{$staff_data->sub_category}}</td>
                                       </tr>
                                       <tr>
                                      <td><b>CC No</b></td>
                                       <td>{{$staff_data->cc_no}}</td>
                                       </tr>

                                        <tr>
                                        <td><b>PC No</b></td>
                                         <td>{{$staff_data->pc_no}}</td>
                                        </tr>

                                      <tr>
                                        <td><b>Registered</b></td>
                                        <td>{{$staff_data->created_at}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Last Update</b></td>
                                        <td>{{$staff_data->updated_at}}</td>
                                      </tr>
                                    

                                      </tbody>
                                      </table>
                            </div>
                            <div class="modal-footer">
                                  <form  id="update_form" action="/cc-complaint/updateAll" method="post" enctype="multipart/form-data" >
                                      <div class="row">
                                            <div class="input-field col s12 l6  ">
                                                                    
                                                                        <p><input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                                         <input class="with-gap " name="status" type="radio" id="ssucess{{$staff_data->complaint_id}}"  value="1" checked />
                                                                        <label for="ssucess{{$staff_data->complaint_id}}" style="margin bottom:20px;">Accepted</label>
                                                                        <input class="with-gap "  name="status" type="radio" id="swait{{$staff_data->complaint_id}}" value="0"/>
                                                                        <label for="swait{{$staff_data->complaint_id}}" style="margin bottom:20px;">Not Now</label>
                                                                        <input type="hidden" name="hid_complaint_id" value="{{$staff_data->complaint_id}}">
                                                                        </p>

                                      </div>
                                    <div class="input-field col s12 l1 offset-l1 ">
                                                                <button type="submit" name="submit" value="submit" class= "modal-action modal-close waves-effect waves-green btn-flat #1565c0 blue darken-3 white-text" style="height: 35px;margin top: 10px;">Submit</button>
                                    </div>
                                    </div>
                               </form> 
                            </div>
                        </div>
                    </td>
               </tr>
         @endforeach
                      </tbody>
                      </table>
                      
         
 </div>
            
    <!--Sory By Student-->
    <div  id="student">
                        <h5 class="#424242-text center-align"><b> Student Registered Complaints </b></h5>

                        <table class="centered highlight responsive-table">
                                <thead>
                                <tr>
                                <th data-field="id">No.</th>
                                <th data-field="date">DATE</th>
                                   
                                <th data-field="category">CATEGORY</th>
                                 <!--<th data-field="status">Status</th>-->
                                   <th data-field="status">STATUS</th>
                                <th data-field="edit">VIEW</th>

                                </tr>
                                </thead>
                                <tbody>
                        <tr>
                              <?php $i=1; ?>
                              @foreach($student as $student_data)
                               <td><?php echo $i++ ; ?></td>

                               <td>{{ $student_data->created_at}}</td>
 

                               
                                <td>{{ $student_data->category}}</td>  

                                 <td>
                              @if($student_data->status==1)
                                  <h6 class="green-text">Accepted</h6>
                              @else
                                  <h6 class="blue-text">In Progress </h6>
                              @endif       
                              </td>
  
                         
                         <td>
                                 <button data-target="stmodal{{$student_data->complaint_id}}" class="btn modal-trigger">Show</button>
                           <!-- Modal Structure -->
                            <div id="stmodal{{$student_data->complaint_id}}" class="modal modal-fixed-footer">
                              <div class="modal-content">
                              <h5 class="#424242-text center-align"><b>Complain Details </b></h5>
                                  <table class=" centered bordered  responsive-table">
                                        <tbody>
                                        <tr>
                                        <td><b>Category</b></td>
                                         <td>{{$student_data->category}}</td>
                                         </tr>
                                         <tr>
                                        <td><b>Sub Category</b></td>
                                         <td>{{$student_data->sub_category}}</td>
                                         </tr>
                                         <tr>
                                        <td><b>CC No</b></td>
                                         <td>{{$student_data->cc_no}}</td>
                                         </tr>

                                          <tr>
                                          <td><b>PC No</b></td>
                                           <td>{{$student_data->pc_no}}</td>
                                          </tr>
                                           <tr>
                                        <td><b>Registered</b></td>
                                        <td>{{$student_data->created_at}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Last Update</b></td>
                                        <td>{{$student_data->updated_at}}</td>
                                      </tr>
                                      

                                        </tbody>
                                        </table>
                              </div>
                              <div class="modal-footer">
                                    <form  id="update_form" action="/cc-complaint/updateAll" method="post" enctype="multipart/form-data" >
                                        <div class="row">
                                              <div class="input-field col s12 l6  ">
                                                                      
                                                                          <p><input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                                           <input class="with-gap " name="status" type="radio" id="stsucess{{$student_data->complaint_id}}"  value="1" checked />
                                                                          <label for="stsucess{{$student_data->complaint_id}}" style="margin bottom:20px;">Accepted</label>
                                                                          <input class="with-gap "  name="status" type="radio" id="stwait{{$student_data->complaint_id}}" value="0"/>
                                                                          <label for="stwait{{$student_data->complaint_id}}" style="margin bottom:20px;">Not Now</label>
                                                                          <input type="hidden" name="hid_complaint_id" value="{{$student_data->complaint_id}}">
                                                                          </p>

                                        </div>
                                      <div class="input-field col s12 l1 offset-l1 ">
                                                                  <button type="submit" name="submit" value="submit" class= "modal-action modal-close waves-effect waves-green btn-flat #1565c0 blue darken-3 white-text" style="height: 35px;margin top: 10px;">Submit</button>
                                      </div>
                                      </div>
                                 </form> 
                              </div>
                          </div>
                      </td>
                 </tr>
           @endforeach
                        </tbody>
                        </table>
           </div>
           



      </div>
  <hr>
        <footer class="page-footer #1565c0 blue darken-3" id="footer_div">
                
                   
               <!--</div>-->
                
              
          
            <div class="footer-copyright #1565c0 blue darken-3" id="footer_copy">
                <div id="foot_cont" class="left #000000 black-text" >
                    
                    © 2016 iiitdmj.com. All rights reserved.
                </div>
            </div>
        </footer>
<!--</div>
</div>-->
        @push('js')
    
  


        <script>  
            $( document ).ready(function(){
            $(".dropdown-button").dropdown();
            });
        </script>
        <script>
            (function($) {
            $(function() {

            $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            hover: true, // Activate on hover
            belowOrigin: true, // Displays dropdown below the button
            // Displays dropdown with edge aligned to the left of button
            }
            );

            }); // End Document Ready
            })($);
        </script>
        <script>
           $(".button-collapse").sideNav();
        </script>
        <script>
            $(document).ready(function() {
            $(".dropdown-button").dropdown();
            });
            $(".button-collapse").sideNav();
        </script>    
        <script>
              $(document).ready(function() {
              $('select').material_select();
              });
        </script>
        <script >
            $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
            });

        </script>
@endpush
@endsection