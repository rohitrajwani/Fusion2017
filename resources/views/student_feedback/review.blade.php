@extends('layout')
@section('feedback_content')
                    <nav>
                        <div class="nav-wrapper">
                                <!-- <a href="#" class="brand-logo">Logo</a> -->
                              <ul id="nav-mobile" class="right hide-on-med-and-down">
                                 <!--  <li><a href="sass.html">Sass</a></li> -->
                                  <!-- <li><a href="badges.html">Components</a></li> -->
                                <li><a href="/student_feedback/admin">Home</a></li>
                             </ul>
                        </div>
                   </nav>   
            <br><br>

                <div class="section col s12"><h4>Feedback:</h4></div><br>

                <div class="section col s12">
                    <table class="bordered highlight">
                        <thead>
                          <tr>
                              <th>Question Id</th>
                              <th>poor</th>
                              <th>average</th>
                              <th>good</th>
                              <th>excellent</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $row)
                         <tr>
                            <td>{{$row->question_id}}</td>
                            <td>
                              {{ count(\DB::table('semester_feedback')->where('faculty_id',$fid)->where('course_id',$cid)->where('question_id',$row->question_id)->where('excellent','1')->where('average',$type)->get()) }}
                            </td>
                            <td>
                              {{count(\DB::table('semester_feedback')->where('faculty_id',$fid)->where('course_id',$cid)->where('question_id',$row->question_id)->where('excellent','2')->where('average',$type)->get())}}
                            </td>
                            <td>
                              {{count(\DB::table('semester_feedback')->where('faculty_id',$fid)->where('course_id',$cid)->where('question_id',$row->question_id)->where('excellent','3')->where('average',$type)->get())}}
                            </td>
                            <td>
                              {{count(\DB::table('semester_feedback')->where('faculty_id',$fid)->where('course_id',$cid)->where('question_id',$row->question_id)->where('excellent','4')->where('average',$type)->get())}}
                            </td>
                          </tr>
                          @endforeach
                        
                        </tbody>
                    </table>

                     <br><br>

                     </div>



                     <div class="section col s4"><h4>Suggestions:</h4></div><br>

                    <div class="section col s12"></div>
                <div class="section col s4">
                    <table class="bordered highlight">
                        <thead>
                          <tr>
                              <th>Suggestions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($suggestion as $row)
                         <tr>
                            <td>{{$row->suggestion}}</td>
                          </tr>
                          @endforeach
                        
                        </tbody>
                    </table>
 
        </div>
				@stop