<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('fahrenheit_to_kelvin')) {
    /**
     * Converts Fahrenheit into Kelvin.
     *
     * @param string|int|float $fahrenheit
     * @param int $precision
     * @return float
     */
    function fahrenheit_to_kelvin(string|int|float $fahrenheit, int $precision = 2): float
    {
        Assert::numeric($fahrenheit);

        $fahrenheit = (float) $fahrenheit;
        Assert::greaterThanEq($fahrenheit, -459.67);

        return round(max(0, ($fahrenheit + 459.67) * (5 / 9)), $precision);
    }
}