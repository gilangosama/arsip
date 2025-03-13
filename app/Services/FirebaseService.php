<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

class FirebaseService
{
    protected $auth;

    public function __construct()
    {
        // dd(file_exists(storage_path('app/firebase/firebase-adminsdk.json')));

        $this->auth = (new Factory)
            ->withServiceAccount(storage_path(env('app/firebase/firebase-adminsdk.json')))
            ->createAuth();
    }

    public function createUser($email, $password, $displayName)
    {
        $userProperties = [
            'email' => $email,
            'password' => $password,
            'displayName' => $displayName,
        ];

        return $this->auth->createUser($userProperties);
    }

    public function getUserByEmail($email)
    {
        return $this->auth->getUserByEmail($email);
    }
}
