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
                  <ul class="side-nav" id="mobile-demo">
             
                     <li><a href="#">Home</a></li>
                    
                    <li><a href="uploadtopic1">Upload PBI Topic</a></li>
                   
            <li><a href="guidelines">Guidelines</a></li>
                    <li><a href="viewreport">ViewReports</a></li>
                   <li><a href="marks">Upload Marks</a>
                   <li><a href="grades">Upload Grades</a>
           <li><a href="feedback">Feedback</a></li>
                  </ul>
                          </div>
                        </nav> 
                    </div>
          <div class="row">
        <div class="col m12"><br>
        <table>
                    <tr><th>type</th><th>PBI Report</th><th>
                    @foreach($report as $t)


                    <tr>
                    <td>{{$t->type}}
                        </td>
                    <td><a href="/uploads/uploadreport/{{$t->path}}" download >{{$t->path}}</a>
                        </td>
                    
                    <td><form action="/PBI/review" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}">

          
          <input id="email" type="textarea" class="validate" name="review">
          <label for="email">Review</label></form></td>
          <td>      <button type="submit" class="waves-effect btn col" name="submit">Submit Review</button></td></tr>
                        @endforeach
                    </table>
                
        </div>
        
       <!-- <div class="col m4">
        <h4 style="text-align:left">Contact:</h4>
        <ul>
        <li><a href="#">Dr. Prabin Kumar Padhy -Chairman (prabin16@iiitdmj.ac.in)</a></li>

<li><a href="#">Ms. Tulika Ruth Nelson- Placement Officer (tulika@iiitdmj.ac.in)</a></li>

<li><a href="#">Mr. Anil Kumar- Placement Office (anil@iiitdmj.ac.in)</a></li>

<li><a href="#">Mr. Jitesh Tripathi- Academic Office (trip@iiitdmj.ac.in)</a></li>
<ul>
        </div>-->

               
                @stop

