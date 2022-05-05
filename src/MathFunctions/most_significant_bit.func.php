<?php

namespace CancioLabs\Functions\MathFunctions;

use Webmozart\Assert\Assert;

if (!function_exists('most_significant_bit')) {
    /**
     * Returns the exponent of the most significant bit of a given integer.
     *
     * @param int $n
     * @return int
     */
    function most_significant_bit(int $n): int
    {
        Assert::greaterThanEq($n, 0);

        if ($n === 0) {
            return 0;
        }

        return 1 << most_significant_bit_exponent($n);
    }
}