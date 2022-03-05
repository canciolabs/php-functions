<?php

namespace CancioLabs\Functions\MathFunctions;

if (!function_exists('lowest_common_denominator')) {
    function lowest_common_denominator(int $a, int $b): int
    {
        if ($a === 0 || $b === 0) {
            return 1;
        }
        return ($a * $b) / gcd($a, $b);
    }
}