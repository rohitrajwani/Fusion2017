@extends('layout')

@section('VH_nav')
<!--

  nav bar for stakeholder

-->

       <nav class="mynav">
  <div class="nav-wrapper">
    <ul>
      <li><a href="/vhbooking/requestForm">Book Room</a></li>
      <li><a href="/vhbooking/cancelRoom">Cancel Room</a></li>
          <li><a href="/vhbooking/bookingHistory">Booking History</a></li>
            <li><a href="/vhbooking/rules">Rules&amp;Regulations</a></li>
      <!-- Dropdown Trigger -->
     
    </ul>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/vhbooking">Home</a></li>

        </ul>
  </div>
</nav>

@endsection

@section('VH_content')
<!--

  Following page displays the Rules and Regulation of VH
  The following can be edited by Vh incharge only

-->
<center>
<div class="row">
                <div class="col s12 m6 offset-m3">
                    <h5><b>Norms and Guidelines</b></h5>
                </div>
</div>
</center>

<div class="container">
 <p> <b>(I) Booking Procedure and Confirmations:</b><br>
1. For booking of normal facilities, duly filled in forms/e-forms, may directly be submitted to Incharge VH through email/in hard copy.<br>
3. The bookings are purely provisional and subject to availability.<br>
4. Priority will be given to Institute guests, visitors coming for academic activities.<br>
5. Personal bookings (10% of total rooms) will be made on the basis of availability. Such bookings will be provisional and will be confirmed only 3 days before the actual arrival of the guest.<br>
6. Students may be allotted accommodation in VH for their PARENTS/ SPOUSE, if the same is not available in Hostel guestrooms. Students should get their requisition forms forwarded by respective warden.<br>
7. Telephonic bookings/ cancellations of any of the VH facilities will not be entertained, unless there is some emergency.<br>
8. Confirmation / non-Acceptance of bookings will be informed through e-mail or can be checked with VH office within 24 hours of submission of the requisition form.<br>
9. The room will be allotted on the condition that, if necessary, the allotte would not have any objection in sharing accommodation with other guest. <br>
10. Guests of category C will be allowed to stay up to 5(Five) days only. <br>
<hr>

<b>(II) Guest Specific Information:</b>
1) Check-in Check-out facility: 24 Hours.<br>
2) Approval for the extended stay has to be obtained beforehand.<br>
3) Meals can be booked at the VH Dining Hall: (Lunch by 09:00 Hrs and Dinner by 14:00 Hrs).<br>
4) No claims for loss/ damage or lapse of services will be entertained at any stage by the Institute as most of the services are obtained through external parties.<br>
5) Guests are advised to get the rooms cleaned in their presence only. If the guest has no objection for getting the room cleaned in his/ her absence, he/she should deposit the room keys at the front office.<br>
6) Consumption of Narcotics/ Alcoholic drinks and Smoking is strictly prohibited in VH.<br>
7) In order to keep bills ready & minimize inconvenience at check-out time, the caretaker of the VH should be kept informed about the exact departure well in advance.<br>
8) The guest is requested to verify/ certify the final bill and pay all the dues wherever applicable before departure.<br>
9) All charges are to be paid in Cash to the caretaker of the VH.<br>
<hr>

<b>(III) Visitors’ Category for the Purpose of Tariff Collection:</b><br>
<b>(A)</b><br>
(i) Institute Guests/ Directors/ Examiners/ External Members of Institute Committees/ Invited Speakers/ CAG Audit Team/MHRD officials.<br>
(ii) Important guests of Chairman, BOG/ Director/ Senate/ BWC/ Statutory bodies.<br>
(iii) Other Institute guests not covered above will be approved by the Director.<br>
<b>(B)</b><br>
(i) Institute employee & their dependents<br>
(ii) Project employee & their dependents<br>
(iii) Retired IIITDMJ Faculty/ Staff/ Alumni<br>
(iv) Relatives/ Guests of IIITDMJ Faculty & Staff<br>
(v) Parents/ Guardian/ Spouse of IIITDMJ students<br>
(vi) Other than Institute employees staying for Institute work<br>
(vii) Any other Guest (Approved by the Director)<br>
<b>(C)</b><br>
(i) Employees of other IIITs/ IITs/ Centrally funded engineering colleges/ universities/ PSUs.<br>
(ii) Visitors of government/ public sector organization.<br>
(iii) Trainees coming to the Institute under programmes organized by the Institute.<br>
(iv) Others (Approved by the Director).<br>
<b>(D)</b><br>
Contractors, representatives of firms, vendors etc. coming for their work viz. meeting, presentations etc. and requesting to stay in the VH.<br>

