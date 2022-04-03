<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('week_to_second')) {
    /**
     * Converts Weeks into Seconds. (1 week = 7 days)
     *
     * @param string|int|float  $weeks
     * @return int|float
     */
    function week_to_second(string|int|float $weeks): int|float
    {
        Assert::numeric($weeks);

        return $weeks * 604800;
    }
}