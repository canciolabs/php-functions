<?php

namespace CancioLabs\Functions\Tests\ArrayFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\ArrayFunctions\array_subsets;

class ArraySubSetsTest extends CustomTestCase
{

    public function validArrayDataProvider(): array
    {
        $inputs = [];

        // Empty array
        $inputs[] = [
            [],
            [],
        ];

        // One element
        $inputs[] = [
            [1],
            [[1]],
        ];

        // Two elements
        $inputs[] = [
            [1, 2],
            [[1], [1, 2], [2]],
        ];

        // Three elements
        $inputs[] = [
            [1, 2, 3],
            [[1], [1, 2], [1, 2, 3], [1, 3], [2], [2, 3], [3]],
        ];

        return $inputs;
    }

    /**
     * @test
     * @dataProvider validArrayDataProvider
     */
    public function shouldReturnMostFrequentElement(array $arr, array $expected): void
    {
        $subsets = array_subsets($arr);

        $this->assertCount(count($expected), $subsets);
        $this->assertEquals($expected, $subsets);
    }

}