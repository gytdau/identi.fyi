@extends('template')

@section('head')
	
	<title>{{$user->name}}</title>
	
@endsection

@section('body-class')
    dark
@endsection
@section('content')
    <div class="col-md-13 col-md-offset-2">
        <div class="panel panel-default shadow-2 profile-panel profile-panel-line" style="width: 50%">
            <h1 class="text-center">{{ $user->name }}</h1>
            <div class="page-card"><div class="text-muted">About me</div>{{ $user->bio  }}</div>
			
			<div class="page-card"><div class="text-muted">Email</div>{{$user->email}}</div>
			
			@if($user->city!="")
			<div class="page-card"><div class="text-muted">Area</div>{{$user->city}}</div>
			@endif
			<hr>
			
        </div>
		@if($user->twitter!=""||$user->linkedin!=""||$user->facebook!="")
		<div class="panel panel-default shadow-2 profile-panel panel-float-right" style = "width:45%">
		
		<h2 class="text-center">Social Media</h2>
		@if($user->twitter!="")
				<div class="page-card"><div class="text-muted">Twitter</div><a href = "http://www.Twitter.com/{{$user->twitter}}"><span>@</span>{{$user->twitter}}</a></div>
			@endif
			
			@if($user->facebook!="")
				<div class="page-card"><div class="text-muted">Facebook</div><a href = "http://www.Facebook.com/{{$user->facebook}}">{{$user->facebook}}</a></div>
			@endif
			
			@if($user->linkedin!="")
				<div class="page-card"><div class="text-muted">LinkedIn</div><a href = "http://www.LinkedIn.com/In/{{$user->linkedin}}">{{$user->linkedin}}</a></div
			@endif
		<hr>
	</div>
	@endif
		
    </div>
	
@endsection