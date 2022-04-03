<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('month_to_second')) {
    /**
     * Converts Months into Seconds. (1 month = 30 days)
     *
     * @param int|float $months
     * @return int
     */
    function month_to_second($months)
    {
        Assert::numeric($months);

        return $months * 2592000; // 30 days
    }
}