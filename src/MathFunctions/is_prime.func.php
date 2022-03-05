<?php

namespace CancioLabs\Functions\MathFunctions;

if (!function_exists('is_prime')) {
    /**
     * Checks if the given number is a prime number.
     *
     * This function should run fine for integers less than 10.000.
     *
     * @param int $n
     * @return bool
     */
    function is_prime(int $n): bool
    {
        if ($n <= 1) {
            return false;
        }

        if ($n === 2) {
            return true;
        }

        if ($n % 2 === 0) {
            return false;
        }

        $sqrt = (int) sqrt($n);
        for ($i = 3; $i <= $sqrt; $i += 2) {
            if ($n % $i === 0) {
                return false;
            }
        }

        return true;
    }
}