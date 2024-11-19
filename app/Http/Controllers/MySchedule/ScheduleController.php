<?php

namespace App\Http\Controllers\MySchedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function showMySchedule()
    {
        return view('pages.my-schedule.index');
    }
}
