<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:user');

        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('user')->user();
            return $next($request);
        });
    }
}
