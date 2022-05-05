<?php

namespace CancioLabs\Functions\MathFunctions;

use Webmozart\Assert\Assert;

if (!function_exists('most_significant_bit_exponent')) {
    /**
     * Returns the exponent of the most significant bit of a given integer.
     *
     * @param int $n
     * @return int
     */
    function most_significant_bit_exponent(int $n): int
    {
        Assert::greaterThanEq($n, 0);

        $i = 0;
        $m = (int) ($n / 2);
        while ($m !== 0) {
            $m = (int) ($m / 2);
            $i++;
        }

        return $i;
    }
}