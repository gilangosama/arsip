<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FirebaseService;
use Illuminate\Support\Facades\Auth;

class FirebaseAuthController extends Controller
{
    protected $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = $this->firebaseService->createUser($request->email, $request->password, $request->name);

        return response()->json(['message' => 'User registered successfully', 'firebase_uid' => $user->uid]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            $user = $this->firebaseService->getUserByEmail($request->email);
            return response()->json(['message' => 'Login successful', 'firebase_uid' => $user->uid]);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
