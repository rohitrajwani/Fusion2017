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
                                   <li><a href='/PBI/welcome_chairman'>Home</a></li>
             
                   <li><a href="/PBI/viewgrades_chair">View Grades</a>
            <li><a href="/PBI/chairmanguidelines">Guidelines</a></li>
                    <li>
          <a class="dropdown-button" href="#!" data-activates="dropdown1">
              Search
              <i class="fa fa-arrow-down right"></i>
          </a>
          <ul id="dropdown1" class="dropdown-content">
  <li><a href="/PBI/student_list">Student List</a></li>
  <li><a href="/PBI/faculty_list">Faculty List</a></li>

</ul>
      </li>
                    <li><a href="/PBI/viewreport_chair">View Report</a></li>
                     <li><a href="/PBI/schedule">Post Schedule</a>

                   <li><a href="/PBI/view_marks_chair">Marks</a>
                            </ul>
                          </div>
                        </nav> 
                    </div>
        
			    <div class="row">
				<div class="col m8"><br><br>
				<table>
                    <tr><th><center>Faculty Name</center></th><th><center>PBI Topic</center></tr>
                    @foreach ($topics as $t)


                    <tr>
                    
                    
                    <td><center>{{$t->name}}
                       </center></td>
                        <td><center>{{$t->pbi_name}}
                        </center></td></tr>
                        @endforeach
                    </table>
                
				</div>
				
				<div class="col m4">
				<h4 style="text-align:left">Contact:</h4>
				<ul>
				<li><a href="#">Dr. Prabin Kumar Padhy -Chairman (prabin16@iiitdmj.ac.in)</a></li>

<li><a href="#">Ms. Tulika Ruth Nelson- Placement Officer (tulika@iiitdmj.ac.in)</a></li>

<li><a href="#">Mr. Anil Kumar- Placement Office (anil@iiitdmj.ac.in)</a></li>

<li><a href="#">Mr. Jitesh Tripathi- Academic Office (trip@iiitdmj.ac.in)</a></li>
<ul>
				</div>

               
       @stop


