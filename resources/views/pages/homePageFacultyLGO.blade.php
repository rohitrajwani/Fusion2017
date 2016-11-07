@extends('layout')

@section('title')
    <title>Home - Faculty LGO</title>
@stop

@section('main_content')
    
    <?php

        $table = \DB::table('employee_leave')->where([['leave_granting_officer','=',$facdet->faculty_id],['status','=',0]])->get();
        $counter = 0;
        foreach($table as $tuple)
          $counter = $counter + 1;
      
    ?>

    <div class="main-container row">
    <nav class="mynav">
        <div class="nav-wrapper">
            <ul>
                <li class="active" class><a href="/ELMS/homeFacultyLGO">HOME</a></li>
                <li><a href="/ELMS/leaveApplicationFacultyLGO">Apply for Leave</a></li>
                <li><a href="/ELMS/historyFacultyLGO">Leave History</a></li>
                <li><a href="/ELMS/statusFacultyLGO">Check Status</a></li>
                <li><a href="/ELMS/requestsFacultyLGO">Pending Leave Requests<span class="badge">{{$counter}}</span></a></li>
                
            </ul>
        </div>
    </nav>
                            
    <div class=" col s12 m12"><br>
        <div style="text-align: center; font-size: 24px; font-weight: 300">Employee Details<hr></div>
        <pre>Name        :  {{$facdet->name}} </pre>
        <pre>P.F. No.    :  {{$facdet->faculty_id}}</pre>
        <pre>Sex         :  {{$facdet->sex}} </pre>
        <pre>Department  :  {{$facdet->department}} </pre>
        <pre>Designation :  {{$facdet->designation}} </pre>
        <pre>E-mail Id   :  {{$facdet->email}} </pre>
        <pre>Contact No. :  {{$facdet->mobile_no}} </pre>
        <div style="text-align: center; font-size: 24px; font-weight: 300;">Balance Leaves<hr></div>
        <pre>Casual Leave         : {{$leavedet->casual}}  </pre>
        <pre>Special Casual Leave : {{$leavedet->special_casual}}  </pre>
        <pre>Restricted Holiday   : {{$leavedet->restricted_holiday}} </pre>
        <pre>Half Pay Leave       : {{$leavedet->half_pay}}  </pre>
        <pre>Commuted Leave       : {{$leavedet->commuted}}  </pre>
        <pre>Earned Leave         : {{$leavedet->earned}} </pre>
    </div>
    <div style="text-align: center; font-size: 24px; font-weight: 300;">Leaves Information<hr></div>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
              <div class="collapsible-header">Casual Leave</div>
              <div class="collapsible-body"><p>Casual leave will not earned by duty. The period of such leave will be limited to 8 days in a calendar year and is granted in such a manner that the total period of absence including holidays (prefixed or suffixed) does not ordinarily exceed nine days.<br>
            Casual leave cannot be combined with any other kind of leave. Vacation will not be treated as leave and, therefore, casual leave can be combined with vacation which should, however, be limited to nine days absence as stated above.<br>
            Casual leave is sanctioned by the concerned Head of the Department. Head of Department shall mean the convener of a discipline/Centre/Central Facility/Head of a section or any entity in the Institute which has a separately allocated budget.</p></div>
            </li>
             <li>
              <div class="collapsible-header">Special Casual Leave</div>
              <div class="collapsible-body"><p>Special casual leave is granted for purposes like appearance in a court of law in public interests, participation in conferences/scientific gatherings, viva of Ph. D/M. Tech thesis, selection committee meetings, or any other purpose which the Director may think fit. The period of such leave is normally limited to 15 days in a calendar year. <br>
              Special casual leave is sanctioned by the concerned Head of the Department except in cases of visits abroad. <br>
            In addition to this facility/academic staff will be entitled for one month special casual leave during the period of submission of their Ph.D. thesis or for visits to various labs/research and development organization/industrial organization for post doctoral research/research collaboration. However, the leave will be granted only if the teaching schedule of the person concerned is not affected / disturbed. Further, the total duration of special casual leave in a calendar year will not exceed one month. </p>
            </li>
            <li>
              <div class="collapsible-header">Half Pay Leave</div>
              <div class="collapsible-body"><p>Half pay leave is admissible in respect of each completed year of service is 20 days. This may be granted either on medical grounds on production of a valid medical certificate of for private affairs. While on medical treatment, there is provision for commutation. However, this leave is not granted for those holding a temporary appointment except on medical grounds with a valid medical certificate. </p>

            </li>
            <li>
              <div class="collapsible-header">Commuted Leave</div>
              <div class="collapsible-body"><p>
                Commuted leave not exceeding half the amount of half pay leave can be granted on production of a valid medical certificate. In such a case, twice the amount of such leave is deducted against half pay leave rule. </p>
            </li>
            
            <li>
              <div class="collapsible-header">Earned Leave</div>
                  <div class="collapsible-body"><p>Credit will be afforded in advance at a uniform rate of 15 days on the 1 st of January and 1st of July every year. During the period of one academic year, members of the vacation staff are entitled to vacation for 60 days. In case such a staff member is required to remain on.duty during the whole or part of the vacation, he/she will be eligible to Earned Leave as indicated below: <br>
                Duration of duty during vacation 
                Entire vacation 
                Parts of vacation  30 days X 
                Eligibility to earned leave on full pay 30 .days No. of days vacation not availed 
                No. of days of entire vacation 
                Earned leave at the credit of a member of staff is carried forward and can be accumulated up to a maximum of 300 days. Encashment of accumulated Earned leave subject to a maximum of 300 days at the time of death/retirement is also admissible.</p>
 
            </li>
            <li>
              <div class="collapsible-header">Maternity Leave</div>
              <div class="collapsible-body"><p>
                Maternity leave is admissible to married/unmarried female employee during — <br>
                (a) Pregnancy: 180 days — admissible only to employees with less than two surviving children. (b) Miscarriage/ abortion (included or otherwise): Total of 45 days in the entire service. Admissible irrespective of number of surviving children. Application should be supported by a certificate from a Registered Medical Practitioner for NOGs and from AMA for GOs-Rule 43(3)
                Maternity leave is not debited to the leave account -Rule 43(5)</p>

            </li>
            <li>
              <div class="collapsible-header">Paternity Leave</div>
              <div class="collapsible-body"><p>
                Male government servant with less than two surviving children, apprentices are als o eligible for 15 days during wife's confinement. To be applied up to fifteen days before or up to six month from the date of delivery</p>
            </li>
            <li>
              <div class="collapsible-header">Leave Not Due</div>
              <div class="collapsible-body"><p>
                *Rules here and elsewhere refer to FR/SR rules of Govt. of India 
                returning to auty on its expiry. It maybe granted without medical certificate —(a) i1. Leave Not Due may be granted to a permanent Government servant with no half pay leave at credit. 2. Temporary officials with minimum of one year's service and suffering from TB, Leprosy, Cancer or Mental illness may also be granted LND if the post from with the official proceeds on leave is likely to last till his return. — Rule 31(1-A). 
                n continuation of maternity leave - Rule 43 (4). (b) To a female Government servant with less than two living children on adoption of a child less than a year old — Rule 43-B. 5. The amount of leave should be limited to the limited to the half pay leave that the Government servant is likely to earn subsequently — Rule 31 (1)(b). 6. LND during the entire service is limited to a maximum of 360 days. — Rule 31(1). 7. LND will be debited against the half pay leave that the Government servant earns subsequently. — Rule 31 (1) (c). 8. It cannot be granted in the case of Leave Preparatory to Retirement' — Rule 31 (1). 9. When a Government servant granted leave not due resigns from service or is permitted to retire voluntarily without returning to duty, the leave not due should be cancelled. The resignation or retirement will take effect from the date on which such leave had commenced and the leave salary should be recovered. — Rule 31 (2) (a). 10. Where a Government servant, who having avaned himself of Leave Not Due , returns to duty but resigns or retires from service before he has earned such leave, he shall be liable to refund the leave salary to the extent the leave has not been earned subsequently. — Rule 31 (2) (b). 11. In case of 9 to 10 above , leave salary will not be recovered if the retirement is due to ill-health, incapacitating the Government servant for further service or in the event of death or is retired prematurely under FR 56 (j ) or FR 56 (1 ) or Rule 48 (1) (b), CCS (Pension) ) Rules. — Proviso to Rule 31 (2).  </p>
            </li>
            <li>
              <div class="collapsible-header">Extraordinary leave</div>
              <div class="collapsible-body"><p>
                Extraordinary leave (without pay) is granted to a Government servant — 
                (a) When no other leave is admissible; (b) When other leave is admissible, but the Government servant applies in writing for extraordinary leave — Rule 32 (1). <br>
                Extraordinary leave cannot be availed concurrently during the notice period, when going on voluntary retirement — Rule 32, GID (2). <br>
                imit. 1. No leave of any kind can be granted to a Government servant for a continuous period exceeding five years. Subject to this limitation, any amount of EOL may be sanctioned to a permanent Government servant. — Rule 12. <br>
                2. For temporary officials, the limit on any one occasion is — <br>
                (a) All Officials — Up to 3 months with or without medical certificate. — Rule 32 
                (b) Officials with a minimum of one year continuous service. — Up to 6 monthS with medical certificate for common ailments. — Rule 32 (2) (b). 
                Up to 18 months with medical certificate for cancer, mental illness, pulmonary tuberculosis or pleurisy of tubercular origin, tuberculosis of any part of the body and leprosy. — Rule 32 (2) (d). 
                (c) Officials with three or more years' continuous service. Up to 24 months, where the leave is required for the purpose of prosecuting studies certified to be in public interest. — Rule 32 (2) (e ). 
                (d) Officials belonging to Scheduled Castes / Scheduled Tribes. — Heads of Departments may • grant leave exceeding three months for attending the per-examination training course at the centres notified by the Government from time to time. — Rule 32 (4). <br>
                3. Two spells of extraordinary leave, intervened by any other kind of leave, should be treated as on continuous spell for the purpose of applying the maximum limit — Rule 32(5). <br>
                4. EOL may also be granted to regularize period of absence without leave retrospectively.  </p>
            </li>
            <li>
              <div class="collapsible-header">Leave On Foreign Service Terms</div>
              <div class="collapsible-body"><p>
               
                Leave on Foreign Service Terms means leave granted to serve elsewhere in which the employee receives pay from another organization. This is basically a mechanism to permit an employee to take up a remunerative position elsewhere while maintaining lien at the Institute and continuing to draw increments and retirement benefits at the Institute. <br>
                Contributions 
                An employee granted leave on Foreign Service terms is required to pay pension and leave salary contributions as per the Government rules. <br>
                SHORT LEAVE ON FOREIGN SERVICE TERMS <br>
                The person granted Long Leave will execute a bond to serve the Institute for a period of one year on return from the leave if the Long Leave is up to one year and fro a period of three years if the Long Leave is for more than one year. The bond will be for a sum of Rs.10, 000/-. <br>
                Deputation on Foreign Service Terms 
                A permanent member of the academic staff may be deputed to Government organization or an or an autonomous body drawing manor funding from the Government of India or an industrial enterprise, R&D Organization or an academic institution of repute, if this is in the interest of the Institute. <br>
                In the case of deputation to a higher position in a national laboratory. / institution of national importance/public sector undertaking or a senior position' in a central or state government department/organization, the maximum period of deputation will be give years provided the appointment is in India. In all other cases it shall be restricted to two years, and maybe extended by the Board for good and sufficient reasons. <br>
                There should be at least one year service period left after return from deputation. This period could be reduced further and even waived under special circumstances by the Board of Governors, depending on the merits of individual cases. <br>
                The obligation of any previous bond must be fulfilled for grant of deputation. The Board may, however, relax this condition in special cases.
            </li>
            <li>
              <div class="collapsible-header">Sabbatical Leave</div>
              <div class="collapsible-body"><p>
              Sabbatical Leave (with pay )will be for the purpose and under terms and conditions as laid down in the UGC norms. Further, eligibility and other conditions are given below. <br>
              At least two full semesters should have been spent after availing Short Leave. 
              For grant of Sabbatical Leave for the first time since joining at least six years should have been spent at the Institute (Including leave as due availed but restricted  to earned leave and commuted leave). <br>
              For any subsequent sabbatical Leave at least six years should have been spent at the  Institute (including leave as due availed but restricted to earned leave and commuted leave) since return from the last Sabbatical Leave. 
              Obligations of the bond period, if any, of the last Long leave should be fulfilled. A bond as given in Annexure III should be executed.</p> 
                                                                    
            </li>
            <li>
              <div class="collapsible-header">Study Leave</div>
              <div class="collapsible-body"><p>
               Study leave for prosecuting higher studies/training like Masters and Doctoral degree in the relevant discipline shall be granted for a maximum of two years under special circumstances by the Board. While granting of the study leave with pay to a person, he/she should have spent at, least two years at the Institute, including leave as due availed. <br>In addition he/she must sign a bond with the Institute that he/she will serve the Institute for at least five years after his/her return from the study leave, failing which he/she will be required to deposit the entire amount of salary paid to him/her during the study leave with 6% interest calculates annually. 
                 </p>
            </li>
        </ul>
    </div>
@stop