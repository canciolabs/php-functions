<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('fahrenheit_to_kelvin')) {
    function fahrenheit_to_kelvin($fahrenheit): float
    {
        Assert::numeric($fahrenheit);

        return max(0, ($fahrenheit + 459.67) * (5 / 9));
    }
}