<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return \Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(\Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->to('/home');
    }

    public function googleRedirect()
    {
        return \Socialite::driver('google')->redirect();
    }


    public function googleCallback(SocialAccountService $service)
    {
        $user = $service->createOrGetUserGoogle(\Socialite::driver('google')->user());
        auth()->login($user);
        return redirect()->to('/home');
    }
}