@extends('template')

@section('head')
	
	<title>{{$user->name}}</title>
	
@endsection

@section('body-class')
    dark
@endsection
@section('content')
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="panel panel-default shadow-2 profile-panel">
                <h1 class="text-center">{{ $user->name }}</h1>
                <div class="page-card"><div class="text-muted">About me</div>{{ $user->bio  }}</div>

                @if($user->city!="")
                <div class="page-card"><div class="text-muted">Area</div>{{$user->city}}</div>
                @endif

            </div>
        </div>
		@if($user->twitter!=""||$user->linkedin!=""||$user->facebook!="")
            <div class="col-md-6">
		<div class="panel panel-default shadow-2 profile-panel">
		
		<h2 class="text-center">Social Media</h2>
		@if($user->twitter!="")
				<div class="page-card"><div class="text-muted">Twitter</div><a href = "{{$user->twitter}}">{{$user->twitter}}</a></div>
			@endif
			
			@if($user->facebook!="")
				<div class="page-card"><div class="text-muted">Facebook</div><a href = "{{$user->facebook}}">{{$user->facebook}}</a></div>
			@endif
			
			@if($user->linkedin!="")
				<div class="page-card"><div class="text-muted">LinkedIn</div><a href = "{{$user->linkedin}}">{{$user->linkedin}}</a></div>
			@endif

            <div class="page-card"><div class="text-muted">Email</div>{{$user->email}}</div>

	</div>
            </div>
	@endif
		
    </div>
	
@endsection