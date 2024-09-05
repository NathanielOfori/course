<?php

namespace App\Http\Controllers\StudAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class StudLoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('Student.auth.login');
    }

    // Handle the login process
    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:8',
        // ]);

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        // return $request;
        // if (Auth::attempt($request->only('email', 'password'))) {
        //     // Authentication passed...
        //     return redirect()->intended('/dashboard'); // Redirect to student's dashboard
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);

        if (Auth::guard('student')->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            // Authentication passed, redirect to dashboard
            return redirect()->route('stdashboard');
           //return "true";
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle the logout process
    public function logout()
    {
        Auth::logout();
        return redirect()->route('stud.login');
    }
}

