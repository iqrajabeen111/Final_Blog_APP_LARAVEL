<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   
    public function index()
    {
        $user = Auth::user();

           return view('User/UserDashboard')->with(array('username' => $user->name));
   
    }
}
