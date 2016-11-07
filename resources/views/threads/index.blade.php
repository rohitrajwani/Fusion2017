@extends('layouts.master')

@section('content')


            <div class="container col s12 " style="width:90%">
                <div class="section col s12" style="padding:20px 0px;background-color:rgba(211, 211, 211, 0.47)">
					<div class="col s5"></div>
					<div class="col s3">
							<a href="{{ route('newthread',['fid'=>$faculty->faculty_id]) }}" class="waves-effect btn col">+ New Thread</a>		
					</div>
				
                </div>
                <div class="section col s12">
                    <h4 class="custom col s12 m3">Threads- </h4>
                    <table class="bordered highlight">
                        <thead>
                          <tr>
                              <th>Title</th>
							  <th>Author</th>
                          </tr>
                        </thead>
                        <tbody>
						@foreach($questions as $question)
                          <tr>
                            <td ><a href="{{ route('onethread',['fid'=>$faculty->faculty_id,'tid'=>$question->question_id]) }}">{{$question->question}}</a></td>
							<td>{{ $question->name }}</td>
                          </tr>
                        @endforeach
						@foreach($questionf as $question)
                          <tr>
                            <td ><a href="{{ route('onethread',['fid'=>$faculty->faculty_id,'tid'=>$question->question_id]) }}">{{$question->question}}</a></td>
							<td>{{ $question->name }}</td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider col s12"></div>                
            </div>
        
@stop