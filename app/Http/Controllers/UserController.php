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
		$user->activated = true;
		$user->active = true;
		
		$user->updated_at = time();
		
		$user->save();
		
		return redirect()->action('UserController@edit', [$user->id, $user->passcode]);
		
	}
	
	public function sendMail($view, $subject, $user){
		
		Mail::send($view, ['user'=>$user],
            function ($m) use ($user, $subject){
				
                $m->from('hello@example.com', 'Identifyi');
                $m->to($user->email)->subject($subject);
				
            }
        );
		
	}
	
	public function RequestMail(Request $request, $name, $code){
		
		$user = User::where('url', $name)->where('code', $code)->firstOrFail();
		
		$user->generatePasscode();
		$user->active=true;
		
		$user->updated_at = time();
		
		$user->save();
		
		$this->sendMail('emails.editRequest', 'Edit Request', $user);
		
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
		
		$currentTime = time();
		$lastEdit = strtotime($user->updated_at);
		
		$expired = false;
		
		if($user->active){
			
			/*If Link Has Been Active For Move 30 Mins*/ 
			
			if($currentTime - $lastEdit > 1800){
				
				$expired = true;
				$user->active = false;
				
				$user->save();
				
			}
			
		}
		
        if($expired || $user->passcode != $passcode || !$user->active) {
			
            return view('errors.custom')->with('text', "This link has expired.");
			
        }

        return view('profile.edit')->with('user', $user);
    }

	public function create(Request $request)
    {

		$user = new User;

		$email = $request->input('email');
		
		$presentUsers = User::where('email', $email)->first();
		
		if($presentUsers!=null){
			
			return view('message', ['message'=>'Sorry, That Email Has Already Been Registered. Are You Sure You Aren\'t Trying To Take SomeOne Else\'s Account?', 'title'=>'I\'m Sorry']);
			
		}
		
		$user->email = $email;
		
		$user->active=false;
		$user->activated=false;
		$user->generatePasscode();
		$user->generateCode();

		$user->save();
		
		$this->sendMail('emails.verifyAccount', 'Verify Account', $user);
		
		return view("message", ['message'=>'To Access Your Business Card, Please Verify Your Account Through The Email We Sent You :)', 'title'=>'Verify']);

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
