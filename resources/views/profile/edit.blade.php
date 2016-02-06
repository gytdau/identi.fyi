@extends('template')

@section('body-class')
    dark
@endsection
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default shadow-2 profile-panel">
            <h1 class="text-center">Editing Your Profile</h1>
            <h4 class="text-center">( Profile Of {{ $user->name }} )</h4>
			<form>
	<!-- Textarea Input Type -->
	            <label>
	        		Bio
	            </label>
	            <i><textarea name="bio" class="form-control">{{ $user->bio }}</textarea></i><br>
	<!-- Text Input Type -->
	            <label>
	        		Email
	            </label><br>
	            <i><input type="text" class="form-control" value="{{ $user->email }}"><br><br></i>
	            <input type="submit" value="Save Changes" class="form-control">
	        </form>
        </div>
    </div>
@endsection