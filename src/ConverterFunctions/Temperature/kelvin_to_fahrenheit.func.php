<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('kelvin_to_fahrenheit')) {
    /**
     * Converts Kelvin into Fahrenheit.
     *
     * @param string|int|float $kelvin
     * @param int $precision
     * @return float
     */
    function kelvin_to_fahrenheit($kelvin, int $precision = 2): float
    {
        Assert::numeric($kelvin);

        $kelvin = (float) $kelvin;
        Assert::greaterThanEq($kelvin, 0.0);

        return round(max(-459.67, ($kelvin * 9 / 5) - 459.67), $precision);
    }
}