@extends('layout')

@section('navbar')

        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">Fusion</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/online_quizzing/view_profile">Aakash Prajapati</a></li>
                    <li><a href="/login">Log Out</a></li>
                </ul>
                
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">Aakash Prajapati</a></li>
                    <li><a href="#">Log Out</a></li>
                </ul>
            </div>
        </nav>

@stop