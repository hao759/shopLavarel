<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Hash;
use Laravel\Socialite\Facades\Socialite;

// use Socialite;

class socialauthcontroller extends Controller
{
    public function githubredirect(Request $request)
    {
        return Socialite::driver('github')->stateless()->redirect();
    }
    public function githubcallaback(Request $request)
    {
        print_r($request->all());
        $userdata = Socialite::driver('github')->stateless()->user();
        dd($userdata);

        // $user = User::where('email', $userdata->email)->where('auth_type', 'github')->first();
        // if ($user) {
        //     Auth::login($user);
        //     return redirect('/dashboard');
        // } else {
        //     //do register
        //     $uuid = Str::uuid()->toString();
        //     $user = new User();
        //     $user->name = $userdata->name;
        //     $user->email = $userdata->email;
        //     $user->password = Hash::make($uuid . now());
        //     $user->auth_type = 'github';
        //     $user->save();
        //     Auth::login($user);
        //     return redirect('/dashboard');
        // }
    }
    public function googleredirect(Request $request)
    {
        return Socialite::driver('google')->stateless()->redirect();
    }
    public function googlecallaback(Request $request)
    {
        print_r($request->all());
        $userdata = Socialite::driver('google')->stateless()->user();
        dd($userdata);
    }
}