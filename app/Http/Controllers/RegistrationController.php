<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate
        $validated = $request->validate([
            'first_name' => 'required|string|max:40',
            'last_name'  => 'required|string|max:40',
            'email'      => 'required|email|max:100|unique:users',
            'password'   => 'required|string|min:8|confirmed',
        ]);

        // Create
        $user = User::create([
            'first_name' => $validated[ 'first_name' ],
            'last_name'  => $validated[ 'last_name' ],
            'email'      => $validated[ 'email' ],
            'password'   => $validated[ 'password' ]
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('movies.index');
    }
}
