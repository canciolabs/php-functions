<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('kelvin_to_celsius')) {
    function kelvin_to_celsius($kelvin): float
    {
        Assert::numeric($kelvin);

        return max(-273.15, $kelvin - 273.15);
    }
}