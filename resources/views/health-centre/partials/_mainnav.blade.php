<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  {{-- <li><a href="#!">Profile</a></li> --}}
  @if(Auth::user()->user_type === 'student' || Auth::user()->user_type === 'faculty')
  <li><a href="{{ route('appointment.next') }}">Upcoming Appointments</a></li>
  <li><a href="{{ route('appointment.index') }}">Previous Appointments</a></li>
  @else
    <li><a href="{{ route('appointmentdoctor.previous') }}">Previous Appointments</a></li>
    <li><a href="{{ route('appointmentdoctor.next') }}">Upcoming Appointments</a></li>
  @endif
  {{-- <li class="divider"></li> --}}
  {{-- <li><a href="#!">Upcoming Appointment</a></li> --}}
  <li><a href="/logout">LogOut</a></li>
</ul>
<nav class="mynav">
  <div class="nav-wrapper nav-mar">
    <a href="{{ url('/health-centre') }}" class="brand-logo">PMC</a>
    <ul class="right hide-on-med-and-down">
      <li class="{{ Request::is('/health-centre') ? "active" : "" }}"><a href="/health-centre">Home</a></li>
      @if(Auth::user()->user_type === 'student' || Auth::user()->user_type === 'faculty')
      <li><a href="{{ url('/health-centre/#about') }}">About</a></li>
      <li><a href="{{ url('/health-centre/#timetable') }}">Time Table</a></li>
      <li><a href="{{ url('/health-centre/#contact') }}">Contact</a></li>
    @endif
      <li class="{{ Request::is('health-centre/doctor') ? "active" : "" }}"><a href="health-centre/doctor">Doctor</a></li>
      <!-- Dropdown Trigger -->
      <li>
          <a class="dropdown-button" href="#!" data-activates="dropdown1">
            <?php
            $user_id = Auth::user()->username;
            $results = DB::select( DB::raw("SELECT * FROM student WHERE student_id = '$user_id'") );
            $results1 =  DB::select( DB::raw("SELECT * FROM staff WHERE staff_id = '$user_id'") );
            ?>
            @if(Auth::user()->user_type === 'student' || Auth::user()->user_type === 'faculty')
            @foreach ($results as $result)
              {{ $result->name }}
            @endforeach
            @else
              @foreach ($results1 as $result)
                {{ $result->name }}
              @endforeach
          @endif
              <i class="fa fa-arrow-down right"></i>
          </a>
      </li>
    </ul>
  </div>
</nav>
