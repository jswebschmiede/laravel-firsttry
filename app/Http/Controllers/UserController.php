<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $incomingData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string'
        ]);

        // Hash the password
        $incomingData['password'] = bcrypt($incomingData['password']);

        // Create the user
        $user = User::create($incomingData);

        // Login the user
        auth()->login($user);

        return redirect()->route('home');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('home');
    }

    public function login(Request $request): RedirectResponse
    {
        $incomingData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Attempt to login the user
        if (!auth()->attempt($incomingData)) {
            return redirect()->back()->withErrors([
                'email' => 'The provided credentials do not match our records.'
            ]);
        }

        // Regenerate the session
        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
