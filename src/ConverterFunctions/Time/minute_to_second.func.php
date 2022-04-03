<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('minute_to_second')) {
    /**
     * Converts Minutes into Seconds.
     *
     * @param string|int|float  $minutes
     * @return int|float
     */
    function minute_to_second(string|int|float $minutes): int|float
    {
        Assert::numeric($minutes);

        return $minutes * 60;
    }
}