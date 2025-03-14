<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FirebaseAuthMiddleware
{
    protected $auth;

    public function __construct()
    {
        $this->auth = (new Factory)
            ->withServiceAccount(storage_path(config('firebase.credentials'))) // Sesuaikan path
            ->createAuth();
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
