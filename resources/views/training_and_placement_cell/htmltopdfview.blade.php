

<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
         <link href="style.css" rel="stylesheet">
          <style>
        .container{
 padding:30px;   
}
 /*td{
    padding-bottom: 15px;
     padding-left: 45px;
    
    text-align: left;
     vertical-align: top;
     font-size:12px;
}*/
 td.head{
    padding-bottom: 15px;
     
     padding-right: 15px;
    text-align: left;
     vertical-align: top;
}
table{
    padding-top:10px;
    padding-bottom:10px;
    width:100%;
}
td.pin{
    padding-bottom: 15px;
     padding-left: 15px;
    
    text-align: left;
     vertical-align: top;
}
h3{
    color:#076392;
    
}
hr{
    color:#bdbdbd;
}
        
        </style>
           
        </head>
        <body>
            <div class="container">
            	<a href="{{ route('htmltopdfview',['download'=>'pdf', 'student_id' => $students[0]]) }}">Download PDF</a>
            	@foreach($student as $stud)
                <div class="intro"  style="text-align:center;">
                    
                    <ul style="list-style: none;font-size:18px;">
                    	<li><h2>{{ $stud->name }}</h2></li>
                    	<li>{{ $stud->branch }}</li>
                        <li>PDPM Indian Institute of Information Technology,<br>Design and Manufacturing,<br>Jabalpur</li>
                        <li>{{ $stud->email }}</li></ul>
                 </div>
                 @endforeach

 
            <hr>
            <table>
            <tr>
            <td style=" width:120px;padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Objective</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 65px;text-align: left; vertical-align: top;font-size:15px;">
            	@foreach($objective as $obj)
            		{{ $obj->objective }}
            	@endforeach
            
            </td>
            </tr>
            
            </table>
            <hr>
            
             <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Areas of Interest</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
            <ul>
        		@foreach($interest as $interest)
                <li>{{ $interest->interest }}</li>
                @endforeach
                </ul>
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Education</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
            @foreach($education as $edu)
            	<ul  style="list-style: none;">
	                <li><strong>{{ $edu->institute }}</strong></li>
	                <li>{{ $edu->year }}</li>
	                <li>{{ $edu->qualification }}</li>
	                <li>{{ $edu->performance }}</li>
                </ul>
            @endforeach
                <br>
                
                <br>
            </td>
            </tr>
            
            </table>
            <hr>
             <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Skills</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
            <ul>
            	@foreach($skills as $skills)
                <li>{{ $skills->skill }}</li>
                @endforeach
                </ul>
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Projects</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
            @foreach($projects as $proj)
            <ul style="list-style:none";>
               <li><strong>{{ $proj->name}}</strong></li>
                   
                   <li>{{ $proj->year }}</li>
                    <li>{{ $proj->description }}</li>
                   <li>{{ $proj->url }}</li>
                   </ul>
                @endforeach
               
               
              
            
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Certifications</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             @foreach( $certif as $cert )
             <ul style="list-style:none;text-align:left;">
               <li><strong>{{ $cert->cert }}</strong> </li>
                  
                   <li>{{ $cert->auth }}</li>
                   <li>{{ $cert->licen }}</li>
                   <li>{{ $cert->url }}</li>
                   <li>{{ $cert->year }}</li>
                   </ul>
               @endforeach
               
               
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Positions of Responsibility</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             @foreach ($respo as $res)
             <ul style="list-style:none;text-align:left;">
               <li><strong>{{ $res->org }}</strong> </li>
                  
                   <li>{{ $res->role }}</li>
                   <li>{{ $res->year }}</li>
                   
                   </ul>
                 @endforeach
               
               
               
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Courses</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             @foreach ( $courses as $cour )
             <ul style="list-style:none;text-align:left;">
               <li><strong>{{ $cour->course }}</strong> </li>
                   <li> {{ $cour->auth }}</li>
                  
                   </ul>
               @endforeach
               
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Internships</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             @foreach ( $intern as $int )
             <ul style="list-style:none;text-align:left;">
               <li><strong>{{ $int->org }}</strong> </li>
                   <li>{{ $int->profile }}</li>
                  <li>{{ $int->location }}</li>
                  <li>{{ $int->start_date }}</li>
                  <li>{{ $int->end_date }}</li>
                  <li>{{ $int->description }}</li>
                   </ul>
               
             @endforeach
            </td>
            </tr>
            
            </table>
            <hr>
             <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Training</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             @foreach ( $train as $train )
             <ul style="list-style:none;text-align:left;">
               <li><strong>{{ $train->training_name }}</strong> </li>
                   <li>{{ $train->org }}</li>
                  <li>{{ $train->location }}</li>
                  <li>{{ $train->start_date }}</li>
                  <li>{{ $train->end_date }}</li>
                  <li>{{ $train->description }}</li>
                   </ul>
               
               @endforeach

            </td>
            </tr>
            
            </table>
            <hr>
             <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Patent</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             @foreach ( $patent as $pat )
             <ul style="list-style:none;text-align:left;">
               <li><strong>{{ $pat->title }}</strong> </li>
                   <li>{{ $pat->patent_office }}</li>
                  <li>{{ $pat->application_no }}</li>
                  <li>{{ $pat->issue_date }}</li>
                  <li>{{ $pat->inventors }}</li>
                  <li>{{ $pat->pat_url }}</li>
                  <li>{{ $pat->description }}</li>
                   </ul>
               
               @endforeach
               
            </td>
            </tr>
            
            </table>
            <hr>
             <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Publication</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             @foreach ( $public as $pub )
             <ul style="list-style:none;text-align:left;">
               <li><strong>{{ $pub->title }}</strong> </li>
                   <li>{{ $pub->public }}</li>
                  <li>{{ $pub->date }}</li>
                  <li>{{ $pub->url }}</li>
                  <li>>{{ $pub->description }}</li>
                   </ul>
               @endforeach
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Acheivements</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             @foreach ( $achieve as $ach)
             <ul style="list-style:none;text-align:left;">
               <li><strong>{{ $ach->event_name }}</strong> </li>
                   <li>{{ $ach->org }}</li>
                  <li>{{ $ach->year }}</li>
                  <li>{{ $ach->result }}</li>
                  
                   </ul>
               @endforeach
            </td>
            </tr>
            
            </table>
           <hr>
            </div>
        </body>
        </html>

