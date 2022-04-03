<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('hour_to_second')) {
    /**
     * Converts Minutes into Seconds.
     *
     * @param int|float $hours
     * @return int
     */
    function hour_to_second($hours): int
    {
        Assert::numeric($hours);

        return $hours * 3600;
    }
}