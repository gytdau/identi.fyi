@extends('template')

@section('head')

    <title>Identifyi - Your New Business Card</title>

    <link rel="stylesheet" href="/indexstyle.css">

@endsection

@section('content')
    <div class="row">
<h1 class="text-center">Identifyi</h1>
        <div class="col-md-7 hidden-sm hidden-xs" style="height: 30vh;">
            <div class="panel panel-default shadow-2 profile-panel">
                <h1 class="text-center">Juliet Capulet</h1>
                <div class="page-card bio">
                    <div class="text-muted">About me</div>
                    I love pottery and gardening.
                </div>
                <div class="page-card email">
                    <div class="text-muted">Email</div>
                    <a href="">juliet@capulet.com</a>
                </div>
                <div class="page-card twitter">
                    <div class="text-muted">Twitter</div>
                    <a href="#">@julietcapulet</a>
                </div>
                <div class="page-card linkedin">
                    <div class="text-muted">LinkedIn</div>
                    <a href="#">www.linkedin.com/in/julietcapulet</a>
                </div>
            </div>
        </div>
        <div class="col-md-5" style="margin-top: 100px;">
                <h1>Your virtual business card</h1>
                <form class="signupform" method="post" action="">
                    <div class="input-group signup-button">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                            <span class="input-group-btn">
                                <input class="btn btn-danger" type="submit" value="Sign up">
                            </span>
                    </div>
                </form>
        </div>
        <div class="col-md-12 hidden-sm hidden-xs" style="background: linear-gradient(to bottom,  rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%); height: 100px;">

        </div>
        <div class="col-md-12" style="background-color: white;">
                <hr class="hidden-lg hidden-md">
                <h2 class="slogan text-center" style="padding-top: 20px;">All your contact information in one place</h2>
                <h4 class="small-slogan text-center">You only need one link</h4>
        </div>
    </div>
@endsection