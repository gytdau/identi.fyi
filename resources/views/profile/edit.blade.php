@extends('template')

@section('head')

    <link rel="stylesheet" href="/edit.css">

    <title>{{$user->name}} | Edit</title>
	
@endsection

@section('extra-js')

/*For the automatic appearing of media input boxes*/

$(function(){
	nummedia = ($('.list').children().length)-1;
	if(nummedia==-1){
		addmedia();
	}
	
	$("input[name='social["+nummedia+"]']").on("keydown", function(){
		
		addmedia();
		
	});

    addmedia();
	
	$('#displayableButton').on('click', function(){
		
		$('#uploadImageButton').click();
		
	});
	
});

function addmedia(){
	
	nummedia++;
	
	var element = "<div class = 'page-card'><input type = 'text' class = 'form-control' name = 'social["+nummedia+"]' placeholder='Enter Social Media URL'></div>";
	$('.list').append(element);
	
	$("input[name='social["+nummedia+"]']").on("keydown", function(){
		
		addmedia();
		
	});
	
	$("input[name='social["+(nummedia-1)+"]']").unbind();
	
}

@endsection

@section('body-class')
    dark
@endsection

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        <h1 class="text-center">You are editing your profile</h1>
        <h4 class="text-center">Anything blank won't be shown</h4>
        <div class="col-md-12">
            <div class="panel panel-default shadow-2 profile-panel">
                <input type="submit" value="Save profile" class="btn btn-success">
            </div>
            <div class="col-md-6">
                <div class="panel panel-default shadow-2 profile-panel">
                    <!-- Text Input Type (Name) -->
                    <div class="page-card">
                        <label>
                            Name
                            <span class="text-muted">(Required)</span>
                        </label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="Name, username, whichever you prefer">
                    </div>
					
					<div class="page-card">
						<!-- File Input Type (Profile Picture) -->
						<label>Displayable Picture</label>
						
						<!-- In order to add CSS, must use two inputs -->
						
						<input type="file" id = "uploadImageButton" name="profileImage" style = "visibility:hidden">
						<input type="button" id="displayableButton" value="Upload Profile Picture" class = "btn btn-success">
					
					</div>
					
                    <!-- Textarea Input Type (Bio) -->
                    <div class="page-card">
                        <label>
                            Bio
                        </label>
                        <textarea name="bio" class="form-control" placeholder="Tell us a bit about yourself">{{ $user->bio }}</textarea></div>
						
					<!-- Textarea Input Type (Bio) -->
                    <div class="page-card">
                        <label>
                            Experience
                        </label>
                        <textarea name="experience" class="form-control" placeholder="Write about your key experience in your field of work">{{ $user->experience }}</textarea></div>
					
                    <!-- Text Input Type (Job Title) -->
                    <div class="page-card">
                        <label>
                            Job Title
                        </label>
                        <input name="job" type="text" class="form-control" placeholder="Your current job title"
                               value="{{$user->job}}"></div>

                    <!-- Text Input Type (Phone Number) -->
                    <div class="page-card">
                        <label>
                            Phone
                        </label>
                        <input name="phone" type="text" class="form-control" placeholder="Make sure this is a number you want to be contacted on"
                               value="{{$user->phone}}"></div>

                    <!-- Text Input Type (Area) -->
                    <div class="page-card">
                        <label>
                            Area
                        </label>
                        <input name="city" type="text" class="form-control" placeholder="Your general area: city, town, or village name"
                               value="{{$user->city}}"></div>

                    <!-- Text Input Type (Website) -->
                    <div class="page-card">
                        <label>
                            Website
                        </label>
                        <input name="website" type="text" class="form-control" placeholder="Your website, such as a blog or portfolio"
                               value="{{$user->website}}"></div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default shadow-2 profile-panel">

				<div class="page-card">
				
					<label>Social Media</label>
					
				</div>
				
					<div class = "list">
						@foreach($user->socials as $key => $link)
                            <div class="page-card">
                                <input type='text' class='form-control' name='social[{{ $key }}]' placeholder='Enter Social Media Title' name="social_title"><br>
                                <input type='text' class='form-control' name='social[{{ $key }}]' placeholder='Enter Social Media URL' value='{{ $link->link }}'><br>
                            </div>
                        @endforeach

						
					</div>
					
                </div>
				
            </div>

        </div>
    </form>
@endsection