<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('fahrenheit_to_celsius')) {
    /**
     * Converts Fahrenheit into Celsius.
     *
     * @param string|int|float $fahrenheit
     * @param int $precision
     * @return float
     */
    function fahrenheit_to_celsius($fahrenheit, int $precision = 2): float
    {
        Assert::numeric($fahrenheit);

        $fahrenheit = (float) $fahrenheit;
        Assert::greaterThanEq($fahrenheit, -459.67);

        return round(max(-273.15, ($fahrenheit - 32) / 1.8), $precision);
    }
}