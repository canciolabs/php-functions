<?php

namespace CancioLabs\Functions\ColorFunctions;

if (!function_exists('html_color_name_to_rgb')) {
    function html_color_name_to_rgb(string $color_name): string
    {
        return hex_to_rgb(html_color_name_to_hex($color_name));
    }
}