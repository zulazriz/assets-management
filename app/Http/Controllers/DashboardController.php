<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function showDashboard()
    {
        $user = Auth::user();
        $userList = User::where('role', 'User')->get();
        $laptopList = Assets::where('type', 'Laptop')->get();
        $desktopList = Assets::where('type', 'Desktop')->get();

        return view('pages.dashboard.index', compact('user', 'userList', 'laptopList', 'desktopList'));
    }

    public function getDetailsDashboard()
    {
        $data = [
            'totalAssets' => Assets::count(),
            'totalLaptops' => Assets::where('type', 'Laptop')->count(),
            'totalDesktops' => Assets::where('type', 'Desktop')->count(),
            'totalUsers' => User::where('role', 'User')->count(),
        ];

        return response()->json($data);
    }
}
