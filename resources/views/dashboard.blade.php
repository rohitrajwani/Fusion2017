@extends('layout')
@section('content')
    <h4 class="col s12 m4 offset-m4">Welcome {{Auth::user()->username}}</h4>
    <div class="button-container col s12 m6">
        <a href="/attachRole/manager" class="button col s8 offset-s2">
            <i class="fa fa-plus-circle"></i>
            <div class="divider col s12"></div>
            <h5 class="col s12">Make {{Auth::user()->username}} manager</h5>
        </a>
    </div>
    <div class="button-container col s12 m6">
        <a href="/attachRole/admin" class="button col s8 offset-s2">
            <i class="fa fa-plus-circle"></i>
            <div class="divider col s12"></div>
            <h5 class="col s12">Make {{Auth::user()->username}} admin</h5>
        </a>
    </div>

    @if(Auth::user()->hasRole('manager'))
        <h5 class="col s12 m6 offset-m3" style="text-align: center">{{Auth::user()->username}} is a manager!!</h5>
    @endif
    @if(Auth::user()->hasRole('admin'))
        <h5 class="col s12 m6 offset-m3" style="text-align: center">{{Auth::user()->username}} is an admin!!</h5>
    @endif
@stop