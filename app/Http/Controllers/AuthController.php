<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class AuthController extends Controller
{
    public function socialLogin($provider) {
        $user = Socialite::driver($provider)->stateless()->user();
        return response()->json($user);
    }
}
