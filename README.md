# CancioLabs / PHP Functions
Functions that do not deserve a class or component. Not yet. :)

## Installation

`composer require canciolabs/php-functions`

## Functions
* Array
  * array_key_replace
  * array_most_frequent_element
  * array_subsets
  * array_value_replace
  * natural_implode
* Color
  * basic_html_color_names
  * hex_to_html_color_name
  * hex_to_rgb
  * html_color_name_to_rgb
  * html_color_name_to_hex
  * html_color_names
  * is_basic_html_color_name
  * is_hex_color
  * is_html_color_name
  * is_rgb_color
  * rgb_to_hex
  * rgb_to_html_color_name
* Converter
  * Temperature
    * celsius_to_fahrenheit
    * celsius_to_kelvin
    * fahrenheit_to_celsius
    * fahrenheit_to_kelvin
    * kelvin_to_celsius
    * kelvin_to_fahrenheit
  * Time
    * hour_to_second
    * minute_to_second
    * month_to_second
    * quarter_to_second
    * week_to_second
    * year_to_second
* Expression
  * remove_extra_parenthesis
* Math
  * lcd (alias for `lowest_common_denominator`)
  * gcd (alias for `greatest_common_divisor`)
  * is_prime
* Random
  * random_char
  * random_password
  * random_string
* String
  * is_palindrome
  * remove_extra_spaces
  * replace_special_chars
* Utility
  * swap