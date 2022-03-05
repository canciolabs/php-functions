<?php

namespace CancioLabs\Functions\Tests\ColorFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\ColorFunctions\is_rgb_color;

class IsRgbColorTest extends CustomTestCase
{

    public function invalidRgbDataProvider(): array
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

    public function validRgbDataProvider(): array
    {
        $rgb = [];

        // Random colors
        $faker = self::faker();
        for ($i = 1; $i <= 5; $i++) {
            $rgb[] = [$faker->rgbColor];
        }

        // Min & Max
        $rgb[] = ['0,0,0'];
        $rgb[] = ['255,255,255'];

        // Leading zeros
        $rgb[] = ['00,01,02'];
        $rgb[] = ['000,001,002'];
        $rgb[] = ['012,034,056'];

        return $rgb;
    }

    /**
     * @test
     * @dataProvider invalidRgbDataProvider
     */
    public function shouldReturnFalseForInvalidRgb($invalid_rgb_color): void
    {
        $this->assertFalse(is_rgb_color($invalid_rgb_color));
    }

    /**
     * @test
     * @dataProvider validRgbDataProvider
     */
    public function shouldReturnTrueForValidRgb($rgb_color): void
    {
        $this->assertTrue(is_rgb_color($rgb_color));
    }

}