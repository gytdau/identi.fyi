@extends('template')

@section('head')

<link rel="stylesheet" href="/edit.css">

<title>{{$user->name}} | Get Started</title>

@endsection

@section('body-class')
    dark
@endsection

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default shadow-2 profile-panel add-padding">
		<form method = "post" action="">
			<label>
					Name
				</label>
				<i>
                <input name="name" type="text" class="form-control" placeholder="Enter Your Full Name In Here"><br><br></i>
	<!-- Submit Input Type (Save Changes Button) -->
	            <input type="submit" value="Proceed" class="form-control">
			
        </div>
    </div>
@endsection