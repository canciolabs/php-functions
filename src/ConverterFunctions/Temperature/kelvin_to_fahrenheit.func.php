<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('kelvin_to_fahrenheit')) {
    function kelvin_to_fahrenheit($kelvin): float
    {
        Assert::numeric($kelvin);

        return max(-459.67, ($kelvin * 9 / 5) - 459.67);
    }
}