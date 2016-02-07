@extends('template')

@section('head')

    <title>Identifyi - Your Virtual Business Card</title>

    <link rel="stylesheet" href="/indexstyle.css">

@endsection

@section('content')
    <div class="row">
        <div>
            <h1 class="text-center">Identi.fyi</h1>
        </div>
        <div class="col-md-7">
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
        <div class="col-md-5">
            <div class="panel panel-default shadow-2 profile-panel">
                <h1>Your New Business Card</h1>
                <form class="signupform" method="post" action="">
                    <div class="input-group signup-button">
                        <input type="text" class="form-control" name="email" placeholder="Sign Up With Your Email">
                            <span class="input-group-btn">
                                <input class="btn btn-danger" type="submit" value="Sign up">
                            </span>
                    </div>
                </form>
                <br>
                <br>
                <br>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default shadow-2 profile-panel">
                <h1>How It Works</h1>
                <ol>
                    <li>Sign Up</li>
                    <li>Edit Your Information</li>
                    <li>Share Your Information</li>
                </ol>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default shadow-2 profile-panel">
                <h2 class="slogan text-center">All Your Contact Information In One Place</h2>
                <h4 class="small-slogan text-center">No More Messy Business Cards. Just One Link</h4>
            </div>
        </div>
    </div>
@endsection