<?php

namespace CancioLabs\Functions\RandomFunctions;

use Webmozart\Assert\Assert;

if (!function_exists('random_string')) {
    /**
     * Returns a random string.
     *
     * @param int $length
     * @param string $candidates
     * @return string
     */
    function random_string(int $length, string $candidates = CL_RANDOM_ALPHANUMERIC): string
    {
        Assert::greaterThanEq($length, 1);
        Assert::notEmpty($candidates);

        $str = '';

        for ($i = 1; $i <= $length; $i++) {
            $str .= str_shuffle($candidates)[0];
        }

        return $str;
    }
}