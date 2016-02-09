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

                @if($user->job!="")
                <div class="page-card"><div class="text-muted">Job Title</div>{{$user->job}}</div>
                @endif

                @if($user->phone!="")
                <div class="page-card"><div class="text-muted">Phone Number</div>{{$user->phone}}</div>
                @endif

                @if($user->city!="")
                <div class="page-card"><div class="text-muted">Area</div>{{$user->city}}</div>
                @endif

                @if($user->website!="")
                <div class="page-card"><div class="text-muted">Website</div><a href = "{{$user->website}}}">{{$user->website}}</a></div>
                @endif

            </div>
        </div>
            <div class="col-md-6">
		<div class="panel panel-default shadow-2 profile-panel">
		
		<h2 class="text-center">Social Media</h2>
		
		<div class = "list">
		
			{!! $socialView !!}
			
		</div>

            <div class="page-card"><div class="text-muted">Email</div>{{$user->email}}</div>

	</div>
            </div>
		
    </div>
	
@endsection