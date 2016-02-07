<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function showProfile($name, $code)
    {
		
        $userFound = User::where('url', $name)->where('code', $code)->firstOrFail();
        return view('profile.show')->with('user', $userFound);
    }

    public function edit($name, $code, $passcode)
    {
        $userFound = User::where('url', $name)->where('code', $code)->firstOrFail();
        if($userFound->passcode != $passcode) {
            return view('errors.custom')->with('text', "This link has expired. Check your inbox for a new email, or try sending it again.");
        }
        return view('profile.edit')->with('user', $userFound);
    }
	public function signup(Request $request)
    {
		
        $email = $request->input('email');
		 
        $user = new User;
        $user->email = $email;
        $user->generateUrl();
        $user->generateCode();
        $user->save();
		
	}
	
	public function updateinfo(Request $request, $url, $key){
		
		$name = $request->input('name');
		$email = $request->input('email');
		$city = $request->input('city');
		$bio = $request->input('bio');
		$linkedin = $request->input('linkedin');
		$facebook = $request->input('facebook');
		$twitter = $request->input('twitter');
		
		User::where("url", $url)->where("code", $key)->update(['name'=>$name, 'email'=>$email,
		'bio'=>$bio, 'facebook'=>$facebook, 'linkedin'=>$linkedin, 'twitter'=>$twitter, 'city'=>$city]);
		
		return redirect()->action("UserController@showProfile", [$url, $key]);
		
	}
	
}
