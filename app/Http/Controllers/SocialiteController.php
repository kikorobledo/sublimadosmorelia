<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {

        try {
            $userSocialite = Socialite::driver('facebook')->user();

            $user = User::where('facebook', $userSocialite->id)->first();

            if($user){

                Auth::login($user);

                return redirect()->route('home');

            }else{

                $newUser = User::Create([
                    'name' => $userSocialite->getName(),
                    'email' => $userSocialite->getEmail(),
                    'profile_photo_path' => $userSocialite->getAvatar(),
                    'status' => 'activo',
                    'facebook' => $userSocialite->id,
                    'password' => Hash::make($userSocialite->getEmail()),
                ]);

                Auth::login($newUser);

                return redirect()->route('home');

            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
