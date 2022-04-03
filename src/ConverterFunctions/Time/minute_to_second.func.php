<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('minute_to_second')) {
    /**
     * Converts Minutes into Seconds.
     *
     * @param int|float $minutes
     * @return int
     */
    function minute_to_second($minutes): int
    {
        Assert::numeric($minutes);

        return $minutes * 60;
    }
}