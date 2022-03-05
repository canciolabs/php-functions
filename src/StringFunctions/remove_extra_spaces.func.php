<?php

namespace CancioLabs\Functions\UtilityFunctions;

if (!function_exists('remove_extra_spaces')) {
    function remove_extra_spaces(string $str): string
    {
        return preg_replace('/\s\s+/', ' ', trim($str));
    }
}