<?php

namespace CancioLabs\Functions\ColorFunctions;

if (!function_exists('basic_html_color_names')) {
    /**
     * Returns a list of the basic color names.
     *
     * @return string[]
     * @link https://www.w3.org/wiki/CSS/Properties/color/keywords#Basic_Colors
     */
    function basic_html_color_names(): array
    {
        return [
            'aqua',
            'black',
            'blue',
            'fuchsia',
            'gray',
            'green',
            'lime',
            'maroon',
            'navy',
            'olive',
            'purple',
            'red',
            'silver',
            'teal',
            'white',
            'yellow',
        ];
    }
}