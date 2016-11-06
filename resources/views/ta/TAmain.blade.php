<?php 
    $id = $_SESSION['id'];
?>
@extends('ta.layouts.master1')
@section('title','TA Main Page')
@section('main_heading','TA Profile')
@section('body')
    <div class="row" id="intro">

            <div class="col l3 m6 s12">
                <h5>NAME</h5>
                <h5>ROLL NO</h5>
                <h5>COURSE</h5>
                <h5>GROUP</h5>
                <h5>FACULTY HEAD</h5>
            </div>
            <div class="col l5 m6 s12">
                <h5>: RANJEET KUMAR YADAV</h5>
                <h5>: {{$_SESSION["id"]}}</h5>
                <h5>: CSE</h5>
                <h5>: G2</h5>
                <a href="#"><h5>: ATUL GUPTA</h5></a>
            </div>
            
        </div>


    <center><h5>Schedule</h5></center>
    <center><table class="centered responsive-table highlight">
        <thead>
          <tr>
            <th data-field="">Day/Time</th>
            <th data-field="">9-10</th>
            <th data-field="">10-11</th>
            <th data-field="">10-11</th>
            <th data-field="">10-11</th>
            <th data-field="">10-11</th>
            <th data-field="">10-11</th>
            <th data-field="">10-11</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>monday</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>ms302</td>              

          </tr>
          <tr>
            <td>monday</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>ms302</td>
          </tr>
          <tr>
            <td>monday</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>ms302</td>
          </tr>
                  <tr>
            <td>monday</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>ms302</td>
          </tr>
        <tr>
            <td>monday</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>ms302</td>
          </tr>
                  <tr>
            <td>monday</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>es101</td>
            <td>ms302</td>
            <td>ms302</td>
          </tr>
        </tbody>
      </table><br><br>
</center>

@endsection