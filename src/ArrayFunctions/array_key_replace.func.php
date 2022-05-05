<?php

namespace CancioLabs\Functions\ArrayFunctions;

if (!function_exists('array_key_replace')) {
    /**
     * Find and replace a key of a given array.
     *
     * @param array $arr
     * @param mixed $search
     * @param mixed $replace
     * @return array
     */
    function array_key_replace(array $arr, mixed $search, mixed $replace)
    {
        foreach ($arr as $key => $value) {
            if ($key === $search) {
                $arr[$replace] = $value;
                unset($arr[$key]);
                break;
            }
        }

        return $arr;
    }
}