@extends('layout')

@section('title')
    
    <title>Leave Application</title>

@stop

@section('main_content')
        <div class="main-container row">
            <nav class="mynav">
              <div class="nav-wrapper">
                <ul>
                  <li><a href="/ELMS/homeStaff">HOME</a></li>
                  <li class="active"><a href="/ELMS/leaveApplicationStaff">Apply for Leave</a></li>
                  <li><a href="/ELMS/historyStaff">Leave History</a></li>
                  <li><a href="/ELMS/statusStaff">Check Status</a></li>
                  
                </ul>
              </div>
            </nav>
            <div class=" col s12 m12">
                <br>
                <div style="text-align: center; font-size: 24px; font-weight: 300">Leave Application Form</div>
            </div>

            @if($alert = Session::get('alert'))
              <script type="text/javascript">alert("{{$alert}}");</script>
            @endif

            <div class=" col s12 m4 offset-m4"><br>
                <?php $todaysDate = new DateTime(); ?>
                <pre style="text-align:center">App. Date   :  {{$todaysDate->format('Y-m-d')}} </pre>
            </div>

            <!-- Form Starts Here-->

            <form method = "post" action = "/ELMS/leave1">
                <div class="input-field col m6 s12 offset-m3" style="display:block">
                    <select name = "leave_type">
                        <option value="" disabled selected>Select Type of Leave</option>
                        <option value="casual">Casual Leave</option>
                        <option value="special_casual">Special Casual Leave</option>
                        <option value="restricted_holiday">Restricted Holiday</option>
                        <option value="half_pay">Half Pay Leave</option>
                        <option value="commuted">Commuted Leave</option>
                        <option value="earned">Earned Leave</option>
                        <option value="maternity">Maternity Leave</option>
                        <option value="paternity">Paternity Leave</option>
                        <option value="study">Study Leave</option>
                        <option value="sabbatical">Sabbatical Leave</option>
                        <option value="leave_not_due">Leave Not Due</option>
                        <option value="foreign_service_short">Short Foreign Service Leave</option>
                        <option value="foreign_service_long">Long Foreign Service Leave</option>
                    </select>
                </div>

                <div class="input-field col s12 m4 offset-m4">
                  <pre>Please Select the Leave Duration</pre>
                </div>
                <div class="input-field col s12 m6 offset-m3">
                  <label>From</label>
                  <input type="date" name = "from" class="datepicker">
                </div>
                <div class="input-field col s12 m6 offset-m3">
                  <label>To</label>
                  <input type="date" name = "to" class="datepicker">
                </div>

                <div class="input-field col s12 m6 offset-m3">
                    <input id="purpose" name = "purpose" type="text" class="validate">
                    <label for="purpose">What is the purpose of your leave?</label>
                </div>

                <div class="input-field col s12 m6 offset-m3">
                    <input id="academic" name="academic" type="text" class="validate">
                    <label for="academic">Academic Responsibility Assigned To?</label>
                </div>
                <div class="input-field col s12 m6 offset-m3">
                    <input id="administrative" name="administrative" type="text" class="validate">
                    <label for="administrative">Administrative Responsibility Assigned To?</label>
                </div>

                 <div class="input-field col s12 m6 offset-m5">
                    <p>
                      <pre>    Recommended?</pre>
                      <input class="with-gap" name="group1" type="radio" id="yes" />
                      <label for="yes">Yes</label>
                      <input class="with-gap" name="group1" type="radio" id="no" />
                      <label for="no">No</label>
                    </p>
                </div>  

                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="col m2 offset-m5">
                    <br><button type="submit" name="action" class="wave-action btn">Submit</button>
                </div>
            </form>
            
            <!-- Form ends here -->

            <script>
                  $(document).ready(function() {
                     $('select').material_select();
                  });
            </script>
            <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
                $('.datepicker').pickadate({
                                  selectMonths: true, 
                                   selectYears: 15,
                                   formatSubmit:'yyyy-mm-dd',
                                   hiddenName:true
                });
            });
        </script>
@stop