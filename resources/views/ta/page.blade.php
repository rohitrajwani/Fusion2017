@extends('ta.layouts.master')

@section('title', 'Student')
@section('intro')

        <div class="row" id="intro">

            <div class="col l3 m6 s6">
                <h5 class="blue-text">NAME</h5>
                <h5 class="blue-text">ROLL NO</h5>
                <h5 class="blue-text">BRANCH</h5>
                
                <h5 class="blue-text">FACULTY HEAD</h5>
            </div>
            <div class="col l5 m6 s6">
                <h5 class="orange-text">: <?php echo $check_student[0]->name;?></h5>
                <h5 class="orange-text">: <?php echo $check_student[0]->roll_no;?></h5>
                <h5 class="orange-text">: <?php echo $check_student[0]->branch;?></h5>
                
               
                <h5 class="orange-text">: 
                    @if($faculty_name[0]=='NA')
                        You are not a TA.
                    @else
                        {{$faculty_name[0]}}
                    @endif
                </h5>
                
            </div>
            
        </div>
@endsection



@section('cards')

    @if($faculty_name[0]!='NA')
    <div class="row">
        <div class=" col l4 s12 m4">
            <div class="card small">
                <div class="card-image">
                <img src="{{asset('css/image/office.jpg')}}">
                <span class="card-title">Attendance</span>
                </div>
            <div class="card-content">
                <p>Know your attendance of  every month.</p>
            </div>
            <div class="card-action">
                <a href="TA/attendance_student">Click Here</a>
            </div>
            </div>
        </div>
            <div class=" col l4 s12 m4">
            <div class="card small">
                <div class="card-image">
                <img src="{{asset('css/image/knowledge-library-620x330.jpg')}}">
                <span class="card-title">Assistance Ship</span>
                </div>
            <div class="card-content">
                <p>Claim your assistance ship here and can check the status of applied form</p>
            </div>
            <div class="card-action">
                <a href="TA/claims">Click Here</a>
            </div>
            </div>
        </div>
            <div class=" col l4 s12 m4">

            <div class="card small">
                <div class="card-image">
                <img src="{{asset('css/image/7feccfb2b78334d116f6654c42b84f50.jpg')}}">
                <span class="card-title ">TA Form</span>
                </div>
            <div class="card-content">
                <p>If you are not a TA ,then know the opening and apply for it.</p>
            </div>
            <div class="card-action">
                <a href="TA/taapplication">Click here</a>
            </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class=" col l4 s12 m4">
    </div>
    <div class=" col l4 s12 m4 offset-l4">
            <div class="card small">
                <div class="card-image">
                <img src="{{asset('css/image/product_hold_mail_img_lg.jpg')}}">
                <span class="card-title black-text">Mail</span>
                </div>
            <div class="card-content">
                <p>Send a Mail</p>
            </div>
            <div class="card-action">
                <a href="TA/mail">Click Here</a>
            </div>
            </div>
        </div>
</div>
@else
    <div class="row">
    <div class=" col l4 s12 m4">

            <div class="card small">
                <div class="card-image">
                <img src="{{asset('css/image/7feccfb2b78334d116f6654c42b84f50.jpg')}}">
                <span class="card-title">TA Form</span>
                </div>
            <div class="card-content">
                <p>If you are not a TA ,then know the opening and apply for it.</p>
            </div>
            <div class="card-action">
                <a href="TA/taapplication">Click here</a>
            </div>
            </div>
            </div>
            </div>
@endif
@endsection
