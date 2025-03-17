<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    protected $auth, $database;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(storage_path(config('firebase.credentials')))
            ->withDatabaseUri(config('firebase.database_url'));

        $this->auth = $factory->createAuth();
        $this->database = $factory->createDatabase();
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($request->email, $request->password);
            
            Session::put('firebaseUserId', $signInResult->firebaseUserId());
            Session::put('idToken', $signInResult->idToken());
            Session::save();
            
            Alert::toast('Login berhasil!', 'success');
            return redirect()->route('admin.news.index');
        } catch (\Throwable $e) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            try {
                $this->auth->revokeRefreshTokens(Session::get('firebaseUserId'));
                Session::forget('firebaseUserId');
                Session::forget('idToken');
                Session::save();
                
                Alert::toast('Logout berhasil!', 'success');
                return redirect()->route('login');
            } catch (\Exception $e) {
                Alert::error('Error', 'Terjadi kesalahan saat logout');
                return back();
            }
        }
        
        return redirect()->route('login');
    }
}
