<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('pages.auth.login');
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $validate = $validator->validate();
        $user = User::where('email', $validate['email'])->first();

        if (!$user) {
            // if user not found
            return back()->with([
                'toastStatus' => 'error',
                'toastMessage' => 'Invalid login credential'
            ]);
        } else if (!Hash::check($validate['password'], $user->password)) {
            // if user wrong password
            return back()->with([
                'toastStatus' => 'error',
                'toastMessage' => 'Invalid login credential'
            ]);
        } else if ($user->user_disabled_at) {
            // if user is disabled
            return back()->with([
                'toastStatus' => 'error',
                'toastMessage' => 'Account has disabled',
            ]);
        }
        // else if (!$user->email_verified_at) {
        //     // if user email not verified
        //     return back()->with([
        //         'toastStatus' => 'error',
        //         'toastMessage' => 'Email account not verified yet',
        //     ]);
        // }

        Log::info('User being authenticated:', ['user_id' => $user->id, 'email' => $user->email]);

        Auth::login($user);

        Log::info('Authenticated user ID after login:', ['user_id' => Auth::id()]);

        // $JWTtoken = $user->createToken('Cosec')->plainTextToken;
        $abilities = [$user->role];
        $JWTtoken = $user->createToken('Cosec', $abilities)->plainTextToken;

        Log::info('JWT Token created for user: ' . $user->email . ' | User ID: ' . $user->id . ' | User Role: ' . $user->role . ' | Token: ' . $JWTtoken);

        session(['JWT_token' => $JWTtoken]);

        $request->session()->regenerate();

        return redirect(route('dashboard.index.show'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('auth.login.show'));
    }
}
