<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Models\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth/Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            
            $user = Auth::user();
            $role = Role::with('users:role_id')->where('id', $user->role_id)->get();

            if ($role[0]->name == 'Admin') {
                return redirect()->intended('admindashboard');
            }
            if ($role[0]->name == 'User') {
                // dd($role[0]->name);
                return redirect()->intended('userdashboard');
                
            }
        }
        
        // if unsuccessful -> redirect back
        return redirect()->back()->withErrors([
            'message', 'Login details are not valid',
        ]);
    }
    
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
