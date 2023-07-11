<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function toLogin() 
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'client' && $user->status === 0) {
                return redirect()->intended('/client');
            } elseif ($user->role === 'admin' && $user->status === 0) {
                return redirect()->intended('/admin');
            } else {
                Auth::logout();
                $request->session()->invalidate();

                return back()->withErrors([
                    'username' => 'This account is disabled by admin.',
                ]);
            }
        } else {
            if ($user->status === 1) {
                return back()->withErrors([
                    'username' => 'The provided credentials do not match our records.',
                ])->onlyInput('username');
            }
        }

        return redirect()->back();
    }

    public function logout(Request $request)
    {   
        Auth::logout();
        $request->session()->invalidate();

        return redirect('/login');
    }
}
