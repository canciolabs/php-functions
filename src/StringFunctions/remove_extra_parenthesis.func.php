<?php

namespace CancioLabs\Functions\StringFunctions;

if (!function_exists('remove_extra_parenthesis')) {
    function remove_extra_parenthesis(string $expression): string
    {
        if ($expression === '') {
            return '';
        }

        $length = strlen($expression);

        // Find sequence of open parenthesis
        $i = $first = strpos($expression, '(');
        if ($i === false) {
            return $expression;
        }
        while ($i + 1 < $length && $expression[$i + 1] === '(') {
            $i++;
        }

        // Find sequence of close parenthesis
        $j = $last = strpos(substr($expression, $i + 1), ')') + $i + 1;
        if ($j === false) {
            return $expression;
        }
        while ($last + 1 < $length && $expression[$last + 1] === ')') {
            $last++;
        }

        // Number of parenthesis that we should remove
        $nb_parenthesis = min($i - $first, $last - $j);
        if ($nb_parenthesis === 0) {
            return $expression;
        }


        return trim(
            // 0 from char before the first "open parenthesis"
            substr($expression, 0, $first) .

            // open parenthesis
            '(' .

            // first char after the last "open parenthesis"
            // to
            // first char before the first "close parenthesis"
            substr($expression, $i + 1, $j - $i - 1) .

            // close parenthesis
            ')' .

            // remove extra parenthesis from the first char after the last "close parenthesis"
            remove_extra_parenthesis(substr($expression, $last + 1))
        );
    }
}