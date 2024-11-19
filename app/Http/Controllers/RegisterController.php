<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('pages.auth.register');
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('email')) {
                return back()->with([
                    'toastStatus' => 'error',
                    'toastMessage' => 'The email address is already registered. Please use another email.',
                    'toastTimeout' => 1000,
                ])->withInput();
            }
        }

        try {
            // Create the user
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => 'user',
                'email_verified_at' => now(),
            ]);

            return redirect()->route('auth.login.show')->with([
                'toastStatus' => 'success',
                'toastMessage' => 'Registration successful. Please login to continue.',
                'toastTimeout' => 1000,
            ]);
        } catch (\Exception $e) {
            Log::error('Registration error', ['error' => $e->getMessage()]);
            return back()->with([
                'toastStatus' => 'error',
                'toastMessage' => 'An unexpected error occurred. Please try again.',
                'toastTimeout' => 1000,
            ])->withInput();
        }
    }
}
