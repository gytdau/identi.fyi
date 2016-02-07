@extends('template')

@section('head')

    <link rel="stylesheet" href="/edit.css">

    <title>{{$user->name}} | Edit</title>

@endsection

@section('body-class')
    dark
@endsection

@section('content')
    <form action="" method="post">
        <h1 class="text-center">Editing profile...</h1>

        <div class="col-md-12">
            <div class="col-md-6">
                <div class="panel panel-default shadow-2 profile-panel">
                    <!-- Text Input Type (Name) -->
                    <div class="page-card">
                        <label>
                            Name
                        </label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                    </div>
                    <!-- Textarea Input Type (Bio) -->
                    <div class="page-card">
                        <label>
                            Bio
                        </label>
                        <textarea name="bio" class="form-control">{{ $user->bio }}</textarea></div>

                    <!-- Text Input Type (Area) -->
                    <div class="page-card">
                        <label>
                            Area
                        </label>

                        <input name="city" type="text" class="form-control" placeholder="Your City / Town"
                               value="{{$user->city}}"></div>

                </div>
                <div class="panel panel-default shadow-2 profile-panel">
                    <div class="page-card">
                        <input type="submit" value="Save Changes" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default shadow-2 profile-panel">

                    {!! $socialForm !!}
                </div>
            </div>

        </div>
    </form>
@endsection