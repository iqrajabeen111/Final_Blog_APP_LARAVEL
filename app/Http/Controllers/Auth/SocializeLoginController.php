<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite as FacadesSocialite;
use Illuminate\Support\Facades\Hash;

class SocializeLoginController extends Controller
{
    public function login($driver)
    {
        return FacadesSocialite::driver($driver)->redirect();
    }

    public function callbackFrom($driver)
    {
        if($driver=='google')
        {
            $type='google';

        }
        else
        {
            $type='facebook';
        }

        $user = FacadesSocialite::driver($driver)->user();
        $finduser = User::where('social_id', $user->id)->first();

        if ($finduser) {

            FacadesAuth::login($finduser);

            return redirect()->intended('userdashboard');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_id' => $user->id,
                'social_type' => $type,
                'password' => '',
                'email_verified_at' =>  now(),
                'role_id' =>  2,
            ]);
            FacadesAuth::login($newUser);
            return redirect()->intended('userdashboard');
        }
    }
}
