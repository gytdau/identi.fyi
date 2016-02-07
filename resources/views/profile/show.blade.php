@extends('template')

@section('body-class')
    dark
@endsection
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default shadow-2 profile-panel">
            <h1 class="text-center">{{ $user->name }}</h1>
            <div class="page-card"><div class="text-muted">About me</div>{{ $user->bio  }}</div>
			
			<div class="page-card"><div class="text-muted">Email</div>{{$user->email}}</div>
			
			@if($user->twitter!="")
				<div class="page-card"><div class="text-muted">Twitter</div><a href = "http://www.Twitter.com/{{$user->twitter}}"><span>@</span>{{$user->twitter}}</a></div>
			@endif
			
			@if($user->facebook!="")
				<div class="page-card"><div class="text-muted">Facebook</div><a href = "{{$user->facebook}}">{{$user->facebook}}</a></div>
			@endif
			
			@if($user->linkedin!="")
				<div class="page-card"><div class="text-muted">LinkedIn</div><a href = "{{$user->linkedin}}">{{$user->linkedin}}</a></div>
			@endif
        </div>
		
    </div>
@endsection