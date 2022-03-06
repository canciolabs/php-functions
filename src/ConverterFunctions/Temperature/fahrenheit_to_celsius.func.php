<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('fahrenheit_to_celsius')) {
    function fahrenheit_to_celsius($fahrenheit): float
    {
        Assert::numeric($fahrenheit);

        return max(-273.15, ($fahrenheit - 32) / 1.8);
    }
}