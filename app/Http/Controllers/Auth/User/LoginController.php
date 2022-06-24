<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:6,1')->only('login');
    }

    public function form()
    {
        if (Auth::guard('user')->check()) {
            return redirect(route('voterlist'));
        }
        $title = "Login - Daftar Pemilih";
        return view('user.auth', compact('title'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = ['username' => $request->username, 'password' => $request->password];

        if (Auth::guard('user')->attempt($credentials))
            return redirect()->route('voterlist');

        return redirect()->route('login.form')->with(['error' => "Passwords and usernames don't match"]);
    }
}
