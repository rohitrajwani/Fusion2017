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
        
        @if(session('alert'))
            <div class="alert alert-success alert-dismissible" role="alert">
                
                  {{ session('alert') }}. 
            </div>
        @endif 
                    <div class="row">
                                <div class="col s12">
                                          <ul class="tabs">
                                                <li class="tab col s3"><a class="active" href="#test1">Internship Procedure</a></li>
                                                <li class="tab col s3"><a href="#test2">Placement Procedure</a></li>
                                                <li class="tab col s3"><a href="#test3">Internship Policy</a></li>
                                                <li class="tab col s3"><a href="#test4">Placement Policy</a></li>
                                                <li class="tab col s3"><a href="#test5">CodeOfConduct</a></li>
                                          </ul>
                                </div>
                                <hr>
                                <div id="test1" class="col s12">
                                
                                <br>
                                <div class="col s12 m9 offset-m1"><h4><b>Internship Procedure</b></h4></div>
                                                                <div class="col s12 m9 offset-m1"><h6>
                                                                
                                                                        <ol>
                                                                        <li>The Placement Office sends invitations to companies/ organisations along with relevant information.</li><br>
                                                                        <li>The accounts are created for organisations interested in recruiting on the website: http://placements.iiitdmj.ac.in.</li><br>
                                                                        <li>A Company/Organisation fills a Job Announcement Form (JAF) containing details of the job and the offer using their online account.</li><br>
                                                                        <li>If the company/organisation is interested in conducting a Pre-Placement Talk (PPT) they can send a request along with the preferred dates</li><br>
                                                                        <li>The JAF is made available online to the eligible students, along with any other information furnished by company/organisation</li><br>
                                                                        <li>Interested and eligible (as per the criteria specified by the organisations) students show their willingness to appear for the recruitment process of a company by signing its JAF online. The verified resumes of all such students become available to the organisation for downloading or viewing through their placement account.</li><br>
                                                                        <li>Organisations can shortlist students. The organisations are also requested to maintain a waitlist of students who can be interviewed in the event of non-availability of some of the shortlisted students.</li><br>
                                                                        <li>Placement Office allots dates for recruitment procedure by considering factors like student preferences, job profile, etc. Organisations visit the campus on the allotted date(s) and conduct tests and/or interviews according to their recruitment process.</li><br>
                                                                        <li>The company/organisation is required to furnish the final list of selected students in a sealed envelope at the end of the assigned interview slot. The organisations are also requested to maintain a waitlist of students in case of non-availability of some of the selected students.</li><br>
                                                                        <li>The Placement Office also coordinates the signing of offer letters by students who have been selected to ensure that they reach the company/organisation as early as possible.</li><br>
                                                                          </ol>
                                                                        </h6>
                                                                </div>
                                                    </div>
                                        
                                </div>
                                <div id="test2" class="col s12">
                                
                                <div class="col s12 m9 offset-m1"><h4><b>Placement Procedure</b></h4></div>
                                                                <div class="col s12 m9 offset-m1"><h6>
                                                                
                                                                        <ol>
                                                                        <li>The Placement Office sends invitations to companies/ organisations along with relevant information.</li><br>
                                                                        <li>The accounts are created for organisations interested in recruiting on the website: http://placements.iiitdmj.ac.in.</li><br>
                                                                        <li>A Company/Organisation fills a Job Announcement Form (JAF) containing details of the job and the offer using their online account.</li><br>
                                                                        <li>If the company/organisation is interested in conducting a Pre-Placement Talk (PPT) they can send a request along with the preferred dates</li><br>
                                                                        <li>The JAF is made available online to the eligible students, along with any other information furnished by company/organisation</li><br>
                                                                        <li>Interested and eligible (as per the criteria specified by the organisations) students show their willingness to appear for the recruitment process of a company by signing its JAF online. The verified resumes of all such students become available to the organisation for downloading or viewing through their placement account.</li><br>
                                                                        <li>Organisations can shortlist students. The organisations are also requested to maintain a waitlist of students who can be interviewed in the event of non-availability of some of the shortlisted students.</li><br>
                                                                        <li>Placement Office allots dates for recruitment procedure by considering factors like student preferences, job profile, etc. Organisations visit the campus on the allotted date(s) and conduct tests and/or interviews according to their recruitment process.</li><br>
                                                                        <li>The company/organisation is required to furnish the final list of selected students in a sealed envelope at the end of the assigned interview slot. The organisations are also requested to maintain a waitlist of students in case of non-availability of some of the selected students.</li><br>
                                                                        <li>The Placement Office also coordinates the signing of offer letters by students who have been selected to ensure that they reach the company/organisation as early as possible.</li><br>
                                                                          </ol>
                                                                        </h6>
                                                                </div>
                                                    </div>
                            
                                                    
                                <div id="test3" class="col s12">
                                                            <div class="col s12 m9 offset-m1"><h4><b>Internship Policy</b></h4></div>
                                                                        <div class="col s12 m9 offset-m1"><h6>
                        
                                                                        <ol>
                                                                        <li>Companies will be given a status of A, B1, B2 based on weighted average factor of the following points-<br>
                                                                        
                                                                                    <ul>
                                                                                        <li>   a. Based on future prospects and field of operation of the company.</li><br>
                                                                                        <li>   b. Based on students review of the company.</li><br>
                                                                                        <li>   c. Based on Remuneration.</li><br></li>
                                                                                    </ul>   
                                                                        
                                                                        <li>Companies will be allotted the slots for PPTs and interview sessions etc in the same order- A,B1,B2.</li><br>
                                                                        <li>If companies wish to arrange some sort of talks or introduction sessions then they might do so by informing the placement cell. This preferably should be done before the beginning of the placement procedure.</li><br>
                                                                        <li>Companies may disclose following placement details before the start of placement procedure-<br>
                                                                                    <ul>
                                                                                    <li>   a. Suggested job profiles they wish to offer to the students (preferably yes).</li><br>
                                                                                    <li>   b. If company has already recruited any student of the institute before visiting the campus through off campus placement then company shall provide this information to placement cell.</li><br>
                                                                                    <li>   c. This data will be shared with the students only if the company wishes to do so, else will only be used by the Placement Cell.</li><br>
                                                                                    </ul></li>
                                                                                    
                                                                        <li>The company can confirm or negotiate the dates with the placement cell. Once the company confirms the date then-</li><br>
                                                                        
                                                                                <ul>
                                                                                    <li>   a. Interested students sign their willingness by registering for the company online, if the company wants to.</li><br>
                                                                                    <li>   b. Resumes of the interested students (if required) are made available to the companies for the purpose of short listing.</li><br>
                                                                                    <li>   c. The list of short listed students is mailed to the Training and Placement Cell prior to the campus selection date.</li><br>
                                                                                </ul>   
                                                                        </Ol>
                                                                        
                                                                        
                                                                        </h6>
                                                                        
                                                            </div>
                                            </div>
                    
                        
                        
                                    <div id="test4" class="col s12"><div class="col s12 m9 offset-m1"><h4><b>Placement Policy</b></h4></div>
                                                    <div class="col s12 m9 offset-m1"><h6>
                        
                                                        <ol>
                                                        <li>Companies will be given a status of A, B1, B2 based on weighted average factor of the following points-<br>
                                                        
                                                                    <ul>
                                                                        <li>   a. Based on future prospects and field of operation of the company.</li><br>
                                                                        <li>   b. Based on students review of the company.</li><br>
                                                                        <li>   c. Based on Remuneration.</li><br></li>
                                                                    </ul>   
                                                        
                                                        <li>Companies will be allotted the slots for PPTs and interview sessions etc in the same order- A,B1,B2.</li><br>
                                                        <li>If companies wish to arrange some sort of talks or introduction sessions then they might do so by informing the placement cell. This preferably should be done before the beginning of the placement procedure.</li><br>
                                                        <li>Companies may disclose following placement details before the start of placement procedure-<br>
                                                                    <ul>
                                                                    <li>   a. Suggested job profiles they wish to offer to the students (preferably yes).</li><br>
                                                                    <li>   b. If company has already recruited any student of the institute before visiting the campus through off campus placement then company shall provide this information to placement cell.</li><br>
                                                                    <li>   c. This data will be shared with the students only if the company wishes to do so, else will only be used by the Placement Cell.</li><br>
                                                                    </ul></li>
                                                                    
                                                        <li>The company can confirm or negotiate the dates with the placement cell. Once the company confirms the date then-</li><br>
                                                        
                                                                <ul>
                                                                    <li>   a. Interested students sign their willingness by registering for the company online, if the company wants to.</li><br>
                                                                    <li>   b. Resumes of the interested students (if required) are made available to the companies for the purpose of short listing.</li><br>
                                                                    <li>   c. The list of short listed students is mailed to the Training and Placement Cell prior to the campus selection date.</li><br>
                                                                </ul>   
                                                        </Ol>
                                                        
                                                        
                                                        </h6>
                                                        
                                                        </div>
                                             
                                             
                                            </div>
                                
                                                                                
                <div id="test5" class="col s12">
                  <div class="col s12 m9 offset-m1"><h4><b>Code of Conduct</b></h4></div>
                        <div class="col s12 m9 offset-m1"><h6>
                        
                        <ul>
                                <li><b><u>A. Eligibility and Registration</b></u>
                                        <ol>
                                            <li>1.Students are required to register with the IIITDMJ PLACEMENT CELL. Registered students with PLACEMENT CELL are eligible to participate in
                                                    the placement cell activities. Campus placement is a facility provided for the students. Students with course backlog are advised not to register
                                                    for Placement. Only interested students are requested to register for placements.</li><br>
                                            <li>2.All students who wish to take part in the Institute campus placements should register for soft skills programme organized by the Institute</li><br>
                                            <li>3.All Students should compulsorily attend all the soft skills classes failing which will lead to cancellation of placement registration.</li><br>
                                            
                                        </Ol>
                        
                                </li><br>
                                    
                                <li><b><u>B. Curriculum Vitae- Student Placement Registration:</b></u>
                                        <ol>
                                            <li>1.Information regarding company visits will be informed through e-mail/notice board/website. Students are advised to check timely
                                                announcements, go through the company website and apply only if interested.</li><br>
                                            <li>2.Students are expected to follow the Institute CV template available in the placement website for preparing the CVs</li><br>
                                            <li>3.The details of the CV have to be genuine and any student found violating this, will not be permitted to apply for placements for the rest of the
                                                academic year</li><br>
                                            <li>4.Depending on the profile/requirements laid by the respective company a detailed CV should be prepared in an attractive manner and
                                                submitted within the deadline. Late submission will not be considered for the test/interview
                                                </li><br>
                                        </Ol>
                        
                                </li><br>

                                <li><b><u>C. Pre-Placement Interaction (PPI):</b></u>

                                        <ol>
                                            <li>1.Those who have submitted the resume and attended the PPI session are eligible to appear in the selection process of that company. The PPI
                                                attendance is compulsory</li><br>
                                            <li>2.Students must clarify their queries regarding salary break-up, job profile, place of work, bond details, medical fitness requirements, etc with
                                                the company officials during PPI</li><br>
                                            <li>3.There shall be no question about the pay package offered by the company. Students shall not question the policy of the company.
                                                    </li><br>
                                            <li>4.The interaction with the representatives of the companies should be in a very dignified manner.
                                                </li><br>
                                        </Ol>
                        
                                </li><br>
                                
                                <li><b><u>D. Placement Process</b></u>

                                        <ol>
                                            <li>1.It is the responsibility of the student to check announcements /notices/updated information/shortlisted names etc. in the notice boards of
                                                Placement Office/mail. Students are expected to report at the respective venue as per the announcements</li><br>
                                            <li>2.Late comers for the Aptitude Test / Group Discussion / Interview may not be allowed to appear for the selection process.
                                            </li><br>
                                            
                                        </Ol>
                        
                                </li><br>
                                
                                
                                <li><b><u>E. Attendance and Punctuality:</b></u>
                                        <ol>
                                            <li>1.A student who applies and gets short listed is bound to go through the entire selection process unless rejected midway by the recruiter.</li><br>
                                            <li>2.Any student who withdraws deliberately in the midst of a selection process will be disqualified from placement for the rest of the academic
                                                year</li><br>
                                            <li>3.Unauthorized absence for the test/interview will lead to cancellation of registration.</li><br>
                                                                        
                                        </Ol>
                        
                                </li><br>
                                
                                
                                <li><b><u>F. Dress Code:-</b></u>
                                        <ol>
                                        
                                            <li>Students must be formally dressed whenever they participate in any sort of interaction with a company. The coordinator deserv es the
                                                right to refuse permission to a student to attend the selection process, if their attire is unsatisfactory. The dress code shall be applicable
                                                for Pre placement talks as well.
                                                Boys – Formal dark pant with light coloured full sleeve shirt with blazers, neck tie and formal shoes
                                                Girls – Churidar / Salwar / Shirt-Pant with overcoat and shoes <br>
                                            </li>
                                
                                        </ol>
                                </li>
                                
                                <li><b><u>G. Identity card:</b></u>
                                        <ol>
                                        
                                            <li>Students must bring their identity cards whenever they undergo a placement process. Students should maintain originals and sufficient
                                                copies of their C.V., Passport size photographs, grade sheets, certificates etc. The Placement Office will not be responsible for providing
                                                any assistance to the students on the procurement of the above said documents. <br>
                                            </li>
                                
                                        </ol>
                                </li>
                            
                                
                                
                                <li><b><u>H. Job Offers</b></u>

                                        <ol>
                                            <li>1.Announcement on the notice board will be considered as the final offer. Offers received from companies must be collected as per timings in
                                                circular /notice.</li><br>
                                            <li>2.If the student has been selected in the campus interview (Dream Job), then he/she cannot apply again, even if he/she rejects the previous
                                                job offer</li><br>
                                            <li>3.The students shall not question the company on why he/she is not selected. Selection is in the hands of the company. Any unruly behavior
                                                compromising the reputation of the Institute shall deem the student ineligible for future placements and the student shall face the disciplinary
                                                committee.</li><br>
                                            <li>4.The responsibility of going through the offer letter and taking actions therein such as submission of documents lies entirely with the student.</li><br>
                                            <li>5.The students should honour the offer and communicate with the Industry in a pleasing manner</li><br>
                                            <li>6.In case offers are received directly by the student from the company, the same must be intimated to the placement office</li><br>
                                            <li>7.Student violating any of the above mentioned rules and regulations or found indulging in any act of indiscipline/misbehavior
                                                thereby earning a bad name for the Institute, may be deregistered from availing any further placement facilities and is liable for strict
                                                disciplinary action, as per the IIITDMJ rules and regulations.
                                                </li><br>
                                            
                                        </Ol>
                        
                                </li><br>
                                
                                
                                <li><b><u>I. Multiple offers:</b></u>
                                        <ol>
                                        
                                            <li>A student is eligible for only one job. If a student receives more than one offer owing to delays in the announcements of results by the
                                                recruiters, he/she is bound to accept the job whose results are declared first. If the results are declared on the same day, the student may
                                                choose from the offers in hand and inform the placement coordinator within 2 days of the announcement of the results.
                                                <br>
                                            </li>
                                
                                        </ol>
                                </li>
                                
                                <li>J. Joining status:</b></u>
                                        <ol>
                                        
                                            <li>Students should notify the company with a copy to the placement office in case they are not joining the company with reasons. For all matters
                                                not covered by the above regulations, the placement coordinators will use their discretion to take appropriate decisions. <br>
                                            </li>
                                
                                        </ol>
                                </li>

                        </ul>                   
                        </h6>               
                        </div>
      
            </div>
                
                </div>
                                                                             
                                                                            
        </div>
        


@stop