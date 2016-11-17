
<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->

        {!! MaterializeCSS::include_full() !!}

        <script src="https://use.fontawesome.com/5fd0aa1ca7.js"></script>
        
        <link href="/css/fusion_style.css" type="text/css" rel="stylesheet">
        
        <link href="/css/style.css" type="text/css" rel="stylesheet">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        
        <header>
            <nav>
                <div class="nav-wrapper">
                  <a href="#!" class="brand-logo">Fusion</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul class="right hide-on-med-and-down">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="/logout">Logout</a></li>
                  </ul>
                  <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                  </ul>
                </div>
            </nav>
        </header>
        
        <div class="sidebar">
            <ul id="slide-out" class="side-nav fixed">
                <li><a href="#!" class="waves-effect">First Link</a></li>
                <li><a href="#!" class="waves-effect">Second Link</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Subheader</a></li>
                <li><a class="waves-effect" href="#!">Third Link</a></li>
            </ul>
        </div>
        
        
        <div class="main-container row">

        <div class="col s12">
            <h4 class="col s12 m4 offset-m4">Verify Users</h4>
            <ul class="tabs">
                <li class="tab col s4"><a class="active" href="#student">Students</a></li>
                <li class="tab col s4"><a href="#faculty">Faculty</a></li>
                <li class="tab col s4"><a href="#staff">Staff</a></li>
              </ul>
        </div>
        
        <div class="col s12 m10 offset-m1" id="student" style="margin-top: 25px;">
            <form method="post" action="/admin/approveStudents">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table class="bordered ">
                <thead>
                  <tr>
                      <th>Username</th>
                      <th>Roll No.</th>
                      <th>Name</th>
                      <th style="text-align: center;">Details</th>
                      <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    @if(count($students) == 0)
                    <tr>
                        <td colspan=5 style="text-align: center;">No user left for approval!!</td>
                    </tr>
                    @else
                    @foreach($students as $student)
                    <tr>
                        <td>{{$student->student_id}}</td>
                        <td>{{$student->roll_no}}</td>
                        <td>{{$student->name}}</td>
                        <td style="text-align: center">
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal_student{{$student->student_id}}">View Details</a>
                            <div id="modal_student{{$student->student_id}}" class="modal" style="background-color:white;max-height: 85%">
                                <div class="modal-content">
                                    <h4 style="font-size: 2em;"><small>Username : </small><strong>{{$student->student_id}}</strong></h4>
                                    <table class="bordered highlight">
                                        <tbody>
                                          <tr>
                                            <td>Roll Number</td>
                                            <td>{{$student->roll_no}}</td>
                                          </tr>
                                          <tr>
                                            <td>Name</td>
                                            <td>{{$student->name}}</td>
                                          </tr>
                                          <tr>
                                            <td>E-Mail</td>
                                            <td>{{$student->email}}</td>
                                          </tr>
                                          <tr>
                                            <td>Gender</td>
                                            <td>{{$student->sex}}</td>
                                          </tr>
                                          <tr>
                                            <td>Date of Birth</td>
                                            <td>{{$student->DOB}}</td>
                                          </tr>
                                          <tr>
                                            <td>Fathers Name</td>
                                            <td>{{$student->fathers_name}}</td>
                                          </tr>
                                          <tr>
                                            <td>Mothers Name</td>
                                            <td>{{$student->mothers_name}}</td>
                                          </tr>
                                          <tr>
                                            <td>Permanent Address</td>
                                            <td>{{$student->permanent_address}}</td>
                                          </tr>
                                          <tr>
                                            <td>Hometown</td>
                                            <td>{{$student->hometown}}</td>
                                          </tr>
                                          <tr>
                                            <td>State</td>
                                            <td>{{$student->state}}</td>
                                          </tr>
                                          <tr>
                                            <td>Correspondance Address</td>
                                            <td>{{$student->correspondence_address}}</td>
                                          </tr>
                                          <tr>
                                            <td>Phone No.</td>
                                            <td>{{$student->student_phone_no}}</td>
                                          </tr>
                                          <tr>
                                            <td>Father's Phone No.</td>
                                            <td>{{$student->fathers_phone_no}}</td>
                                          </tr>
                                          <tr>
                                            <td>Guardian Name</td>
                                            <td>{{$student->roll_no}}</td>
                                          </tr>
                                          <tr>
                                            <td>Guardian Phone No.</td>
                                            <td>{{$student->guardian_phone_no}}</td>
                                          </tr>
                                          <tr>
                                            <td>Batch</td>
                                            <td>{{$student->batch}}</td>
                                          </tr>
                                          <tr>
                                            <td>Programme</td>
                                            <td>{{$student->programme}}</td>
                                          </tr>
                                          <tr>
                                            <td>Branch</td>
                                            <td>{{$student->branch}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer" style="background-color: white;">
                                  <a href="#!" class=" modal-action modal-close waves-effect btn-flat">Close</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="checkbox" name="approved_students[]" value="{{$student->student_id}}" class="filled-in" id="approve_student_{{$student->student_id}}" checked="checked" />
                            <label for="approve_student_{{$student->student_id}}">Approve</label>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

            <button type="submit" class="col s10 offset-s1 m2 offset-m5 btn waves-effect" style="margin-top: 25px;">Submit</button>
            </form>
        </div>

        <div class="col s12 m10 offset-m1" id="faculty" style="margin-top: 25px;">
            <form method="post" accept="/admin/approveFaculties">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table class="bordered">
                <thead>
                  <tr>
                      <th>Username</th>
                      <th>Name</th>
                      <th>Department</th>
                      <th style="text-align: center;">Details</th>
                      <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    @if(count($faculties) == 0)
                    <tr>
                        <td colspan=5 style="text-align: center;">No user left for approval!!</td>
                    </tr>
                    @else
                    @foreach($faculties as $faculty)
                    <tr>
                        <td>{{$faculty->faculty_id}}</td>
                        <td>{{$faculty->name}}</td>
                        <td>{{$faculty->department}}</td>
                        <td style="text-align: center">
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal_faculty{{$faculty->faculty_id}}">View Details</a>
                            <div id="modal_student{{$faculty->faculty_id}}" class="modal" style="background-color:white">
                                <div class="modal-content">
                                  <h4 style="font-size: 2em;"><small>Username : </small><strong>{{$faculty->faculty_id}}</strong></h4>
                                  <table class="bordered highlight">
                                        <tbody>
                                          <tr>
                                            <td>Name</td>
                                            <td>{{$faculty->name}}</td>
                                          </tr>
                                          <tr>
                                            <td>E-Mail</td>
                                            <td>{{$faculty->email}}</td>
                                          </tr>
                                          <tr>
                                            <td>Gender</td>
                                            <td>{{$faculty->sex}}</td>
                                          </tr>
                                          <tr>
                                            <td>Date of Birth</td>
                                            <td>{{$faculty->DOB}}</td>
                                          </tr>
                                          <tr>
                                            <td>Permanent Address</td>
                                            <td>{{$faculty->address}}</td>
                                          </tr>
                                          <tr>
                                            <td>Mobile No.</td>
                                            <td>{{$faculty->mobile_no}}</td>
                                          </tr>
                                          <tr>
                                            <td>Alternate E-Mail</td>
                                            <td>{{$faculty->alternate_email}}</td>
                                          </tr>
                                          <tr>
                                            <td>Designation</td>
                                            <td>{{$faculty->designation}}</td>
                                          </tr>
                                          <tr>
                                            <td>Department</td>
                                            <td>{{$faculty->department}}</td>
                                          </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer" style="background-color: white">
                                  <a href="#!" class="center-align modal-action modal-close waves-effect btn-flat">Close</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="checkbox" name="approved_faculties" value="{{$faculty->faculty_id}}" class="filled-in" id="approve_faculty_{{$faculty->faculty_id}}" checked="checked" />
                            <label for="approve_faculty_{{$faculty->faculty_id}}">Approve</label>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            
            <button type="submit" class="col s10 offset-s1 m2 offset-m5 btn waves-effect" style="margin-top: 25px;">Submit</button>
            </form>
        </div>

        <div class="col s12 m10 offset-m1" id="staff" style="margin-top: 25px;">
            <form method="post" accept="/admin/approveStaff">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table class="bordered">
                <thead>
                  <tr>
                      <th>Username</th>
                      <th>Name</th>
                      <th>Department</th>
                      <th style="text-align: center;">Details</th>
                      <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    @if(count($staffs) == 0)
                    <tr>
                        <td colspan=5 style="text-align: center;">No user left for approval!!</td>
                    </tr>
                    @else
                    @foreach($staffs as $staff)
                    <tr>
                        <td>{{$staff->staff_id}}</td>
                        <td>{{$staff->name}}</td>
                        <td>{{$staff->department}}</td>
                        <td style="text-align: center">
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal_staff_{{$staff->staff_id}}">View Details</a>
                            <div id="modal_staff_{{$staff->staff_id}}" class="modal" style="background-color:white">
                                <div class="modal-content">
                                  <h4 style="font-size: 2em;"><small>Username : </small><strong>{{$staff->staff_id}}</strong></h4>
                                  <table class="bordered highlight">
                                        <tbody>
                                          <tr>
                                            <td>Name</td>
                                            <td>{{$staff->name}}</td>
                                          </tr>
                                          <tr>
                                            <td>E-Mail</td>
                                            <td>{{$staff->email}}</td>
                                          </tr>
                                          <tr>
                                            <td>Gender</td>
                                            <td>{{$staff->sex}}</td>
                                          </tr>
                                          <tr>
                                            <td>Permanent Address</td>
                                            <td>{{$staff->address}}</td>
                                          </tr> 
                                          <tr>
                                            <td>Department</td>
                                            <td>{{$staff->department}}</td>
                                          </tr>
                                          <tr>
                                            <td>Sub Department</td>
                                            <td>{{$staff->sub_department}}</td>
                                          </tr>
                                          <tr>
                                            <td>Post</td>
                                            <td>{{$staff->post}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer" style="background-color: white">
                                  <a href="#!" class="center-align modal-action modal-close waves-effect btn-flat">Close</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="checkbox" name="approved_staffs" value="{{$staff->staff_id}}" class="filled-in" id="approve_staff_{{$staff->staff_id}}" checked="checked" />
                            <label for="approve_staff_{{$staff->staff_id}}">Approve</label>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            
            <button type="submit" class="col s10 offset-s1 m2 offset-m5 btn waves-effect" style="margin-top: 25px;">Submit</button>
            </form>
        </div>

        </div>
        

        
        
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 50, // Creates a dropdown of 15 years to control year
                    format: 'yyyy-mm-dd' 
                });
                $('.modal-trigger').leanModal();
                $('ul.tabs').tabs();
            });
        </script>
    </body>
  </html>