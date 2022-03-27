<?php

namespace CancioLabs\Functions\StringFunctions;

if (!function_exists('remove_extra_spaces')) {
    /**
     * Removes extra spaces from a string.
     *
     * @param string $str
     * @return string
     */
    function remove_extra_spaces(string $str): string
    {
        return preg_replace('/\s\s+/', ' ', trim($str));
    }
}