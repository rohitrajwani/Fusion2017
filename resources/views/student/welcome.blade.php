@extends('studentlayout')

@section('name')

	{{ $name}}
@stop



@section('content')
<div class="col s12 m9 l9">
				
				<h4>About Gymkhana</h4>
				<div class="divider"></div>
				<p align="justify">Students Gymkhana is constituted to evolve a disciplined self-governance for carrying out various extracurricular in-campus activities and to establish a responsible and accountable student body. Students Gymkhana is governed by Student Senate which is constituted in democratic way through elections among each discipline and batch of the students. Student Senate members are elected through direct ballot voting, every year in the first week of January. Every registered student of the Institute is by-default member of student gymkhana and would have right to vote. All members of the student gymkhana who have their CPI >= 6.5 will be eligible to make their candidature for the Student Senate.</p>
				<p align="justify">The Students Senate has 2-3 representatives from each class. There are around 40 members in the Student Senate. Various gymkhana clubs that are part of Cultural, Sports and Technical, work under Students gymkhana. Club coordinators and co-coordinators will be selected based on their skill and past performance in the Institute by the members of that club and duly ratified by the Student Senate. All members of the student gymkhana who have their CPI>= 6.0 are eligible to become mentors, coordinators, co-coordinators for various clubs.</p>
				<p align="justify">Student gymkhana is headed by Dean (Students) who is nominated by Board of Governor of the Institute for three years. Dean (Students) chairs all the meetings of the Student Senate and guides student representatives in organizing gymkhana activities throughout the year. Apart from this, three faculty members designated as Sports, Cultural and Technical Counsellors, look after sports, cultural and technical activities respectively and respective major festivals organized by the students gymkhana in their supervision.</p>
			</div>
			<div class="col s12 m3 l3 notification_box">
				<div class="teal lighten-5">
					<div class="notification_head">	
						<h4 class="valign center-align">Notification</h4>
						<div class="divider"></div>
					</div>
					<div class="marquee">
						<!--<marquee direction="up" behavior="scroll" height="300"  scrollamount="3" vspace="30"  onmouseover="this.stop();" onmouseout="this.start();"> -->
						<div class="marquee_box">
						<?php $count=0 ?>
						@foreach($notification as $notifications)
										<?php if($count == 4) break; ?>
    
    					<p><i class="fa  fa-arrow-circle-right"></i> 
																			{{ $notifications->notification}}
																	
						</p>
						<!-- <p><i class="fa  fa-arrow-circle-right"></i>  this website is under construction it will be launced soon</p>
						<p><i class="fa  fa-arrow-circle-right"></i>  aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
						<p><i class="fa  fa-arrow-circle-right"></i>  aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
						 --><!-- </marquee> -->
						<?php $count++; ?>
						@endforeach
										
						</div>
					</div>
				</div>
			</div>


@stop