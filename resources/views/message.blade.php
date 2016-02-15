@extends('template')

@section('head')

    <title>{{$title}} - Identifyi</title>

@endsection

@section('body-class')
    dark
@endsection
@section('content')

	<div class="col-md-12">
        <div class="col-md-12">
            <div class="panel panel-default shadow-2 profile-panel">
			{{$message}}
			</div>
		</div>
	</div>

@endsection