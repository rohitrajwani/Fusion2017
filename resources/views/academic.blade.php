<?php
//Academic Person Page. No id is predefined

$leaverequest = \DB::table('student_leave_application')->get();
//$name = \DB::table('student')->where('student_id',$id)->get();

$bonafide = \DB::table('bonafide')->get();
$branch_change = \DB::table('branch_change')->get();
$flag1=0;$flag2=0;$flag3=0;
$f1=0;$f2=0;$f3=0;$f4=0;
?>


@extends('layout')


@section('content')
         




     <div class='container'>
                <div class='section'>
<div>
            <div class="button-container  col s12 m6 offset-s2">

<a href="#modal1" class="waves-effect waves-light modal-trigger button col s8 offset-l4 offset-m4">
   <img src="./css/images/w.jpg" class="col s6 offset-s3">

<div class="divider col s12"></div>
<h5 class="col s12">Approve Leave Requests</h5>
</a>

                
                
            <div id="modal1" class="modal">
                            <div class="modal-content">
                            <h4>Leave Requests</h4>
                            <input type="hidden" value="$id"/>
                            <table class="bordered highlight">
                        <form  action="acadaff/leaverequest" method="post">
                        
                        <table class="bordered highlight">
                            <thead>
                            <tr>
                            <th>Name</th>
                            <th>Student_ID</th>
                            <th>Purpose</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaverequest as $user)
                               <?php $flag1=1;
                                ?>
                                 @if($user->status==1 || $user->status==-1)
                                <?php
                                $f1=1;
                                ?>
                                <h5 align="center"><u><i>No Leave Requests.</i></u></h5>
                                <?php break;?>
                                @else
                                <tr>
                                <td>{{\DB::table('student')->where('student_id',$user->student_id)->first()->name}}</td>
                                <td>{{$user->student_id}}</td>
                                <td>LEAVE</td>
                                <td>{{$user->from_date}}</td>
                                <td>{{$user->till_date}}</td>
                                <td colspan=2>
                        <input name="leave{{$user->student_id}}{{$user->leave_no}}" type="radio" id="{{$user->student_id}}{{$user->leave_no}}A" checked="true" value="1"/>
                        <label for="{{$user->student_id}}{{$user->leave_no}}A">Accept</label>
                        <input name="leave{{$user->student_id}}{{$user->leave_no}}" type="radio" id="{{$user->student_id}}{{$user->leave_no}}R" value="0"/>	
                        <label for="{{$user->student_id}}{{$user->leave_no}}R">Reject</label>
                        </td>
                                </tr>
                                @endif
                                @endforeach
                                
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </tbody>
                            </table><tr>

                                    @if($flag1==0)
                <h5 align='center'>No leave requests.</h5>
                            @endif
                                </tr>
                            <div class="modal-footer">
                                @if($flag1==1 && $f1==0)
                            <input type="submit" class="btn">
                                @endif
                            </div>
                                </form>
                            </table>
                            


                            </div>
        </div>
</div>
<div class="button-container col s12 m6 offset-s2">
<a href="#modal2" class=" waves-effect waves-light modal-trigger button col s8">
   <img src="./css/images/w.jpg" class="col s6 offset-s3">

<div class="divider col s12"></div>
<h5 class="col s12">Approve Bonafide requests</h5>
</a>    

                <div id="modal2" class="modal">
                <div class="modal-content">
                        <h4> Bonafied Requests</h4>  
                        <table class="bordered highlight">
                        <form  action="acadaff/bonafidenext" method="post">
                        <table class="bordered highlight">
                        <thead>
                        <tr>
                        <th>Name</th>
                        <th>Student_ID</th>
                        <th>Purpose</th>
                        <th>Date</th>
                        <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($bonafide as $user)
                           <?php  $flag2=1;?>
                             @if($user->status==1 || $user->status==-1)
                            <?php
                            $f2=1;
                            ?>
                        <h5 align="center"><u><i>No Bonafide Requests.</i></u></h5>
                            <?php break;?>
                        @else
                        <tr>
                        <td>{{\DB::table('student')->where('student_id',$user->student_id)->first()->name}}</td>
                        <td>{{$user->student_id}}</td>
                        <td>BONAFIDE</td>
                        <td>{{$user->created_at}}</td>
                        <td colspan=2>
                        <input name="bona{{$user->student_id}}{{$user->receipt_no}}" type="radio" id="{{$user->student_id}}{{$user->receipt_no}}A" checked="true" value="1"/>
                        <label for="{{$user->student_id}}{{$user->receipt_no}}A">Accept</label>
                        <input name="bona{{$user->student_id}}{{$user->receipt_no}}" type="radio" id="{{$user->student_id}}{{$user->receipt_no}}R" value="0"/>	
                        <label for="{{$user->student_id}}{{$user->receipt_no}}R">Reject</label>
                        </td>
                        </tr>
                            @endif
                        @endforeach       
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        </tbody>
                        </table>

                                 <tr>
                            @if($flag2==0 )
                <h5 align='center'>No bonafide requests.</h5>
                            @endif</tr>

                        <div class="modal-footer">
                            @if($flag2==1 && $f2==0)
                        <input type="submit" class="btn">
                            @endif
                        </div>
                        </form>
                        </table>

                        </div>


            </div>
