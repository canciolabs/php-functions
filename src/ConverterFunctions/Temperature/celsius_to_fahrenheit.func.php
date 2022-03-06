<?php

namespace CancioLabs\Functions\ConverterFunctions\Temperature;

use Webmozart\Assert\Assert;

if (!function_exists('celsius_to_fahrenheit')) {
    function celsius_to_fahrenheit($celsius): float
    {
        Assert::numeric($celsius);

        return max(-459.67, ($celsius * 1.8) + 32);
    }
}