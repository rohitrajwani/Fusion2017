@extends('cc.layout.layout')


@section('header')
     @push('css')
     <style>
  
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }

    
    </style>
    
        <link rel="stylesheet" href="cc/asset/css/font.css">
        <link rel="stylesheet" href="cc/asset/css/style.css">
        <!--<link rel="stylesheet" href="cc/asset/css/newcss_style.css">-->
@endpush
@stack('contact_css')
  
    

      <ul class="tabs" id="nav_tab">
        <li class="tab col s3"><a class="active" href="#home">Home</a></li>
        <li class="tab col s3"><a  href="#reg">Register-Complaint</a></li>
        <li class="tab col s3"><a  href="#prog">Progress</a></li>
        <li class="tab col s3 "><a href="#faq">FAQ</a></li>
        <li class="tab col s3"><a href="#cont">Contact-Us</a></li>
      </ul>
    
      <div class="container"> 
      @if(session('success_type'))
         <?php echo "<script type='text/javascript'>alert('session('success_type'));</script>";?>
     @endif


          <!--Home page start-->
          
           <div id="home" >

              <img class="responsive-img" src="cc1.jpg">
              <h4 class="center-align" alt="computer-center photo">PDPM CC-Complaint</h4>
              <p class="flow-text">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThe Computer &amp; Communication Centre is solely responsible for keeping the Electronic Communication &amp; Computation related facilities available to each and every member of IIITDM Jabalpur. The services provided by the Computer&nbsp; &amp; Communication Centre includes:</p>
              <blockquote>
              <ul >
                  <li >Installation &amp; Maintenance of Servers for:
                  <ol type="i">
                      <li >i.Internet Access.</li>
                      <li >ii.E-mailing Facilities.</li>
                      <li >iii.Computation Facilities.</li>
                  </ol>
                  </li>
                  <li >Management &amp; upkeep of the Official IIITDM Jabalpur &amp; Intranet Web Page.</li>
                  <li >Management of the institute telephone exchange.</li>
                  <li >Management of the Centralized Computer Lab accessible to all the students of the institute as well as to other local researchers/students.</li>
                  <li >Maintaining the huge campus network, consisting about 10,000 nodes.</li>
                  <li >Providing technical assistance to the Academic Institutes and Organization in IIITDM Jabalpur.</li>
                  <li >Providing facilities to the Students who come from various academic institutes from all over the world for their Short-term Courses, Project Work, Summer Training etc.</li>
                  <li>Provides &amp; maintains the PCs of the Faculty &amp; Staff members.</li>
              </ul>
              </blockquote>

              <p>
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThe Computer & Communication Centre also manages the IIITDMJ LAN, IIITDMJ Telephone Exchange and provide support to the users. The campus LAN has been extended to all the hostels. The Network connectivity to the residences have been extended using ADSL technology. New hardware and software are procured on a regular basis so as to provide a state of the art computing facility to the IIITDM Jabalpur family. The resource of the centre is also availed by students/researchers of other institutions in and around Jabalpur.
              </p>
          </div>
           
           


           <div id="reg" ><style>
           
           #reg_form{
               background:#fafafa   ;
               
               
           }
        </style>
     



     <!--Complent Registration Form-->
 <div class="row" id="reg_complaint">
    <h5 class="center "><b>Complaint-Registration Form</b></h5>
    <br><br>
    <form  id="reg_form" action="/cc-complaint/create" method="post" enctype="multipart/form-data" >
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              <div class="row">
                  <div class="file-field col s12 l8 offset-l2 ">
                      <select name="category" id="category"  required/> 
                      <option value="" disabled selected>Choose your category</option>
                      <option value="Network">Network Related</option>
                      <option value="Hardware">Hardware Related</option>
                      <option value="Software">Software Related</option>
                      <option value="Maintance">Maintance Related</option>
                      </select> <label>Problem Category</label>
                </div>
              </div>  

              <div class="row">
                  <div class="file-field col s12 l8 offset-l2 ">
                        <select name="sub_category" id="type"  required/> 
                        <option value="" disabled selected>Choose your complaint-type</option>
                        <optgroup label="Network">    
                            <option value="Network-Proxy">Proxy</option>
                            <option value="Network-LAN">LAN</option>
                            <option value="Network-Other">Any others</option>
                        <optgroup label="Hardware"> 
                            <option value="Hardware-Missing">Missing Hardware</option>
                            <option value="Hardware-Working">Hardware not working</option>
                            <option value="Hardware-Other">Any others</option>
                        <optgroup label="Software">
                            <option value="Software-Outdated">Out of Date(Not compitable with OS)</option>
                            <option value="Software-Update">Update Required</option>
                            <option value="Software-Other" >Any others</option>
                        <optgroup label="Maintance">
                            <option value="Maintance-Furniture">Furniture Related</option>
                            <option value="Maintance-Facility">Facility Related(Fan,AC,Light) </option>
                            <option value="Maintance-Other" >Any others</option>
                        </select>
                        <label>Sub-Category</label>
                </div>
              </div>

          <div class="row">
          <div class="input-field col s12 l8 offset-l2">
          <h6 class="black-text" style="font weight:800;">Select CC</h6>
          <p>
          <input class="with-gap" name="cc_no" type="radio" id="cc1"  value="1" checked />
          <label for="cc1">CC-1(Upper CC)</label>
          <input class="with-gap"  name="cc_no" type="radio" id="cc2" value="2"/>
          <label for="cc2">CC-2(Lower CC)</label>
          <input class="with-gap" name="cc_no" type="radio" id="other"  value="0" checked />
          <label for="other">Other</label>
          </p>

          </div>
          </div>


          <div class="row">
          <div class="input-field col s12 l8 offset-l2">
          <h6 class="black-text" style="font weight:800;">Provide PC Number</h6>
          <i class="material-icons prefix">input</i>
          <input id="pc_no" type="string" class="validate" name="pc_no" min="1" max="999" required>
          <!-- <label for="pc_no">Pc Number</label>-->
          </div>
          </div>     
          <input type="hidden" name="user_id" value="{{ Auth::user()->username }}">
          <input type="hidden" name="user_type" value="{{ Auth::user()->user_type }}">
          <input type="hidden" name="status" value="0">
          <div class="row">
          <div class="col s12 l5 offset-l5">       
          <button type="submit" name="submit" value="register" class= " waves-effect waves-green btn-flat  #1565c0 blue darken-3
          white-text">Register</button>
          </div>
          </div>        
