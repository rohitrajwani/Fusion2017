@extends('layout')@section('assignments_content')  <nav class="mynav">	  <div class="nav-wrapper">			<ul>			  <li><a href="/Assignments_and_Course_Documentations/faculty">Courses</a></li>			</ul>	  </div>	</nav>                      <table class="bordered highlight">    <thead>      <tr>          <th>Assignment/Document ID</th>          <th>Type</th>          <th>Date/Time</th>          <th>Topic</th>  	  <th> </th>      </tr>    </thead>        <tbody>      @foreach( $assign as $assign1 )      <tr>        <td>A{{ $assign1->assign_id }}</td>        <td>Assignment</td>        <td>{{ $assign1->upload_time }}</td>        <td><a href="/Assignments_and_Course_Documentations/assignments/{{ $assign1->url_assign }}" download>{{ $assign1->url_assign }}</a></td>        <td id="A{{ $assign1->assign_id }}"><input type="button" class="del waves-effect btn" value="Delete"></td>  	  </tr>      @endforeach            @foreach( $doc as $doc1 )      <tr>        <td>D{{ $doc1->doc_id }}</td>        <td>Document</td>        <td>{{ $doc1->upload_time }}</td>        <td><a href="/Assignments_and_Course_Documentations/documents/$doc1->doc_url" download>{{ $doc1->doc_url }}</a></td>        <td id="D{{ $doc1->doc_id }}"><input type="button" class="del waves-effect btn" value="Delete"></td>      </tr>      @endforeach      </tbody>  </table>  <form action="/Assignments_and_Course_Documentations/document" method='post' class="col s12" enctype="multipart/form-data">    {{ csrf_field() }}    @foreach( $courses as $course )      <input type='hidden' name='dummy' value= {{ $course->course_id }} >    @endforeach    <div class="file-field input-field">      <div class="btn">        <span>Document</span>        <input type="file" name='doc_file'>      </div>      <div class="file-path-wrapper">        <input class="file-path validate valid" name = 'document' type="text" required>      </div>    </div>    <input type='submit' value='Submit' class="waves-effect btn-flat" >    <input type="hidden" name="_token" value="{{ csrf_token() }}">  </form>      <form action="/Assignments_and_Course_Documentations/assignment" method='post' class="col s12" enctype="multipart/form-data">    {{ csrf_field() }}    @foreach( $courses as $course )      <input type='hidden' name='dummy' value= {{ $course->course_id }} >    @endforeach    <div class="file-field input-field">      <div class="btn">        <span>Assignment</span>        <input type="file" name='assign_file'>      </div>      <div class="file-path-wrapper">        <input class="file-path validate" name="assignment" type="text" required>               </div>           <div class="input-field col s2 ">        <input placeholder="Deadline:YYYY-MM-DD" id="deadline" type="date" class="validate" name='deadline'>      </div>    </div>    <input type='submit' value='Submit' class="waves-effect btn-flat" >    <input type="hidden" name="_token" value="{{ csrf_token() }}">  </form>    <script>    $(document).on('click','.del', function(){      var data = $(this).parent().attr('id');      var id = data.slice(1);      var type = data.slice(0,1);            var d = "id="+id+"&type="+type;      var if_del = confirm('Are you sure you want to delete?');      if(if_del)        $.ajax({          url : window.location + "/delete",          type: "get",          data: d,          success: function(data){            location.reload();          }        });    });  </script>@stop