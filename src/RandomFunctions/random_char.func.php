<?php

namespace CancioLabs\Functions\RandomFunctions;

use Webmozart\Assert\Assert;

if (!function_exists('random_char')) {
    function random_char(string $candidates = CL_RANDOM_ALPHANUMERIC): string
    {
        Assert::notEmpty($candidates);

        return str_shuffle($candidates)[0];
    }
}