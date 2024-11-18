<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'first_name' => 'sometimes|required|string|max:2',
            'last_name' => 'sometimes|required|string|max:100',
            'email' => 'sometimes|required|email|max:100|unique:users,email,' . $user->id,
            'current_password' => 'sometimes|required|string',
            'new_password' => 'sometimes|required|string|confirmed|min:8',
            'new_password_confirmation' => 'sometimes|required|string|min:8',
            'profile_image' => 'sometimes|required|image|max:2048|mimes:jpeg,png,jpg|extensions:jpeg,png,jpg'
        ]);


        if ($request->filled('current_password') && !Hash::check($request->input('current_password'), $user->password)) {
            return response()->json([
                'errors' => [
                    'current_password' => 'Current password does not match.'
                ]
            ], 422);
        }

        $user->first_name = $validated['first_name'] ?? $user->first_name;
        $user->last_name = $validated['last_name'] ?? $user->last_name;
        $user->email = $validated['email'] ?? $user->email;

        if ($request->filled('new_password')) {
            $user->password = Hash::make($validated['new_password']);
        }

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully.'
        ]);
    }
}
