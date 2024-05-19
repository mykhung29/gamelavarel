<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();
            echo $finduser;
            if ($finduser) {

                Session::put('name', $finduser->name);
                Session::put('id', $finduser->id);

                Auth::login($finduser);

                return redirect()->intended('/');

            } else {
                $randomString = Str::random(10);
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'user' => $user->email,
                    'password' => bcrypt('123456789')
                ]);
                Session::put('name', $newUser->name);
                Session::put('id', $newUser->id);

                Auth::login($newUser);

                return redirect()->intended('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}

