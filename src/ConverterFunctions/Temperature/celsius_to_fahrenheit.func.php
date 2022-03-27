<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('celsius_to_fahrenheit')) {
    /**
     * Converts Celsius into Fahrenheit.
     *
     * @param string|int|float $celsius
     * @param int $precision
     * @return float
     */
    function celsius_to_fahrenheit(string|int|float $celsius, int $precision = 2): float
    {
        Assert::numeric($celsius);

        $celsius = (float) $celsius;
        Assert::greaterThanEq($celsius, -273.15);

        return round(max(-459.67, ($celsius * 1.8) + 32), $precision);
    }
}