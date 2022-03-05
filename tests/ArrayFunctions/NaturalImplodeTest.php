<?php

namespace CancioLabs\Functions\Tests\ArrayFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use InvalidArgumentException;
use function CancioLabs\Functions\ArrayFunctions\natural_implode;

class NaturalImplodeTest extends CustomTestCase
{

    public function invalidArrayDataProvider(): array
    {
        $inputs = [];

        $inputs[] = [[null]];
        $inputs[] = [[1]];

        return $inputs;
    }

    public function validArrayDataProvider(): array
    {
        $inputs = [];

        $inputs[] = [[], ''];
        $inputs[] = [[''], ''];
        $inputs[] = [['1'], '1'];
        $inputs[] = [['foo'], 'foo'];
        $inputs[] = [[1 => 'bar'], 'bar'];
        $inputs[] = [['foo' => 'zoo'], 'zoo'];
        $inputs[] = [['foo', 'bar'], 'foo and bar'];
        $inputs[] = [[1 => 'foo', 2 => 'bar', 3 => 'zoo'], 'foo, bar and zoo'];
        $inputs[] = [['foo' => '1', 'bar' => '2', 'zoo' => '3'], '1, 2 and 3'];

        return $inputs;
    }

    public function validSeparatorAndConjuntionDataProvider(): array
    {
        $inputs = [];

        $inputs[] = [
            ['apple', 'banana', 'cashew'],
            ', ',
            ' or ',
            'apple, banana or cashew'
        ];

        $inputs[] = [
            ['Rio', 'New York', 'Jerusalem', 'Sydney'],
            '... ',
            '... and ',
            'Rio... New York... Jerusalem... and Sydney'
        ];

        return $inputs;
    }

    /**
     * @test
     * @dataProvider invalidArrayDataProvider
     */
    public function shouldThrowExceptionWhenInputIsInvalid(array $arr): void
    {
        $this->expectException(InvalidArgumentException::class);

        natural_implode($arr);
    }

    /**
     * @test
     * @dataProvider validArrayDataProvider
     */
    public function shouldReturnElementValueWhenArrayHasOneElement(array $arr, string $expected): void
    {
        $this->assertEquals($expected, natural_implode($arr));
    }

    /**
     * @test
     * @dataProvider validSeparatorAndConjuntionDataProvider
     */
    public function shouldImplodeStringWhenArrayHasMultipleElements(array $arr, string $separator, string $conjunection, string $expected): void
    {
        $this->assertEquals($expected, natural_implode($arr, $separator, $conjunection));
    }

}