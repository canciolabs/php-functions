<?php

namespace CancioLabs\Functions\ColorFunctions;

if (!function_exists('is_basic_html_color_name')) {
    function is_basic_html_color_name(string $color_name): bool
    {
        return in_array(strtolower($color_name), [
            'white',
            'silver',
            'gray',
            'black',
            'red',
            'maroon',
            'yellow',
            'olive',
            'lime',
            'green',
            'aqua',
            'teal',
            'blue',
            'navy',
            'fuchsia',
            'purple',
        ], true);
    }
}