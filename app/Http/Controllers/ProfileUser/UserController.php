<?php

namespace App\Http\Controllers\ProfileUser;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function showProfile()
    {
        $userDetails = User::where('id', auth()->user()->id)->first();

        if ($userDetails && $userDetails->created_at) {
            $userDetails->formatted_created_at = Carbon::parse($userDetails->created_at)
                ->format('d F Y h:i A');
        }

        // Log::info(json_encode($userDetails, JSON_PRETTY_PRINT));
        return view('pages.profile-user.index', compact('userDetails'));
    }

    public function updateProfile(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
                'password' => 'nullable|string',
            ]);

            $user = auth()->user();

            $user->name = $request->input('name');
            $user->email = $request->input('email');

            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();

            return redirect()->back()->with([
                'toastStatus' => 'success',
                'toastMessage' => 'Profile updated successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating profile: ' . $e->getMessage());

            return redirect()->back()->with([
                'toastStatus' => 'error',
                'toastMessage' => 'Failed to update profile. Please try again later.',
            ]);
        }
    }
}
