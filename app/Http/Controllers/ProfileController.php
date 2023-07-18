<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user)
    {
       $user=User::findOrFail($user);
    //    $profile=Profile::find($user[''])
        // return view('home',['user'=>$user]);
        return view('home',compact('user'));

    }
}
