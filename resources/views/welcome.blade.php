@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default shadow-2 profile-panel">
                <h1 class="text-center">Juliet Capulet</h1>
                <div class="bio"><div class="text-muted">About me</div>I love pottery and gardening.</div>
            </div>
        </div>
        <div class="col-md-5">
        <h1>Your virtual business card</h1>
        <h2>Get started in one click</h2>
        <form class="signupform" method="post" action="">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Your email address">
                        <span class="input-group-btn">
                            <input class="btn btn-danger" type="submit" value="Sign up">
                        </span>
            </div>
        </form>
        </div>
    </div>
@endsection