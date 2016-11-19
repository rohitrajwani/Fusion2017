@extends('layout')

@section('placement_content')

	<div class="main-container row">
            


            {!! Form::open(array('route' => 'studentList_store', 'class' => 'form')) !!}
            
            <div class="col s12 m4 offset-m4">
            <h4>Student List</h4>
            </div>

            
             <a href="/training_and_placement_cell/tpo/page">
                <div class="col m1 offset-m3 link" style="background-color:#076392;">
                    <center><h5 style="color:white;"><i class="fa fa-home"></i></h5></center>
                </div>
            </a>
            

            <div class="container col s10 offset-s1">
                <div class="input-field col s3">
                    <!-- <select >
                        <option value="" disabled selected>Batch</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                    </select> -->
                    {{ Form::select('batch', [
                       'Year' => 'Year',
                       '2014' => '2014',
                       '2013' => '2013',
                       '2012' => '2012',
                       '2015' => '2015'], 'Year')
                       }}
                </div>
                <!-- <div class="input-field col s3">
                    <select>
                        <option value="" disabled selected>Degree</option>
                        <option value="1">BTech</option>
                        <option value="2">MTech</option>
                        <option value="3">BDes</option>
                        <option value="1">MDes</option>
                        <option value="2">Phd</option>
                        
                    </select>
                </div> -->
                <div class="input-field col s3">
                    {{ Form::select('branch', [
                       'Branch' => 'Branch',
                       'Computer Science and Engineering' => 'Computer Science and Engineering',
                       'Mechanical Engineering' => 'Mechanical Engineering',
                       'Electronics and Communication Engineering' => 'Electronics and Communication Engineering'], 'Branch')
                    }}
                </div>
                <div class="input-field col s3">
                {!! Form::submit('Filter', 
                    array('class'=>'waves-effect btn')) !!}
                </div>
                
                
            </div>
            
            {!! Form::close() !!}
            <div class="container" style="width:90%">
                
                
                
                <table class="bordered highlight">
    <thead>
      <tr>
          <th>Roll no</th>
          <th>Name</th>
          <th>Branch</th>
          <th>Batch</th>
         <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach( $students as $stud)
      <tr>
        <td>{{ $stud->roll_no }}</td>
          <td><a href="/training_and_placement_cell/tpo/profile/student/{{ $stud->student_id }}">{{ $stud->name }}</a></td>
        <td>{{ $stud->branch }}</td>
          <td>{{ $stud->batch }}</td>
        <td><a href="/training_and_placement_cell/htmltopdfview/student/{{ $stud->student_id }}">View as PDF</a></td>
          
      </tr>
      @endforeach
         
      
        
        
    </tbody>
</table>
                
            </div>
        </div>

@stop