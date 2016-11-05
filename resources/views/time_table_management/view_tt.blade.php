@extends('layout')

@section('title')
	View Time Table
@stop

@section('content')
	
	<nav class="mynav">
	  <div class="nav-wrapper">
	    <ul>
		  <li><a href="/time_table_management">Back to Dashboard</a></li>
		  @if(Auth::user()->user_type=='student')
			  <li><a href="/time_table_management/extra_classes">Extra Classes</a></li>
		  @endif
		  @if(Auth::user()->user_type=='faculty')
			<li><a href="/time_table_management/scheduleanextraclass">Schedule an Extra Class</a></li>
			<li><a href="/time_table_management/viewmyrequests">View My Requests</a></li>
		  @endif

		  @if(Auth::user()->hasRole('admin'))
			<li><a href="/time_table_management/modify_tt">Modify Time Table</a></li>
			<li><a href="/time_table_management/creatett">Create Time Table</a></li>
			<li><a href="/time_table_management/viewallrequests">Handle Requests</a></li>
		  @endif
	    </ul>
	  </div>
	</nav>
	
	<center>
		<div class="input-field col s2">
                    <select id="prog">
			<option value="0" disabled selected>Choose Programme</option>
                        <option value="1">B.Tech.</option>
                        <option value="2">B.Des.</option>
                        <option value="3">M.Tech.</option>
                        <option value="4">M.Des.</option>
			<option value="5">Ph.D.</option>
                    </select>
                    <label>Programme</label>
                </div>

		<div class="input-field col s2">
			<select id="sem">
				<option value="0" disabled selected>Choose Semester</option>
				@for($i=1; $i<=8; $i++)
					<option value=<?php echo $i; ?>><?php echo $i ?></option>
				@endfor
			</select>
		    <label>Semester</label>
		</div>

		<div class="input-field col s2">
                    <select id="dep">
                        <option value="0" disabled selected>Choose Department</option>
                        <option value="1">CSE</option>
                        <option value="2">ECE</option>
                        <option value="3">ME</option>
			<option value="4">Design</option>
                    </select>
                    <label>Department</label>
                </div>

		<div class="input-field col s2">
			<input id="faculty_code" type="text" placeholder=" Your Code (eg. MKB)" class="validate">
                	<label for="faculty_code">Faculty Code</label>
                </div>

		<div class="input-field col s2" id="change_tt">
			<input type="submit" class="waves-effect btn" value="View/Change">
		</div>

		<div class="input-field col s2" id="generate_pdf">
			<input type="submit" class="waves-effect btn" value="Generate PDF">
		</div>

		<div id="tt_area">
			<table class="responsive-table centered bordered highlight" id="tt"></table>
		</div>

	</center>

	<script>
		var tslots = ['Day/Time', 'Room No.', '09:00-09:55', '10:00-10:55', '11:00-11:55', '12:00-12:55', 'BREAK', '2:30-3:25', '3:30-4:25', '4:30-5:25'];
		var dslots = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];

		$(document).on("click", "#generate_pdf", function() {
			var doc = new jsPDF('p', 'pt');

			var elem = document.getElementById("tt");
			var res = doc.autoTableHtmlToJson(elem);
			
			for(var i=0,l=1,m=2 ; i<5; i++, l+=3, m+=3){
				for(var j=9; j>=1; j--){
					res.data[l][j] = res.data[l][j-1];
					res.data[m][j] = res.data[m][j-1];
				}

				res.data[l][0] = "";
                                res.data[m][0] = "";
			}
			
			doc.autoTable(res.columns, res.data, {theme:'grid'});
			var fcode = $('#faculty_code').val();
			var prog = $('#prog option:selected').text(), sem = $('#sem option:selected').text();

			var pre = '';

			if(!fcode){
				pre += prog + "_" + sem;
			}

			else{
				pre += fcode;
			}
			
			doc.save(pre+"_tt.pdf");
		});

		$(document).on("click", "#change_tt", function(){
			var fcode = $('#faculty_code').val();
			var data = '';
			if(!fcode){
				var prog = $('#prog option:selected').text();
				var sem = $('#sem option:selected').text();
				var dep = $('#dep option:selected').text();

				if(prog!=="Choose Programme" || sem!=="Choose Semester"){
					if(sem==="Choose Semester"){
						alert("Please Choose Semester");
					}
					else if(prog==="Choose Programme"){
						alert("Please Choose Programme first");
					}
					else{
						if(dep!=="Choose Department")
							data += "prog="+prog+"&sem="+sem+"&dep="+dep;
						else if(parseInt(sem) < 4)
							data += "prog="+prog+"&sem="+sem;
						else
							alert('Semester should be less than 4 when no department chosen');
					}
				}
			}
			else{
				data += "fcode="+fcode;
			}
			
			$.ajax({
				url: "/time_table_management/change_tt",
				data: data,
				type: "get",
				success: function(data) {
					var d = $.parseJSON(data);
					var c=1;
					$('#tt').html('<thead>');	
					for(var i=0; i<tslots.length; i++)
						$('thead').html($('thead').html() + '<th>' + tslots[i] + '</th>');
					
					for(var i=0, k=0, l=1, m=2; i<dslots.length; i++, k+=3, l+=3, m+=3){
						$('#tt').html($('#tt').html() + "<tr id='"+k+"'>" + "<tr id='"+l+"'>"+ "<tr id='"+m+"'>");
						$('#'+k).html('<td rowspan="3">'+ dslots[i] +'</td>');
						c = 1;
						for (var j=1, b=1, a=1; j<tslots.length || a<tslots.length || b<tslots.length; j++, a++, b++){
							if(j!=6 && j<tslots.length){
								if(d[k][j-c].length < 6){
									$('#'+k).html($('#'+k).html() + "<td>" + d[k][j-c] + "</td>");
								}
								else{
									var fd = d[k][j-c].slice(0,6);
									var n_hrs = d[k][j-c].slice(6);

									$('#'+k).html($('#'+k).html() + "<td colspan='"+n_hrs+"'>" + fd + "</td>");
									j+=n_hrs-1;
								}
							}
							if(b!=6 && b<tslots.length){
								if(d[l][b-c].length < 6){
									$('#'+l).html($('#'+l).html() + "<td>"+ d[l][b-c] +"</td>");
								}
								else{
									var fd = d[l][b-c].slice(0,6);
									var n_hrs = d[l][b-c].slice(6);

									$('#'+l).html($('#'+l).html() + "<td colspan='"+n_hrs+"'>" + fd + "</td>")
									b+=n_hrs-1;
								}
							}
							if (a!=6 && a<tslots.length){
								if(d[m][a-c].length < 6){
									$('#'+m).html($('#'+m).html() + "<td>"+ d[m][a-c] +"</td>");
								}
								else {
									var fd = d[m][a-c].slice(0,6);
									var n_hrs = d[m][a-c].slice(6);

									$('#'+m).html($('#'+m).html() + "<td colspan='"+n_hrs+"'>" + fd + "</td>");
									a+=n_hrs-1;
								}
							}
							if(j==6){
								$('#'+k).html($('#'+k).html() + "<td> </td>");
								c=2;
							}
							if(b==6){
								$('#'+l).html($('#'+l).html() + "<td> </td>");	
								c=2;
							}
							if(a==6){
								$('#'+m).html($('#'+m).html() + "<td> </td>");
								c=2;
							}
						}
					}
				}
			});
		});
	</script>
@stop
