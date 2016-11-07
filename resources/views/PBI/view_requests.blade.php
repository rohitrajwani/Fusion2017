@extends('layout')
@section('main_content')
            <h5 class="col s12 m4 offset-m4"><b>PROJECT BASED INTERNSHIP</b></h5>
            <div class="container col s12 ">
               
                    
                
                <div class="section col s12">

                    <div class="col s12 m12">
                        <!-- Dropdown Structure -->
                        
                        <nav class="mynav">
                          <div class="nav-wrapper">
                      <ul>
                       <li><a href="/PBI/welcome_faculty">Home</a></li>
                    
                    <li><a href="/PBI/uploadtopic1">Upload PBI Topic</a></li>
                   
            <li><a href="/PBI/facultyguidelines">Guidelines</a></li>
                    <li><a href="/PBI/viewreport">View Reports</a></li>
                                        <li><a href="/PBI/viewschedule">View Schedule</a></li>

                   <li><a href="/PBI/marks">Upload Marks</a>
                   <li><a href="/PBI/grades">Upload Grades</a>
                              <li><a href="/PBI/feedbackfaculty">Feedback</a></li>
                
             
                  </ul>
                     </div>
                        </nav> 
                  </div>

			    <div class="row">
        <div class="col m12"><br><br>
        <table>
                    <tr><th>Roll No</th><th>PBI Name</th><th>type</th><th>mentor info</th></tr>
                    @foreach ($grades as $t)
                    
                         
                        @if($t->pbi_status=="Pending")

                    <tr>
                   <td><a href="/PBI/view_requests/{{$t->student_id}}">{{$t->student_id}}</a>
                        </td>
                   
                    <td>{{$t->pbi_name}}
                        </td>
                    <td>{{$t->type}}
                        </td>
                      <td>{{$t->mentor_info}}
                        </td>
                    </tr>
                                  
                    

                    @endif
                        @endforeach   
                    </table>
                
        </div>
				
				 

               @stop