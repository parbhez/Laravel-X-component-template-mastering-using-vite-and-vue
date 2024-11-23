<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

   // Handle login submission
   public function login(Request $request)
   {
       // Validate the request
       $request->validate([
           'email' => 'required|email',
           'password' => 'required',
       ]);

       // Attempt to authenticate
       if (Auth::attempt($request->only('email', 'password'))) {
           // Regenerate session to prevent session fixation
           $request->session()->regenerate();

           return redirect()->intended('dashboard')->with('success', 'Welcome back!');
       }

       // If authentication fails
       return back()->withErrors([
           'email' => 'Invalid credentials. Please try again.',
       ])->onlyInput('email');
   }

public function logout(Request $request)
{
    // Log out the user
    // Auth::logout();
    Auth::guard('web')->logout();

    // Invalidate the user's session
    $request->session()->invalidate();

    // Regenerate the session token
    $request->session()->regenerateToken();

    // Redirect to login or home page
    return redirect('/login')->with('success', 'You have been logged out.');
}
}
