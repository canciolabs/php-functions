<?php

namespace CancioLabs\Functions\ArrayFunctions;

use InvalidArgumentException;
use Webmozart\Assert\Assert;

if (!function_exists('array_most_frequent_element')) {
    /**
     * Returns the most frequent element of an array.
     * If there are more than one element with the same number of occurrences,
     * it will return an array with those elements.
     *
     * @param array $arr Array of strings, integers or both.
     * @return array|int|string|void|null
     */
    function array_most_frequent_element(array $arr)
    {
        Assert::notEmpty($arr);

        foreach ($arr as $value) {
            if (!is_int($value) && !is_string($value)) {
                throw new InvalidArgumentException(sprintf(
                    'Expected a value to contain letters, digits and integers only. "%s" given.',
                    gettype($value)
                ));
            }
        }

        $count_values = array_count_values($arr);
        arsort($count_values);

        // Get the most frequent element
        $most_frequent_element = array_key_first($count_values);
        $most_frequent_element_count = $count_values[$most_frequent_element];

        // Check if there are more elements with the same count
        $most_frequent_elements = [];
        foreach ($count_values as $element => $element_count) {
            if ($element_count < $most_frequent_element_count) {
                break;
            }

            $most_frequent_elements[] = $element;
        }

        return count($most_frequent_elements) > 1 ? $most_frequent_elements : $most_frequent_element;
    }
}