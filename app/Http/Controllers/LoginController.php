<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $this->mergeRememberMe($request);

        $credentials = $this->validateCredentials($request);
        if($this->attemptLogin($credentials))
        {
            $this->regenerateSession($request);
            return redirect()->intended('movies');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('movies.index');
    }

    private function mergeRememberMe(Request $request)
    {
        $request->merge(['remember_me' => $request->has('remember_me')]);
    }

    private function validateCredentials(Request $request)
    {
        return $request->validate([
            'email'       => "required|email|max:50",
            'password'    => "required|max:50|min:8",
            'remember_me' => "bool",
        ]);
    }

    private function attemptLogin(array $credentials): bool
    {
        return Auth::attempt(
            [
                'email'    => $credentials[ 'email' ],
                'password' => $credentials[ 'password' ],
            ],
            $credentials[ 'remember_me' ]
        );
    }

    private function regenerateSession(Request $request)
    {
        $request->session()->regenerate();
    }
}
