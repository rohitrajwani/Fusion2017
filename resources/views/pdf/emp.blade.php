<!DOCTYPE html>
<html>
<head>
	
	
	<style type="text/css">
	table{
		width:90%;
		margin:0 auto;
		border: 1px solid black;
    	border-collapse: collapse;
		font-family: "Calibri", Candara,Seoge,Seoge UI, Optima, Arial, sans-serif;
	}
	body{
		width:100%;
		margin:0 auto;
		border: 1px solid black;
		padding: 20px;
		font-family: "Calibri", Candara,Seoge,Seoge UI, Optima, Arial, sans-serif;
	}
	</style>
</head>
<body>
<caption><h1 style="color:blue">Resume</h1></caption>


		@foreach($customers as $key => $customer)


			<h2>{{$customer->name}}</h2>
			<h5>Address: {{$customer->address}}</h5>
			<h5>Phone: {{$customer->mobile_no}}</h5>
			<h5>Mail: {{$customer->email}}</h5>
		@endforeach
   <?php $counter = 0; ?>
   @if(!$skills->isEmpty())
		<h3>Qualifications</h3>
	 
       <table border="1"> 
          {{-- @foreach ($skill as $key=> $customer)  --}}
              
                   {{-- @if($key == 0) --}}
                         <tr> 
                            <td><b>Sr. no.</b></td>
                            <td><b>Course</b></td>
                            <td><b>Institute</b></td>
                            <td><b>Year</b></td>
                            <td><b>CGPA</b></td>
                           
                         </tr>
                    
                         
                   {{-- @endif --}}
                    @foreach ($skills as $skill)
                    <tr> 
                           <td><?php echo ++$counter; ?></td>
                           <td>{{ $skill->course }}</td> 
                           <td>{{ $skill->institute }}</td> 
                           <td>{{ $skill->year }}</td> 
                           <td>{{ $skill->cgpa }}</td> 
                    </tr> 
                   @endforeach 
             
          {{-- @endforeach --}} 
        </table><br> 
        @endif
          <?php $counter = 0; ?>
         @if(!$exps->isEmpty())
           <h3>Experiences</h3>
	 
       <table border="1"> 
          {{-- @foreach ($exp as $key=> $customer)  --}}
            
                   {{-- @if($key == 0) --}}
                         <tr> 
                            <td><b>Sr. no.</b></td>
                            <td><b>Details</b></td>
                           
                           
                         </tr>
                   {{-- @endif --}}
                   	@foreach ($exps as $exp)
                    <tr> 
                           <td><?php echo ++$counter; ?></td>
                           <td>{{ $exp->details }}</td> 
                          
                    </tr> 
                    @endforeach
             
          {{-- @endforeach --}} 
        </table><br> 

        @endif
		
		  <?php $counter = 0; ?>
         @if(!$ach->isEmpty())
           <h3>Achievements</h3>
	 
       <table border="1"> 
          {{-- @foreach ($exp as $key=> $customer)  --}}
            
                   {{-- @if($key == 0) --}}
                         <tr> 
                            <td><b>Sr. no.</b></td>
                            <td><b>Achievement</b></td>
							  <td><b>Details</b></td>
                           
                           
                         </tr>
                   {{-- @endif --}}
                   	@foreach ($ach as $achs)
                    <tr> 
                           <td><?php echo ++$counter; ?></td>
                           <td>{{ $achs->achievement }}</td> 
						   <td>{{ $achs->a_details }}</td>
                          
                    </tr> 
                    @endforeach
             
          {{-- @endforeach --}} 
        </table><br> 

        @endif
		
		 <?php $counter = 0; ?>
         @if(!$rpro->isEmpty())
           <h3>Research Project</h3>
	 
       <table border="1"> 
          {{-- @foreach ($exp as $key=> $customer)  --}}
            
                   {{-- @if($key == 0) --}}
                         <tr> 
                            <td><b>Sr. no.</b></td>
                            <td><b>Research Project Id</b></td>
							 <td><b>Research Project Title</b></td>
							  <td><b>Funding Agency</b></td>
							    <td><b>Project Details</b></td>
								  <td><b>Status</b></td>
                           
                           
                         </tr>
                   {{-- @endif --}}
                   	@foreach ($rpro as $rpros)
                    <tr> 
                           <td><?php echo ++$counter; ?></td>
                           <td>{{ $rpros->p_id }}</td> 
						   <td>{{ $rpros->p_title }}</td>
						    <td>{{ $rpros->f_agency }}</td>
							 <td>{{ $rpros->p_details }}</td>
							  <td>{{ $rpros->status }}</td>
                          
                    </tr> 
                    @endforeach
             
          {{-- @endforeach --}} 
        </table><br> 

        @endif
		
		 <?php $counter = 0; ?>
         @if(!$rjor->isEmpty())
           <h3>Research Journal</h3>
	 
       <table border="1"> 
          {{-- @foreach ($exp as $key=> $customer)  --}}
            
                   {{-- @if($key == 0) --}}
                         <tr> 
                            <td><b>Sr. no.</b></td>
                            <td><b>Author</b></td>
							 <td><b>Journal Title</b></td>
							  <td><b>Journal Name</b></td>
							    <td><b>Journal Publisher</b></td>
								  <td><b>Publication Date</b></td>
                           
                           
                         </tr>
                   {{-- @endif --}}
                   	@foreach ($rjor as $rjors)
                    <tr> 
                           <td><?php echo ++$counter; ?></td>
                           <td>{{ $rjors->author }}</td> 
						   <td>{{ $rjors->title }}</td>
						    <td>{{ $rjors->journal_name }}</td>
							 <td>{{ $rjors->j_publisher }}</td>
							  <td>{{ $rjors->pub_date }}</td>
                          
                    </tr> 
                    @endforeach
             
          {{-- @endforeach --}} 
        </table><br> 

        @endif
		
		 <?php $counter = 0; ?>
         @if(!$con->isEmpty())
           <h3>Consultancy Project</h3>
	 
       <table border="1"> 
          {{-- @foreach ($exp as $key=> $customer)  --}}
            
                   {{-- @if($key == 0) --}}
                         <tr> 
                            <td><b>Sr. no.</b></td>
                            <td><b>Consultant</b></td>
							 <td><b>Project Title</b></td>
							  <td><b>Client</b></td>
							    <td><b>Financial Outlay</b></td>
								  <td><b>Duration</b></td>
                           
                           
                         </tr>
                   {{-- @endif --}}
                   	@foreach ($con as $cons)
                    <tr> 
                           <td><?php echo ++$counter; ?></td>
                           <td>{{ $cons->consultant }}</td> 
						   <td>{{ $cons->c_title }}</td>
						    <td>{{ $cons->client }}</td>
							 <td>{{ $cons->financial_outlay }}</td>
							  <td>{{ $cons->duration }}</td>
                          
                    </tr> 
                    @endforeach
             
          {{-- @endforeach --}} 
        </table><br> 

        @endif
		
		
		 <?php $counter = 0; ?>
         @if(!$pat->isEmpty())
           <h3>Patents</h3>
	 
       <table border="1"> 
          {{-- @foreach ($exp as $key=> $customer)  --}}
            
                   {{-- @if($key == 0) --}}
                         <tr> 
                            <td><b>Sr. no.</b></td>
                            <td><b>Patent number</b></td>
							 <td><b>Patent Title</b></td>
							  <td><b>Earnings</b></td>
							   
								  <td><b>Patent Status</b></td>
								  <td><b>Year</b></td>
                           
                           
                         </tr>
                   {{-- @endif --}}
                   	@foreach ($pat as $pats)
                    <tr> 
                           <td><?php echo ++$counter; ?></td>
                           <td>{{ $pats->p_no }}</td> 
						   <td>{{ $pats->pt_title }}</td>
						    <td>{{ $pats->earnings }}</td>
							 <td>{{ $pats->pt_status }}</td>
							  <td>{{ $pats->pt_year }}</td>
                          
                    </tr> 
                    @endforeach
             
          {{-- @endforeach --}} 
        </table><br> 

        @endif
		
		 <?php $counter = 0; ?>
         @if(!$pub->isEmpty())
           <h3>Publications</h3>
	 
       <table border="1"> 
          {{-- @foreach ($exp as $key=> $customer)  --}}
            
                   {{-- @if($key == 0) --}}
                         <tr> 
                            <td><b>Sr. no.</b></td>
                            <td><b>Publication Title</b></td>
							 <td><b>Publisher</b></td>
							  <td><b>Co_publisher</b></td>
							    <td><b>Year</b></td>
								
                           
                           
                         </tr>
                   {{-- @endif --}}
                   	@foreach ($pub as $pubs)
                    <tr> 
                           <td><?php echo ++$counter; ?></td>
                           <td>{{ $pubs->pub_title }}</td> 
						   <td>{{ $pubs->pub_publisher }}</td>
						    <td>{{ $pubs->pub_copublisher }}</td>
							 <td>{{ $pubs->pub_year }}</td>
							  
                          
                    </tr> 
                    @endforeach
             
          {{-- @endforeach --}} 
        </table><br> 

        @endif
		
		
		 <?php $counter = 0; ?>
         @if(!$thes->isEmpty())
           <h3>Thesis</h3>
	 
       <table border="1"> 
          {{-- @foreach ($exp as $key=> $customer)  --}}
            
                   {{-- @if($key == 0) --}}
                         <tr> 
                            <td><b>Sr. no.</b></td>
                            <td><b>Thesis Title</b></td>
							 <td><b>Student Name</b></td>
							  <td><b>Supervisor</b></td>
							    <td><b>year</b></td>
								  
                           
                           
                         </tr>
                   {{-- @endif --}}
                   	@foreach ($thes as $thess)
                    <tr> 
                           <td><?php echo ++$counter; ?></td>
                           <td>{{ $thess->t_title }}</td> 
						   <td>{{ $thess->stu1_name }}</td>
						    <td>{{ $thess->t_supervisor }}</td>
							 <td>{{ $thess->t_year }}</td>
							  
                          
                    </tr> 
                    @endforeach
             
          {{-- @endforeach --}} 
        </table><br> 

        @endif
		
		 <?php $counter = 0; ?>
         @if(!$lec->isEmpty())
           <h3>Lectures</h3>
	 
       <table border="1"> 
          {{-- @foreach ($exp as $key=> $customer)  --}}
            
                   {{-- @if($key == 0) --}}
                         <tr> 
                            <td><b>Sr. no.</b></td>
                            <td><b>Title</b></td>
							 <td><b>Place</b></td>
							  <td><b>Year</b></td>
							    
                           
                           
                         </tr>
                   {{-- @endif --}}
                   	@foreach ($lec as $lecs)
                    <tr> 
                           <td><?php echo ++$counter; ?></td>
                          
						   <td>{{ $lecs->l_title }}</td>
						    <td>{{ $lecs->l_place }}</td>
							
							  <td>{{ $lecs->l_year }}</td>
                          
                    </tr> 
                    @endforeach
             
          {{-- @endforeach --}} 
        </table><br> 

        @endif
		
		 <?php $counter = 0; ?>
         @if(!$vis->isEmpty())
           <h3>Visits</h3>
	 
       <table border="1"> 
          {{-- @foreach ($exp as $key=> $customer)  --}}
            
                   {{-- @if($key == 0) --}}
                         <tr> 
                            <td><b>Sr. no.</b></td>
                            <td><b>Country</b></td>
							 <td><b>Purpose</b></td>
							  <td><b>Place</b></td>
							 
								  <td><b>Year</b></td>
                           
                           
                         </tr>
                   {{-- @endif --}}
                   	@foreach ($vis as $viss)
                    <tr> 
                           <td><?php echo ++$counter; ?></td>
                           <td>{{ $viss->fv_country }}</td> 
						   <td>{{ $viss->fv_purpose }}</td>
						    <td>{{ $viss->fv_place }}</td>
							 <td>{{ $viss->fv_year }}</td>
						
                          
                    </tr> 
                    @endforeach
             
          {{-- @endforeach --}} 
        </table><br> 

        @endif
		
		
	
	
</body>
</html>
