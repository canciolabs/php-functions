<?php

namespace CancioLabs\Functions\StringFunctions;

if (!function_exists('replace_special_chars')) {
    /**
     * Replaces special characters of a string with regular characters.
     *
     * @param string $str
     * @return string
     */
    function replace_special_chars(string $str): string
    {
        $patterns = [
            'A' => '/Á|À|Ã|Â|Ä|Å/',
            'a' => '/á|à|ã|â|ä|å|ª/',
            'C' => '/Ç/',
            'c' => '/ç/',
            'E' => '/É|È|Ê|Ë/',
            'e' => '/é|è|ê|ë/',
            'I' => '/Í|Ì|Î|Ï/',
            'i' => '/í|ì|î|ï/',
            'N' => '/Ñ/',
            'n' => '/ñ/',
            'O' => '/Ó|Ò|Ô|Õ|Ö/',
            'o' => '/ó|ò|ô|õ|ö|º|°/',
            'U' => '/Ú|Ù|Û|Ü/',
            'u' => '/ú|ù|û|ü/',
            'Y' => '/Ý/',
            'y' => '/ý/',
        ];

        return preg_replace($patterns, array_keys($patterns), $str);
    }
}