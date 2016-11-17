
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
        @if(Auth::user()->status == 0)
        <h4 class="col s12 m4 offset-m4">Signup Form</h4>
        
        <div class="col s12 m10 offset-m1">
        

            @if(Auth::user()->user_type == 'student')
                <form method="POST" action="/student_signup">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-field col s10 offset-s1 m6 offset-m3">
                        <input id="username" type="text" value="{{ Auth::user()->username }}" readonly="true">
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field col s12 m10 offset-m1" style="padding: 0">
                        <div class="input-field col s10 offset-s1 m4">
                            <input id="roll_no" type="number" class="validate" name="roll_no">
                            <label for="roll_no">Roll No.</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m4">
                            <input id="name" type="text" class="validate" name="name">
                            <label for="name">Full Name</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m4">
                            <input id="email" type="email" class="validate" name="email">
                            <label for="email">E-Mail</label>
                        </div>
                    </div>
                    <!-- <div class="file-field input-field col s10 offset-s1 m10 offset-m1">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="avatar">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload Profile Pic">
                        </div>
                    </div> -->
                    
                    <div class="input-field col s10 offset-s1 m5 offset-m1">
                        <h6 class="col s12 m2" style="text-align: center;line-height: 2">Gender</h6>

                        <input name="sex" type="radio" id="male" class="col s4 m3" />
                        <label for="male">Male</label>

                        <input name="sex" type="radio" id="female" class="col s4 m3"/>
                        <label for="female">Female</label>

                        <input name="sex" type="radio" id="other" class="col s4 m3" />
                        <label for="other">Other</label>
                    </div>
                    <div class="input-field col s10 offset-s1 m5 ">
                        <input id="dob" type="date" class="validate datepicker" name="dob">
                        <label for="dob">Date of Birth</label>
                    </div>
                    <div class="input-field col s10 offset-s1 m5 offset-m1">
                        <input id="f_name" type="text" class="validate" name="f_name">
                        <label for="f_name">Father's Name</label>
                    </div>
                    <div class="input-field col s10 offset-s1 m5">
                        <input id="m_name" type="text" class="validate" name="m_name">
                        <label for="m_name">Mother's Name</label>
                    </div>
                    <div class="input-field col s12 m10 offset-m1" style="padding: 0">
                        <div class="input-field col s10 offset-s1 m4">
                            <input id="fph_no" type="tel" class="validate" name="fph_no">
                            <label for="fph_no">Father's Phone No.</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m4">
                            <input id="f_mail" type="email" class="validate" name="f_mail">
                            <label for="f_mail">Father's E-Mail</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m4">
                            <input id="ph_no" type="tel" class="validate" name="ph_no">
                            <label for="ph_no">Phone No.</label>
                        </div>
                    </div>
                    <div class="input-field col s10 offset-s1 m7 offset-m1" style="margin-right: 50px;">
                        <textarea id="p_add" class="materialize-textarea" name="p_add"></textarea>
                        <label for="p_add">Permanent Address</label>
                    </div>
                    <div class="input-field col s12 m10 offset-m1" style="padding: 0;margin-top:0">
                        <div class="input-field col s10 offset-s1 m6">
                            <input id="hometown" type="text" class="validate" name="hometown">
                            <label for="hometown">Hometown</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m6">
                            <select name="state">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>State</label>
                        </div>
                    </div>
                    <div class="input-field col s10 offset-s1 m5 offset-m1">
                        <input id="g_name" type="text" class="validate" name="g_name">
                        <label for="g_name">Guardian Name</label>
                    </div>
                    <div class="input-field col s10 offset-s1 m5">
                            <input id="gph_no" type="tel" class="validate" name="gph_no">
                            <label for="gph_no">Gaurdian's Phone No.</label>
                        </div>
                    <div class="input-field col s10 offset-s1 m7 offset-m1" style="margin-right: 50px;">
                        <textarea id="c_add" class="materialize-textarea" name="c_add"></textarea>
                        <label for="c_add">Correspondance Address</label>
                    </div>
                    <div class="input-field col s10 offset-s1 m5 offset-m1">
                        <select name="category">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Category</label>
                    </div>
                    <div class="input-field col s10 offset-s1 m5">
                        <select name="blood_group">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Blood Group</label>
                    </div>
                    <div class="input-field col s12 m10 offset-m1" style="padding: 0">
                        <div class="input-field col s12 m4">
                            <select name="batch">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Batch</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <select name="programme">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Programme</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <select name="branch">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Branch</label>
                        </div>
                    </div>
                    <div class="input-field col s12 m10 offset-m1">
                        <button class="col s10 offset-s1 m4 offset-m4 btn waves-effect">Submit</button>
                    </div>
                </form>
            @elseif(Auth::user()->user_type == 'faculty')
                <form method="POST" action="/faculty_signup">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-field col s10 offset-s1 m6 offset-m3">
                        <input id="username" type="text" value="{{ Auth::user()->username }}" readonly="true">
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field col s12 m10 offset-m1" style="padding: 0">
                        <div class="input-field col s10 offset-s1 m6">
                            <input id="name" type="text" class="validate" name="name">
                            <label for="name">Full Name</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m6">
                            <input id="email" type="email" class="validate" name="email">
                            <label for="email">E-Mail</label>
                        </div>
                    </div>
                    <!-- <div class="file-field input-field col s10 offset-s1 m10 offset-m1">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="avatar">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload Profile Pic">
                        </div>
                    </div> -->
                    
                    <div class="input-field col s10 offset-s1 m5 offset-m1">
                        <h6 class="col s12 m2" style="text-align: center;line-height: 2">Gender</h6>

                        <input name="sex" type="radio" id="male" class="col s4 m3" />
                        <label for="male">Male</label>

                        <input name="sex" type="radio" id="female" class="col s4 m3"/>
                        <label for="female">Female</label>

                        <input name="sex" type="radio" id="other" class="col s4 m3" />
                        <label for="other">Other</label>
                    </div>
                    <div class="input-field col s10 offset-s1 m5 ">
                        <input id="dob" type="date" class="validate datepicker" name="dob">
                        <label for="dob">Date of Birth</label>
                    </div>
                    <div class="input-field col s12 m10 offset-m1" style="padding: 0">
                        <div class="input-field col s10 offset-s1 m4">
                            <input id="ph_no" type="tel" class="validate" name="ph_no">
                            <label for="ph_no">Phone No.</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m4">
                            <input id="alt_mail" type="email" class="validate" name="alt_mail">
                            <label for="alt_mail">Alternate E-Mail</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m4">
                            <input id="alt_ph_no" type="tel" class="validate" name="alt_ph_no">
                            <label for="alt_ph_no">Alternate Phone No.</label>
                        </div>
                    </div>
                    <div class="input-field col s10 offset-s1 m7 offset-m1" style="margin-right: 50px;">
                        <textarea id="p_add" class="materialize-textarea" name="p_add"></textarea>
                        <label for="p_add">Permanent Address</label>
                    </div>
                    <div class="input-field col s10 offset-s1 m5 offset-m1">
                        <select name="blood_group">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Blood Group</label>
                    </div>
                    <div class="input-field col s10 offset-s1 m10 offset-m1" style="padding:0">
                        <div class="input-field col s10 offset-s1 m6">
                            <select name="department">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Department</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m6">
                            <select name="designation">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Designation</label>
                        </div>
                    </div>
                    <div class="input-field col s10 offset-s1 m10 offset-m1" style="margin-right: 50px;">
                        <textarea id="about" class="materialize-textarea" name="about"></textarea>
                        <label for="about">About Me</label>
                    </div>
                    
                    <div class="input-field col s12 m10 offset-m1">
                        <button class="col s10 offset-s1 m4 offset-m4 btn waves-effect">Submit</button>
                    </div>
                </form>
            @elseif(Auth::user()->user_type == 'others')
                <form method="POST" action="/staff_signup">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-field col s10 offset-s1 m6 offset-m3">
                        <input id="username" type="text" value="{{ Auth::user()->username }}" readonly="true">
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field col s12 m10 offset-m1" style="padding: 0">
                        <div class="input-field col s10 offset-s1 m6">
                            <input id="name" type="text" class="validate" name="name">
                            <label for="name">Full Name</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m6">
                            <input id="email" type="email" class="validate" name="email">
                            <label for="email">E-Mail</label>
                        </div>
                    </div>
                    <!-- <div class="file-field input-field col s10 offset-s1 m10 offset-m1">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="avatar">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload Profile Pic">
                        </div>
                    </div> -->
                    
                    <div class="input-field col s10 offset-s1 m5 offset-m1">
                        <h6 class="col s12 m2" style="text-align: center;line-height: 2">Gender</h6>

                        <input name="sex" type="radio" id="male" class="col s4 m3" />
                        <label for="male">Male</label>

                        <input name="sex" type="radio" id="female" class="col s4 m3"/>
                        <label for="female">Female</label>

                        <input name="sex" type="radio" id="other" class="col s4 m3" />
                        <label for="other">Other</label>
                    </div>
                    <div class="input-field col s10 offset-s1 m5 ">
                        <input id="dob" type="date" class="validate datepicker" name="dob">
                        <label for="dob">Date of Birth</label>
                    </div>
                    <div class="input-field col s12 m10 offset-m1" style="padding: 0">
                        <div class="input-field col s10 offset-s1 m6">
                            <input id="ph_no" type="tel" class="validate" name="ph_no">
                            <label for="ph_no">Phone No.</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m6">
                            <input id="alt_ph_no" type="tel" class="validate" name="alt_ph_no">
                            <label for="alt_ph_no">Alternate Phone No.</label>
                        </div>
                    </div>
                    <div class="input-field col s10 offset-s1 m7 offset-m1" style="margin-right: 50px;">
                        <textarea id="p_add" class="materialize-textarea" name="p_add"></textarea>
                        <label for="p_add">Permanent Address</label>
                    </div>
                    <div class="input-field col s10 offset-s1 m10 offset-m1" style="padding:0">
                        <div class="input-field col s10 offset-s1 m6">
                            <select name="department">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Department</label>
                        </div>
                        <div class="input-field col s10 offset-s1 m6">
                            <select name="sub_department">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Sub-Department</label>
                        </div>
                    </div>
                    
                    <div class="input-field col s12 m10 offset-m1">
                        <button class="col s10 offset-s1 m4 offset-m4 btn waves-effect">Submit</button>
                    </div>
                </form>
            @endif

        </div>

        @elseif(Auth::user()->status == 1)
            <h3 class="col s12 m10 offset-m1" style="position:relative;top:100px;text-align:center">Profile Yet to be approved by admin!!</h3>
        @endif

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
            });
        </script>
    </body>
  </html>