@extends('cc.layout.header')
@section('faq_content')
       <style>
        h6{
        font-weight: 500;   }
        </style> 
     <div class="row">
    
 <div class="col s12 m8 offset-m2 l8 offset-l2">
     <ul class="collapsible popout highlight" data-collapsible="accordion">
    <li>
      <div class="collapsible-header "><h6 id="top_queries" class="section scrollspy">How do I enable user to write their complain in the cc complaint portal?</h6></div>
      <div class="collapsible-body"><p>First you have to select <b>Complaint Registration</b> from the navigation bar. After succesful login, a page will be open where a text area is provided and you can write your problems or queries and submit it.</p></div>
    </li>
    <li>
      <div class="collapsible-header  "><h6>How can I differentiate the categories of different problems?</h6></div>
      <div class="collapsible-body"><p>In the <b>Complaints Registration Form</b> for each category there will be sub-categories provided. So you can easily differentiate them. In case you don't find your problem there is a OTHER option where you can submit your issues.</p></div>
    </li>
    <li>
      <div class="collapsible-header  "><h6 class="section scrollspy">How do I know the correct keywords for which I should search my problems?</h6></div>
      <div class="collapsible-body"><p>Don't worry about this we will provide the<b> dropdown</b> menu in cateogry and sub-category also.So you can simply select those keywords</p></div>
    </li>
               <li>
      <div class="collapsible-header  "><h6 id="shipping">How much time it take to solve a complain?</h6></div>
      <div class="collapsible-body"><p>For any problem,there must bee estimated 1-2 week time duration to solve a problem..After sucessful login a table will be provided to you where you check <b>status</b> of your complaints </p></div>
    </li>
               <li>
      <div class="collapsible-header  "><h6  class="section scrollspy">what is the proxy address of our college server? </h6></div>
      <div class="collapsible-body"><p><b>172.27.16.154</b> and  port:<b>3128</b>.</p></div>
    </li>
               <li>
      <div class="collapsible-header  "><h6 id="return" class="section scrollspy"> How to do proxy setting in web Browser?</h6></div>
      <div class="collapsible-body"><p>you can configure the proxy setting in the web browser in settings -> Network setting -> lan setting/advanced option</p></div>
    </li>
      <li>
      <div class="collapsible-header  "><h6 class="section scrollspy">What to do in the condition of system failure or application not responding?</h6></div>
      <div class="collapsible-body"><p>You can quit your existing task using task manager or in extreme condition you should restart your system again. </p></div>
    </li>
               <li>
      <div class="collapsible-header  "><h6>What is the login password?</h6></div>
      <div class="collapsible-body"><p>You can login to system with your default user name and password given by the administration or you can also use "ccuser" as user name and password for login.</p></div>
    </li>
                    <li>
      <div class="collapsible-header  "><h6 id="payment">what to do if the internet connectivity suddenly stops?</h6></div>
      <div class="collapsible-body"><p>Just wait for the server to respond.</p></div>
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
 @endsection