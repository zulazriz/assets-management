<?php

namespace App\Helpers;

class CurrencyHelper
{
    static function numberFormat(?float $number, bool $with_currency = true): ?string
    {
        if ($number !== null) {
            return ($with_currency ? '$' : '') .  number_format($number, 2, '.', ',');
        }
        return null;
    }
}
