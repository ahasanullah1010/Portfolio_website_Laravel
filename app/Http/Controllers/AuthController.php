<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid email or password.');
        }

        // Login user using session
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // Show dashboard (Protected Route)
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must log in first.');
        }

        return view('home');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Logged out successfully.');
    }
}
