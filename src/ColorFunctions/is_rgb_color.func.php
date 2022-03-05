<?php

namespace CancioLabs\Functions\ColorFunctions;

if (!function_exists('is_rgb_color')) {
    function is_rgb_color(string $color): bool
    {
        $component_pattern = sprintf(
            '%s|%s|%s',
            '0{0,2}[0-9]', // 0 to 9 (including leading zeros)
            '0{0,1}[1-9][0-9]', // 10 to 99 (including leading zeros)
            '1[0-9]{2}|2[0-4][0-9]|25[0-5]' // 100 to 255
        );

        $rgb_pattern = sprintf(
            '/^(%s),(%s),(%s)$/',
            $component_pattern,
            $component_pattern,
            $component_pattern
        );

        return preg_match($rgb_pattern, $color) === 1;
    }
}