<?php

namespace CancioLabs\Functions;

use Webmozart\Assert\Assert;

if (!function_exists('natural_implode')) {
    function natural_implode(array $arr, string $separator = ', ', string $conjunction = ' and '): string
    {
        Assert::allStringNotEmpty($arr);

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