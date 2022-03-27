<?php

namespace CancioLabs\Functions\ColorFunctions;

if (!function_exists('html_color_name_to_rgb')) {
    /**
     * Converts an HTML color name into RGB.
     *
     * @param string $color_name
     * @return string
     */
    function html_color_name_to_rgb(string $color_name): string
    {
        return hex_to_rgb(html_color_name_to_hex($color_name));
    }
}