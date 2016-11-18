@extends('layout')
@section('main_content')
<html>
    <head>
<script type="text/javascript" src="js/validateform.js"></script>
<script type="text/javascript">
    
function validate(){
			
            var c1 = 0;
            var c2 = 0;
            var c3 = 0;
            var c4 = 0;
            var c5 = 0;
            var c6 = 0;
            var c7 = 0;
            var c8 = 0;
            var c9 = 0;
            var c10 = 0;			
            for(i=1; i<=5; i++){				
                if(document.getElementById("rb1"+i).checked == true){
                    c1++;
                }	
			}
			
			if(c1 == 0){
                alert("Please Chooes Value for 1st Option");
                return;
            }
			for(i=1; i<=5; i++){
                if(document.getElementById("rb2"+i).checked == true){
                    c2++;
                }
			}
			if(c2 == 0){
                alert("Please Chooes Value for 2nd Option");
                return;
            }
			for(i=1; i<=5; i++){
                if(document.getElementById("rb3"+i).checked == true){
                    c3++;
                }
			}
			if(c3 == 0){
                alert("Please Chooes Value for 3rd Option");
                return;
            }
			for(i=1; i<=5; i++){
                if(document.getElementById("rb4"+i).checked == true){
                    c4++;
                }
			}
			if(c4 == 0){
                alert("Please Chooes Value for 4th Option");
                return;
            }
			for(i=1; i<=5; i++){
                if(document.getElementById("rb5"+i).checked == true){
                    c5++;
                }
			}
			if(c5 == 0){
                alert("Please Chooes Value for 5th Option");
                return;
            }
			for(i=1; i<=5; i++){
                if(document.getElementById("rb6"+i).checked == true){
                    c6++;
                }
			}
			if(c6 == 0){
                alert("Please Chooes Value for 6th Option");
                return;
            }
			for(i=1; i<=5; i++){
                if(document.getElementById("rb7"+i).checked == true){
                    c7++;
                }
			}
			if(c7 == 0){
                alert("Please Chooes Value for 7th Option");
                return;
            }
			for(i=1; i<=5; i++){
                if(document.getElementById("rb8"+i).checked == true){
                    c8++;
                }
			}
			if(c8 == 0){
                alert("Please Chooes Value for 8th Option");
                return;
            }
			for(i=1; i<=5; i++){
                if(document.getElementById("rb9"+i).checked == true){
                    c9++;
                }
			}
			if(c9 == 0){
                alert("Please Chooes Value for 9th Option");
                return;
            }
			for(i=1; i<=5; i++){
                if(document.getElementById("rb10"+i).checked == true){
                    c10++;
                }
			}
            if(c10 == 0){
                alert("Please Chooes Value for 10th Option");
                return;
            }
			
           document.frmStudent.submit();
        }

</script>
    </head>
<link href="css/iframe.css" rel="stylesheet" type="text/css" />
<div id="calendar">
        	<div class="list_wrapper">
	<h4><u>PROJECT BASED INTERNSHIP FEEDBACK/SUGGESTION FORM</u></h4>
	<p style="text-align:justify;font-size:14px">
		Dear Students: Your independent and well considered response will contribute to the Institute's ongoing efforts for the improvement of PBI.
	</p>
	<p style="text-align:justify;font-size:14px">The feedback may please be rated from 1-5 as per the following points</p>
	<p style="font-style:italic;font-size:12px">(Please note that 1 stands for poor and 5 for excellent)</p>
    <form name="frmStudent" method="post">

        <table class="display">
            <tr>
                <th>Activity</th>
                <th>5</th>
                <th>4</th>
                <th>3</th>
                <th>2</th>
                <th>1</th>
            </tr>
            <tr>
                <td>Facility availability in the laboratory for PBI and their functioning</td>
                <td><p><input name="rb1" type="radio" value="1" id="rb11" />
                 <label for="rb11"></label></p></td>
                <td><input name="rb1" type="radio" value="2" id="rb12" />
                 <label for="rb12"></label></td>
                <td><input name="rb1" type="radio" value="3" id="rb13" />
                 <label for="rb13"></label></td>
                <td><input name="rb1" type="radio" value="4" id="rb14" />
                 <label for="rb14"></label></td>
                <td><input name="rb1" type="radio" value="5" id="rb15" />
                <label for="rb15"></label></td>
            </tr>
         
