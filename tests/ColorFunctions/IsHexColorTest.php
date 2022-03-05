<?php

namespace CancioLabs\Functions\Tests\ColorFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\ColorFunctions\is_hex_color;

class IsHexColorTest extends CustomTestCase
{

    public function validHexColorDataProvider(): array
    {
        $faker = self::faker();

        $hex_colors = [];

        for ($i = 1; $i <= 5; $i++) {
            $hex_colors[] = [$faker->hexColor];
        }

        return $hex_colors;
    }

    public function invalidHexColorDataProvider(): array
    {
        return [
            [''],
            ['foo'],
            ['069'],
            ['006699'],
            ['fff'],
            ['ffffff'],
            ['#ghj'],
            ['#qwerty'],
            ['127,357,897'],
        ];
    }

    /**
     * @test
     * @dataProvider validHexColorDataProvider
     */
    public function shouldReturnTrueForHexColors(string $hex_color): void
    {
        $this->assertTrue(is_hex_color($hex_color));
    }

    /**
     * @test
     * @dataProvider invalidHexColorDataProvider
     */
    public function shouldReturnFalseForOtherStrings(string $invalid_hex_color): void
    {
        $this->assertFalse(is_hex_color($invalid_hex_color));
    }

}