<?php

namespace CancioLabs\Functions\ArrayFunctions;

if (!function_exists('array_subsets_recursive')) {
    /**
     * @internal
     */
    function array_subsets_recursive(
        array $set,
        int $set_size,
        array &$subsets,
        array $subset = [],
        int $offset = 0
    ): void
    {
        for ($i = $offset; $i < $set_size; $i++) {
            $subset[] = $set[$i];

            $subsets[] = $subset;

            if ($i + 1 < $set_size) {
                array_subsets_recursive($set, $set_size, $subsets, $subset, $i + 1);
            }

            array_pop($subset);
        }
    }
}