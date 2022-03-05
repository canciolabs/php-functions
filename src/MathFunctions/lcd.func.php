<?php

namespace CancioLabs\Functions\MathFunctions;

if (!function_exists('lcd')) {
    /**
     * Alias for lowest_common_denominator
     */
    function lcd(int $a, int $b): int
    {
        return lowest_common_denominator($a, $b);
    }
}