<?php

namespace CancioLabs\Functions\ColorFunctions;

if (!function_exists('is_html_color_name')) {
    /**
     * Checks if a color name is a valid HTML color name.
     *
     * @param string $color_name
     * @return bool
     */
    function is_html_color_name(string $color_name): bool
    {
        return in_array(strtolower($color_name), html_color_names(), true);
    }
}