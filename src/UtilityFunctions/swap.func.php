<?php

namespace CancioLabs\Functions\UtilityFunctions;

if (!function_exists('swap')) {
    function swap(&$a, &$b): void
    {
        $tmp = $a;
        $a = $b;
        $b = $tmp;
    }
}