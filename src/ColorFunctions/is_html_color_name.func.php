<?php

namespace CancioLabs\Functions\ColorFunctions;

if (!function_exists('is_html_color_name')) {
    function is_html_color_name(string $color_name): bool
    {
        return in_array(strtolower($color_name), html_color_names(), true);
    }
}