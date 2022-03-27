<?php

namespace CancioLabs\Functions\UtilityFunctions;

if (!function_exists('swap')) {
    /**
     * Swap two variables.
     *
     * @param mixed $a
     * @param mixed $b
     * @return void
     */
    function swap(mixed &$a, mixed &$b): void
    {
        $tmp = $a;
        $a = $b;
        $b = $tmp;
    }
}