@extends('layout')

@section('title')

    <title>Current Leave Status</title>

@stop

@section('main_content')
    <div class="main-container row">
        <nav class="mynav">
            <div class="nav-wrapper">
                <ul>
                    <li><a href="/ELMS/homeStaff">HOME</a></li>
                    <li><a href="/ELMS/leaveApplicationStaff">Apply for Leave</a></li>
                    <li><a href="/ELMS/historyStaff">Leave History</a></li>
                    <li class="active"><a href="/ELMS/statusStaff">Check Status</a></li>
                    
                </ul>
            </div>
        </nav>

        <div class="col s11 m11"><br>
            <div style="text-align: center; font-size: 24px; font-weight: 300">Current Applied Leave Status<hr></div>
            <pre>Name           : {{$staffdet->name}} </pre>
            <pre>P.F. No.       : {{$staffdet->staff_id}} </pre>
            @if($leavedet == NULL)
                {{ 'NO CURRENT LEAVE' }}
            @else
                <pre>Type of Leave  : {{$leavedet->leave_type}} </pre>
                <pre>From           : {{$leavedet->from}} </pre>
                <pre>To             : {{$leavedet->to}} </pre>
                <?php
                    $f = strtotime($leavedet->from);
                    $t = strtotime($leavedet->to);
                    $difference = ($t-$f+86400)/86400;
                ?>
                <pre>No. of days    : {{$difference}} </pre>
                <pre>Purpose        : {{$leavedet->purpose}} </pre>
                <?php
                    if($leavedet->status == 0)
                        $msg = 'No Action Taken';
                    else if($leavedet->status == 1)
                        $msg = 'Sanctioned';
                    else
                        $msg = 'Leave Rejected';
                ?>
                <pre>Status         : {{$msg}} </pre>
            @endif
        </div>
    </div>
@stop