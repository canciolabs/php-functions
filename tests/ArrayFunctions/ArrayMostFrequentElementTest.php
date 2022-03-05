<?php

namespace CancioLabs\Functions\Tests\ArrayFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use DateTime;
use InvalidArgumentException;
use function CancioLabs\Functions\ArrayFunctions\array_most_frequent_element;

class ArrayMostFrequentElementTest extends CustomTestCase
{

    public function invalidArrayDataProvider(): array
    {
        $inputs = [];

        $inputs[] = [[]];
        $inputs[] = [[null]];
        $inputs[] = [[false]];
        $inputs[] = [[true]];
        $inputs[] = [[2.3], 2.3];
        $inputs[] = [[new DateTime('now')]];
        $inputs[] = [[[1, 2, 3]]];

        return $inputs;
    }

    public function validArrayDataProvider(): array
    {
        $inputs = [];

        // One element
        $inputs[] = [[''], ''];
        $inputs[] = [[1], 1];
        $inputs[] = [['', 1], ['', 1]];

        // Two distinct elements
        $inputs[] = [[1, 2], [1, 2]];
        $inputs[] = [['foo', 'bar'], ['foo', 'bar']];

        // One element is the most frequent
        $inputs[] = [[1, 2, 2, 3, 2, 2], 2];

        // Two or more elements have the same number of occurrences
        $inputs[] = [[1, 2, 2, 3, 2, 4, 4, 4, 5], [2, 4]];

        return $inputs;
    }

    /**
     * @test
     * @dataProvider invalidArrayDataProvider
     */
    public function shouldThrowExceptionWhenArrayIsNotAlphaNumeric(array $arr): void
    {
        $this->expectException(InvalidArgumentException::class);

        array_most_frequent_element($arr);
    }

    /**
     * @test
     * @dataProvider validArrayDataProvider
     */
    public function shouldReturnMostFrequentElement(array $arr, $expected): void
    {
        $this->assertSame($expected, array_most_frequent_element($arr));
    }

}