</tr>
            <tr>
                <td>Facilities provided by the Mentor</td>
                <td><p><input name="rb2" type="radio" value="1" id="rb21" />
                 <label for="rb21"></label></p></td>
                <td><input name="rb2" type="radio" value="2" id="rb22" />
                 <label for="rb12"></label></td>
                <td><input name="rb2" type="radio" value="3" id="rb23" />
                 <label for="rb23"></label></td>
                <td><input name="rb2" type="radio" value="4" id="rb24" />
                 <label for="rb24"></label></td>
                <td><input name="rb2" type="radio" value="5" id="rb25" />
                <label for="rb25"></label></td>
            </tr>
            <tr>
                <td>Knowledge gained by you from the Organization personnel</td>
                <td><p><input name="rb3" type="radio" value="1" id="rb31" />
                 <label for="rb31"></label></p></td>
                <td><input name="rb3" type="radio" value="2" id="rb32" />
                 <label for="rb32"></label></td>
                <td><input name="rb3" type="radio" value="3" id="rb33" />
                 <label for="rb33"></label></td>
                <td><input name="rb3" type="radio" value="4" id="rb34" />
                 <label for="rb34"></label></td>
                <td><input name="rb3" type="radio" value="5" id="rb35" />
                <label for="rb35"></label></td>
            </tr>
            <tr>
                <td>All the work accomplished at proper time and schedule</td>
                <td><p><input name="rb4" type="radio" value="1" id="rb41" />
                 <label for="rb41"></label></p></td>
                <td><input name="rb4" type="radio" value="2" id="rb42" />
                 <label for="rb42"></label></td>
                <td><input name="rb4" type="radio" value="3" id="rb43" />
                 <label for="rb43"></label></td>
                <td><input name="rb4" type="radio" value="4" id="rb44" />
                 <label for="rb44"></label></td>
                <td><input name="rb4" type="radio" value="5" id="rb45" />
                <label for="rb45"></label></td>
            </tr>
            <tr>
                <td>Supervisor(s)/Lab Instructor ensured the smooth work flow</td>
                <td><p><input name="rb5" type="radio" value="1" id="rb51" />
                 <label for="rb51"></label></p></td>
                <td><input name="rb5" type="radio" value="2" id="rb52" />
                 <label for="rb52"></label></td>
                <td><input name="rb5" type="radio" value="3" id="rb53" />
                 <label for="rb53"></label></td>
                <td><input name="rb5" type="radio" value="4" id="rb54" />
                 <label for="rb54"></label></td>
                <td><input name="rb5" type="radio" value="5" id="rb55" />
                <label for="rb55"></label></td>
            </tr>
            <tr>
                <td>Internship Reports corrected weekly and in time</td>
                <td><p><input name="rb6" type="radio" value="1" id="rb61" />
                 <label for="rb61"></label></p></td>
                <td><input name="rb6" type="radio" value="2" id="rb62" />
                 <label for="rb62"></label></td>
                <td><input name="rb6" type="radio" value="3" id="rb63" />
                 <label for="rb63"></label></td>
                <td><input name="rb6" type="radio" value="4" id="rb64" />
                 <label for="rb64"></label></td>
                <td><input name="rb6" type="radio" value="5" id="rb65" />
                <label for="rb65"></label></td>
            </tr>
            <tr>
                <td>Rate the amount of knowledge transferred to the organization</td>
                <td><p><input name="rb7" type="radio" value="1" id="rb71" />
                 <label for="rb71"></label></p></td>
                <td><input name="rb7" type="radio" value="2" id="rb72" />
                 <label for="rb72"></label></td>
                <td><input name="rb7" type="radio" value="3" id="rb73" />
                 <label for="rb73"></label></td>
                <td><input name="rb7" type="radio" value="4" id="rb74" />
                 <label for="rb74"></label></td>
                <td><input name="rb7" type="radio" value="5" id="rb75" />
                <label for="rb75"></label></td>
            </tr>
            <tr>
                <td>Recommendiation for the next batch of PBI in the same organization</td>
                <td><p><input name="rb8" type="radio" value="1" id="rb81" />
                 <label for="rb81"></label></p></td>
                <td><input name="rb8" type="radio" value="2" id="rb82" />
                 <label for="rb82"></label></td>
                <td><input name="rb8" type="radio" value="3" id="rb83" />
                 <label for="rb83"></label></td>
                <td><input name="rb8" type="radio" value="4" id="rb84" />
                 <label for="rb84"></label></td>
                <td><input name="rb8" type="radio" value="5" id="rb85" />
                <label for="rb85"></label></td>
            </tr>
            <tr>
                <td>Information provided by the institute (online/offline)</td>
                <td><p><input name="rb9" type="radio" value="1" id="rb91" />
                 <label for="rb91"></label></p></td>
                <td><input name="rb9" type="radio" value="2" id="rb92" />
                 <label for="rb92"></label></td>
                <td><input name="rb9" type="radio" value="3" id="rb93" />
                 <label for="rb93"></label></td>
                <td><input name="rb9" type="radio" value="4" id="rb94" />
                 <label for="rb94"></label></td>
                <td><input name="rb9" type="radio" value="5" id="rb95" />
                <label for="rb95"></label></td>
            </tr>
            <tr>
                <td>Overall recommendation by the student</td>
                <td><p><input name="rb10" type="radio" value="1" id="rb101" />
                 <label for="rb101"></label></p></td>
                <td><input name="rb10" type="radio" value="2" id="rb102" />
                 <label for="rb102"></label></td>
                <td><input name="rb10" type="radio" value="3" id="rb103" />
                 <label for="rb103"></label></td>
                <td><input name="rb10" type="radio" value="4" id="rb104" />
                 <label for="rb104"></label></td>
                <td><input name="rb10" type="radio" value="5" id="rb105" />
                <label for="rb105"></label></td>
            </tr>
            <tr>
                <td colspan="5">
                Any specific suggestion for the enhancement of PBI activity:
                </td>
            </tr>
            <tr>
                <td colspan="5">
                <textarea name="suggestion" style="height:100px;width:100%"></textarea>
                </td>
            </tr>
            <tr>
                <td>Roll No</td>
                <td colspan="4"><input type="text" name="txtrollno" ></td>
            </tr>
            <tr>
                <td>Name</td>
                <td colspan="4"><input type="password" name="txtpassword" ></td>
            </tr>
            <tr>
                <td>
                   <button type="submit" class="waves-effect btn col" name="Submit" value="Submit" onclick="validate()"/> Upload</button>
                           
                           
                           
                </td>
            </tr>
           
       </table>
    </form>
	</div>
@stop
</html>