<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AppController;
use Illuminate\Support\Facades\Auth;

class LogoutController extends AppController
{
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with(['error' => "Logout Successfully"]);
    }
}
