<?php

$supervisorreq = \DB::table('supervisor')->where('status','0')->get();;
$name = \DB::table('student')->get();
$ce =\DB::table('ce_committee')->where('approved_by','0')->get();
$seminar=\DB::table('seminar_committee')->where('approved','0')->get();
$semirr=\DB::table('seminar_report')->where('approved','0')->get();
$flag1=0;$f1=0;$f2=0;$f3=0;$f4=0;$f5=0;
$flag2=0;
$flag3=0;
$flag4=0;
$flag5=0;
?>

@extends('layout')


@section('acad_content')
         





         <div class='container'>
                <div class='section'>
            
                        <div class="button-container  col s12 m6 offset-s2">
                            <a href="#modal1" class="waves-effect waves-light modal-trigger button col s8 offset-l4 offset-m4">
                                    <i class="fa fa-plus-circle"></i>
                                  <div class="divider col s12"></div>
                                <h5 class="col s12">Grades Entry</h5>
                            </a>
                        
                   
                            <div id="modal1" class="modal">
                                  <div class="modal-content">
                                      <h4>Grades Entry</h4>
                                      <form>
    <div class="file-field input-field">
        <div class="btn">
            <span>File</span>
            <input type="file">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>
</form>
                                  </div>
                            
                                
                                
                                  <div class="modal-footer">
                                    <a href="#!" class=" modal-action modal-close waves-effect btn waves-green">Agree</a>
                                  </div>
                            </div>
                        </div>
               
<div class="button-container col s12 m6 offset-s2">
    <a href="#modal2" class="waves-effect waves-light modal-trigger button col s8 ">
    <i class="fa fa-plus-circle"></i>
    <div class="divider col s12"></div>
    <h5 class="col s12">Approve Supervisor Post</h5>
    </a>   
            <div id="modal2" class="modal">
                <div class="modal-content">
                <h4>Approve Supervisor Post</h4>
                  <table class="bordered highlight">
                        <form  action="sacadaff/upervisorrequest" method="post"> 
                        <table class="bordered highlight">
                            <thead>
                            <tr>
                            <th>Name</th>
                                <th>Student ID</th>
                            <th>Discipline</th>
                            <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($supervisorreq as $user)
                               <?php $flag1=1;
                                ?>
                            
                                <tr>
                                    @if($user->status==1 ||$user->status==-1)
                                <?php $f1=1;
                                ?>
                                <h5 align="center"><u  class="green-text">No Supervisor Requests.</u></h5>
                                    <?php break;?>
                                @else
                                <td>{{\DB::table('student')->where('student_id',$user->student_id)->first()->name}}</td>
                                <td>{{\DB::table('student')->where('student_id',$user->student_id)->first()->student_id}}</td>
                                    <td>{{\DB::table('student')->where('student_id',$user->student_id)->first()->branch}}</td>
                                <td colspan=2>
                        <input name="supervisor{{$user->student_id}}" type="radio" id="{{$user->student_id}}Asu" checked="true" value="1"/>
                        <label for="{{$user->student_id}}Asu">Accept</label>
                        <input name="supervisor{{$user->student_id}}" type="radio" id="{{$user->student_id}}Rsu" value="0"/>	
                        <label for="{{$user->student_id}}Rsu">Reject</label>
                            </td>
                                    @endif
                                </tr>
                                
                                @endforeach
                                
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </tbody>
                            </table><tr>

                                    @if($flag1==0)
                <h5 align='center'>No Supervisor requests.</h5>
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
        
      
             <cdd>
                <div >
                        