</div>
 </div>
<cdd>
<div >
       
    <!----3-->
<div class="button-container col s12 m6 offset-s2">
<a href="#modal3" class="waves-effect waves-light modal-trigger button col s8 offset-l4 offset-m4">
   <img src="./css/images/w.jpg" class="col s6 offset-s3">

<div class="divider col s12"></div>
<h5 class="col s12">Approve Branch Change</h5>
</a>


<div id="modal3" class="modal">
<div class="modal-content">
<h4>Branch Change Requests</h4>

<table class="bordered highlight">
    <form action="acadaff/branch_next" method="post">
<thead>
<tr>
<th>Name</th>
<th>Student_ID</th>
<th>Current Branch</th>
<th>Expected Branch</th>
<th>Current CPI</th>
<th>Category</th>
<th>Status</th>
</tr>
</thead>
<tbody>


@foreach ($branch_change as $user)
   <?php  $flag3=1;?>
     @if($user->status==1 || $user->status==-1)
            <?php
                            $f3=1;
             ?>
                        <h5 align="center"><u><i>No Branch change Requests.</i></u></h5>
    <?php break;?>
                        @else
<tr>
<td>{{\DB::table('student')->where('student_id',$user->student_id)->first()->name}}</td>
<td>{{$user->student_id}}</td>
<td>{{$user->current_branch}}</td>
<td>{{$user->expected_branch}}</td>
<td>{{$user->current_cpi}}</td>
<td>{{$user->category}}</td>
   
    
    
    
    <td colspan=2>
                        <input name="{{$user->student_id}}" type="radio" id="{{$user->student_id}}A" checked="true" value="1"/>
                        <label for="{{$user->student_id}}A">Accept</label>
                        <input name="{{$user->student_id}}" type="radio" id="{{$user->student_id}}B" value="0"/>	
                        <label for="{{$user->student_id}}B">Reject</label>
                        </td>
</tr>
    @endif
@endforeach
   
<input type="hidden" name="_token" value="{{csrf_token()}}">
</tbody> <div class="modal-footer">
    @if($flag3==1 && $f3==0)
<input type="Submit" class="btn">
    @endif
</div>
    </form>
</table>
 <tr>
    @if( $flag3==0)
                <h5 align='center'>No branch change requests</h5>
                            @endif</tr>

</div>

</div>
</div>

<!---4-->
<div class="button-container col s12 m6 offset-s2">
<a href="#modal4" class=" waves-effect waves-light modal-trigger button col s8">
   <img src="./css/images/w.jpg" class="col s6 offset-s3">

<div class="divider col s12"></div>
<h5 class="col s12">View Grade Submission</h5>
</a>    

<div id="modal4" class="modal">
<div class="modal-content">
<h4>Grade submission</h4>


<table class="bordered highlight">
<thead>
<tr>
<th>Faculty Name</th>
<th>Course code</th>
<th>Faculty Home Page</th>
</tr>
</thead>
<tbody>
<tr>
<td>Atul Gupta</td>
<td>CS305</td>
<td><a href="web.iiitdmj.ac.in">web.iiitdmj.ac.in/~atul</a></td>

</tr>
<tr>
<td>MK Bajpai</td>
<td>CS306</td>
<td><a href="web.iiitdmj.ac.in">web.iiitdmj.ac.in/~mkbajpai</a></td>

</tr>
<tr>
<td>Ruchir Gupta</td>
<td>CS308</td>
<td><a href="web.iiitdmj.ac.in">web.iiitdmj.ac.in/~ruchir</a></td>

</tr>
</tbody></table>                     </div>



<div class="modal-footer">
<a href="#!" class=" modal-action modal-close waves-effect btn waves-green">Agree</a>
</div>
</div>


</div>


</div>


    </cdd>
             </div>
    
</div>
             
       
    
@stop