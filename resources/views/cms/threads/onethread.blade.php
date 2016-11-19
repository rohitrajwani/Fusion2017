@extends('layout')

@section('cms_content')

    
            
        <div class="container col s12 " style="width:90%">
         
				<div class="section col s12">
                    <h6 class="col s12 m6">{{$question->question}}</h6>
					@if($question->user_id == $faculty->faculty_id)
					<h6 class="col s1 m6"><a href="{{ route('editthread',['fid'=>$faculty->faculty_id, 'tid'=>$question->question_id]) }}">Edit</a>
					<h6 class="col s1 m6"><a href="{{ route('deletethread',['fid'=>$faculty->faculty_id, 'tid'=>$question->question_id]) }}">Delete</a>
					@endif
                </div>
				<div class="divider col s12"></div>
				<form action="{{ route('addanswer1',['fid'=>$faculty->faculty_id,'tid'=>$question->question_id]) }}" method="post" class="col s12">
				<div class="input-field col s6">
                          <textarea id="answer" class="materialize-textarea" name="answer"></textarea> 
                          <label for="answer">Answer</label>
                </div>
				<div class="section col s12">
                    <input class="waves-effect btn" type="submit" name="submit" id="submit" value="ans"></input>
					<input type = "hidden" name = "_token" value ="{{Session::token()}}"></input>
					<a class="waves-effect btn col" href="{{route('forum',['fid'=>$faculty->faculty_id])}}">CANCEL</a>
                </div>
				</form>
				<div class="divider col s12"></div>
				<h4>Answers:</h4>
				@foreach($answers as $ans)
				<div class="section col s12" style="border:2px 1px; border-style:solid; border-color:rgba(203,200,200,.19); padding: 1em;">
                    <h6 class="col s12 m6">{{$ans->answer}}</h6>
                    <h6 class="col s12">user id:{{$ans->user_id}}</h6>
                </div>
				@endforeach
				
		</div>
    
@endsection
