<?php

namespace CancioLabs\Functions\Tests\MathFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use InvalidArgumentException;
use function CancioLabs\Functions\MathFunctions\most_significant_bit;

class MostSignificantBitTest extends CustomTestCase
{

    public function negativeIntegerDataProvider(): array
    {
        $numbers = [];
        $numbers[] = [-1];

        for ($i = 1; $i <= 5; $i++) {
            $numbers[] = [self::faker()->numberBetween(1) * -1];
        }

        return $numbers;
    }

    public function nonNegativeIntegerDataProvider(): array
    {
        $numbers = [];

        $numbers[] = [0, 0];
        $numbers[] = [1, 1];
        $numbers[] = [2, 2];
        $numbers[] = [3, 2];
        $numbers[] = [4, 4];
        $numbers[] = [5, 4];
        $numbers[] = [6, 4];
        $numbers[] = [7, 4];
        $numbers[] = [8, 8];
        $numbers[] = [9, 8];
        $numbers[] = [10, 8];
        $numbers[] = [11, 8];
        $numbers[] = [12, 8];
        $numbers[] = [14, 8];
        $numbers[] = [15, 8];
        $numbers[] = [16, 16];
        $numbers[] = [17, 16];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider negativeIntegerDataProvider
     */
    public function shouldThrowExceptionWhenNumberIsNegative(int $n): void
    {
        $this->expectException(InvalidArgumentException::class);

        most_significant_bit($n);
    }

    /**
     * @test
     * @dataProvider nonNegativeIntegerDataProvider
     */
    public function shouldReturnTheBitWhenNumberIsNonNegative(int $n, int $bit): void
    {
        $this->assertSame($bit, most_significant_bit($n));
    }

}