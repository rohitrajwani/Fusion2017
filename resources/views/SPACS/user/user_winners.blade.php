@extends('layout')
@section('SPACS_content')
			<div class="main-container row">
				<h4 class="col s12 m8 offset-m2">Winners</h4></br>
				</br></br>
				<div class="container" style="width:90%">
					<div class="section col s12">
					<br><br>
						
				<h5 class="col s12 m2">MEDALS/PRIZES</h5>
				</br></br>
				<div class="container" style="width:100%">
					<div class="section col s12"><br><br>
						<h5 class="col s12">Medal name</h5>
						<form method="GET" action="user_winner_result">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" >
		<div class="input-field col s4">
    <select name="title">
        <option value="" disabled selected><center>Choose your option</center></option>
        <option value="Chairman Gold medal">Chairman Gold medal</option>
        <option value="Director Gold Medal">Director Gold Medal</option>
        <option value="D&M Proficiency Gold Medal">D&M Proficiency Gold Medal </option>
        <option value="Notional Prizes and Certificate of Merit">Notional Prizes and Certificate of Merit</option>
        <option value="Academic Proficiency Prizes">Academic Proficiency Prizes</option>
        <option value="IIITDMJ Proficiency Prizes">IIITDMJ Proficiency Prizes</option>
        <option value="Directors Silver Medal">Directors Silver Medal</option>

    </select>
   
</div>

						<h6>Year:</h6>
						<div class="input-field col s4">
      <input placeholder="Year" name="year" type="text" class="validate">
      
</div>				<button type="submit"  class="waves-effect btn">GO</button>
		</form><br><br>
					</div>
				</div>
			</div>
			
@stop		