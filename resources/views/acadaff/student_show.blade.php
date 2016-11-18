<?php

//$users1 = \DB::table('bonafide')->where('name'=)->get();
//$id='2014105';
$id = Auth::user()->username;
$bona = \DB::table('bonafide')->where('student_id',$id)->get();
$leave = \DB::table('student_leave_application')->where('student_id',$id)->get();
$supervisor = \DB::table('supervisor')->where('student_id',$id)->get();
$seminar_report = \DB::table('seminar_report')->where('student_id',$id)->get();

$seminar = \DB::table('seminar_committee')->where('student_id',$id)->get();
$branch_change = \DB::table('branch_change')->where('student_id',$id)->get();
$cec1 = \DB::table('ce_committee')->where('student_id',$id)->get();
//$users1 = \DB::table('bonafide')->where('name'=)->get();
$flag1=0;$flag2=0;$flag3=0;$flag5=0;
$flag4=0;$flag6=0;$flag7=0;
$count=0;
?>


@extends('layout')


@section('acad_content')
<a class="waves-effect btn" href="students">Home</a>
<a class="waves-effect btn" href="submission">Submissions</a>


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 align="center"><b>Your Submissions</b></h4>
                </div>
                
                
                    <table class="centered responsive-table highlight">
                        <tr>
                        <th>Roll No</th>
                        <th>Receipt No</th>
                        <th>Applied for</th>
                        <th>Date</th>
                        <th>Status</th>
                        
                        </tr>
                        
                        
                        @foreach ($bona as $user)
                        <?php
                        $flag1=1;
                        ?>
                        <tr >
                            <td>{{$user->student_id}}</td>
                            <td>{{$user->receipt_no}}</td>
                            <td  ><b>BONAFIDE</b></td>
                            <td>{{$user->created_at}}</td>
                            <td>
                            @if($user->status==0)
                                <span class="violet-text">Pending..</span>
                            @elseif($user->status==-1)
                                <span class="red-text"><b>Rejected.</b></span>
                            @else
                                <span class="green-text"><b>Accepted.</b></span>
                            @endif
                            </td>
                            
                        </tr>
                        @endforeach
                        
                        
                        @foreach ($leave as $user)
                        <?php $flag2=1;?>
                        <tr>
                            <td>{{$user->student_id}}</td>
                            <td>{{$user->leave_no}}</td>
                            <td ><b>LEAVE</b></td>
                              <td>{{$user->created_at}}</td>
                            <td> 
                                
                              @if($user->status==0)
                                <span class="violet-text">Pending..</span>
                            @elseif($user->status==-1)
                                <span class="red-text"><b>Rejected.</b></span>
                            @else
                                <span class="green-text"><b>Accepted.</b></span>
                            @endif
                        </tr>
                        @endforeach
                        
                        
                        @foreach ($branch_change as $user)
                       <?php  $flag3=1;
                        
                        $q=0;?>
                        <tr >
                            <td>{{$user->student_id}}</td>
                            <td>{{++$q}}</td>
                            <td ><b>BRANCH CHANGE</b></td>
                            <td>{{$user->created_at}}</td>
                            <td> 
                               @if($user->status==0)
                                <span class="violet-text">Pending..</span>
                            @elseif($user->status==-1)
                                <span class="red-text"><b>Rejected.</b></span>
                            @else
                                <span class="green-text"><b>Accepted.</b></span>
                            @endif
                            
                        </tr>
                        @endforeach
                        
                        
                        
                         @foreach ($cec1 as $user)
                       <?php $flag4=1;
                        ?>
                        <tr >
                            <td>{{$user->student_id}}</td>
                            <td>{{++$count}}</td>
                            <td ><b>CE COMMITTEE</b></td>
                            <td>{{$user->created_at}}</td>
                            <td> 
                                @if($user->approved_by==0)
                                <span class="violet-text">Pending..</span>
                            @elseif($user->approved_by==-1)
                                <span class="red-text"><b>Rejected.</b></span>
                                 @elseif($user->approved_by==1)
                                <span class="blue-text"><b>In progress...</b></span>
                           
                            @else
                                <span class="green-text"><b>Accepted.</b></span>
                            @endif
                            
                        </tr>
                        @endforeach
                        
                        
                            @foreach ($seminar_report as $user)
                       <?php $flag5=1;
                        ?>
                        <tr >
                            <td>{{$user->student_id}}</td>
                            <td>{{++$count}}</td>
                            <td ><b>SEMINAR REPORT</b></td>
                            <td>{{$user->created_at}}</td>
                            <td> 
                                @if($user->approved==0)
                                <span class="violet-text">Pending..</span>
                            @elseif($user->approved==-1)
                                <span class="red-text"><b>Rejected.</b></span>
                            @elseif($user->approved==1)
                                <span class="blue-text"><b>In progress....</b></span>
                           
                                @else
                                <span class="green-text"><b>Accepted.</b></span>
                            @endif
                            
                        </tr>
                        @endforeach
                        
                        
                        
                        
                        
                            @foreach ($supervisor as $user)
                       <?php $flag6=1;
                        ?>
                        <tr >
                            <td>{{$user->student_id}}</td>
                            <td>{{++$count}}</td>
                            <td ><b>SUPERVISOR</b></td>
                            <td>{{$user->created_at}}</td>
                            <td> 
                                @if($user->status==0)
                                <span class="violet-text">Pending..</span>
                            @elseif($user->status==-1)
                                <span class="red-text"><b>Rejected.</b></span>
                            @else
                                <span class="green-text"><b>Accepted.</b></span>
                            @endif
                            
                        </tr>
                        @endforeach
                        
                        
                            @foreach ($seminar as $user)
                       <?php $flag7=1;
                        ?>
                        <tr >
                            <td>{{$user->student_id}}</td>
                            <td>{{++$count}}</td>
                            <td ><b>SEMINAR COMMITTEE</b></td>
                            <td>{{$user->created_at}}</td>
                            <td> 
                               @if($user->approved==0)
                                <span class="violet-text">Pending..</span>
                            @elseif($user->approved==-1)
                                <span class="red-text"><b>Rejected.</b></span>
                            @else
                                <span class="green-text"><b>Accepted.</b></span>
                            @endif
                            
                        </tr>
                        @endforeach
                        
                        
                    </table><tr >
                            @if($flag1==0 && $flag2==0 && $flag3==0 && $flag4==0 && $flag7==0 && $flag6==0 && $flag5==0)
                <h5 align='center' ><i class="green-text">Sorry,You have no submissions.</i></h5>
                            @endif
                        </tr>
                   
                    
                
                
                       
                
            </div>
        </div>
             
    </div>
</div>    

@stop