<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('month_to_second')) {
    /**
     * Converts Months into Seconds. (1 month = 30 days)
     *
     * @param string|int|float  $months
     * @return int|float
     */
    function month_to_second(string|int|float $months): int|float
    {
        Assert::numeric($months);

        return $months * 2592000;
    }
}