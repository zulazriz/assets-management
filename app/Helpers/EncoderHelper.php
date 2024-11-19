<?php

namespace App\Helpers;

class EncoderHelper
{
    static function encode(mixed $data): string
    {
        return urlencode(base64_encode($data));
    }

    static function decode(string $data): string
    {
        return base64_decode(urldecode($data));
    }
}
