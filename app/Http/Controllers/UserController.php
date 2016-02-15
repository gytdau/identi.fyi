<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Input as Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Social;

use Mail;

class UserController extends Controller
{
	
	public function verifyAccount($id){
		
		$user = User::find($id);
		$user->activated=true;
		$user->save();
		
		return redirect()->action('UserController@show', [$user->url, $user->code]);
		
	}
	
	public function RequestMail(Request $request, $name, $code){
		
		$user = User::where('url', $name)->where('code', $code)->firstOrFail();
		
		$user->generatePasscode();
		$user->active=true;
		$user->save();
		
		Mail::send("emails.editRequest", ['user'=>$user],
            function ($m) use ($user){
				
                $m->from('hello@example.com', 'Identifyi');
                $m->to($user->email)->subject("Edit Request");
				
            }
        );
		
		return redirect()->action('UserController@show', [$user->url, $user->code]);
		
	}
	
    public function show($name, $code)
    {

		$user = User::where("url", $name)->where("code", $code)->firstOrFail();
		
        return view('profile.show')->with('user', $user);
    }

    public function edit($id, $passcode)
    {
		
        $user = User::find($id);
		
        if($user->passcode != $passcode || !$user->active) {
			
            return view('errors.custom')->with('text', "This link has expired.");
			
        }

        return view('profile.edit')->with('user', $user);
    }

	public function create(Request $request)
    {

		$user = new User;

		$user->email = $request->input("email");
		
		$user->active=true;
		$user->activated=false;
		$user->generatePasscode();
		$user->generateCode();

		$user->save();

		Mail::send("emails.verifyAccount", ['user'=>$user],
            function ($m) use ($user){
				
                $m->from('hello@example.com', 'Identifyi');
                $m->to($user->email)->subject("Verify Account");
				
            }
        );
		
		return redirect()->action("UserController@edit", [$user->id, $user->passcode]);

	}

	public function store(Request $request, $id, $passcode){

		$user = User::find($id);

		if($user->passcode != $passcode) {
			return view('errors.custom')->with('text', "This link has expired.");
		}

		$linksTitles = $request->input('social_title');
		$links = $request->input('social');
		
		$linkComb = array_combine($linksTitles, $links);
		
        $user->socials()->delete();
		
		foreach($linkComb as $title => $link){
			
			if($link!=""&&$title!=""){
			
				$newLink = new Social;
				$newLink->verifyLink($link);
				$newLink->title=$title;
				$user->socials()->save($newLink);
			
			}
			
		}
		

		$user->name = $request->input('name');
		$user->bio = $request->input('bio');
		$user->city = $request->input('city');
		$user->job = $request->input('job');
		$user->phone = $request->input('phone');
		$user->website = $request->input('website');;
		
		$user->generateUrl();

		// Beginning (Profile) Image Work -->
		
		
		if($request->hasFile('profileImage')){
			
			$file = $request->file('profileImage');
			
			// Delete all present files by this user
			
			$files = glob("ProfileImages/".$user->code.".*");
				
			foreach ($files as $File) {
				
				unlink($File);
			
			}
			
			$fileName = $user->code.".".$file->getClientOriginalExtension();
			$file->move("ProfileImages", $fileName);
			
			$user->img=$fileName;
			
		}
		
		$user->active = false;
		
		$user->save();
		
		return redirect()->action("UserController@show", [$user->url, $user->code]);
	}

}
