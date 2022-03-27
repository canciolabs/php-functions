<?php

namespace CancioLabs\Functions\StringFunctions;

if (!function_exists('is_palindrome')) {
    /**
     * Checks if a string is a palindrome.
     *
     * @param string $str
     * @return bool
     */
    function is_palindrome(string $str): bool
    {
        $i = 0;
        $j = strlen($str)-1;

        while ($i < $j) {
            if ($str[$i] !== $str[$j]) {
                return false;
            }

            $i++;
            $j--;
        }

        return true;
    }
}