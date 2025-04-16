<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login page
    public function showLoginPage()
    {
        return view('admin.auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Static credentials
        $staticEmail = 'admin@gmail.com';
        $staticPassword = 'admin123';

        // Check if the provided email and password match the static credentials
        if ($request->email === $staticEmail && $request->password === $staticPassword) {
            // Create a user instance with static data
            $user = new \App\Models\User;
            $user->email = $staticEmail;
            $user->name = 'Test User'; // Static name
            $user->password = $staticPassword; // Use plain password for static credentials
            Auth::login($user);

            // Regenerate the session to avoid session fixation attacks
            $request->session()->regenerate();

            // Redirect to the specified URL after successful login
            return redirect()->away('admin/dashboard');
        }

        // If authentication fails, return back with error
        return back()->withErrors([
            'email' => 'Invalid login credentials.',
            'password' => 'Invalid login credentials.',
        ]);
    }

    // Logout functionality
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session after logout
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page after logout
        return redirect()->route('login');
    }
    public function user()
    {
        return view('user');
    }
}
