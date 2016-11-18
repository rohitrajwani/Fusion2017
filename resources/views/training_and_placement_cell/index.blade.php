<?php

require_once 'dompdf-master/autoload.inc.php';
use Dompdf\Dompdf;
$domdpf=new Dompdf();
/*$dompdf->set_base_path("/www/dompdf-master/");*/

$html='
<!DOCTYPE html>
  <html>
    <head>
        
        <title>Fusion - UI Documentation</title>
        
         <link href="style.css" rel="stylesheet">
          
           
        </head>
        <body>
            <div class="container">
                <div class="intro"  style="text-align:center;">
                    <h2>Nihal Gurjar</h2>
                    <ul style="list-style: none;font-size:18px;"><li>Computer Science and Engineering</li>
                        <li>Indian Institute of Information Technology</li>
                        <li>Email:nihalgurjar007@gmail.com</li></ul>
 
            <hr>
            <table>
            <tr>
            <td style=" width:120px;padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Objective</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 65px;text-align: left; vertical-align: top;font-size:15px;">jsbdh afdjshvf jfvsajdn fajdh fadhjsvf djkvghf dkj afkjvh dfkjavha dknf auhb rlykmtorng fhtvriyu fjhvtgueiw nge
            jsbdh afdjshvf jfvsajdn fajdh fadhjsvf djkvghf dkj afkjvh dfkjavha dknf auhb rlykmtorng fhtvriyu fjhvtgueiw nge
            jsbdh afdjshvf jfvsajdn fajdh fadhjsvf djkvghf dkj afkjvh dfkjavha dknf auhb rlykmtorng fhtvriyu fjhvtgueiw nge
            
            </td>
            </tr>
            
            </table>
            <hr>
            
             <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Area of Interest</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
            <ul>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                </ul>
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Education</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
            <ul  style="list-style: none;">
                <li><strong>PDPM Indian Institute of information Technology design and manufacturing jabalpur</strong></li>
                <li>date start-end </li>
                <li>field of study</li>
                <li>performances</li>
                </ul>
                <br>
                <ul  style="list-style: none;">
                <li><strong>PDPM Indian Institute of information Technology design and manufacturing jabalpur</strong></li>
                <li>date start-end </li>
                <li>field of study</li>
                <li>performances</li>
                </ul>
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
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                <li>hdvhasfv</li>
                </ul>
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Projects</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
            <ul style="list-style:none";>
               <li><strong>Project name</strong></li>
                   
                   <li>year</li>
                    <li>df jdhsg fdhjgsd fgsbfdglsfn gslfbgsf gsfhjbgsf gshfbgsjfgj sfhjbgsljf glsfg</li>
                   <li>url</li>
                   </ul>
               
               <ul style="list-style:none";>
               <li><strong>Project name</strong></li>
                   
                   <li>year</li>
                    <li>df jdhsg fdhjgsd fgsbfdglsfn gslfbgsf gsfhjbgsf gshfbgsjfgj sfhjbgsljf glsfg</li>
                   <li>url</li>
                   </ul>
              
            
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Certifications</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             
             <ul style="list-style:none;text-align:left;">
               <li><strong>Certification name</strong> </li>
                  
                   <li> organisation</li>
                   <li> license no</li>
                   <li>url</li>
                   <li>date</li>
                   </ul>
               
               
               <ul style="list-style:none;text-align:left;">
               <li><strong>Certification name</strong> </li>
                  
                   <li> organisation</li>
                   <li> license no</li>
                   <li>url</li>
                   <li>date</li>
                   </ul>
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Positions of Responsibility</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             
             <ul style="list-style:none;text-align:left;">
               <li><strong>Role</strong> </li>
                  
                   <li> organisation</li>
                   <li> year</li>
                   
                   </ul>
               
               
               <ul style="list-style:none;text-align:left;">
               <li><strong>Role</strong> </li>
                  
                   <li> organisation</li>
                   <li> year</li>
                   
                   </ul>
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Courses</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             
             <ul style="list-style:none;text-align:left;">
               <li><strong>Course name</strong> </li>
                   <li> Course authority</li>
                  
                   </ul>
               
               
               <ul style="list-style:none;text-align:left;">
               <li><strong>Course name</strong> </li>
                  <li> Course authority</li>
                                    
                   </ul>
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Internships</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             
             <ul style="list-style:none;text-align:left;">
               <li><strong>Organisation</strong> </li>
                   <li> Profile</li>
                  <li> location</li>
                  <li> start-end date</li>
                  <li>Short description</li>
                   </ul>
               
               
               <ul style="list-style:none;text-align:left;">
               <li><strong>Organisation</strong> </li>
                   <li> Profile</li>
                  <li> location</li>
                  <li> start-end date</li>
                  <li>Short description</li>
                   </ul>
            </td>
            </tr>
            
            </table>
            <hr>
             <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Training</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             
             <ul style="list-style:none;text-align:left;">
               <li><strong>Training name</strong> </li>
                   <li> organisation</li>
                  <li> location</li>
                  <li> start-end date</li>
                  <li>Short description</li>
                   </ul>
               
               
               <ul style="list-style:none;text-align:left;">
               <li><strong>Training name</strong> </li>
                   <li> organisation</li>
                  <li> location</li>
                  <li> start-end date</li>
                  <li>Short description</li>
                   </ul>
            </td>
            </tr>
            
            </table>
            <hr>
             <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Patent</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             
             <ul style="list-style:none;text-align:left;">
               <li><strong>Patent Title</strong> </li>
                   <li> Patent no , Patent office</li>
                  <li> issued status and date</li>
                  <li> url</li>
                  <li>Short description</li>
                   </ul>
               
               
               
            </td>
            </tr>
            
            </table>
            <hr>
             <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Publication</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             
             <ul style="list-style:none;text-align:left;">
               <li><strong>Title</strong> </li>
                   <li> Publisher</li>
                  <li> Publication date</li>
                  <li>url</li>
                  <li>Short description</li>
                   </ul>
               
               <ul style="list-style:none;text-align:left;">
               <li><strong>Title</strong> </li>
                   <li> Publisher</li>
                  <li> Publication date</li>
                  <li>url</li>
                  <li>Short description</li>
                   </ul>
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Acheivements</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             
             <ul style="list-style:none;text-align:left;">
               <li><strong>Event  name</strong> </li>
                   <li> Organisation</li>
                  <li> year</li>
                  <li>result</li>
                  
                   </ul>
               
               <ul style="list-style:none;text-align:left;">
               <li><strong>Event  name</strong> </li>
                   <li> Organisation</li>
                  <li> year</li>
                  <li>result</li>
                  
                   </ul>
            </td>
            </tr>
            
            </table>
            <hr>
            <table>
            <tr>
            <td style="width:120px; padding-bottom: 15px;padding-right: 15px;font-size:15px;text-align: left;vertical-align: top;"><h3>Personal Details</h3></td>
            <td style="width:400px;padding-bottom: 15px;padding-left: 45px;text-align: left; vertical-align: top;font-size:15px;">
             
             <ul style="list-style:none;text-align:left;">
               <li><strong>Fathers name</strong> : dfbdhf</li>
                  <li><strong>DOB</strong> : dfbdhf</li>
                  <li><strong>Language Proficiency</strong> : dfbdhf</li>
                  <li><strong>Hobbies</strong> : dfbdhf</li>
                  <li><strong>Permanent address</strong> : dfbdhf</li>
                  <li><strong>Contact No</strong> : dfbdhf</li>
                  
                   </ul>
               
               
            </td>
            </tr>
            
            </table>
            <hr>
            
            <h3 style="text-align:right">NAME</h3>
            
            </div>
        </body>
        </html>';
$domdpf->loadHtml($html);
$domdpf->setPaper('A4','portrait');
$domdpf->render();

$domdpf->stream('codexworld',array('Attachment'=>0));
?>

