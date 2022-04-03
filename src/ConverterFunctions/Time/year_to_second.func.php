<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('year_to_second')) {
    /**
     * Converts Years into Seconds. (1 year = 365 days)
     *
     * @param string|int|float  $years
     * @return int|float
     */
    function year_to_second(string|int|float $years): int|float
    {
        Assert::numeric($years);

        return $years * 31536000;
    }
}