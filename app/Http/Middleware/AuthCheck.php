<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        // Jika sudah login, redirect ke halaman utama
        if (Auth::check() && ($request->routeIs('login') || $request->routeIs('register'))) {
            return redirect()->route('homepage.home')->with('info', 'Anda sudah login.');
        }

        // Jika belum login dan ingin mengakses halaman yang membutuhkan login
        if (!Auth::check() && !$request->routeIs('login') && !$request->routeIs('register')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}
