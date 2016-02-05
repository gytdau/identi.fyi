<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function showProfile($name, $code) {
		
        $userFound = User::where('url', $name)->where('code', $code)->firstOrFail();
        //return response()->json($userFound);
        return view('showProfile')->with('user', $userFound);
    }
	
	public function signup(Request $request){
		
		 $email = $request->input('email');
		 $name = $request->input('name');
		 
		 $user = new User;
            $user->email = $email;
			$user->name = $name;
            $user->generateUrl();
            $user->generateCode();
            $user->save();
		
	}
	
}
