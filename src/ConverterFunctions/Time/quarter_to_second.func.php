<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('quarter_to_second')) {
    /**
     * Converts Quarter into Seconds.
     *
     * @param int|float $quarters
     * @return int
     */
    function quarter_to_second($quarters)
    {
        Assert::numeric($quarters);

        return $quarters * 10368000;
    }
}