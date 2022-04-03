<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('hour_to_second')) {
    /**
     * Converts Hours into Seconds.
     *
     * @param string|int|float $hours
     * @return int|float
     */
    function hour_to_second(string|int|float $hours): int|float
    {
        Assert::numeric($hours);

        return $hours * 3600;
    }
}