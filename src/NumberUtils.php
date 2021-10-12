<?php

namespace Acme;

class NumberUtils
{
    public static function prince_two_digits(float $price): float
    {
        return 0.01 * (int)($price * 100);
    }
}
