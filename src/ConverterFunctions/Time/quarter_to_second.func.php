<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('quarter_to_second')) {
    /**
     * Converts Quarter into Seconds. (1 quarter = year/4)
     *
     * @param string|int|float  $quarters
     * @return int|float
     */
    function quarter_to_second(string|int|float $quarters): int|float
    {
        Assert::numeric($quarters);

        return $quarters * 7884000;
    }
}