</p>

 <p><b>(IV) Tariff : Lodging& Boarding Charges :</b>
 
<table>
<tr>
<th colspan="6"><center>Per day Charges</center></th>
</tr>

 <tr>
  <th></th><th></th>
  <th>Category A</th>
  <th>Category B</th>
  <th>Category C</th>
  <th>Category D</th>
 </tr>
 <tr>
  <th rowspan="2">AC Room Rent</th>
  <th>Single Occupancy</th>
  <td>Free</td>
  <td>Rs. 400</td>
  <td>Rs. 800</td>
  <td>Rs. 1400</td>
 </tr>
 <tr>
  <th>Double Occupancy</th>
  <td>Free</td>
  <td>Rs. 500</td>
  <td>Rs. 1000</td>
  <td>Rs. 1600</td>
 </tr>

 <tr>
  <th rowspan="5">Boarding</th>
  <th>Full Day Meal</th>
  <td>Free</td>
  <td>Rs. 225</td>
  <td>Rs. 225</td>
  <td>Rs. 225</td>
  </tr>

  <tr>
  <th>Breakfast(per head)</th>
  <td>Free</td>
  <td>Rs. 50</td>
  <td>Rs. 50</td>
  <td>Rs. 50</td>
 </tr>

<tr>
  <th>Lunch/Dinner(per head)</th>
  <td>Free</td>
  <td>Rs. 100</td>
  <td>Rs. 100</td>
  <td>Rs. 100</td>
 </tr>

 <tr>
  <th>Tea</th>
  <td>Free</td>
  <td>Rs. 10</td>
  <td>Rs. 10</td>
  <td>Rs. 10</td>
 </tr>

 <tr>
  <th>Milk per glass</th>
  <td>Free</td>
  <td>Rs. 20</td>
  <td>Rs. 20</td>
  <td>Rs. 20</td>
 </tr>
</table>
</p>


 <p><b>(V)Catering:</b><br>
 1. Meals (other than bed tea) will be served on advance order during the following hours :<br>
 <table class="bordered highlight">
    <thead>
      <tr>
          <th>Meal</th>
          <th>Time</th>
          
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Bed Tea</td>
        <td>6:30 am to 7:00 am</td>
        
      </tr>
      <tr>
        <td>Breakfast</td>
        <td>7:30 am to 9:30 am</td>
        
      </tr>
      <tr>
        <td>Lunch</td>
        <td>1:00 pm to 2:30 pm</td>
        
      </tr>

       <tr>
        <td>Evening Tea</td>
        <td>5:30 pm to 6:30 pm</td>
        
      </tr>

       <tr>
        <td>Dinner</td>
        <td>8:00 pm to 9:30 pm</td>
        
      </tr>
    </tbody>
</table>
<br>
2. All meals except bed tea will be served in the dining hall.
</p>
                        
<p><b>(VI) Cancellation Charges:</b><br>
<table class="bordered highlight">
    <thead>
      <tr>
          <th>S.No.</th>
          <th>Condition</th>
          <th>Cancellation Charges</th>
          
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Cancellation notice is more than 7 days in advance from the date of arrival.</td>
        <td>Nil</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Cancellations within 7 days before the date of arrival</td>
        <td>25% of one day room rent applicable.</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Cancellation of booking on the day of arrival or non turn-up of the guest.</td>
        <td>50% of one day room rent applicable.</td>
      </tr>

      
    </tbody>
</table>
</p>

<p><b>(VII) Responsibilities of Indenter/ Forwarding official:</b><br>
All the facilities in VH are necessarily for official purposes only. The indenters are advised not to book rooms for personal purposes of the visitors / unknown visitors in view of the resource crunch as well as security hazards. By filling up the requisition form for allotment of the VH facilities, the indenter/ forwarding official/ visitor shall be treated to have accepted to abide by all the terms & conditions stated above and take personal responsibility for the genuineness of the visitor, behavioral issues with the visitors and any damages caused by the visitor during the stay.
</p>


			
           
                </div>

@endsection

@section('scripts')

    <script>

        $(document).ready(function() {
            $('select').material_select();
            $("dropdown-button").dropdown();
          });

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

          $('#timepicker').pickatime({
            autoclose: false,
            twelvehour: false
          });


    </script>

@endsection