		

		<div class="sidebar">
            <ul id="slide-out" class="side-nav fixed">
                @if(Auth::user()->status == 2)
                <li><a href="/vhbooking" class="waves-effect">Visitor's Hostel Booking</a></li>
                <li><a href="/time_table_management" class="waves-effect">Time Table Management</a></li>
                <li><a href="TA/" class="waves-effect">TA Management</a></li>
                <li><a href="/hostelComplaints" class="waves-effect">Hostel Complaints</a></li>
                <li><a href="/cc-complaint" class="waves-effect">CC Complaints</a></li>
                <li><a href="/Assignments_and_Course_Documentation" class="waves-effect">Assignments and Course Documentation</a></li>
                <li><a href="/PBI/" class="waves-effect">PBI</a></li>
                <li><a href="/SPACS/" class="waves-effect">Awards and Scholarship Portal</a></li>
                <li><a href="/event_organizing" class="waves-effect">Event Organizing</a></li>
                <li><a href="/bus_management" class="waves-effect">Bus Management</a></li>
                <li><a href="/CAMS/" class="waves-effect">Class Attendance</a></li>
                <li><a href="/counselling_cell" class="waves-effect">Counselling Cell</a></li>
                <li><a href="/course_management" class="waves-effect">Course Management System</a></li>
                <li><a href="/ELMS" class="waves-effect">Employee Leave Management System</a></li>
                <li><a href="/health-centre" class="waves-effect">Health Center</a></li>
                <li><a href="/training_and_placement_cell" class="waves-effect">Placement Cell</a></li>
                <li><a href="/online_quizzing/quiz" class="waves-effect">Online Quizzing</a></li>
                <li><a href="/stock_management" class="waves-effect">Stock Management</a></li>
                <li><a href="/student_feedback" class="waves-effect">Student Feedback System</a></li>
                <li><a href="/mess_management" class="waves-effect">Mess Management</a></li>
                <li><a href="/acadaff/" class="waves-effect">Academic Affairs</a></li>

                <li><div class="divider"></div></li>
                <li><a class="subheader">Subheader</a></li>
                @endif
            </ul>
        </div>