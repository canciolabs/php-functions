<?php

namespace CancioLabs\Functions\Tests\ColorFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use InvalidArgumentException;
use function CancioLabs\Functions\ColorFunctions\rgb_to_hex;

class RgbToHexTest extends CustomTestCase
{

    public function validRgbColorDataProvider(): array
    {
        return [
            ['15,70,44', '#0f462c'],
            ['243,186,110', '#f3ba6e'],
            ['192,255,166', '#c0ffa6'],
            ['133,204,196', '#85ccc4'],
            ['98,146,123', '#62927b'],
            ['0,102,34', '#006622'],
            ['51,187,102', '#33bb66'],
            ['204,255,170', '#ccffaa'],
            ['0,0,0', '#000000'],
            ['255,255,255', '#ffffff'],
        ];
    }

    public function invalidRgbColorDataProvider(): array
    {
        $invalid_rgb = [];

        $faker = self::faker();

        $invalid_rgb[] = [$faker->hexColor];
        $invalid_rgb[] = [$faker->safeHexColor];
        $invalid_rgb[] = [$faker->rgbCssColor];
        $invalid_rgb[] = ['-1,-1,-1'];
        $invalid_rgb[] = ['256,256,256'];
        $invalid_rgb[] = ['a,a,a'];

        return $invalid_rgb;
    }

    /**
     * @test
     * @dataProvider validRgbColorDataProvider
     */
    public function shouldReturnRgbWhenHexColorIsValid(string $rgb_color, string $hex_color): void
    {
        $this->assertSame($hex_color, rgb_to_hex($rgb_color));
    }

    /**
     * @test
     * @dataProvider invalidRgbColorDataProvider
     */
    public function shouldThrowExceptionWhenRgbColorIsInvalid(string $invalid_rgb_color): void
    {
        $this->expectException(InvalidArgumentException::class);

        rgb_to_hex($invalid_rgb_color);
    }

}