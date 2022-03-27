<?php

namespace CancioLabs\Functions\ColorFunctions;

use InvalidArgumentException;

if (!function_exists('hex_to_rgb')) {
    /**
     * Converts a hex decimal color into RGB.
     *
     * @param string $hex_color
     * @return string
     */
    function hex_to_rgb(string $hex_color): string
    {
        if (!is_hex_color($hex_color)) {
            throw new InvalidArgumentException(sprintf(
                'The "hex_color" argument must be a valid color. "%s" given.',
                $hex_color
            ));
        }

        $is_short_hex_color = strlen($hex_color) === 4;

        if ($is_short_hex_color) {
            $r = hexdec($hex_color[1] . $hex_color[1]);
            $g = hexdec($hex_color[2] . $hex_color[2]);
            $b = hexdec($hex_color[3] . $hex_color[3]);
        } else {
            $r = hexdec(substr($hex_color, 1, 2));
            $g = hexdec(substr($hex_color, 3, 2));
            $b = hexdec(substr($hex_color, 5, 2));
        }

        return sprintf('%s,%s,%s', $r, $g, $b);
    }
}