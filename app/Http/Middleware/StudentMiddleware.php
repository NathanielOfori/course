<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has the 'student' role
        if (Auth::check() && Auth::user()->hasRole('student')) {
            return $next($request);
        }


        // Redirect or handle unauthorized access
        return redirect()->route('login')->withErrors('You do not have access to the student dashboard.');
    }
}

