@extends('layout')
@section('cms_content')

    
            
        <div class="container col s12 " style="width:90%">
                <div class="section col s12">
				
                    <h4 class="col s12 m6">New Thread</h4>
                </div>
                <div class="section col s12">
				<form action="{{ route('addthreadstudent',['sid'=>$student->student_id]) }}" method="post" class="col s12">
				    <h5 class="custom col s12">Question -</h5>
                    <div class="input-field col s6">
                          <textarea id="question" class="materialize-textarea" name="question"></textarea> 
                          <label for="question">Description</label>
                    </div>
                <div class="section col s12">
                    <input class="waves-effect btn" type="submit" name="submit" id="submit" value="Add"></input>
					<input type = "hidden" name = "_token" value = "{{Session::token()}}">
					<a class="waves-effect btn" href="{{route('forumstudent',['sid'=>$student->student_id])}}">CANCEL</a>
                </div>
				
				</form>
					<div class="divider col s12"></div>                
				</div>
        </div>
	
        
@endsection
