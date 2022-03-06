<?php

namespace CancioLabs\Functions\Tests\ColorFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\ColorFunctions\is_basic_color_name;

class IsBasicColorNameTest extends CustomTestCase
{

    public function validBasicColorNameDataProvider(): array
    {
        return [
            ['white'],
            ['silver'],
            ['gray'],
            ['black'],
            ['red'],
            ['maroon'],
            ['yellow'],
            ['olive'],
            ['lime'],
            ['green'],
            ['aqua'],
            ['teal'],
            ['blue'],
            ['navy'],
            ['fuchsia'],
            ['purple'],
        ];
    }

    public function invalidBasicColorNameDataProvider(): array
    {
        return [
            [''],
            ['#000000'],
            ['0,0,0'],
            ['rgb(0,0,0)'],
            ['pink'],
            ['salmon'],
        ];
    }

    /**
     * @test
     * @dataProvider invalidBasicColorNameDataProvider
     */
    public function shouldReturnTrueForHexColors(string $color_name): void
    {
        $this->assertFalse(is_basic_color_name($color_name));
    }

    /**
     * @test
     * @dataProvider validBasicColorNameDataProvider
     */
    public function shouldReturnFalseForOtherStrings(string $color_name): void
    {
        $this->assertTrue(is_basic_color_name($color_name));
    }

}