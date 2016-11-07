@extends('layouts.master')
@section('title')
	{{ $faculty->name }}
@endsection

@section('content')
<h4 class="col s12 m4 offset-m4">Welcome {{ $faculty->name }}</h4>
            <div class="container" style="width:90%">
                <div class="code col s12">
                        
                    </div>
			</div>
@endsection