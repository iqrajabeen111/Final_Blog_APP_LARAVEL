<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserEmailEventCreated;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon; 


class RegisterController extends Controller
{
    public function index()
    {
        # code...
        return view('Auth/register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        $token = Str::random(64);

        $SendEmail = ["id" => $check->id,"token" => $token,"email" => $request->email];
        event(new UserEmailEventCreated($SendEmail));

        return redirect("login")->withSuccess('Great! You have Successfully loggedin');


    }
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->email_verified_at) {
                // $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->email_verified_at = Carbon::now();
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect()->route('login')->with('message', $message);
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 2,
        ]);
    }
}
