<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('kelvin_to_celsius')) {
    /**
     * Converts Kelvin into Celsius.
     *
     * @param string|int|float $kelvin
     * @param int $precision
     * @return float
     */
    function kelvin_to_celsius(string|int|float $kelvin, int $precision = 2): float
    {
        Assert::numeric($kelvin);

        $kelvin = (float) $kelvin;
        Assert::greaterThanEq($kelvin, 0.0);

        return round(max(-273.15, $kelvin - 273.15), $precision);
    }
}