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
    <form action="" method="post">
        <h1 class="text-center">Editing profile...</h1>
        <h4 class="text-center">Blank items will not be shown</h4>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="panel panel-default shadow-2 profile-panel">
                    <!-- Text Input Type (Name) -->
                    <div class="page-card">
                        <label>
                            Name
                        </label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="Your Name">
                    </div>
                    <!-- Textarea Input Type (Bio) -->
                    <div class="page-card">
                        <label>
                            Bio
                        </label>
                        <textarea name="bio" class="form-control" placeholder="Tell Us A Bit About Yourself">{{ $user->bio }}</textarea></div>

                    <!-- Text Input Type (Job Title) -->
                    <div class="page-card">
                        <label>
                            Job Title
                        </label>
                        <input name="job" type="text" class="form-control" placeholder="Your Job Title"
                               value="{{$user->job}}"></div>

                    <!-- Text Input Type (Phone Number) -->
                    <div class="page-card">
                        <label>
                            Phone
                        </label>
                        <input name="phone" type="text" class="form-control" placeholder="Your Phone Number"
                               value="{{$user->phone}}"></div>

                    <!-- Text Input Type (Area) -->
                    <div class="page-card">
                        <label>
                            Area
                        </label>
                        <input name="city" type="text" class="form-control" placeholder="Your City / Town"
                               value="{{$user->city}}"></div>

                    <!-- Text Input Type (Website) -->
                    <div class="page-card">
                        <label>
                            Website
                        </label>
                        <input name="website" type="text" class="form-control" placeholder="Your Website"
                               value="{{$user->website}}"></div>

                </div>
                <div class="panel panel-default shadow-2 profile-panel">
                    <div class="page-card">
                        <input type="submit" value="Save Changes" class="form-control">
                    </div>
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