@extends('ta.layouts.master')

@section('title', 'TA Supervisor Page')
@section('intro')

<div>
<h4 class="col s12 m12 l12 center   blue-text">Faculty Profile</h4>
</div>
<div class="row" id="intro">

            <div class="col l3 m6 s6">
                <h5 class="blue-text">NAME</h5>
               
                <h5 class="blue-text">DEPT.</h5>
            </div>
            <div class="col l5 m6 s6">
                <h5 class="orange-text">: <?php echo $check_faculty[0]->name;?></h5>
                
                <h5 class="orange-text">:  <?php echo $check_faculty[0]->department;?></h5>
            </div>
            
</div>

@endsection


@section('timetable')
     <?php  if(isset($errors)){
              if($errors->first('f')!=''){?>
              <p class="green white-text" style="padding:1%" id="para" ><?php echo $errors->first('f').'
              <button class="right" id="cross"><i class="fa fa-times" aria-hidden="true"></i></button>'; ?></p>
              <?php            }}
                  ?>
<div class="row">




        <ul class="collection with-header">
        <li class="collection-header"><h5 class="green-text">List of Assigned TA's </h5></li>        
        <?php $i=0;foreach($tas1 as $key){ $i++;?>
        
        <li class="collection-item blue-text"><?php echo $i.'.'.$key->name; ?> </li>
        <?php } ?>

        <?php if($i==0) 
            echo '<h5 class="center red-text italic"><i>NO TAs</i></h5>';
         ?>
      </ul>
</div>

@endsection
@section('cards')
    <div class="row">
        <div class=" col l4 s12 m4">
            <div class="card small">
                <div class="card-image">
                <img src="{{asset('css/image/office.jpg')}}" class="responsive-img" >
                <span class="card-title">Attendance</span>
                </div>
            <div class="card-content">
                <p>Mark the attendance TA</p>
            </div>
            <div class="card-action">
                <a href="./attendance">Click Here</a>
                <a href="./attendance_view">View Attendance</a>
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
                <p>Forward the assistanship application of TAs</p>
            </div>
            <div class="card-action">
                <a href="./show_claims">Click Here</a>
            </div>
            </div>
        </div>
            <div class=" col l4 s12 m4">

            <div class="card small">
                <div class="card-image">
                <img src="{{asset('css/image/7feccfb2b78334d116f6654c42b84f50.jpg')}}">
                <span class="card-title">Assign Batches</span>
                </div>
            <div class="card-content">
                <p>Assign batches for the TA's</p>
            </div>
            <div class="card-action">
                <a href="./mnl_batch_assgn">Click here</a>
            </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class=" col l4 s12 m4 offset-l2 offset-m2">
            <div class="card small">
                <div class="card-image">
                <img src="{{asset('css/image/feedback-heads1.png.jpeg')}}">
                <span class="card-title ">Feedback</span>
                </div>
            <div class="card-content">
                <p>Write a Feedback for a particlar TA</p>
            </div>
            <div class="card-action">
                <a href="./feedback">Click Here</a>
            </div>
            </div>
        </div>
                <div class=" col l4 s12 m4">
            <div class="card small">
                <div class="card-image">
                <img src="{{asset('css/image/product_hold_mail_img_lg.jpg')}}">
                <span class="card-title black-text">Mail</span>
                </div>
            <div class="card-content">
                <p>Send a Mail</p>  
            </div>
            <div class="card-action">
                <a href="./mail">Click Here</a>
            </div>
            </div>
        </div>
</div>
@endsection

@section('script')
  
    $(document).ready(function() {
   $("#cross").click(function(){
    $("#para").hide(500);
});
  });
       @endsection