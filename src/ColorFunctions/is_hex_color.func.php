<?php

namespace CancioLabs\Functions\ColorFunctions;

if (!function_exists('is_hex_color')) {
    function is_hex_color(string $color): bool
    {
        return preg_match('/^#(?:[0-9a-fA-F]{3}){1,2}$/', $color) === 1;
    }
}