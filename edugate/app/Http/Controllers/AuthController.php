<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // app/Http/Controllers/AuthController.php
// public function login(Request $request)
// {
//     // Fixed username and password
//     $fixedUsername = 'admin';
//     $fixedPassword = 'admin@123';

//     // Get the input values
//     $username = $request->input('username');
//     $password = $request->input('password');

//     // Check if the credentials match
//     if ($username === $fixedUsername && $password === $fixedPassword) {
//         // Authentication successful, navigate to home page
//         return redirect()->route('home')->with('success', 'Login successful!');
//     } else {
//         // Authentication failed, return to login page with error message
//         return redirect()->route('login')->with('error', 'Invalid username or password.');
//     }
// }
    public function register()
    {
        return view('auth/register');
    }
  
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
  
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin'
        ]);
  
        return redirect()->route('login');
    }
  
    public function login()
    {
        return view('login');
    }
  
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
  
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
  
        $request->session()->regenerate();
  
        return redirect()->route('dashboard');
    }
  
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('login');
    }
 
    public function profile()
    {
        return view('profile');
    }
    public function user()
    {
        return view('user');
    }

}
