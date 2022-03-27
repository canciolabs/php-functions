<?php

namespace CancioLabs\Functions\MathFunctions;

if (!function_exists('greatest_common_divisor')) {
    /**
     * Calculates the greatest common divisor between two integers.
     *
     * @param int $a
     * @param int $b
     * @return int
     */
    function greatest_common_divisor(int $a, int $b): int
    {
        return ($b === 0) ? $a : greatest_common_divisor($b, $a % $b);
    }
}