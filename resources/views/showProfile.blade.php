@extends('template')

@section('body-class')
    dark
@endsection
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default shadow-2 profile-panel">
            <h1 class="text-center">{{ $user->name }}</h1>
            <div class="bio"><div class="text-muted">About me</div>{{ $user->bio  }}</div>
        </div>
    </div>
@endsection