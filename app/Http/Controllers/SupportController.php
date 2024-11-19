<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function showSupport()
    {
        return view('pages.support.index');
    }
}
