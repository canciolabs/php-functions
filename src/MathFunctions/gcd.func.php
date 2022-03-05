<?php

namespace CancioLabs\Functions\MathFunctions;

if (!function_exists('gcd')) {
    /**
     * Alias for greatest_common_divisor
     */
    function gcd(int $a, int $b): int
    {
        return greatest_common_divisor($a, $b);
    }
}