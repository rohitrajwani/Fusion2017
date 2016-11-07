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
			    <div class="row">
				<div class="col m9"><br><br>
				<table>
                    <tr><th>S.NO.</th><th>PBI Topic</th><th>Faculty Name</th><th><center>Pbi Description</center></th></tr>
                    @foreach ($topics as $t)


                    <tr>
                    <td>{{$t->pbi_id}}
                        </td>
                    <td>{{$t->pbi_name}}
                        </td>
                    <td>{{$t->name}}
                        </td>
                         <td>{{$t->pbi_description}}
                        </td></tr>
                        @endforeach
                    </table>
                
				</div>
				
				<div class="col m3">
				<h4 style="text-align:left">Contact:</h4>
				<ul>
				<li><a href="#">Dr. Prabin Kumar Padhy -Chairman (prabin16@iiitdmj.ac.in)</a></li>

<li><a href="#">Ms. Tulika Ruth Nelson- Placement Officer (tulika@iiitdmj.ac.in)</a></li>

<li><a href="#">Mr. Anil Kumar- Placement Office (anil@iiitdmj.ac.in)</a></li>

<li><a href="#">Mr. Jitesh Tripathi- Academic Office (trip@iiitdmj.ac.in)</a></li>
<ul>
				</div>

               
               @stop
