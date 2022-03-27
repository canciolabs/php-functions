<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('fahrenheit_to_kelvin')) {
    /**
     * Converts Fahrenheit into Kelvin.
     *
     * @param string|int|float $fahrenheit
     * @return float
     */
    function fahrenheit_to_kelvin($fahrenheit): float
    {
        Assert::numeric($fahrenheit);

        $fahrenheit = (float) $fahrenheit;
        Assert::greaterThanEq($fahrenheit, -459.67);

        return max(0, ($fahrenheit + 459.67) * (5 / 9));
    }
}