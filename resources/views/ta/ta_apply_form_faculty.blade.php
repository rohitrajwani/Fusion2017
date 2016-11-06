@extends('ta.layouts.master_faculty')

@section('title', 'Assistanceship Claims - Institute TA Management System')

@section('timetable')
    <h5>TA APPLICATION FORM</h5>
    <table class="centered responsive-table highlight">
        <thead>
          <tr>
            <th data-field=""></th>
            <th data-field="">TA Name</th>
            <th data-field="">DATE-TIME</th>
            <th data-field="" colspan="2" >React</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>#1</td>
            <td>  <a class="waves-effect waves-light modal-trigger " href="#modal1">Ranjeet Kumar Yadav</a></td>
            <td>26/09/16 16:25:26</td>
            <td ><button class="btn btn-small green">Accept</button></td>
            <td ><button class="btn btn-small red">Reject</button></td>

          </tr>
          <tr>
            <td>#1</td>
            <td>  <a class="waves-effect waves-light modal-trigger " href="#modal1">Ranjeet Kumar Yadav</a></td>
            <td>26/09/16 16:25:26</td>
            <td ><button class="btn btn-small green">Accept</button></td>
            <td ><button class="btn btn-small red">Reject</button></td>

          </tr>
          <tr>
            <td>#1</td>
            <td>  <a class="waves-effect waves-light modal-trigger " href="#modal1">Ranjeet Kumar Yadav</a></td>>
            <td>26/09/16 16:25:26</td>
            <td ><button class="btn btn-small green">Accept</button></td>
            <td ><button class="btn btn-small red">Reject</button></td>

          </tr>
          <tr>
            <td>#1</td>
            <td>  <a class="waves-effect waves-light modal-trigger " href="#modal1">Ranjeet Kumar Yadav</a></td>
            <td>26/09/16 16:25:26</td>
            <td ><button class="btn btn-small green">Accept</button></td>
            <td ><button class="btn btn-small red">Reject</button></td>

          </tr>
        
        </tbody>
      </table>
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Teaching assistant Detail</h4>
      
          <div class="row">
    <form class="col s12 center">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" class="validate center" value="Ranjeet Kumar" disabled>
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate center" value="Yadav" disabled>
          <label for="last_name">Last Name</label>
        </div>
      </div>
        <div class="row">
        <div class="input-field col s6">
          <input id="password" type="text" class="validate center" value="2014135" disabled>
          <label for="password">Roll No.</label>
            </div>
      
        <div class="input-field col s6">
          <input disabled value="CSE" id="disabled " type="text" class="validate center">
          <label for="disabled">Department</label>
        </div>
        </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="text" class="validate center" value="9981911584" disabled>
          <label for="password">Contact No.</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" class="validate center" value="ranjeetkumaryadav@iiitdmj.ac.in" disabled>
          <label for="email">Email</label>
        </div>
      </div>
    </form>
  </div>
    </div>

  </div>
@endsection