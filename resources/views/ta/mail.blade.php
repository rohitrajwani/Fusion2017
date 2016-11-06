<!--Student Page Send Mail-->
<?php
    use App\Claim;
    use App\TA;
    $id = $_SESSION['id'];
    $students = \DB::table('student')->where('student_id',$id)->first();
    $faculty = \DB::table('faculty')->where('faculty_id',$id)->first();

?>
@extends('ta.layouts.master1')
@section('title','Mail')
@section('main_heading','Send Mail')
@section('links')
<nav class="mynav blue">
  <div class="nav-wrapper">
    <ul>
      <li><a href="./blade">Home</a></li>
    </ul>
  </div>
</nav>
@stop
@section('body')
    
    <form action="{{action('TAMainController@sendmail')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <table class="highlight  bordered">
        <tr>
            <th>To : </th>
            <td>
                <div class="row">
                    <div class="col s12 m12 l12">
                        @if(count($students)==1)
                        <?php
                            $from = $students->email;
                            $course = \DB::table('Ta')->where('student_id',$id)->first()->course_id;//Ta for course
                            $fac_id = \DB::table('Course_Taken_By')->where('course_id',$course)->first()->faculty_id;
                            $details = \DB::table('Faculty')->where('faculty_id',$fac_id)->first();
                        ?>
                            <input name="from" type="hidden" value="{{$from}}"/>
                            <input name="recp[]" type="checkbox" class="filled-in" id="Fac" value="{{$details->email}}"/>
                            <label for="Fac">{{$details->name}} ({{$details->email}})</label>
                            
                        @elseif(count($faculty)==1)
                        <?php
                            $from = $faculty->email;
                            $course = \DB::table('Course_Taken_By')->where('faculty_id',$id)->pluck('course_id');
                            $students = \DB::table('Ta')->whereIn('course_id',$course)->pluck('student_id');
                            $details = \DB::table('student')->whereIn('student_id',$students)->get();
                        ?>
                            <input name="from" type="hidden" value="{{$from}}"/>
                            @foreach($details as $row)
                                <input name="recp[]" type="checkbox" class="filled-in" id="{{$row->student_id}}" value="{{$row->email}}"/>
                                <label for="{{$row->student_id}}">{{$row->name}} ({{$row->email}})</label>
                            @endforeach
                    </div>
                @endif
                </div>
            </td>
        </tr>
        <tr >
            <th style="width:20%">Subject:</th>
            <td>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="input-field">
                        <input type="text" class="validate" name="subject"/>
                    </div>
                </div>
            </div>
            </td>
        </tr>
        <tr >
            <th style="width:20%">Body:</th>
            <td>
            <div class="row">
                <div class="col s12 m12 l12">
                    <textarea name="body"  placeholder="write your message here" class="materialize-textarea" style="border: 1px solid lightgrey"> </textarea>
                </div>
            </div>
            </td>
        </tr>
    </table><br><br>
    <center><input style="width: 50%" type="submit" value="Send Mail" class="waves-effect waves-light btn"  /></center>
    </form>
<br><br><br>
    
        
    <br><br>
@endsection