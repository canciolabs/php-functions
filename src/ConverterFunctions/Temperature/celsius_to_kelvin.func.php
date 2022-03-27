<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('celsius_to_kelvin')) {
    /**
     * Converts Celsius into Kelvin.
     *
     * @param string|int|float $celsius
     * @param int $precision
     * @return float
     */
    function celsius_to_kelvin($celsius, int $precision = 2): float
    {
        Assert::numeric($celsius);

        $celsius = (float) $celsius;
        Assert::greaterThanEq($celsius, -273.15);

        return round(max(0, $celsius + 273.15), $precision);
    }
}