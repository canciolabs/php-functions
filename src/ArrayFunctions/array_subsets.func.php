<?php

namespace CancioLabs\Functions\ArrayFunctions;

if (!function_exists('array_subsets')) {
    function array_subsets(array $set): array
    {
        $subsets = [];

        array_subsets_recursive($set, count($set), $subsets);

        return $subsets;
    }
}