<?php

namespace CancioLabs\Functions\ColorFunctions;

if (!function_exists('is_hex_color')) {
    /**
     * Checks if a color is a valid hex decimal color.
     *
     * @param string $color
     * @return bool
     */
    function is_hex_color(string $color): bool
    {
        return preg_match('/^#(?:[0-9a-fA-F]{3}){1,2}$/', $color) === 1;
    }
}