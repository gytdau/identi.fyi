@extends('template')

@section('head')

<link rel="stylesheet" href="/edit.css">

@endsection

@section('body-class')
    dark
@endsection

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default shadow-2 profile-panel add-padding">
            <h1 class="text-center">Editing Your Profile</h1>
            <h4 class="text-center">( Profile Of {{ $user->name }} )</h4>
			<form action="" method="post">
	<!-- Text Input Type (Name) -->
				<label>
	        		Name
	            </label><br>
	            <i><input type="text" class="form-control" value="{{ $user->name }}" name="name"><br></i>
	<!-- Textarea Input Type (Bio) -->
	            <label>
	        		Bio
	            </label>
	            <i><textarea name="bio" class="form-control">{{ $user->bio }}</textarea></i><br>
	<!-- Text Input Type (Email) -->
	            <label>
	        		Email
	            </label><br>
	            <i><input type="text" class="form-control" value="{{ $user->email }}" name="email"><br></i>
	<!-- Text Input Type (Twitter) -->
				<label>
					Twitter
				</label>
				<i><div class="input-group">
				<span class="input-group-addon">@</span>
                <input name="twitter" type="text" class="form-control" value="{{$user->twitter}}" placeholder="You're Twitter Name">
            </div><br></i>
	<!-- Text Input Type (Facebook) -->
				<label>
					Facebook
				</label>
				<i>
                <input name="facebook" type="text" class="form-control" value = "{{$user->facebook}}" placeholder="URL To Facebook Account"><br></i>
	<!-- Text Input Type (LinkedIn) -->
				<label>
					LinkedIn
				</label>
				<i>
                <input name="linkedin" type="text" class="form-control" value = "{{$user->linkedin}}" placeholder="URL To LinkedIn Account"><br><br></i>
	<!-- Submit Input Type (Save Changes Button) -->
	            <input type="submit" value="Save Changes" class="form-control">
	        </form>
        </div>
    </div>
@endsection