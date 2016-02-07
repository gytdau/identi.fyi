@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default shadow-2 profile-panel">
                <h1 class="text-center">Juliet Capulet</h1>
                <div class="page-card bio"><div class="text-muted">About me</div>I love pottery and gardening.</div>
                <div class="page-card email"><div class="text-muted">Email</div><a href="mailto: juliet@capulet.com">juliet@capulet.com</a></div>
                <div class="page-card twitter"><div class="text-muted">Twitter</div><a href="https://twitter.com/julietcapulet">@julietcapulet</a></div>
                <div class="page-card linkedin"><div class="text-muted">LinkedIn</div><a href="https://www.linkedin.com/in/julietcapulet">www.linkedin.com/in/julietcapulet</a></div>
            </div>
        </div>
        <div class="col-md-5">
        <h1>Your virtual business card</h1>
        <h2>Get started in one click</h2>
        <form class="signupform" method="post" action="">
            <div class="input-group">
                <input type="text" class="form-control" name="email" placeholder="Your email address">
                        <span class="input-group-btn">
                            <input class="btn btn-danger" type="submit" value="Sign up">
                        </span>
            </div><br><br>
            <div class="temporary-links">
                <p>
                    <h3>Temporary Links</h3>
                    <h4>Makes it quicker to get to the first profile</h4><br>
                    <a href="/dr-adriel-cruickshank/4NXe">/dr-adriel-cruickshank/4NXe</a><br><br>
                    <a href="/dr-adriel-cruickshank/4NXe/edit/1e8D3oVlVopOFdLs3MnD">/dr-adriel-cruickshank/4NXe/edit/1e8D3oVlVopOFdLs3MnD</a>
                </p>
            </div>
        </form>
        </div>
    </div>
@endsection