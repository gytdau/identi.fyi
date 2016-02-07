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
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name"><br>
                    </div>
                    <!-- Textarea Input Type (Bio) -->
                    <div class="page-card">
                        <label>
                            Bio
                        </label>
                        <i><textarea name="bio" class="form-control">{{ $user->bio }}</textarea></i><br></div>

                    <!-- Text Input Type (Area) -->
                        <div class="page-card">
                            <label>
                                Area
                            </label>
                            <i>
                                <input name="city" type="text" class="form-control" placeholder="Your City / Town" value="{{$user->city}}"><br><br></i></div>

                </div>
                <div class="panel panel-default shadow-2 profile-panel">
                    <div class="page-card">
                    <input type="submit" value="Save Changes" class="form-control">
                    </div>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="panel panel-default shadow-2 profile-panel">

                        <h2 class="text-center">Social Media</h2>
                        <!-- Text Input Type (Twitter) -->
                        <div class="page-card">
                        <label>
                            Twitter
                        </label>
                        <i><div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input name="twitter" type="text" class="form-control" value="{{$user->twitter}}" placeholder="You're Twitter Name">
                            </div><br></i>
                    </div>
                        <!-- Text Input Type (Facebook) -->
                        <div class="page-card">

                        <label>
                            Facebook
                        </label>
                        <i>
                            <input name="facebook" type="text" class="form-control" value="http://www.facebook.com/{{$user->facebook}}" placeholder="You're Facebook URL">
                            <br></i>
                        </div>

                        <!-- Text Input Type (LinkedIn) -->
                        <div class="page-card">
                            <label>
                                LinkedIn
                            </label>
                            <i>
                                <input name="linkedin" type="text" class="form-control" value="http://www.linkedin.com/in/{{$user->linkedin}}" placeholder="You're LinkedIn URL">
                                <br></i>
                        </div>

                        <!-- Text Input Type (Email) -->
                        <div class="page-card">
                            <label>
                                Email
                            </label><br>
                            <i><input type="text" class="form-control" value="{{ $user->email }}" name="email"><br></i>
                        </div>
                    </div>
                </div>

        </div>
        </form>
@endsection