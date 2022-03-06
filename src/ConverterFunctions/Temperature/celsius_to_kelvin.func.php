<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('celsius_to_kelvin')) {
    function celsius_to_kelvin($celsius): float
    {
        Assert::numeric($celsius);

        $celsius = (float) $celsius;
        Assert::greaterThanEq($celsius, -273.15);

        return max(0, $celsius + 273.15);
    }
}