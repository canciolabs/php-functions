<?php

namespace CancioLabs\Functions\ColorFunctions;

if (!function_exists('rgb_to_html_color_name')) {
    function rgb_to_html_color_name(string $rgb_color): string
    {
        return hex_to_html_color_name(rgb_to_hex($rgb_color));
    }
}