</form>

</div>

 </div>


 <!--Progress-->
            <div id="prog">
                    <?php $i=1;?>
                    <h5 class="#424242-text center-align"><b> Complaints-Progress -</b></h5>
                    <table class="highlight responsive-table">
                    <thead>

                          <th data-field="id">No.</th>
                          <th data-field="date" align="center">DATE</th>  
                          <th data-field="pc_no">PC No</th> 
                          <th data-field="category">CATEGORY</th>
                          <th data-field="sub_category">SUB CATEGORY</th>
                          <th data-field="status">Status</th>
                          

                    </thead>
                    <tbody>
                          @foreach($users as $data)
                          <tr>
                              <td><?php echo $i++ ; ?></td>

                              <td>
                                  {{ $data->created_at}}
                              </td>
                              <td>
                              {{ $data->pc_no}}
                              </td>
                              <td>
                              {{ $data->category}}
                              </td>
                               <td>
                              {{ $data->sub_category}}
                              </td>
                              <td>
                              @if($data->status==1)
                                  <h6 class="green-text">Accepted</h6>
                              @else
                                  <h6 class="blue-text">In Progress </h6>
                              @endif       
                              </td>
                          </tr>
                          @endforeach
                    </tbody>

                    </table>
                </div>
            



<!--FAQ-->

            <div id="faq"> 
            <style>
              h6{
                font-weight: 500;
                 }
           </style> 
