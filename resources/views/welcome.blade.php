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
                    <a href="mailto: juliet@capulet.com">juliet@capulet.com</a>
                </div>
                <div class="page-card twitter">
                    <div class="text-muted">Twitter</div>
                    <a href="https://twitter.com/julietcapulet">@julietcapulet</a>
                </div>
                <div class="page-card linkedin">
                    <div class="text-muted">LinkedIn</div>
                    <a href="https://www.linkedin.com/in/julietcapulet">www.linkedin.com/in/julietcapulet</a>
                </div>
            </div>
        </div>
        <div class="col-md-5" style="margin-top: 100px;">
                <h1>Your New Business Card</h1>
                <form class="signupform" method="post" action="">
                    <div class="input-group signup-button">
                        <input type="text" class="form-control" name="email" placeholder="Sign Up With Your Email">
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
                <h2 class="slogan text-center" style="padding-top: 20px;">All Your Contact Information In One Place</h2>
                <h4 class="small-slogan text-center">No More Messy Business Cards. Just One Link</h4>
        </div>
    </div>
@endsection