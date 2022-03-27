<?php

namespace CancioLabs\Functions\ArrayFunctions;

use Webmozart\Assert\Assert;

if (!function_exists('natural_implode')) {
    /**
     * Returns a string which is the concatenation of the elements of an array.
     *
     * @param string[] $arr
     * @param string $separator
     * @param string $conjunction
     * @return string
     */
    function natural_implode(array $arr, string $separator = ', ', string $conjunction = ' and '): string
    {
        Assert::allString($arr);

        $arr_size = count($arr);

        if ($arr_size > 1) {
            $last_element = array_pop($arr);

            return sprintf('%s%s%s', implode($separator, $arr), $conjunction, $last_element);
        }

        if ($arr_size === 1) {
            return implode('', $arr);
        }

        return '';
    }
}