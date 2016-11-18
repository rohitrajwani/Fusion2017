
<?php
    if(isset($_SESSION['faculty']))
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

   

        @extends('ta.layouts.master')
        @section('title', 'Attendance')
        @section('links')
        @section('main_heading','Attendance')
        @section('links')
        <nav class="mynav blue">
          <div class="nav-wrapper">
            <ul>
              <li><a href="TA">Home</a></li>
              <li class="active"><a href="TA/attendance" >Attendance</a></li>
              <li><a href="TA/mnl_batch_assgn">Batch-Assign</a></li>
              <li><a href="TA/show_claims">Assistance-Ship</a></li>
              <li><a href="TA/mail">Mail</a></li>
            </ul>
          </div>
        </nav>

        @stop
         @section('timetable')
        <?php  if(isset($errors)){
              if($errors->first('f')!=''){?>
            <p class="red lighten-2 white-text" style="padding:1%" id="para">
                <?php echo $errors->first('f').'
              <button class="right" id="cross"><i class="fa fa-times" aria-hidden="true"></i></button>'; ?>
            </p>
            <?php            
              }
              }
            ?>
                <div class="row">
                    <div class="col s12 l6 m12">
                        <form action="attendance_store_faculty" method="post">

                            <input type="hidden" name=" _token" value="{{ csrf_token()}}">
                            <label for="attendance_mark" class="blue-text">Select Date Here</label>
                            <input type="date" class="datepicker" name="attendance_mark" id="attendance_mark" placeholder="Select Date For marking Attendance" value="{{date(" Y-m-d ")}}">

                    </div>
                    <div class="col s6 l6 m6">
                    </div>
                </div>
                
                    <table class="bordered highlight">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th data-field="">Roll No</th>
                                <th data-field="">Name </th>
                                <th data-field="" colspan="2">Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=0; foreach($tas as $ta) { $i++;?>
                            <tr>
                                <td>{{$i}}</td>
                                <td class="blue-text">
                                    <?php echo $ta->roll_no; ?>
                                </td>
                                <td class="grey-text">
                                    <?php echo $ta->name; ?>
                                </td>
                                <td>

                                    <input name="{{$ta->roll_no}}" type="radio" id="test{{$i+1}}" checked="true" value="1" />
                                    <label for="test{{$i+1}}" class="green-text">Present</label>

                                </td>
                                <td>

                                    <input name="{{$ta->roll_no}}" type="radio" id="test{{$i+100}}" value="0" />
                                    <label for="test{{$i+100}}" class="red-text">Absent</label>

                                </td>
                            </tr>
                            <?php } ?>

                                <tr>
                                    <td colspan="5">
                                        <?php if($i!=0){?>
                                        <button type="submit" name="submit" class="btn btn-green  btn-small waves-effect waves-light right" value="save">Save</button>
                                        <?php }
                                            else
                                                echo "<h5 class='center red-text'><i>NO TAs</i></h5>"
                                        ?>
                                    </td>
                                </tr>
                                </tbody>
                    </table>
                
                </form>

                @stop 
                @section('script') 
                $(document).ready(function() 
                { 
                  $("#cross").click(function()
                    { 
                      $("#para").fadeOut(500); 
                    }); 
                }); 
                @endsection