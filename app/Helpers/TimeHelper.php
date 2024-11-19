<?php

namespace App\Helpers;

class TimeHelper
{
    static function getTimeAgo(int $from_time, int $to_time): ?string
    {
        $time_difference = $from_time - $to_time;

        if ($time_difference < 1) {
            return 'less than 1 second ago';
        }
        $condition = array(
            12 * 30 * 24 * 60 * 60 =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $time_difference / $secs;

            if ($d >= 1) {
                $t = round($d);
                return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
            }
        }
    }
}
