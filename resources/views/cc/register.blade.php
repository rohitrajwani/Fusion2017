@extends('cc.layout.header')
@section('complaint_content')
<style>
           
           #reg_form{
               background:#fafafa   ;
               
               
           }
        </style>
	   
 <div class="row" id="reg_complaint">
         <h5 class="center "><b>Complaint-Registration Form</b></h5>
         <br><br>
         <form  id="reg_form" action="#" method="post" enctype="multipart/form-data" >
                            <div class="row">
                                             <div class="file-field col s12 l8 offset-l2 ">
                                                <select name="category" id="category"  required/> 
                                                        <option value="" disabled selected>Choose your category</option>
                                                <option value="network_related">Network Related</option>
                                                 <option value="hardware_related">Hardware Related</option>
                                                 <option value="software_related">Software Related</option>
                                                 <option value="maintance_related">Maintance Related</option>
                                                 </select> <label>Problem Category</label>
                                            </div>
                            </div>  

                            <div class="row">
                                            <div class="file-field col s12 l8 offset-l2 ">
                                                <select name="type" id="type"  required/> 
                                                        <option value="" disabled selected>Choose your complaint-type</option>
                                                     <optgroup label="Network">    
                                                            <option value="network_proxy">Proxy</option>
                                                            <option value="network_lan">LAN</option>
                                                            <option value="network_other">Any others</option>
                                                    <optgroup label="Hardware"> 
                                                             <option value="hardware_missing">Missing Hardware</option>
                                                            <option value="hardware_working">Hardware not working</option>
                                                            <option value="hardware_other">Any others</option>
                                                     <optgroup label="Software">
                                                         <option value="software_outdated">Out of Date(Not compitable with OS)</option>
                                                        <option value="software_update">Update Required</option>
                                                        <option value="software_other" >Any others</option>
                                                        <optgroup label="Maintance">
                                                         <option value="maintance_furniture">Furniture Related</option>
                                                        <option value="maintance_facility">Facility Related(Fan,AC,Light) </option>
                                                        <option value="maintance_other" >Any others</option>
                                                    
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
                                               <i class="material-icons prefix">input
                                                <input style="width: 500px" id="pc_no" type="string" class="validate" name="pc_no" min="1" max="999" required></i>
                                               <!-- <label for="pc_no">Pc Number</label>-->
                                            </div>
                            </div>     

                            <div class="row" style="margin-top: 50px;">
                                    <div class="col s12 l5 offset-l5">       
                                        <button type="submit" name="submit" value="register" class= " waves-effect waves-green btn-flat #03a9f4 light-blue">Register</button>
                                    </div>
                            </div>        
                </form>
 
</div>


  
        
		<!--<script>
			 $(".button-collapse").sideNav();
		</script>
<script>-->
  
@endsection

    


            