<?php

namespace App\Http\Controllers\AdminAuth;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;

class AdminRegisterController extends Controller
{
    public function showRegistrationForm()
    {

        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        // $this->validateRegistration($request);
        // Log::info('Attempting registration', $request->only('email'));
        // try {
        //     $admin = Admin::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     ]);

        //     Log::info('Registration successful for', $request->only('email'));

        //     // Optionally log in the user
        //     Auth::guard('admin')->login($admin);

        //     return redirect()->intended(RouteServiceProvider::ADMIN);
        //     } catch (\Exception $e) {
        //     Log::error('Registration failed for', $request->only('email'), ['error' => $e->getMessage()]);

        //     throw ValidationException::withMessages([
        //     'email' => [trans('auth.failed')],
        //     ]);
        //     }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:admins'],
            'password' => ['required','min:8', 'confirmed'],
        ]);

        $admins = new Admin([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $admins->save();
        return redirect()->route('admin.login');

    }

    // protected function validateRegistration(Request $request)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'email', 'unique:admins'],
    //         'password' => ['required', 'confirmed'],
    //     ]);
    // }
}

