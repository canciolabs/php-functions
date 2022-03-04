<?php

namespace CancioLabs\Functions;

if (!function_exists('swap')) {
    function swap(&$a, &$b): void
    {
        $tmp = $a;
        $a = $b;
        $b = $tmp;
    }
}