<?php

namespace CancioLabs\Functions\MathFunctions;

if (!function_exists('lowest_common_denominator')) {
    /**
     * Calculates the lowest common denominator between two integers.
     *
     * @param int $a
     * @param int $b
     * @return int
     */
    function lowest_common_denominator(int $a, int $b): int
    {
        if ($a === 0 || $b === 0) {
            return 1;
        }
        return ($a * $b) / gcd($a, $b);
    }
}