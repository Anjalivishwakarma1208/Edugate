<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import the User model

class UserController extends Controller
{
    // Show user login page
    public function showLoginPage()
    {
        return view('user.user'); // user.blade.php
    }

    // Handle user login request
    public function login(Request $request)
{
    // Validate the request
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to authenticate the user
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Redirect to the home page (http://127.0.0.1:8000/)
        return redirect('/');
    }

    // If authentication fails, return back with error
    return back()->withErrors([
        'email' => 'Invalid login credentials.',
    ]);
}

    // Show user dashboard with dynamic content
    public function dashboard()
    {
        // Retrieve the logged-in user
        $user = Auth::user();
        
        // Pass user data to the view
        return view('user.user', ['user' => $user]); // Ensure view name matches
    }

    // Show registration page
    public function showRegisterPage()
    {
        return view('user.register'); // Ensure this view exists
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // Ensure passwords match
        ]);

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user.register')->with('success', 'Registration successful!');
    }
}
