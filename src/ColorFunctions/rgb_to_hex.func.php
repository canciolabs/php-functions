<?php

namespace CancioLabs\Functions\ColorFunctions;

use InvalidArgumentException;

if (!function_exists('rgb_to_hex')) {
    /**
     * Converts a RGB color into a hex decimal color.
     *
     * @param string $rgb_color
     * @return string
     */
    function rgb_to_hex(string $rgb_color): string
    {
        if (!is_rgb_color($rgb_color)) {
            throw new InvalidArgumentException(sprintf(
                'The "rgb_color" argument must be a valid color. "%s" given.',
                $rgb_color
            ));
        }

        [$r, $g, $b] = explode(',', $rgb_color);

        return sprintf("#%02x%02x%02x", (int) $r, (int) $g, (int) $b);
    }
}