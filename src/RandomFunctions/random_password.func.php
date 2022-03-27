<?php

namespace CancioLabs\Functions\RandomFunctions;

use Webmozart\Assert\Assert;

if (!function_exists('random_password')) {
    /**
     * Returns a random password.
     *
     * @param int $length
     * @param bool $include_symbols
     * @param bool $include_numbers
     * @param bool $include_lowercase_letters
     * @param bool $include_uppercase_letters
     * @return string
     */
    function random_password(
        int $length = 16,
        bool $include_symbols = false,
        bool $include_numbers = true,
        bool $include_lowercase_letters = true,
        bool $include_uppercase_letters = true
    ): string
    {
        Assert::greaterThanEq($length, 8);
        Assert::true(
            $include_symbols || $include_numbers || $include_lowercase_letters || $include_uppercase_letters,
            'One of the options should be equal to true.'
        );

        $chars = '';
        $password = '';

        if ($include_symbols) {
            $chars .= CL_RANDOM_SYMBOLS;

            // Make sure the password contains at least one symbol
            $password .= random_char(CL_RANDOM_SYMBOLS);
        }

        if ($include_numbers) {
            $chars .= CL_RANDOM_NUMBERS;

            // Make sure the password contains at least one number
            $password .= random_char(CL_RANDOM_NUMBERS);
        }

        if ($include_lowercase_letters) {
            $chars .= CL_RANDOM_LOWERCASE_LETTERS;

            // Make sure the password contains at least one lowercase letter
            $password .= random_char(CL_RANDOM_LOWERCASE_LETTERS);
        }

        if ($include_uppercase_letters) {
            $chars .= CL_RANDOM_UPPERCASE_LETTERS;

            // Make sure the password contains at least one uppercase letter
            $password .= random_char(CL_RANDOM_UPPERCASE_LETTERS);
        }

        $password .= random_string($length - strlen($password), $chars);

        return str_shuffle($password);
    }
}