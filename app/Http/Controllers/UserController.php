<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Social;
use Mail;

class UserController extends Controller
{

    public function show($name, $code)
    {

		$user = User::where("url", $name)->where("code", $code)->firstOrFail();
        return view('profile.show')->with('user', $user);
    }

    public function edit($id, $passcode)
    {
        $user = User::find($id);

        if($user->passcode != $passcode) {
            return view('errors.custom')->with('text', "This link has expired.");
        }

        return view('profile.edit')->with('user', $user);
    }

	public function create(Request $request)
    {

		$user = new User;

		$user->email = $request->input("email");

        Mail::send("emails.signup", [],
            function ($m) use ($user){
                $m->from('hello@example.com', 'Identifyi');
                $m->to($user->email)->subject("Welcome to Identifyi");
            }
        );

		$user->generatePasscode();
		$user->generateCode();

		$user->save();

		return redirect()->action("UserController@edit", [$user->id, $user->passcode]);

	}

	public function store(Request $request, $id, $passcode){

		$user = User::find($id);

		if($user->passcode != $passcode) {
			return view('errors.custom')->with('text', "This link has expired.");
		}

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

		return redirect()->action("UserController@show", [$user->url, $user->code]);
	}

}
