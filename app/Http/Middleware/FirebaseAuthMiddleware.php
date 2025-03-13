<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FirebaseAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('firebase_user')) {
            return redirect()->route('login')->withErrors(['error' => 'Silakan login terlebih dahulu!']);
        }

        return $next($request);
    }
}
