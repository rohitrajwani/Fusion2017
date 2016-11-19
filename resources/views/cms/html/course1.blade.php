@extends('layout')
@section('title')
	{{ $course->course_id }}
@endsection

@section('cms_content')
			<h4 align="center">{{ $course->course_id }}- {{ $course->course_name }}</h4><br>
			<h4>Registered Students- </h4>
                    <table class="bordered highlight">
                        <thead>
                          <tr>
                              <th>Roll No</th>
                              <th>Name</th>
							  <th>Branch</th>
                              <th>Email</th>
                          </tr>
                        </thead>
                        <tbody>
						@foreach($students as $student)
                          <tr>
                            <td>{{ $student->roll_no }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->branch }}</td>
							<td>{{ $student->email }}</td>
                          </tr>
						@endforeach
                        </tbody>
                    </table>
@endsection