<div class="row">

          <div class="col s12 m8 offset-m2 l8 offset-l2">
          <ul class="collapsible popout highlight" data-collapsible="accordion">
                    <li>
                    <div class="collapsible-header ">
                      <h6 id="top_queries" class="section scrollspy">How do I enable user to write their complain in the cc complaint portal?</h6>
                      </div>
                      <div class="collapsible-body">
                        
                        <p>First you have to select <b>Complaint Registration</b> from the navigation bar. After succesful login, a page will be open where a text area is provided and you can write your problems or queries and submit it.</p></div>
                    </li>

                    <li>
                    <div class="collapsible-header  ">
                        <h6>How can I differentiate the categories of different problems?</h6>
                        </div>
                    <div class="collapsible-body">
                        <p>In the <b>Complaints Registration Form</b> for each category there will be sub-categories provided. So you can easily differentiate them. In case you don't find your problem there is a OTHER option where you can submit your issues.</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header  ">
                        <h6 class="section scrollspy">How do I know the correct keywords for which I should search my problems?</h6>
                        </div>
                        <div class="collapsible-body">
                            <p>Don't worry about this we will provide the<b> dropdown</b> menu in cateogry and sub-category also.So you can simply select those keywords</p>
                            </div>
                    </li>
                    <li>
                        <div class="collapsible-header  ">
                          <h6 id="shipping">How much time it take to solve a complain?</h6> 
                        </div>
                        <div class="collapsible-body">
                        <p>For any problem,there must bee estimated 1-2 week time duration to solve a problem..After sucessful login a table will be provided to you where you check <b>status</b> of your complaints </p>
                        </div>
                    </li>
                    <li>
                    <div class="collapsible-header  ">
                      <h6  class="section scrollspy">what is the proxy address of our college server? </h6>
                    </div>
                    <div class="collapsible-body">
                        <p><b>172.27.16.154</b> and  port:<b>3128</b>.</p></div>
                    </li>
                    
                    <li>
                    <div class="collapsible-header  ">
                      <h6 id="return" class="section scrollspy"> How to do proxy setting in web Browser?</h6>
                      </div>
                    <div class="collapsible-body">
                        <p>you can configure the proxy setting in the web browser in settings -> Network setting -> lan setting/advanced option</p>
                    </div>
                    </li>


                    <li>
                        <div class="collapsible-header  ">
                            <h6 class="section scrollspy">What to do in the condition of system failure or application not responding?</h6>
                            </div>
                          <div class="collapsible-body">
                          <p>You can quit your existing task using task manager or in extreme condition you should restart your system again </p>
                          </div>
                    </li>

                    <li>
                          <div class="collapsible-header  ">
                            <h6>What is the login password?</h6>
                            </div>
                          <div class="collapsible-body">
                              <p>You can login to system with your default user name and password given by the administrator or you can also use "ccuser" as user name and password for login</p>
                          </div>
                    </li>

                    <li>
                      <div class="collapsible-header  ">
                      <h6 id="payment">what to do when the internet connectivity suddenly stops?</h6>
                      </div>
                       <div class="collapsible-body">
                            <p>Just wait for the server to respond.</p>
                      </div>
                    </li>
             </ul>        
            </ul>     
          </div>

    </div>
      <script>
      $(document).ready(function(){
      $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });
      });
      </script>  
      <script>
      $(document).ready(function(){
      $('.scrollspy').scrollSpy();
      });</script>
</div>



<!--Contact-Us-->
            <div id="cont"><div class="center">
                  <div class="first" >
                  <h4><b><u> Contact Us </u></b></h4>
                  </div>
                  <div class="second">
                          <ul style="padding : 20px 0px 20px 30px" >
                          <li>
                          Pandit Dwarka Prasad Mishra <br>
                          Indian Institute of Information Technology,<br>
                          Design & Manufacturing Jabalpur<br>
                          Dumna Airport Road,<br>
                          P.O.: Khamaria,<br>
                          Jabalpur - 482 005,<br>
                          Madhya Pradesh, India<br>

                          Fax: +91-761 2794094<br>

                          </li>
                          </ul>
                  </div>
                  </div>
</div>

      </div>
	<hr>
        
<!--</div>
</div>-->
        @push('js')




          <script>  
                $( document ).ready(function(){
                $(".dropdown-button").dropdown();
                });
          </script>

          <script>
                (function($) {
                $(function() {

                $('.dropdown-button').dropdown({
                inDuration: 300,
                outDuration: 225,
                hover: true, // Activate on hover
                belowOrigin: true, // Displays dropdown below the button
                // Displays dropdown with edge aligned to the left of button
                }
                );

                }); // End Document Ready
                })($);</script>

          <script>
                $(".button-collapse").sideNav();
                </script>
                <script>
                $(document).ready(function() {
                $(".dropdown-button").dropdown();
                });
                $(".button-collapse").sideNav();
                </script>  	 
                <script>
                $(document).ready(function() {
                $('select').material_select();
                });
          </script>
@endpush
@endsection