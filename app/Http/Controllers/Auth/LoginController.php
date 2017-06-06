<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /**
     * Redirect the user to the Linkedin authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Obtain the user information from Linkedin.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('linkedin')->user();
        // OAuth Two Providers
        $token = $user->token;
        $refreshToken = $user->refreshToken; // not always provided
        $expiresIn = $user->expiresIn;

        // $user->token;
        // 
        // All Providers
        $user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();
        dd($user);
    }
}
