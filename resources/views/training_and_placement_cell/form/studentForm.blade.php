@extends('training_and_placement_cell.layout')

@section('content')

	<div class="main-container row">
        <nav class="mynav">
          <div class="nav-wrapper">
                <a href="/training_and_placement_cell/student" class="brand-logo" style="padding-left:10px;">Placement Cell</a>
            <ul style="float:right;">
                <li><a href="/training_and_placement_cell/student">Home</a></li>
                <li><a href="/training_and_placement_cell/form/studentForm/student">Student Form</a></li>
                <li><a href="/training_and_placement_cell/student/companyList">Companies</a></li>
                <li><a href="/training_and_placement_cell/profile/student/student">Profile</a></li>
                <li><a href="/training_and_placement_cell/student/selectedStudent">Selection Status</a></li>
            </ul>
          </div>
        </nav>
            
            <div class="col s12 m12">
                <h4>Student Info</h4>
            </div>

            <div class="col s12 m12">
              @if(count($errors) > 0)
                <div class="alert alert-danger">
              		
              		    @foreach($errors->all() as $error)
              		        <h6 style="color:red; display:inline;">{{ $error }}</h6> 
              		    @endforeach
              		
                </div>
              @endif
            </div>


		{!! Form::open(array('route' => 'studentForm_store', 'class' => 'form')) !!}

			<div class="container col s12" >
                <h6>Fields marked * are compulsary.</h6>
                <ul class="collapsible popout" data-collapsible="accordion">
                 <li>
                  <div class="collapsible-header active">Objective*</div>
                  <div class="collapsible-body">
                          <center><div class="input-field" style="width:90%;padding-top:20px;">
                        
                          	{!! Form::textarea('objective', null, array('required', 'id'=>'textarea1', 'class'=>'materialize-textarea', 'placeholder'=>'Type your objective here......')) !!}
                              <!-- <textarea placeholder="Type your objective here......" id="textarea1" class="materialize-textarea"></textarea> -->
                              
                              </div></center>
                    </div>
                </li>
                
                <li>
                
                  <div class="collapsible-header">Areas of Interest*</div>
                  	<div class="collapsible-body container">
                        <div class="row">
                            <div class="input-field col m10">
                               {!! Form::text('interest1', null, 
                                  array('id' => 'interest', 
                                        'class'=>'validate', 'placeholder'=>'Interests')) !!}

                              
                            </div>
                        </div>

                        <div id="interestClone">
                        <div style="display: none;">
                        
                          {!! Form::text('dummy10', 1, 
                              array('id' => 'dummy10', 
                                    'class'=>'validate')) !!} 
                                  </div>
                          <div class="row interests" style="display: none;">
                            <div class="input-field col m10">
                              {!! Form::text('', null, 
                                    array('id' => 'interest', 
                                          'class'=>'validate', 'placeholder'=>'Interests')) !!}

                            </div>
                            <a class="waves-effect btn" id="removeInterest">Remove</a> 
                          </div>
                          
                         
                        </div>
                        <a class="waves-effect btn add_btn" id="addInterest">Add</a>
                    </div>
                </li>
                <li>
                  <div class="collapsible-header">Education*</div>
                  <div class="collapsible-body container">
                      
                     
                      <div class="row">
                        <div class="input-field col m3">
                          <!-- {{ Form::select('year1', [
                             '' => 'Year',
                             '1' => '2017',
                             '2' => '2018',
                             '3' => '2019'], 'Year') 
                          }} -->
                            <!-- <select name="year1">
                                <option value="" disabled selected>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                                <option value="4">2020</option>
                            </select> -->
                          {!! Form::label('Year') !!}
                          {!! Form::text('year1', null, 
                              array('id' => 'year', 
                                    'class'=>'validate')) !!}
                           
                        </div>
                        <div class="input-field col m3">
                          {!! Form::label('Qualification') !!}
                          {!! Form::text('qualification1', null, 
                              array('id' => 'qualification', 
                                    'class'=>'validate')) !!}
                              <!-- <input id="qualification" type="text" class="validate"> -->
                              <!-- <label for="qualification">Qualification</label> -->
                        </div>
                        <div class="input-field col m3">
                        {!! Form::label('Institute') !!}
                          {!! Form::text('institute1', null, 
                              array('id' => 'institute', 
                                    'class'=>'validate')) !!}
                              <!-- <input id="institute" type="text" class="validate">
                              <label for="institute">Institute</label> -->
                        </div>
                        <div class="input-field col m3">
                          {!! Form::label('Performance') !!}
                          {!! Form::text('performance1', null, 
                              array('id' => 'performance', 
                                    'class'=>'validate')) !!}
                              <!-- <input id="performance" type="text" class="validate">
                              <label for="performance">Performance</label> -->
                        </div>
                      </div>

                      <div id="educationClone">
                        <div style="display: none;">
                          {!! Form::text('dummy', 1, 
                              array('id' => 'dummy', 
                                    'class'=>'validate')) !!} 
                        </div>
                        <div class="row education" style="display: none;">
                          <div class="input-field col m3">
                            <!-- {{ Form::select('year', [
                               '' => 'Year',
                               '1' => '2017',
                               '2' => '2018',
                               '3' => '2019'], 'Year') 
                            }} -->
                              <!-- <select name="year1">
                                  <option value="" disabled selected>Year</option>
                                  <option value="1">2017</option>
                                  <option value="2">2018</option>
                                  <option value="3">2019</option>
                                  <option value="4">2020</option>
                              </select> -->
                             

                            {!! Form::label('Year') !!}
                            {!! Form::text('', null, 
                              array('id' => 'year', 
                                    'class'=>'validate')) !!}
                             
                          </div>
                          <div class="input-field col m3">
                            {!! Form::label('Qualification') !!}
                            {!! Form::text('', null, 
                                array('id' => 'qualification', 
                                      'class'=>'validate')) !!}
                                <!-- <input id="qualification" type="text" class="validate"> -->
                                <!-- <label for="qualification">Qualification</label> -->
                          </div>
                          <div class="input-field col m3">
                          {!! Form::label('Institute') !!}
                            {!! Form::text('', null, 
                                array('id' => 'institute', 
                                      'class'=>'validate')) !!}
                                <!-- <input id="institute" type="text" class="validate">
                                <label for="institute">Institute</label> -->
                          </div>
                          <div class="input-field col m3">
                            {!! Form::label('Performance') !!}
                            {!! Form::text('', null, 
                                array('id' => 'performance', 
                                      'class'=>'validate')) !!}
                                <!-- <input id="performance" type="text" class="validate">
                                <label for="performance">Performance</label> -->
                          </div>
                          <a class="waves-effect btn" id="removeEdu">Remove</a>
                        </div> 
                      </div>                         
                      <a class="waves-effect btn add_btn" id="addEdu">Add</a>
                
                             
           
                      
                  </div>
                </li>
                <li>
                  <div class="collapsible-header">Skills*</div>
                    <div class="collapsible-body container">
                        <div class="row">
                            <div class="input-field col m10">
                               {!! Form::text('skills1', null, 
                                  array('id' => 'skills', 
                                        'class'=>'validate', 'placeholder'=>'Skills')) !!}

                              
                            </div>
                        </div>

                        <div id="skillClone">
                        <div style="display: none;">
                          {!! Form::text('dummy11', 1, 
                              array('id' => 'dummy11', 
                                    'class'=>'validate')) !!} 
                                  </div>
                          <div class="row skills" style="display: none;">
                            <div class="input-field col m10">
                              {!! Form::text('', null, 
                                    array('id' => 'skills', 
                                          'class'=>'validate', 'placeholder'=>'Skills')) !!}

                            </div>
                            <a class="waves-effect btn" id="removeSkill">Remove</a> 
                          </div>
                          
                         
                        </div>
                        <a class="waves-effect btn add_btn" id="addSkill">Add</a>
                    </div>
                </li>
                <li>
                  <div class="collapsible-header">Projects</div>
                  <div class="collapsible-body container">
                      <div class="row ">
                        <div class="input-field col m6">
                          {!! Form::label('Name') !!}
                          {!! Form::text('projName1', null, 
                              array('id' => 'projName', 
                                    'class'=>'validate')) !!}
                              <!-- <input id="name" type="text" class="validate">
                              <label for="name">Name</label> -->
                        </div>
                        <div class="input-field col m6">
                            <!-- {{ Form::select('year', [
                             '' => 'Year',
                             '1' => '2017',
                             '2' => '2018',
                             '3' => '2019'], 'Year') 
                          }} -->
                          {!! Form::label('Year') !!}
                            {!! Form::text('projYear1', null, 
                              array('id' => 'projYear', 
                                    'class'=>'validate')) !!}
                            
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col m6">
                          {!! Form::label('Project URL') !!}
                          {!! Form::text('projUrl1', null, 
                              array('id' => 'projUrl', 
                                    'class'=>'validate')) !!}
                          <!-- <input id="url" type="text" class="validate">
                             <label for="url">Project Url</label> -->
                        </div> 
                        <div class="input-field col m6" >
                          {!! Form::label('Description') !!}
                          {!! Form::textarea('projDesc1', null, 
                              array('id' => 'projDesc', 
                                    'class'=>'materialize-textarea')) !!}
                          <!-- <textarea id="desc" class="materialize-textarea"></textarea>
                          <label for="desc">Description</label> -->
                        </div>
                              
                      </div> 

                      <div id="projectClone">
                      <div style="display: none;">
                        {!! Form::text('dummy1', 1, 
                              array('id' => 'dummy1', 
                                    'class'=>'validate')) !!}
                                    </div>
                        <div class="project" style="display: none;">
                          <div class="row ">
                            <div class="input-field col m6">
                              {!! Form::label('Name') !!}
                              {!! Form::text('', null, 
                                  array('id' => 'projName', 
                                        'class'=>'validate')) !!}
                                  <!-- <input id="name" type="text" class="validate">
                                  <label for="name">Name</label> -->
                            </div>
                            <div class="input-field col m6">
                                <!-- {{ Form::select('year', [
                                 '' => 'Year',
                                 '1' => '2017',
                                 '2' => '2018',
                                 '3' => '2019'], 'Year') 
                              }} -->
                              {!! Form::label('Year') !!}
                            {!! Form::text('', null, 
                              array('id' => 'projYear', 
                                    'class'=>'validate')) !!}
                                
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col m6">
                              {!! Form::label('Project URL') !!}
                              {!! Form::text('', null, 
                                  array('id' => 'projUrl', 
                                        'class'=>'validate')) !!}
                              <!-- <input id="url" type="text" class="validate">
                                 <label for="url">Project Url</label> -->
                            </div> 
                            <div class="input-field col m6" >
                              {!! Form::label('Description') !!}
                              {!! Form::textarea('', null, 
                                  array('id' => 'projDesc', 
                                        'class'=>'materialize-textarea')) !!}
                              <!-- <textarea id="desc" class="materialize-textarea"></textarea>
                              <label for="desc">Description</label> -->
                            </div>
                                  
                          </div> 
                        <a class="waves-effect btn" id="removeProj">Remove</a>
                        </div>
                      </div>
                      <a class="waves-effect btn" id="addProj">Add</a>
                    </div>
                </li>
                    <li>
                  <div class="collapsible-header active">Certifications</div>
                  <div class="collapsible-body container">
                    <div class="row">
                      <div class="input-field col m12">
                      {!! Form::label('Certification') !!}
                      {!! Form::text('cname1', null, 
                          array('id' => 'cname', 
                                'class'=>'validate')) !!}
                      <!-- <input id="cname" type="text" class="validate">
                      <label for="cname">Certification name</label> -->
                      </div>
                      <div class="input-field col m12">
                        {!! Form::label('Certification Authority') !!}
                        {!! Form::text('cauth1', null, 
                            array('id' => 'cauth', 
                                  'class'=>'validate')) !!}
                          <!-- <input id="cauth" type="text" class="validate">
                      <label for="cauth">Certification authority</label> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col m12">
                      {!! Form::label('License No.') !!}
                      {!! Form::text('lno1', null, 
                          array('id' => 'lno', 
                                'class'=>'validate')) !!}
                      <!-- <input id="lno" type="text" class="validate">
                         <label for="lno">license no</label> -->
                      </div> 
                      <div class="input-field col m12" >
                        {!! Form::label('Certification URL') !!}
                        {!! Form::textarea('curl1', null, 
                            array('id' => 'curl', 
                                  'class'=>'materialize-textarea')) !!}
                      <!-- <textarea id="curl" class="materialize-textarea"></textarea>
                      <label for="curl">Certification url</label> -->
                      </div>
                        
                      <div class="input-field col m6" >
                        {!! Form::label('Year') !!}
                            {!! Form::text('cYear1', null, 
                              array('id' => 'cYear', 
                                    'class'=>'validate')) !!}
                    <!-- <select>
                      <option value="" disabled selected>Year</option>
                      <option value="1">2017</option>
                      <option value="2">2018</option>
                      <option value="3">2019</option>
                      <option value="4">2020</option>
                             </select> -->
                               
                      </div>
                    </div> 

                    <div id="certificationClone">
                    <div style="display: none;">
                      {!! Form::text('dummy2', 1, 
                              array('id' => 'dummy2', 
                                    'class'=>'validate')) !!}
                                    </div>
                      <div class="certification" style="display: none;">
                        <div class="row">
                          <div class="input-field col m12">
                          {!! Form::label('Certification') !!}
                          {!! Form::text('', null, 
                              array('id' => 'cname', 
                                    'class'=>'validate')) !!}
                          <!-- <input id="cname" type="text" class="validate">
                          <label for="cname">Certification name</label> -->
                          </div>
                          <div class="input-field col m12">
                            {!! Form::label('Certification Authority') !!}
                            {!! Form::text('', null, 
                                array('id' => 'cauth', 
                                      'class'=>'validate')) !!}
                              <!-- <input id="cauth" type="text" class="validate">
                          <label for="cauth">Certification authority</label> -->
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col m12">
                          {!! Form::label('License No.') !!}
                          {!! Form::text('', null, 
                              array('id' => 'lno', 
                                    'class'=>'validate')) !!}
                          <!-- <input id="lno" type="text" class="validate">
                             <label for="lno">license no</label> -->
                          </div> 
                          <div class="input-field col m12" >
                            {!! Form::label('Certification URL') !!}
                            {!! Form::textarea('', null, 
                                array('id' => 'curl', 
                                      'class'=>'materialize-textarea')) !!}
                          <!-- <textarea id="curl" class="materialize-textarea"></textarea>
                          <label for="curl">Certification url</label> -->
                          </div>
                            
                          <div class="input-field col m6" >
                            {!! Form::label('Year') !!}
                            {!! Form::text('', null, 
                              array('id' => 'cYear', 
                                    'class'=>'validate')) !!}
                        <!-- <select>
                          <option value="" disabled selected>Year</option>
                          <option value="1">2017</option>
                          <option value="2">2018</option>
                          <option value="3">2019</option>
                          <option value="4">2020</option>
                                 </select> -->
                                   
                          </div>
                        </div> 
                        <a class="waves-effect btn" id="removeCerti">Remove</a> 
                      </div>
                    </div>
                    <a class="waves-effect btn" id="addCerti">Add</a>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header">Position Of Responsiilities</div>
                  <div class="collapsible-body container">
                    <div class="row ">
                      <div class="input-field col m12">
                        {!! Form::label('Organisation') !!}
                        {!! Form::text('orgname1', null, 
                            array('id' => 'orgname', 
                                  'class'=>'validate')) !!}
                      <!-- <input id="orgname" type="text" class="validate">
                      <label for="orgname">Organisation</label> -->
                      </div>
                      <div class="input-field col m12">
                        {!! Form::label('Role') !!}
                        {!! Form::text('role1', null, 
                            array('id' => 'role', 
                                  'class'=>'validate')) !!}
                          <!-- <input id="role" type="text" class="validate">
                          <label for="role">Role</label> -->
                      </div>
                    </div>
                    <div class="row">       
                      <div class="input-field col m6" >
                            {!! Form::label('Year') !!}
                            {!! Form::text('resYear1', null, 
                              array('id' => 'resYear', 
                                    'class'=>'validate')) !!}
                  <!-- <select>
                    <option value="" disabled selected>Year</option>
                    <option value="1">2017</option>
                    <option value="2">2018</option>
                    <option value="3">2019</option>
                    <option value="4">2020</option>
                           </select> -->
                             
                      </div>
                    </div>
                    <div id="responsibilityClone">
                    <div style="display: none;">
                      {!! Form::text('dummy3', 1, 
                              array('id' => 'dummy3', 
                                    'class'=>'validate')) !!}
                                    </div>
                      <div class="responsibility" style="display: none;">
                        <div class="row ">
                      <div class="input-field col m12">
                        {!! Form::label('Organisation') !!}
                        {!! Form::text('', null, 
                            array('id' => 'orgname', 
                                  'class'=>'validate')) !!}
                      <!-- <input id="orgname" type="text" class="validate">
                      <label for="orgname">Organisation</label> -->
                      </div>
                      <div class="input-field col m12">
                        {!! Form::label('Role') !!}
                        {!! Form::text('', null, 
                            array('id' => 'role', 
                                  'class'=>'validate')) !!}
                          <!-- <input id="role" type="text" class="validate">
                          <label for="role">Role</label> -->
                      </div>
                    </div>
                    <div class="row">       
                      <div class="input-field col m6" >
                            {!! Form::label('Year') !!}
                            {!! Form::text('', null, 
                              array('id' => 'resYear', 
                                    'class'=>'validate')) !!}
                  <!-- <select>
                    <option value="" disabled selected>Year</option>
                    <option value="1">2017</option>
                    <option value="2">2018</option>
                    <option value="3">2019</option>
                    <option value="4">2020</option>
                           </select> -->
                             
                      </div>
                    </div>
                    <a class="waves-effect btn" id="removeRespo">Remove</a>

                      </div>
                    </div> 
                    <a class="waves-effect btn" id="addRespo">Add</a>
                  </div>
                </li>
                    <li>
                  <div class="collapsible-header">Courses*</div>
                  <div class="collapsible-body container" id="ac">
                   <div class="row ">
                              <div class="input-field col m12">
                                {!! Form::label('Course Name') !!}
                                {!! Form::text('coname1', null, 
                                    array('id' => 'coname', 
                                          'class'=>'validate')) !!}
                              <!-- <input id="coname" type="text" class="validate">
                              <label for="coname">Course name</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Course Authority Name') !!}
                          {!! Form::text('coauth1', null, 
                              array('id' => 'coauth', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="coauth" type="text" class="validate">
                            <label for="coauth">Course authority</label> -->
                        </div>
                      </div>
                              <div id="coursesClone">
                              <div style="display: none;">
                                {!! Form::text('dummy4', 1, 
                                        array('id' => 'dummy4', 
                                              'class'=>'validate')) !!}
                                              </div>
                                <div class="courses" style="display: none;">
                                  <div class="row ">
                              <div class="input-field col m12">
                                {!! Form::label('Course Name') !!}
                                {!! Form::text('', null, 
                                    array('id' => 'coname', 
                                          'class'=>'validate')) !!}
                              <!-- <input id="coname" type="text" class="validate">
                              <label for="coname">Course name</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Course Authority Name') !!}
                          {!! Form::text('', null, 
                              array('id' => 'coauth', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="coauth" type="text" class="validate">
                            <label for="coauth">Course authority</label> -->
                        </div>
                      </div>
                               <a class="waves-effect btn" id="removeCourse">Remove</a> 

                                </div>
                              </div> 
                               <a class="waves-effect btn" id="addCourse">Add</a> 
                    </div>
                </li>
                    
                    <li>
                  <div class="collapsible-header">Internships</div>
                  <div class="collapsible-body container" id="ac">
                     <div class="row ">
                              <div class="input-field col m12">
                                {!! Form::label('Profile') !!}
                                {!! Form::text('profile1', null, 
                                    array('id' => 'profile', 
                                          'class'=>'validate')) !!}     
                              <!-- <input id="profile" type="text" class="validate">
                              <label for="profile">Profile</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Organisation') !!}
                          {!! Form::text('org1', null, 
                              array('id' => 'org', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="org" type="text" class="validate">
                            <label for="org">Organisation</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Location') !!}
                          {!! Form::text('loc1', null, 
                              array('id' => 'loc', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="loc" type="text" class="validate">
                            <label for="loc">Location</label> -->
                        </div>
                     
                               
                     <div class="input-field col m6">
                      <h6>Start Date</h6>
                      {!! Form::date('stdate1', null, 
                          array('id' => 'stdate', 
                                'class'=>'dat')) !!}
                            <!-- <input id="stdate" type="date" class="datepicker">
                            <label for="stdate">start date</label> -->
                        </div>
                         <div class="input-field col m6">
                          <h6>End Date</h6>
                          {!! Form::date('enddate1', null, 
                              array('id' => 'enddate', 
                                    'class'=>'dat')) !!}
                            <!-- <input id="enddate" type="date" class="datepicker">
                            <label for="enddate">end date</label> -->
                        </div>
                              <div class="input-field col m12">
                                {!! Form::label('Description') !!}
                                {!! Form::textarea('indesc1', null, 
                                    array('id' => 'indesc', 
                                          'class'=>'materialize-textarea')) !!}
                            <!-- <textarea id="indesc" class="materialize-textarea"></textarea>
                                  <label for="indesc">Description</label> -->
                        </div>
                         
                        </div>
                        <div id="internshipClone">
                        <div style="display: none;">
                          {!! Form::text('dummy5', 1, 
                                  array('id' => 'dummy5', 
                                        'class'=>'validate')) !!}
                                        </div>
                          <div class="internship" style="display: none;">
                            <div class="row ">
                              <div class="input-field col m12">
                                {!! Form::label('Profile') !!}
                                {!! Form::text('', null, 
                                    array('id' => 'profile', 
                                          'class'=>'validate')) !!}     
                              <!-- <input id="profile" type="text" class="validate">
                              <label for="profile">Profile</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Organisation') !!}
                          {!! Form::text('', null, 
                              array('id' => 'org', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="org" type="text" class="validate">
                            <label for="org">Organisation</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Location') !!}
                          {!! Form::text('', null, 
                              array('id' => 'loc', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="loc" type="text" class="validate">
                            <label for="loc">Location</label> -->
                        </div>
                     
                               
                     <div class="input-field col m6">
                      <h6>Start Date</h6>
                      {!! Form::date('', null, 
                          array('id' => 'stdate', 
                                'class'=>'dat')) !!}
                            <!-- <input id="stdate" type="date" class="datepicker">
                            <label for="stdate">start date</label> -->
                        </div>
                         <div class="input-field col m6">
                          <h6>End Date</h6>
                          {!! Form::date('', null, 
                              array('id' => 'enddate', 
                                    'class'=>'dat')) !!}
                            <!-- <input id="enddate" type="date" class="datepicker">
                            <label for="enddate">end date</label> -->
                        </div>
                              <div class="input-field col m12">
                                {!! Form::label('Description') !!}
                                {!! Form::textarea('', null, 
                                    array('id' => 'indesc', 
                                          'class'=>'materialize-textarea')) !!}
                            <!-- <textarea id="indesc" class="materialize-textarea"></textarea>
                                  <label for="indesc">Description</label> -->
                        </div>
                         
                        </div>
                               <a class="waves-effect btn" id="removeIntern">Remove</a> 

                          </div>
                        </div> 
                               <a class="waves-effect btn" id="addIntern">Add</a> 
                    </div>
                </li>
                    
                    <li>
                  <div class="collapsible-header">Training</div>
                  <div class="collapsible-body container" id="ac">
                     <div class="row ">
                              <div class="input-field col m12">
                                {!! Form::label('Training Name') !!}
                                {!! Form::text('tname1', null, 
                                    array('id' => 'tname', 
                                          'class'=>'validate')) !!}
                              <!-- <input id="tname" type="text" class="validate">
                              <label for="tname">Traning name</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Organisation') !!}
                          {!! Form::text('torg1', null, 
                              array('id' => 'torg', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="torg" type="text" class="validate">
                            <label for="torg">Organisation</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Location') !!}
                          {!! Form::text('tloc1', null, 
                              array('id' => 'tloc', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="tloc" type="text" class="validate">
                            <label for="tloc">Location</label> -->
                        </div>
                     
                               
                     <div class="input-field col m6">
                      <h6>Start Date</h6>
                      {!! Form::date('tstdate1', null, 
                          array('id' => 'tstdate', 
                                'class'=>'dat')) !!}
                            <!-- <input id="tstdate" type="date" class="datepicker">
                            <label for="tstdate">start date</label> -->
                        </div>
                         <div class="input-field col m6">
                          <h6>End Date</h6>
                          {!! Form::date('tenddate1', null, 
                              array('id' => 'tenddate', 
                                    'class'=>'dat')) !!}
                            <!-- <input id="tenddate" type="date" class="datepicker">
                            <label for="tenddate">end date</label> -->
                        </div>
                              <div class="input-field col m12">
                                {!! Form::label('Description') !!}
                                {!! Form::textarea('tdesc1', null, 
                                    array('id' => 'tdesc', 
                                          'class'=>'materialize-textarea')) !!}
                            <!-- <textarea id="tdesc" class="materialize-textarea"></textarea>
                                  <label for="tdesc">Description</label> -->
                        </div>
                         
                              </div>
                              <div id="trainingClone">
                              <div style="display: none;">
                      {!! Form::text('dummy6', 1, 
                              array('id' => 'dummy6', 
                                    'class'=>'validate')) !!}
                                    </div>
                      <div class="training" style="display: none;">
                        <div class="row ">
                              <div class="input-field col m12">
                                {!! Form::label('Training Name') !!}
                                {!! Form::text('', null, 
                                    array('id' => 'tname', 
                                          'class'=>'validate')) !!}
                              <!-- <input id="tname" type="text" class="validate">
                              <label for="tname">Traning name</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Organisation') !!}
                          {!! Form::text('', null, 
                              array('id' => 'torg', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="torg" type="text" class="validate">
                            <label for="torg">Organisation</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Location') !!}
                          {!! Form::text('', null, 
                              array('id' => 'tloc', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="tloc" type="text" class="validate">
                            <label for="tloc">Location</label> -->
                        </div>
                     
                               
                     <div class="input-field col m6">
                      <h6>Start Date</h6>
                      {!! Form::date('', null, 
                          array('id' => 'tstdate', 
                                'class'=>'dat')) !!}
                            <!-- <input id="tstdate" type="date" class="datepicker">
                            <label for="tstdate">start date</label> -->
                        </div>
                         <div class="input-field col m6">
                          <h6>End Date</h6>
                          {!! Form::date('', null, 
                              array('id' => 'tenddate', 
                                    'class'=>'dat')) !!}
                            <!-- <input id="tenddate" type="date" class="datepicker">
                            <label for="tenddate">end date</label> -->
                        </div>
                              <div class="input-field col m12">
                                {!! Form::label('Description') !!}
                                {!! Form::textarea('', null, 
                                    array('id' => 'tdesc', 
                                          'class'=>'materialize-textarea')) !!}
                            <!-- <textarea id="tdesc" class="materialize-textarea"></textarea>
                                  <label for="tdesc">Description</label> -->
                        </div>
                         
                              </div>
                               <a class="waves-effect btn" id="removeTrain">Remove</a> 

                      </div>
                    </div> 
                               <a class="waves-effect btn" id="addTrain">Add</a> 
                    </div>
                <li>
                  <div class="collapsible-header">Publications</div>
                  <div class="collapsible-body container" id="ac">
                     <div class="row ">
                              <div class="input-field col m12">
                                {!! Form::label('Title') !!}
                                {!! Form::text('title1', null, 
                                    array('id' => 'title', 
                                          'class'=>'validate')) !!}
                              <!-- <input id="title" type="text" class="validate">
                              <label for="title">Title</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Publication/Publisher') !!}
                          {!! Form::text('publisher1', null, 
                              array('id' => 'publisher', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="publisher" type="text" class="validate">
                            <label for="publisher">Publication/Publisher</label> -->
                        </div>
                              <div class="input-field col m6">
                                <h6>Publication Date</h6>
                                {!! Form::date('pdate1', null, 
                                    array('id' => 'pdate', 
                                          'class'=>'dat')) !!}
                            <!-- <input placeholder="Publication date" type="text" class="datepicker"> -->
                        </div>
                              <div class="input-field col m12">
                                {!! Form::label('Publication URL') !!}
                                {!! Form::text('purl1', null, 
                                    array('id' => 'purl', 
                                          'class'=>'validate')) !!}
                            <!-- <input id="purl" type="text" class="validate">
                                  <label for="purl">Publication Url</label> -->
                        </div>
                              <div class="input-field col m12">
                                {!! Form::label('Description') !!}
                                {!! Form::textarea('pdesc1', null, 
                                    array('id' => 'pdesc', 
                                          'class'=>'materialize-textarea')) !!}
                            <!-- <textarea id="pdesc" class="materialize-textarea"></textarea>
                                  <label for="pdesc">Description</label> -->
                        </div>
                              </div>
                              <div id="publicationClone">
                              <div style="display: none;">
                      {!! Form::text('dummy7', 1, 
                              array('id' => 'dummy7', 
                                    'class'=>'validate')) !!}
                                    </div>
                      <div class="publication" style="display: none;">
                        <div class="row ">
                              <div class="input-field col m12">
                                {!! Form::label('Title') !!}
                                {!! Form::text('', null, 
                                    array('id' => 'title', 
                                          'class'=>'validate')) !!}
                              <!-- <input id="title" type="text" class="validate">
                              <label for="title">Title</label> -->
                        </div>
                        <div class="input-field col m12">
                          {!! Form::label('Publication/Publisher') !!}
                          {!! Form::text('', null, 
                              array('id' => 'publisher', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="publisher" type="text" class="validate">
                            <label for="publisher">Publication/Publisher</label> -->
                        </div>
                              <div class="input-field col m6">
                                <h6>Publication Date</h6>
                                {!! Form::date('', null, 
                                    array('id' => 'pdate', 
                                          'class'=>'dat')) !!}
                            <!-- <input placeholder="Publication date" type="text" class="datepicker"> -->
                        </div>
                              <div class="input-field col m12">
                                {!! Form::label('Publication URL') !!}
                                {!! Form::text('', null, 
                                    array('id' => 'purl', 
                                          'class'=>'validate')) !!}
                            <!-- <input id="purl" type="text" class="validate">
                                  <label for="purl">Publication Url</label> -->
                        </div>
                              <div class="input-field col m12">
                                {!! Form::label('Description') !!}
                                {!! Form::textarea('', null, 
                                    array('id' => 'pdesc', 
                                          'class'=>'materialize-textarea')) !!}
                            <!-- <textarea id="pdesc" class="materialize-textarea"></textarea>
                                  <label for="pdesc">Description</label> -->
                        </div>
                              </div>
                               <a class="waves-effect btn" id="removePublic">Remove</a> 

                      </div>
                    </div> 
                               <a class="waves-effect btn" id="addPublic">Add</a> 
                    </div>
                </li>
                   
                <li>
                  <div class="collapsible-header">Patent</div>
                  <div class="collapsible-body container">
                    <div class="row ">
                              <div class="input-field col m6">
                                {!! Form::label('Patent Office') !!}
                                {!! Form::text('pOffice1', null, 
                                    array('id' => 'pOffice', 
                                          'class'=>'validate')) !!}
                                <!-- {{ Form::select('year', [
                                   '' => 'Patent Office',
                                   '1' => 'India',
                                   '2' => 'Afghanistan',
                                   '3' => 'USA'], 'Patent Office') 
                                }} -->
                              <!-- <select>
                                <option value="" disabled selected>Patent office</option>
                                <option value="1">India</option>
                                <option value="2">Afghanistan</option>
                                <option value="3">USA</option>
                                <option value="4">Australia</option>
                                       </select> -->
                              
                        </div>
                               <!-- <div class="input-field col m6">
                               <input name="group1" type="radio" id="test1" />
                                <label for="test1">Patent issued</label>
                                   <input name="group1" type="radio" id="test2" />
                                <label for="test2">Patent pending</label>
                              </div> -->
                        <div class="input-field col m6">
                          {!! Form::label('Patent/Application No.') !!}
                          {!! Form::text('ptname1', null, 
                              array('id' => 'ptname', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="ptname" type="text" class="validate">
                            <label for="ptname">Patent/Application no</label> -->
                        </div>
                              <div class="input-field col m6">
                                {!! Form::label('Patent Title') !!}
                                {!! Form::text('ptitle1', null, 
                                    array('id' => 'ptitle', 
                                          'class'=>'validate')) !!}
                            <!-- <input id="ptitle" type="text" class="validate">
                                  <label for="ptitle">Patent Title</label> -->
                        </div>
                        <div class="input-field col m6">
                                {!! Form::label('Inventors') !!}
                                {!! Form::text('inventors1', null, 
                                    array('id' => 'inventors', 
                                          'class'=>'validate')) !!}
                            <!-- <input id="inventors" type="text" class="validate">
                                  <label for="inventors">Inventors</label> -->
                        </div>
                              <div class="input-field col m12">
                                <h6>Issue/Filling Date</h6>
                                {!! Form::date('isdate1', null, 
                                    array('id' => 'isdate', 
                                          'class'=>'dat')) !!}
                            <!-- <input placeholder="Issue/Filling date" type="text" class="datepicker"> -->
                        </div>
                              
                              
                              <div class="input-field col m12">
                                {!! Form::label('Patent URL') !!}
                                {!! Form::text('pturl1', null, 
                                    array('id' => 'pturl', 
                                          'class'=>'validate')) !!}
                            <!-- <input id="pturl" type="text" class="validate">
                                  <label for="pturl">Patent Url</label> -->
                        </div>
                              <div class="input-field col m12">
                                {!! Form::label('Description') !!}
                                {!! Form::text('ptdesc1', null, 
                                    array('id' => 'ptdesc', 
                                          'class'=>'validate')) !!}
                            <!-- <textarea id="ptdesc" class="materialize-textarea"></textarea>
                    <label for="ptdesc">Description</label> -->
                              </div>
                              </div>
                              <div id="patentClone">
                              <div style="display: none;">
                                {!! Form::text('dummy8', 1, 
                                        array('id' => 'dummy8', 
                                              'class'=>'validate')) !!}
                                              </div>
                            <div class="patent" style="display: none;">
                                  <div class="row ">
                              <div class="input-field col m6">
                                {!! Form::label('Patent Office') !!}
                                {!! Form::text('', null, 
                                    array('id' => 'pOffice', 
                                          'class'=>'validate')) !!}
                                <!-- {{ Form::select('year', [
                                   '' => 'Patent Office',
                                   '1' => 'India',
                                   '2' => 'Afghanistan',
                                   '3' => 'USA'], 'Patent Office') 
                                }} -->
                              <!-- <select>
                                <option value="" disabled selected>Patent office</option>
                                <option value="1">India</option>
                                <option value="2">Afghanistan</option>
                                <option value="3">USA</option>
                                <option value="4">Australia</option>
                                       </select> -->
                              
                        </div>
                               <!-- <div class="input-field col m6">
                               <input name="group1" type="radio" id="test1" />
                                <label for="test1">Patent issued</label>
                                   <input name="group1" type="radio" id="test2" />
                                <label for="test2">Patent pending</label>
                              </div> -->
                        <div class="input-field col m6">
                          {!! Form::label('Patent/Application No.') !!}
                          {!! Form::text('', null, 
                              array('id' => 'ptname', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="ptname" type="text" class="validate">
                            <label for="ptname">Patent/Application no</label> -->
                        </div>
                              <div class="input-field col m6">
                                {!! Form::label('Patent Title') !!}
                                {!! Form::text('', null, 
                                    array('id' => 'ptitle', 
                                          'class'=>'validate')) !!}
                            <!-- <input id="ptitle" type="text" class="validate">
                                  <label for="ptitle">Patent Title</label> -->
                        </div>
                        <div class="input-field col m6">
                                {!! Form::label('Inventors') !!}
                                {!! Form::text('', null, 
                                    array('id' => 'inventors', 
                                          'class'=>'validate')) !!}
                            <!-- <input id="inventors" type="text" class="validate">
                                  <label for="inventors">Inventors</label> -->
                        </div>
                              <div class="input-field col m12">
                                <h6>Issue/Filling Date</h6>
                                {!! Form::date('', null, 
                                    array('id' => 'isdate', 
                                          'class'=>'dat')) !!}
                            <!-- <input placeholder="Issue/Filling date" type="text" class="datepicker"> -->
                        </div>
                              
                              
                              <div class="input-field col m12">
                                {!! Form::label('Patent URL') !!}
                                {!! Form::text('', null, 
                                    array('id' => 'pturl', 
                                          'class'=>'validate')) !!}
                            <!-- <input id="pturl" type="text" class="validate">
                                  <label for="pturl">Patent Url</label> -->
                        </div>
                              <div class="input-field col m12">
                                {!! Form::label('Description') !!}
                                {!! Form::text('', null, 
                                    array('id' => 'ptdesc', 
                                          'class'=>'validate')) !!}
                            <!-- <textarea id="ptdesc" class="materialize-textarea"></textarea>
                    <label for="ptdesc">Description</label> -->
                              </div>
                              </div>
                               <a class="waves-effect btn" id="removePatent">Remove</a> 

                                </div>
                              </div> 
                               <a class="waves-effect btn" id="addPatent">Add</a> 
                    </div>
                </li>
                 <li>
                  <div class="collapsible-header">Acheivements in events/competitions</div>
                  <div class="collapsible-body container">
                    <div class="row ">
                                 
                        <div class="input-field col m12">
                          {!! Form::label('Organisation') !!}
                          {!! Form::text('acorgname1', null, 
                              array('id' => 'acorgname', 
                                    'class'=>'validate')) !!}
                            <!-- <input id="acorgname" type="text" class="validate">
                            <label for="acorgname">Organisation</label> -->
                        </div>     
                               
                        <div class="input-field col m12">
                          {!! Form::label('Event/Competition Name') !!}
                          {!! Form::text('acevname1', null, 
                              array('id' => 'acevname', 
                                    'class'=>'validate')) !!}
                           <!--  <input id="acevname" type="text" class="validate">
                            <label for="acevname">Event/Competition name</label> -->
                        </div>
                        <div class="input-field col m6">
                          {!! Form::label('Year') !!}
                          {!! Form::text('acevYear1', null, 
                              array('id' => 'acevYear', 
                                    'class'=>'validate')) !!}
                          <!-- {{ Form::select('year', [
                             '' => 'Year',
                             '1' => '2017',
                             '2' => '2018',
                             '3' => '2019'], 'Year') 
                          }} -->
                              <!-- <select>
                                <option value="" disabled selected>Year</option>
                                <option value="1">2014</option>
                                <option value="2">2015</option>
                                <option value="3">2016</option>
                                <option value="4">2017</option>
                                  <option value="4">2018</option>
                                  
                                       </select> -->
                              
                        </div>
                              <div class="input-field col m6">
                                {!! Form::label('Result') !!}
                                {!! Form::text('acres1', null, 
                                    array('id' => 'acres', 
                                          'class'=>'validate')) !!}
                            <!-- <input id="acres" type="text" class="validate">
                                  <label for="acres">Result</label> -->
                        </div>
                              
                              
                
                              </div>
                      <div id="achievementClone">
                      <div style="display: none;">
                        {!! Form::text('dummy9', 1, 
                                array('id' => 'dummy9', 
                                      'class'=>'validate')) !!}
                                      </div>
                        <div class="achievement" style="display: none;">
                          <div class="row ">
                                 
                          <div class="input-field col m12">
                            {!! Form::label('Organisation') !!}
                            {!! Form::text('', null, 
                                array('id' => 'acorgname', 
                                      'class'=>'validate')) !!}
                              <!-- <input id="acorgname" type="text" class="validate">
                              <label for="acorgname">Organisation</label> -->
                          </div>     
                                 
                          <div class="input-field col m12">
                            {!! Form::label('Event/Competition Name') !!}
                            {!! Form::text('', null, 
                                array('id' => 'acevname', 
                                      'class'=>'validate')) !!}
                             <!--  <input id="acevname" type="text" class="validate">
                              <label for="acevname">Event/Competition name</label> -->
                          </div>
                          <div class="input-field col m6">
                            {!! Form::label('Year') !!}
                            {!! Form::text('', null, 
                                array('id' => 'acevYear', 
                                      'class'=>'validate')) !!}
                            <!-- {{ Form::select('year', [
                               '' => 'Year',
                               '1' => '2017',
                               '2' => '2018',
                               '3' => '2019'], 'Year') 
                            }} -->
                                <!-- <select>
                                  <option value="" disabled selected>Year</option>
                                  <option value="1">2014</option>
                                  <option value="2">2015</option>
                                  <option value="3">2016</option>
                                  <option value="4">2017</option>
                                    <option value="4">2018</option>
                                    
                                         </select> -->
                                
                          </div>
                                <div class="input-field col m6">
                                  {!! Form::label('Result') !!}
                                  {!! Form::text('', null, 
                                      array('id' => 'acres', 
                                            'class'=>'validate')) !!}
                              <!-- <input id="acres" type="text" class="validate">
                                    <label for="acres">Result</label> -->
                          </div>
                              
                              
                
                        </div>
                       <a class="waves-effect btn" id="removeAchieve">Remove</a> 

                                </div>
                              </div> 
                               <a class="waves-effect btn" id="addAchieve">Add</a> 
                    </div>
                </li>
                    
              </ul>
              <a>
                  {!! Form::submit('Submit', 
                    array('class'=>'waves-effect btn')) !!}
              </a>
            </div>


	
          	
	{!! Form::close() !!}

@stop

@section('js')
<script src="{{URL::asset('js/tokenizer.js')}}"></script>
<script src="{{URL::asset('js/studentForm.js')}}"></script>
@stop