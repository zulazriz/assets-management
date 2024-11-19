<?php

namespace App\Helpers;

class DateHelper
{
    static function getAllMonth(): array
    {
        return [
            [
                'number' => 1,
                'name' => 'January',
                'abbreviation' => 'Jan',
            ],
            [
                'number' => 2,
                'name' => 'February',
                'abbreviation' => 'Feb',
            ],
            [
                'number' => 3,
                'name' => 'March',
                'abbreviation' => 'Mar',
            ],
            [
                'number' => 4,
                'name' => 'April',
                'abbreviation' => 'Apr',
            ],
            [
                'number' => 5,
                'name' => 'May',
                'abbreviation' => 'May',
            ],
            [
                'number' => 6,
                'name' => 'June',
                'abbreviation' => 'Jun',
            ],
            [
                'number' => 7,
                'name' => 'July',
                'abbreviation' => 'Jul',
            ],
            [
                'number' => 8,
                'name' => 'August',
                'abbreviation' => 'Aug',
            ],
            [
                'number' => 9,
                'name' => 'September',
                'abbreviation' => 'Sep',
            ],
            [
                'number' => 10,
                'name' => 'October',
                'abbreviation' => 'Oct',
            ],
            [
                'number' => 11,
                'name' => 'November',
                'abbreviation' => 'Nov',
            ],
            [
                'number' => 12,
                'name' => 'December',
                'abbreviation' => 'Dec',
            ],
        ];
    }

    static function getYearsBasedOnCurrentYear($from_year = null, $length = 5): array
    {
        $current_year = now()->year;
        $from_year = $from_year ?? $current_year - 1;
        $years = [];

        for ($i = $from_year; $i < $current_year; $i++) {
            array_push($years, $i);
        }
        for ($j = $current_year; $j <= $current_year + $length; $j++) {
            array_push($years, $j);
        }
        return $years;
    }
}
