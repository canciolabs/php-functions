<?php

namespace CancioLabs\Functions\Tests\ArrayFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\ArrayFunctions\array_value_replace;

class ArrayValueReplaceTest extends CustomTestCase
{

    public function validArrayDataProvider(): array
    {
        $inputs = [];

        $inputs[] = [[], null, null, []];
        $inputs[] = [[1], 2, 3, [1]];
        $inputs[] = [['1'], 1, 2, ['1']];
        $inputs[] = [[1, 2, 3], 4, 5, [1, 2, 3]];

        $inputs[] = [[1], 1, 2, [2]];
        $inputs[] = [[1, 1], 1, 2, [2, 2]];
        $inputs[] = [[1, 2], 1, 2, [2, 2]];
        $inputs[] = [[2, 1], 1, 2, [2, 2]];
        $inputs[] = [['foo', 'bar', 'zoo'], 'foo', 'bar', ['bar', 'bar', 'zoo']];

        return $inputs;
    }

    /**
     * @test
     * @dataProvider validArrayDataProvider
     */
    public function shouldReplaceValuesOfAnArray(array $arr, $search, $replace, $expected): void
    {
        $this->assertSame($expected, array_value_replace($arr, $search, $replace));
    }

}