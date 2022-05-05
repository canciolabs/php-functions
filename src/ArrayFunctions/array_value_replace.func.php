<?php

namespace CancioLabs\Functions\ArrayFunctions;

if (!function_exists('array_value_replace')) {
    /**
     * Find and replace all values of a given array.
     *
     * @param array $arr
     * @param mixed $search
     * @param mixed $replace
     * @return array
     */
    function array_value_replace(array $arr, mixed $search, mixed $replace)
    {
        foreach ($arr as $key => $value) {
            if ($value === $search) {
                $arr[$key] = $replace;
            }
        }

        return $arr;
    }
}