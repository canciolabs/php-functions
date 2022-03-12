<?php

namespace CancioLabs\Functions\RandomFunctions;

if (!defined('CL_RANDOM_NUMBERS')) {
    define('CL_RANDOM_NUMBERS', '0123456789');
}

if (!defined('CL_RANDOM_LOWERCASE_LETTERS')) {
    define('CL_RANDOM_LOWERCASE_LETTERS', 'abcdefghijklmnopqrstuvwxyz');
}

if (!defined('CL_RANDOM_UPPERCASE_LETTERS')) {
    define('CL_RANDOM_UPPERCASE_LETTERS', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
}

if (!defined('CL_RANDOM_SYMBOLS')) {
    define('CL_RANDOM_SYMBOLS', '()[]{}<>.:;,?!+-*/|=^~_@#$%&');
}

if (!defined('CL_RANDOM_ALPHANUMERIC')) {
    define('CL_RANDOM_ALPHANUMERIC', CL_RANDOM_NUMBERS . CL_RANDOM_LOWERCASE_LETTERS . CL_RANDOM_UPPERCASE_LETTERS);
}