<div class="button-container col s12 m6 offset-s2">
    <a href="#modal3" class="waves-effect waves-light modal-trigger button col s8 offset-l4 offset-m4">
    <i class="fa fa-plus-circle"></i>
    <div class="divider col s12"></div>
    <h5 class="col s12">Approve CEC</h5>
    </a>


    <div id="modal3" class="modal">
        <div class="modal-content">
        <h4>Approve CEC</h4>

                <table class="bordered highlight">
                    <form action="acadaff/cerequest" method="post">
                        <table class="bordered highlight">
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Student_ID</th>
                        <th>Date</th>
                        <th>Title of Thesis</th>
                        <th>Status</th>
                        </tr>
                        </thead>
                    <tbody>

                        @foreach ($ce as $user)
                        <?php $flag2=1;
                        ?>
                        @if($user->approved_by==1 ||$user->approved_by==-1)
                        <?php
                            $f2=1;
                        ?>
                        <h5 align="center"><u><i>No CE Requests.</i></u></h5>
                        <?php break;?>
                        @else
                        <tr>
                        <td>{{\DB::table('student')->where('student_id',$user->student_id)->first()->name}}</td>
                        <td>{{\DB::table('student')->where('student_id',$user->student_id)->first()->student_id}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->title}}</td>
                        <td colspan=2>
                        <input name="ce{{$user->student_id}}" type="radio" id="{{$user->student_id}}Ace" checked="true" value="1"/>
                        <label for="{{$user->student_id}}Ace">Accept</label>
                        <input name="ce{{$user->student_id}}" type="radio" id="{{$user->student_id}}Rce" value="0"/>	
                        <label for="{{$user->student_id}}Rce">Reject</label>
                        </td>
                        </tr>
                        @endif
                        @endforeach
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </tbody>
                        </table>
                        <tr>
                        @if($flag2==0 )
                        <h5 align='center'>No CE requests.</h5>
                        @endif
                        </tr>
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

               
<div class="button-container col s12 m6 offset-s2">
<a href="#modal4" class=" waves-effect waves-light modal-trigger button col s8">
<i class="fa fa-plus-circle"></i>
<div class="divider col s12"></div>
<h5 class="col s12">Approve Seminar Report</h5>
</a>    
</div>
    <div id="modal4" class="modal">
        <div class="modal-content">
        <h4>Seminar Reports</h4>


        <table class="bordered highlight">
            <form action="acadaff/semirr" method="post">
                <table class="bordered highlight">
        <thead>
            <tr>
            <th>Name</th>
            <th>Student_ID</th>
            <th>Discipline</th>
            <th>Theme</th>
            <th>Contribution in this sem</th>
            <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($semirr as $user)
            <?php $flag3=1;
            ?>
            @if($user->approved==1 || $user->approved==-1)
            <?php
                            $f3=1;
             ?>
                        <h5 align="center"><u><i>No Seminar report Requests.</i></u></h5>
                <?php break;?>
                        @else
            <tr>
            <td>{{DB::table('student')->where('student_id',$user->student_id)->first()->name}}</td>
            <td>{{DB::table('student')->where('student_id',$user->student_id)->first()->name}}</td>
            <td>{{DB::table('student')->where('student_id',$user->student_id)->first()->branch}}</td>
            <td>{{$user->theme}}</td>
            <td>{{$user->contribution}}</td>
                <td colspan=2>
                        <input name="semirr{{$user->student_id}}" type="radio" id="{{$user->student_id}}Aq" checked="true" value="1"/>
                        <label for="{{$user->student_id}}Aq">Accept</label>
                        <input name="semirr{{$user->student_id}}" type="radio" id="{{$user->student_id}}Rq" value="0"/>	
                        <label for="{{$user->student_id}}Rq">Reject</label>
                        </td>
            </tr>
            @endif
            @endforeach
              <input type="hidden" name="_token" value="{{csrf_token()}}">
        </tbody>
        </table>
                 <tr>
                        @if($flag3==0)
                        <h5 align='center'>No Seminar report requests.</h5>
                        @endif
                        </tr>
                        <div class="modal-footer">
                        @if($flag3==1 && $f3==0)
                        <input type="submit" class="btn">
                        @endif
                        </div>
                
            </form>
        </table>                
        </div>
    </div>

               
              <cdd>
                <div >
                        
<div class="button-container col s12 m6 offset-s2">
<a href="#modal5" class="waves-effect waves-light modal-trigger button col s8 offset-l4 offset-m4">
<i class="fa fa-plus-circle"></i>
<div class="divider col s12"></div>
<h5 class="col s12">Approve Seminar committee</h5>
</a>

                            
<div id="modal5" class="modal">
    <div class="modal-content">
        <h4>Approve Seminar Committee</h4>

        <table class="bordered highlight">
            <form action="acadaff/seminarrequest" method="post">
                <table class="bordered highlight">
                <thead>
                <tr>
                <th>Name</th>
                <th>Student ID</th>
                <th>Date</th>
                <th> Title of Thesis</th>
                <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($seminar as $user)
                    <tr>
                    <?php
                        $flag5=1;
                        ?>
                        @if($user->approved==1 || $user->approved==-1)
                        <?php
                            $f4=1;
                            ?>
                        <h5 align="center"><u><i>No Seminar Committee Requests.</i></u></h5>
                        <?php break;?>
                        @else
                    <td>{{\DB::table('student')->where('student_id',$user->student_id)->first()->name}}</td>
                    <td>{{\DB::table('student')->where('student_id',$user->student_id)->first()->student_id}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->title}}</td>
                    <td colspan="2">
                       <input name="seminar{{$user->student_id}}" type="radio" id="{{$user->student_id}}Asemi" checked="true" value="1"/>
                        <label for="{{$user->student_id}}Asemi">Accept</label>
                        <input name="seminar{{$user->student_id}}" type="radio" id="{{$user->student_id}}Rsemi" value="0"/>	
                        <label for="{{$user->student_id}}Rsemi">Reject</label>   
                    </td>
                        @endif
                    </tr>
                    @endforeach
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </tbody>
                </table>  
                <tr>
                @if($flag5==0)
                <h5 align='center'>No Seminar Committee requests.</h5>
                @endif
                </tr>
                            <div class="modal-footer">
                                @if($flag5==1 && $f4==0)
                            <input type="submit" class="btn">
                                @endif
                            </div>
            </form>
        </table>
    </div>
</div>
</div>
             
                   
</div>
             
       
    
@stop