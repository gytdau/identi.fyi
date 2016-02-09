<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Social;


class UserController extends Controller
{
	
    public function showProfile($name, $code)
    {
		
		$userFound = User::where("url", $name)->where("code", $code)->firstOrFail();
        return view('profile.show')->with('user', $userFound);
    }

    public function edit($id, $passcode)
    {
        $userFound = User::find($id);

        if($userFound->passcode != $passcode) {
            return view('errors.custom')->with('text', $passcode . " " . $userFound->passcode );
        }

        return view('profile.edit')->with('user', $userFound);
    }
	
	public function signup(Request $request)
    {
        
		$user = new User;
		
		$user->email = $request->input("email");
		$user->generatePasscode();
		$user->generateCode();
		
		$user->save();
		
		return redirect()->action("UserController@edit", [$user->id, $user->passcode]);
		
	}
	
	public function updateinfo(Request $request, $id, $key){
		
		$user = User::find($id);

		$links = $request->input('social');

        $user->socials()->delete();

		foreach($links as $link) {
            if($link != "") {
                $newLink = new Social;
                $newLink->verifyLink($link);
                $newLink->definetitle();
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
		
		$user->save();

		return redirect()->action("UserController@showProfile", [$user->url, $user->code]);
	}
	
}
