<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }

    
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'in:admin,user',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Image validation
            'bio' => 'nullable|string',
        ]);

         // Handle profile picture upload
         if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imagePath = $image->store('profile_pictures', 'public'); // Store in "storage/app/public/profile_pictures"
        } else {
            $imagePath = null;
        }

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Secure password
            'role' => $request->role ?? 'user', // Default to 'user'
            'profile_picture' => $imagePath, // Store the path
            'bio' => $request->bio,
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }
}
