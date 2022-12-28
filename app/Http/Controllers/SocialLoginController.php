<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Http\Request;

class SocialLoginController extends Controller
{
    public function redirect($provider){
        // dd('uer');
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider){
        dd("user");
        $user=Socialite::driver($provider)->user();
    }
}
