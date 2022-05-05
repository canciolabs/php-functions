<?php

namespace CancioLabs\Functions\Tests\ArrayFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\ArrayFunctions\array_key_replace;

class ArrayKeyReplaceTest extends CustomTestCase
{

    public function validArrayDataProvider(): array
    {
        $inputs = [];

        $inputs[] = [[], null, null, []];
        $inputs[] = [[1], 1, 2, [1]];
        $inputs[] = [['0' => 1], '1', '2', ['0' => 1]];

        $inputs[] = [[1], 0, 1, [1 => 1]];
        $inputs[] = [[1, 1], 1, 2, [0 => 1, 2 => 1]];
        $inputs[] = [[1, 2], 1, 2, [0 => 1, 2 => 2]];
        $inputs[] = [[2, 1], 1, 2, [0 => 2, 2 => 1]];
        $inputs[] = [['foo' => 1, 'bar' => 2, 'zoo' => 3], 'foo', 'bar', ['bar' => 1, 'zoo' => 3]];

        return $inputs;
    }

    /**
     * @test
     * @dataProvider validArrayDataProvider
     */
    public function shouldReplaceKeyOfAnArray(array $arr, $search, $replace, $expected): void
    {
        $this->assertSame($expected, array_key_replace($arr, $search, $replace));
    }

}