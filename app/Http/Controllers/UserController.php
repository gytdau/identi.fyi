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
}
