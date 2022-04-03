<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('year_to_second')) {
    /**
     * Converts Years into Seconds. (1 year = 365 days)
     *
     * @param int|float $years
     * @return int
     */
    function year_to_second($years)
    {
        Assert::numeric($years);

        return $years * 31536000; // 365 days
    }
}