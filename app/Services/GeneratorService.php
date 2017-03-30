<?php

namespace App\Services;

class GeneratorService
{
    private const ALPHA = 'abcdefghijklmnopqrstuvwxyz';
    private const NUMERIC = '0123456789';
    private const SPECIAL = '.-+=_,!@$#*%<>[]{}';

    public function generate(int $length = 8, bool $alpha = true, bool $alphaUpper = true, bool $numeric = true, bool $special = false) : string
    {
        $chars = '';
        if ($alpha) {
            $chars .= self::ALPHA;
        }
        if ($alphaUpper) {
            $chars .= strtoupper(self::ALPHA);
        }
        if ($numeric) {
            $chars .= self::NUMERIC;
        }
        if ($special) {
            $chars .= self::SPECIAL;
        }

        $saltLength = strlen($chars);
        $password = '';
        for ($i = 0; $i < $length ; $i++) {
            $password .= substr($chars, rand(0, $saltLength - 1), 1);
        }
        $password = str_shuffle($password);

        return $password;
    }
}