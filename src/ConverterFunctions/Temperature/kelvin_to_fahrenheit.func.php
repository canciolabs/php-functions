<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('kelvin_to_fahrenheit')) {
    /**
     * Converts Kelvin into Fahrenheit.
     *
     * @param string|int|float $kelvin
     * @return float
     */
    function kelvin_to_fahrenheit($kelvin): float
    {
        Assert::numeric($kelvin);

        $kelvin = (float) $kelvin;
        Assert::greaterThanEq($kelvin, 0.0);

        return max(-459.67, ($kelvin * 9 / 5) - 459.67);
    }
}