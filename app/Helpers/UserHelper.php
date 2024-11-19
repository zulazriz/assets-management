<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class UserHelper
{
    static function isAdmin()
    {
        return @Auth::user()->role == 'super_admin';
    }
    static function isUser()
    {
        return @Auth::user()->role == 'user';
    }
    static function getDefaultProfileImage()
    {
        return url('/assets/img/default-user.jpg');
    }
}
