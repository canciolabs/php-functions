<?php

namespace CancioLabs\Functions\Tests\ColorFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use InvalidArgumentException;
use function CancioLabs\Functions\ColorFunctions\hex_to_rgb;

class HexToRgbTest extends CustomTestCase
{

    public function validColorHexDataProvider(): array
    {
        return [
            ['#0f462c', '15,70,44'],
            ['#f3ba6e', '243,186,110'],
            ['#c0ffa6', '192,255,166'],
            ['#85ccc4', '133,204,196'],
            ['#62927b', '98,146,123'],
            ['#062', '0,102,34'],
            ['#006622', '0,102,34'],
            ['#3b6', '51,187,102'],
            ['#33bb66', '51,187,102'],
            ['#cfa', '204,255,170'],
            ['#ccffaa', '204,255,170'],
            ['#000', '0,0,0'],
            ['#fff', '255,255,255'],
            ['#000000', '0,0,0'],
            ['#ffffff', '255,255,255'],
        ];
    }

    public function invalidColorHexDataProvider(): array
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
     * @dataProvider validColorHexDataProvider
     */
    public function shouldReturnRgbWhenHexColorIsValid(string $hex_color, string $rgb_color): void
    {
        $this->assertSame($rgb_color, hex_to_rgb($hex_color));
    }

    /**
     * @test
     * @dataProvider invalidColorHexDataProvider
     */
    public function shouldThrowExceptionWhenHexColorIsInvalid(string $invalid_hex_color): void
    {
        $this->expectException(InvalidArgumentException::class);

        hex_to_rgb($invalid_hex_color);
    }

}