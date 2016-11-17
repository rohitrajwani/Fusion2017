@extends('layout')

    @section('title')
        Time Table Management
    @stop

    @section('content')
        <h4 class="col s12 m4 offset-m4">Welcome {{Auth::user()->username}}</h4>
        <div class="button-container col s12 m4">
            <a href="/time_table_management/creatett" class="button col s8 offset-s2">
                <i class="fa fa-plus-circle"></i>
                <div class="divider col s12"></div>
                <h5 class="col s12">Create Time Table</h5>
            </a>
        </div>

	<div class="button-container col s12 m4">
            <a href="/time_table_management/modify_tt" class="button col s8 offset-s2">
                <i class="fa fa-check-circle"></i>
                <div class="divider col s12"></div>
                <h5 class="col s12">Modify Time Table</h5>
            </a>
        </div>


        <div class="button-container col s12 m4">
            <a href="/time_table_management/scheduleanextraclass" class="button col s8 offset-s2">
                <i class="fa fa-plus-circle"></i>
                <div class="divider col s12"></div>
                <h5 class="col s12">Schedule an Extra Class</h5>
            </a>
        </div>
	
        <div class="button-container col s12 m6">
            <a href="/time_table_management/viewallrequests" class="button col s8 offset-s2">
                <i class="fa fa-check-circle"></i>
                <div class="divider col s12"></div>
                <h5 class="col s12">Handle Requests</h5>
            </a>
        </div> 
        <div class="button-container col s12 m6">
            <a href="/time_table_management/view_tt" class="button col s8 offset-s2">
                <i class="fa fa-check-circle"></i>
                <div class="divider col s12"></div>
                <h5 class="col s12">View Time Table</h5>
            </a>
        </div>                     
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-button").dropdown();
            });
        </script>
    @stop
