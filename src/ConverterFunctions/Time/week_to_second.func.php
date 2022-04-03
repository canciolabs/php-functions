<?php

namespace CancioLabs\Functions\ConverterFunctions\Time;

use Webmozart\Assert\Assert;

if (!function_exists('week_to_second')) {
    /**
     * Converts Weeks into Seconds.
     *
     * @param int|float $weeks
     * @return int
     */
    function week_to_second($weeks)
    {
        Assert::numeric($weeks);

        return $weeks * 604800;
    }
}