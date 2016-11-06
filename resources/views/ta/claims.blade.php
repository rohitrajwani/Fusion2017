<!--Student Page Show Claims-->
<?php 
    use App\Claim;
    use App\TA;
    $id=$_SESSION['id'];;//$id = 'T1';//$_SESSION["id"]; assumed session variable id
    $claims = App\Claim::where('student_id',$id)->orderBy('month','desc')->get();//retrieving claims of the TA
    $i=0;
?>
@extends('ta.layouts.master1')
@section('title','TA Claims')
@section('main_heading','Previous Claims')
<?php
    if(isset($_SESSION['student_ta']))
    {

        
    }
    else
    {
        echo "<script>
            alert('NOT ALLOWED TO VIEW THIS PAGE');
        </script>";
        header("Refresh:0 url=wele",true,303);
        exit();
    }
?>

@section('links')
<nav class="mynav blue">
  <div class="nav-wrapper">
    <ul>
      <li><a href="./blade">Home</a></li>
      <li><a href="./attendance_student">Attendance</a></li>
      <li><a href="./taapplication">TA-Form</a></li>
      <li class="active"><a href="./claims" >Assistanceship</a></li>
      <li><a href="./mail">Mail</a></li>
    </ul>
  </div>
</nav>
@stop
@section('body')
    
    @if(count($claims)==0)
        <br><br><center><h5>No Applied Claims!</h5></center><!--If there are no previous claims-->
    @else
    <table class="centered  highlight  bordered"><!--Show Claims Table-->
        <thead>
          <tr>
            <th style="width:5%;"></th>
            <th style="width:15%;">Course</th>
            <th style="width:15%;">Month</th>
            <th style="width:15%;">Stipend</th>
            <th style="width:15%;">Status</th>
            <th>View TA comment</th>
          </tr>
        </thead>

        <tbody>
        
            @foreach($claims as $row)
			     <?php ++$i; ?>
				<tr>
                    <th style="width:5%;">{{$i}}</th>
                    <td style="width:15%;">{{TA::find($row->student_id)->course_id}}</td>
                    <?php 
                        $monthNum  = $row->month;
                        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                        $monthName = $dateObj->format('F');
                    ?>
                    <td style="width:15%;">{{$monthName}}</td>
                    <td>{{$row->stipend}}</td>
                    
                    @if($row->status==0 || $row->status==1)
                        <td class='orange-text' style="width:15%;">
                        Pending
                    @else
                        <td class='green-text' style="width:15%;">
                        Approved
                    @endif
                    </td>

                    <td><button
                            
                            @if($row->status<=0)
                                class="waves-effect btn grey" disabled
                            @else
                                 class="waves-effect btn green" id="{{$row->month}}claim"
                            @endif
                            >View Supervisor Comment</button></td><!--Show TA Supervisor Comment Button : Only activated when it has been forwarded by the TA supervisor -->
                </tr>

                <tr id="panel2{{$row->month}}" style="display: none"><!--Hidden panel for showing the Supervisor's comment-->
                    <td style="width:5%;"></td>
                    <td style="width:15%;color: blue;">
                        Granted Stipend : {{$row->stipend}}/- 
                    </td>
                    <td style="width:15%;"></td>

                    <td  colspan=4>
                    @if($row->ta_sup_comment != "")
                        Supervisor Comment : <p style="color:blue;">{{$row->ta_sup_comment}}</p>
                    @else
                        No Comments from Supervisor.
                    @endif
                    </td>

                    </div>
                </tr>
				
			@endforeach          
        
        </tbody>
      </table>
      @endif
<br><br><br>
    <!--Link to apply for TA Assistantship claim-->
        <center><a class="waves-effect waves-light btn" style="width:50%" href="./claimform" >Apply For Assistanceship Claim</a></center>
    <br><br>
@endsection

@section('footer')
    <script>
    $(document).ready(function() {
            $('select').material_select();
        
        
        @foreach ($claims as $row)

            $("#{{$row->month}}claim").click(function(){
                $("#panel2{{$row->month}}").toggle();
            }); 

        @endforeach
        
        });
        </script>
@endsection