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
    public function show()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }

        Log::info("Register company by admin");

        // $user = User::create([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('password')),
        // ]);

        // Auth::login($user);

        // return redirect()->route('dashboard.index.show')->with([
        //     'toastStatus' => 'success',
        //     'toastMessage' => 'Registration successful. Welcome!'
        // ]);
    }
}
