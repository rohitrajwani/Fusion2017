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
				<div class="col m8">
				<h4 style="text-align:left">About Us</h4>
				<p>The academic curriculum of PDPM Indian Institute of Information Technology, Design & Manufacturing (IIITDM) Jabalpur focuses very strongly on hands on experience, interdisciplinary education and project oriented learning. Its agenda is to produce graduates who are not only technically competent but also possess other skills like capability to learn through experience, critical thinking, practical aptitude and ability to synthesize the solution. It also recognizes that not all aspects of learning can be taught in the conventional way of classroom (or laboratory) teaching methodology.</p><p>
				Realizing that there are important elements of learning in an organization, the Institute has opened its academic programme for approximately six months long project-based internship (PBI) opportunity to its students to be executed after the completion of sixth semester. The internship aims to provide on-the-job experience or exposure to ongoing research and development in an organization under the supervision of able practitioners/researchers. </p>
                
				</div>
				<div class="col m4">
				<h4>Latest Updates</h4>
				<ul>
				<li><a href="#">Final Evaluation Committee CSE</a></li><li><div class="divider"></div></li>
				<li><a href="#">Final Evaluation Committee ECE</a></li><li><div class="divider"></div></li>
				<li><a href="#">Final Evaluation Committee ME</a></li><li><div class="divider"></div></li>
		
				</div>
				</div>
                
                 <div class="row">
	  <div class="col s12 offset-m3 m5 ">



	  <a href="/PBI/view_requests" class="waves-effect waves-light btn-large">Approve PBI Forms</a>
	  </div>
	  </div>
				<div class="row">
				<div class="col m8">
				<h4 style="text-align:left">Contact:</h4>
				<ul>
				<li><a href="#">Dr. Prabin Kumar Padhy -Chairman (prabin16@iiitdmj.ac.in)</a></li>

<li><a href="#">Ms. Tulika Ruth Nelson- Placement Officer (tulika@iiitdmj.ac.in)</a></li>

<li><a href="#">Mr. Anil Kumar- Placement Office (anil@iiitdmj.ac.in)</a></li>

<li><a href="#">Mr. Jitesh Tripathi- Academic Office (trip@iiitdmj.ac.in)</a></li>
<ul>
				</div>
				<div class="col m4">
				<h4 style="text-align:left">Form Download</h4>
				<li><a href="#">PBI Form_Format</a></li>
    <li><a href="#">PBI_change_Format</a></li>
    <li><a href="#">Format for_Preparation_15day report</a></li>
    <li><a href="#">Evaluation formats (For Faculty)</a></li>
    <li><a href="#">Format for Preparation Interim Report</a></li>
    <li><a href="#">Format for_Preparation_of_Mid Term</a></li>
    <li><a href="#">Evaluation Process calendar and Guidelines of PBI</a></li>
				
				</div>
				</div>
                <h4>Testimonials</h4>
				<div class="row">
				<div class="col s12 m4">
				 
          <div class="card">
            <div class="card-image">
              <img src="{{URL::to('/img/img.jpg')}}">
              <span class="card-title">V.K.Chouhan</span>
            </div>
            <div class="card-content">
              <p>The aim of the project was to develop a advance railway signalling system for reducing delay in trains due to foggy conditions. The project was successfully completed by finding a cheap and practical solution to the problem. The idea was physically implemented on a scaled model.</p>
            </div>
            
          </div>
       

				</div>
				<div class="col s12 m4">
				 
          <div class="card">
            <div class="card-image">
              <img src="{{URL::to('/img/img3.jpg')}}">
              <span class="card-title">Arushi Dev</span>
            </div>
            <div class="card-content">
              <p>The aim of the project was to develop a advance railway signalling system for reducing delay in trains due to foggy conditions. The project was successfully completed by finding a cheap and practical solution to the problem. The idea was physically implemented on a scaled model.</p>
            </div>
            
          </div>
		  </div>
		  <div class="col s12 m4">
				 
          <div class="card">
            <div class="card-image">
              <img src="{{URL::to('/img/img2.jpg')}}">
              <span class="card-title">Prakhar Modi</span>
            </div>
            <div class="card-content">
              <p>The aim of the project was to develop a advance railway signalling system for reducing delay in trains due to foggy conditions. The project was successfully completed by finding a cheap and practical solution to the problem. The idea was physically implemented on a scaled model.</p>
            </div>
           
          </div>
		  </div>
				</div>                <h5><center>Collaborative Organizations for PBI</center></h5>
                <div class="wrapper row4">
  <figure class="clients"> 
    <!-- ################################################################################################ -->
    <ul class="clear">
      <li><a href="#"><img src="{{URL::to('/img/1.png')}}" alt=""></a></li>
      <li><a href="#"><img src="{{URL::to('/img/2.png')}}" alt=""></a></li>
      <li><a href="#"><img src="{{URL::to('/img/3.png')}}" alt=""></a></li>
      <li><a href="#"><img src="{{URL::to('/img/4.png')}}" alt=""></a></li>
      <li><a href="#"><img src="{{URL::to('/img/5.png')}}" alt=""></a></li>
    </ul>
    <!-- ################################################################################################ -->
  </figure>
</div>
                    <script>
            $(document).ready(function() {
                $('select').material_select();
              });
        </script>
		<script>
		     Javascript Initialization
               $(document).ready(function() {
                   $('select').material_select();
               });
        </script>
               @stop